<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VendorDay;
use App\Models\Category;
use App\Models\VendorService;
use App\Models\VendorPortfolio;
use App\Models\Appointment;
use App\Models\Notification;
use App\Models\ProductService;

use App\Helpers\ImageHelper;
use App\Helpers\ApiHelper;
use Illuminate\Validation\Rule;
use Validator;
use Auth;
use App;
use Hash;
use Redirect,Response,DB,Config;
use Datatables;

class VendorController extends Controller
{
    /**
     * Create a new VendorController instance.
     *
     * @return void
     */
    public function __construct(Request $request){
        if($request->lang){
            App::setlocale($request->lang);
        }
    }

    public function getDays(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'               => 'required',
        ];
         $message = [
            'user_id.required'          => $langData['user_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $VendorDays = DB::table('vendor_days as vd')
                            ->select('day_id','day_name','day_status','start_time','end_time')
                            ->where('vd.vendor_id',$inputs['user_id'])
                            ->whereNull('vd.deleted_at')
                            ->get();
        if($VendorDays->toArray()){
            $Days = $VendorDays;
        }else{
           $Days = DB::table('days as d')->select('day_id','day_name','day_status','start_time','end_time')->whereNull('d.deleted_at')->get();
        }

        if($Days->toArray()){
            return response(['status' => true , 'message' => __('Record found') ,'data'=>$Days]);
        }else{
            return response(['status' => false , 'message' =>__('Record not found') ]);
        }
    }
    public function addDays(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'               => 'required',
            'days_data'               => 'required',
        ];
         $message = [
            'user_id.required'          => __('User id field is required'),
            'days_data.required'          => __('Days data field is required'),
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        //return $inputs['days_data'];
        //return $inputs;
        //$daysData  = json_encode($inputs['days_data'], TRUE);
        $daysData  = json_decode($inputs['days_data'], TRUE);


        if($daysData){
            //print_r($daysData);
            //die;
            DB::table('vendor_days')->where('vendor_id', $inputs['user_id'])->delete();
            $VendorDay=[];
            foreach ($daysData as $key => $value) {
                $tmp                = [];
                $tmp['vendor_id']   = $inputs['user_id'];
                $tmp['day_id']      = $value['day_id'];
                $tmp['day_name']    = $value['day_name'];
                if($value['day_status']==1){
                    $tmp['day_status']  = '1';
                }else{
                     $tmp['day_status']  = '0';
                }
                $tmp['start_time']  = $value['start_time'];
                $tmp['end_time']    = $value['end_time'];
                array_push($VendorDay, $tmp);
            }
        }
        if($VendorDay){
            VendorDay::insert($VendorDay);
            $VendorDay = VendorDay::where('vendor_id',$inputs['user_id'])->whereNull('deleted_at')->first();
            //return $VendorDay;
            $User = User::find($inputs['user_id']);
            if($VendorDay){
                $User->availability_status='1';
            }else{
                $User->availability_status='0';
            }
            $User->save();
            return response(['status' => true , 'message' => __('Successfully added days') ]);
        }else{
            return response(['status' => false , 'message' => __('Failed to add days') ]);
        }
    }

    public function getHome(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'           => 'required',
        ];
        $message = [
            'user_id.required'  => $langData['user_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $Appointments = DB::table('appointments as ap')
                                ->select('ap.*','u.profile_image')
                                ->leftJoin('users as u','u.id','=','ap.user_id')
                                ->leftJoin('vendor_services as vs','vs.vendor_service_id','=','ap.vendor_service_id')
                              //  ->whereIn('ap.status',['0','1'])
                                ->where(function($query) use ($request){
                                     $query->where('ap.status',$request->status);
                                })
                              //  ->where('ap.payment_status','1')
                                ->where('ap.vendor_id',$inputs['user_id'])
                                ->where('ap.booking_payment_status','1')
                                ->whereNull('ap.deleted_at')
                                ->orderBy('ap.appointment_date','asc')
                                ->get();

        if($Appointments->toArray()){
            foreach ($Appointments as $key => $value) {
                $value->profile_image=ImageHelper::getProfileImage($value->profile_image);
                $Appointments[$key]->appointment_time = date('h:i A',strtotime($value->appointment_time));
            }
            return response(['status' => true , 'message' => __('Record found') ,'data'=>$Appointments]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }

    public function getAppointmentDetails(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'           => 'required',
            'appointment_id'           => 'required',
        ];
        $message = [
            'user_id.required'  => $langData['user_id'],
            'appointment_id.required'  => $langData['appointment_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $Appointment = DB::table('appointments as ap')
                                ->select('ap.*','u.profile_image')
                                ->leftJoin('users as u','u.id','=','ap.user_id')
                                ->leftJoin('vendor_services as vs','vs.vendor_service_id','=','ap.vendor_service_id')
                                ->where('ap.vendor_id',$inputs['user_id'])
                                ->where('ap.appointment_id',$inputs['appointment_id'])
                                ->whereNull('ap.deleted_at')
                                ->first();

        if($Appointment){
            $Appointment->profile_image=ImageHelper::getProfileImage($Appointment->profile_image);
            $Appointment->appointment_time = date('h:i A',strtotime($Appointment->appointment_time));
            $Appointments = DB::table('appointments as ap')
                            ->select('ap.*','u.profile_image')
                            ->leftJoin('users as u','u.id','=','ap.user_id')
                            ->leftJoin('vendor_services as vs','vs.vendor_service_id','=','ap.vendor_service_id')
                            ->whereIn('ap.status',['1','2','3'])
                            ->where('ap.vendor_id',$inputs['user_id'])
                            ->where('ap.appointment_id','!=',$inputs['appointment_id'])
                            ->whereNull('ap.deleted_at')
                            ->get();
            if($Appointments->toarray()){
                 foreach($Appointments as $key => $value){
                    $Appointments[$key]->appointment_time = date('h:i A',strtotime($value->appointment_time));
                 }
            }
            $Appointment->history=$Appointments;
            return response(['status' => true , 'message' => __('Record found') ,'data'=>$Appointment]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }

    public function getCategory(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'               => 'required',
        ];
        $message = [
            'user_id.required'          => $langData['user_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $Category    = Category::select('category_id' , 'category_name', 'category_name_ar' ,'category_image')
                                ->where(function($query) use ($inputs){
                                    if(!empty($inputs['search_name'])){
                                        $query->whereRaw('LOWER(category_name) like ?' , '%'.strtolower($inputs['search_name']).'%');
                                    }
                                })
                                ->whereNull('deleted_at')
                                ->get();
        if($Category->toArray()){
            foreach ($Category as $key => $value) {
                $value->category_image=ImageHelper::getCategoryImage($value->category_image);
                if(app()->getLocale() == 'ar')
                $Category[$key]->category_name = $value->category_name_ar;
            }
            return response(['status' => true , 'message' => __('Record found') ,'data'=>$Category]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }


    public function addService(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();

        if(!empty($inputs['service_image'])){
            $rules = [
                'user_id'                   => 'required',
                'service_for'               => 'required',
                'service_name_english'      => 'required',
                'category_id'               => 'required',
                'rate'                      => 'required',
                'service_image' => 'required|image|mimes:jpeg,png,jpg'
                //'time_slots'                => 'required',
            ];
            $message = [
                'user_id.required'          => __('User id field is required'),
                'service_for.required'      => __('Service for field is required'),
                'service_name_english.required'     => __('Service name field is required'),
                'category_id.required'      => __('Category id field is required'),
                'rate.required'             => __('Rate field is required'),
                //'time_slots.required'       => $langData['time_slots'],
            ];
        }else{
            $rules = [
                'user_id'                   => 'required',
                'service_for'               => 'required',
                'service_name_english'              => 'required',
                'category_id'               => 'required',
                'rate'                      => 'required',
                //'time_slots'                => 'required',
            ];
            $message = [
                'user_id.required'          => __('User id field is required'),
                'service_for.required'     => __('Service for field is required'),
                'service_name_english.required'     => __('Service name field is required'),
                'category_id.required'      =>__('Category id field is required'),
                'rate.required'             => __('Rate field is required'),
                //'time_slots.required'       => $langData['time_slots'],
            ];
        }

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $VendorService                  = new VendorService();
        $VendorService->vendor_id       = $inputs['user_id'];
        $VendorService->service_for     = $inputs['service_for'];
        $VendorService->category_id     = $inputs['category_id'];
        $VendorService->service_name    = $inputs['service_name_english'] ?? NULL;
        $VendorService->service_name_ar = $inputs['service_name_arabic']  ?? NULL;
        $VendorService->description     = $inputs['description_english']  ?? NULL;
        $VendorService->description_ar  = $inputs['description_arabic']   ?? NULL;
        $VendorService->rate            = $inputs['rate'];
        $VendorService->service_cost    = $inputs['rate'] ?? '0';
        $VendorService->booking_amount  = $inputs['rate'] ?? '0';

        if($request->hasFile('service_image')) {
            $service_image = str_random('10').'_'.time().'.'.request()->service_image->getClientOriginalExtension();
            request()->service_image->move(public_path('uploads/service_image/'), $service_image);
            $VendorService->service_image            = $service_image;
        }
        //$VendorService->time_slots      = $inputs['time_slots'];
        if($VendorService->save()){
            $VendorServiceStatus = VendorService::where('vendor_id',$inputs['user_id'])->whereNull('deleted_at')->first();
            $User = User::find($inputs['user_id']);
            if($VendorServiceStatus){
                $User->service_status='1';
            }else{
                $User->service_status='0';
            }
            $User->save();
            return response(['status' => true , 'message' => __('Successfully added service') ]);
        }else{
            return response(['status' => false , 'message' => __('Failed to add service') ]);
        }
    }

    public function getServices(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'           => 'required',
        ];
        $message = [
            'user_id.required'  => $langData['user_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $VendorServices = DB::table('vendor_services as vs')
                                ->select('vs.*','c.category_name','c.category_name_ar')
                                ->leftJoin('categories as c','c.category_id','=','vs.category_id')
                                ->where('vs.vendor_id',$inputs['user_id'])
                                ->whereNull('vs.deleted_at')
                                ->orderBy('vs.vendor_service_id','desc')
                                ->get();
        if($VendorServices->toArray()){
            foreach ($VendorServices as $key => $v) {
                if(app::getLocale() == 'ar')
                       $VendorServices[$key]->category_name = (!empty($v->category_name_ar) && !is_null($v->category_name_ar))  ? $v->category_name_ar  :  $v->category_name;
                $v->service_image=ImageHelper::getServiceImage($v->service_image);
            }
            return response(['status' => true , 'message' => __('Record found') ,'data'=>$VendorServices]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }

    public function getServiceDetails(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'           => 'required',
            'service_id'           => 'required',
        ];

        $message = [
            'user_id.required'  => $langData['user_id'],
            'service_id.required'  => $langData['service_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }

        $VendorService = DB::table('vendor_services as vs')
                                ->select('vs.*','c.category_name')
                                ->leftJoin('categories as c','c.category_id','=','vs.category_id')
                                ->where('vs.vendor_id',$inputs['user_id'])
                                ->where('vs.vendor_service_id',$inputs['service_id'])
                                ->whereNull('vs.deleted_at')
                                ->first();

        if(!empty($VendorService)){
            $VendorService->service_image=ImageHelper::getServiceImage($VendorService->service_image);
            return response(['status' => true , 'message' => __('Record not found') ,'data'=>$VendorService]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }

    public function updateService(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        if(!empty($inputs['service_image'])){

            $rules = [
                'user_id'                   => 'required',
                'service_for'               => 'required',
                'service_id'                => 'required',
                'service_name_english'              => 'required',
                'category_id'               => 'required',
                'rate'                      => 'required',
                'service_image' => 'required|image|mimes:jpeg,png,jpg',
                //'time_slots'                => 'required',
            ];
            $message = [
                'user_id.required'          => __('User id field is required'),
                'service_id.required'       => __('Service id field is required'),
                'service_for.required'     => __('Service for field is required'),
                'service_name_english.required'     => __('Service name field is required'),
                'category_id.required'      => __('Category id field is required'),
                'rate.required'             => __('Rating field is required'),
                //'time_slots.required'       => $langData['time_slots'],
            ];
        }else{
            $rules = [
                'user_id'                   => 'required',
                'service_for'               => 'required',
                'service_id'                => 'required',
                'service_name_english'              => 'required',
                'category_id'               => 'required',
                'rate'                      => 'required',
                //'time_slots'                => 'required',
            ];
            $message = [
                'user_id.required'          => __('User id field is required'),
                'service_id.required'       => __('Service id field is required'),
                'service_for.required'     => __('Service for field is required'),
                'service_name_english.required'     => __('Service name field is required'),
                'category_id.required'      =>__('Category id field is required'),
                'rate.required'             => __('Rating field is required'),
                //'time_slots.required'       => $langData['time_slots'],
            ];
        }

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $VendorService                  = VendorService::find($inputs['service_id']);
        $VendorService->service_for     = $inputs['service_for'];
        $VendorService->category_id     = $inputs['category_id'];
        $VendorService->service_name    = $inputs['service_name_english'] ?? NULL;
        $VendorService->service_name_ar = $inputs['service_name_arabic']  ?? NULL;
        $VendorService->description     = $inputs['description_english']  ?? NULL;
        $VendorService->description_ar  = $inputs['description_arabic']   ?? NULL;
        $VendorService->rate            = $inputs['rate'];
        $VendorService->service_cost    = $inputs['rate'] ?? '0';
        $VendorService->booking_amount  = $inputs['rate'] ?? '0';
        if($request->hasFile('service_image')) {
            $service_image = str_random('10').'_'.time().'.'.request()->service_image->getClientOriginalExtension();
            request()->service_image->move(public_path('uploads/service_image/'), $service_image);
            $VendorService->service_image            = $service_image;
        }
        //$VendorService->time_slots      = $inputs['time_slots'];
        if($VendorService->save()){
            return response(['status' => true , 'message' => __('Successfully updated service') ]);
        }else{
            return response(['status' => false , 'message' => __('Failed to update service') ]);
        }
    }

    public function deleteService(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'                   => 'required',
            'service_id'                => 'required',
        ];
        $message = [
            'user_id.required'          => $langData['user_id'],
            'service_id.required'       => $langData['service_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $VendorService                  = VendorService::find($inputs['service_id']);
        if($VendorService->delete()){
            // $VendorService = VendorService::find($inputs['user_id']);
            // $User = User::find($inputs['user_id']);
            // if($VendorService){
            //     $User->availability_status='1';
            // }else{
            //     $User->availability_status='0';
            // }
            return response(['status' => true , 'message' => __('Successfully deleted service') ]);
        }else{
            return response(['status' => false , 'message' => __('Failed to delete service') ]);
        }
    }

    public function addPortfolio(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'                   => 'required',
            'portfolio_image'           => 'required',
        ];
        $message = [
            'user_id.required'          => __('User id field is required'),
            'portfolio_image.required'     => __('Portfolio image field is required'),
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        //===================Image Upload Hear============
        $data['thumb'] = NULL;
        $portfolio_image=null;
        if($request->hasFile('portfolio_image')) {
            $fileTemName = str_random('10').'_'.time();
            $portfolio_image = $video_name = $fileTemName .'.'. request()->portfolio_image->getClientOriginalExtension();
            request()->portfolio_image->move(public_path('uploads/portfolio/'), $portfolio_image);
            if($inputs['type'] == 2){
                $filePath = public_path("uploads/portfolio/".$video_name);
                $data['thumb'] = $fileTemName.".png";
                $img = public_path("uploads/portfolio/".$data['thumb']);
                exec('ffmpeg -i '.$filePath.' -ss 00:00:05.000 -vframes 1 '.$img);
            }
        }

        $VendorPortfolio                  = new VendorPortfolio();
        $VendorPortfolio->vendor_id       = $inputs['user_id'];
        $VendorPortfolio->portfolio_image     = $portfolio_image;
        $VendorPortfolio->type     = $inputs['type'];
        if($data['thumb'])
            $VendorPortfolio->thumb      = $data['thumb'] ?? NULL;
        if($VendorPortfolio->save()){
            return response(['status' => true , 'message' => __('Successfully added porfolio') ]);
        }else{
            return response(['status' => false , 'message' => __('Failed to add portfolio') ]);
        }
    }

    public function getPortfolio(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'           => 'required',
        ];
        $message = [
            'user_id.required'  => $langData['user_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $VendorPortfolios = DB::table('vendor_portfolios as vp')
                                ->select('vp.*')
                                ->where('vp.vendor_id',$inputs['user_id'])
                                ->whereNull('vp.deleted_at')
                                ->get();

        if($VendorPortfolios->toArray()){
            foreach ($VendorPortfolios as $key => $value) {
                $value->portfolio_image=ImageHelper::getPortfolioImage($value->portfolio_image);
                if($value->type == '2')
                $VendorPortfolios[$key]->thumb = url('public/uploads/portfolio',$value->thumb);
            }
            return response(['status' => true , 'message' => __('Record found') ,'data'=>$VendorPortfolios]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }

    public function deletePortfolio(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'                   => 'required',
            'vendor_portfolio_id'                => 'required',
        ];
        $message = [
            'user_id.required'          => $langData['user_id'],
            'vendor_portfolio_id.required'       => $langData['vendor_portfolio_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $VendorPortfolio                  = VendorPortfolio::find($inputs['vendor_portfolio_id']);
        if($VendorPortfolio->delete()){
            return response(['status' => true , 'message' => __('Successfully deleted portfolio') ]);
        }else{
            return response(['status' => false , 'message' => __('Failed to delete portfolio') ]);
        }
    }
    public function orderStatusChange(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'           => 'required',
            'appointment_id'    => 'required',
            'status'            => 'required',
        ];
        $message = [
            'user_id.required'          => $langData['user_id'],
            'appointment_id.required'  => $langData['appointment_id'],
            'status.required'  => $langData['status'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $Appointment=Appointment::find($inputs['appointment_id']);
        if($Appointment){
            $Appointment->status=$inputs['status'];
            $Appointment->save();
            if($Appointment){
                $Vendor = User::select('id','user_name')
                                ->where('role','3')->where('active_status','1')
                                ->where('id',$Appointment->vendor_id)
                                ->first();

                $User = User::select('id' , 'notification_status' , 'device_type' , 'device_token', 'language')
                        ->where('role','2')
                        ->where('active_status','1')
                        ->where('id',$Appointment->user_id)
                        ->first();

                if($inputs['status']=='1'){
                    $title              = 'Booking Accepted';
                    $message            = 'Your booking accepted by '.$Vendor->user_name;
                    $notification_key   = 'Order_Accepted';
                }elseif($inputs['status']=='2'){
                    $title              = 'Booking Rejected';
                    $message            = 'Your booking rejected by '.$Vendor->user_name;
                    $notification_key   = 'Order_Rejected';
                }elseif($inputs['status']=='3'){
                    $title              = 'Booking Completed';
                    $message            = 'Your booking completed by '.$Vendor->user_name;
                    $notification_key   = 'Order_Completed';
                }else{
                    $title              = 'Booking Completed';
                    $message            = 'Your booking completed by '.$Vendor->user_name;
                    $notification_key   = 'Order_Completed';
                }

                if($User){
                    if($User->notification_status == '1'){
                      //  if($User->device_type== 'android'){
                            $notificationData = [
                                'key'             => $notification_key,
                                'title'           => $title,
                                'message'         => $message,
                                'sender_id'       => $Vendor->id,
                                'receiver_id'     => $User->id,
                                'id'              => $inputs['appointment_id']
                            ];

                            $Notification               = new Notification();
                            $Notification->sender_id    = $Vendor->id;
                            $Notification->receiver_id  = $User->id;
                            $Notification->title        = $title;
                            $Notification->message      = $message;
                            $Notification->json_data    = json_encode($notificationData);
                            $Notification->save();
                            $device_token               = [$User->device_token];

                            ApiHelper::sendNotificationAndroid($device_token,$notificationData);
                            ApiHelper::userIosNotification($device_token,$notificationData['title']);
                            //print_r($notificationStatus);
                      //  }
                    }
                }
                if($inputs['status']=='1'){
                    return response(['status' => true , 'message' => __('Appoitment accepted') ]);
                }elseif($inputs['status']=='2'){
                    return response(['status' => true , 'message' => __('Appointment declined') ]);
                }elseif($inputs['status']=='3'){
                    return response(['status' => true , 'message' => __('Appointment completed') ]);
                }else{
                    return response(['status' => true , 'message' =>__('Appointment declined') ]);
                }

            }else{
                return response(['status' => true , 'message' => __('Something went wrong') ]);
            }
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }
    public function orderHistory(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'           => 'required',
        ];
        $message = [
            'user_id.required'  => $langData['user_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $Appointments = DB::table('appointments as ap')
                                ->select('ap.*','u.profile_image')
                                ->leftJoin('users as u','u.id','=','ap.user_id')
                                ->leftJoin('vendor_services as vs','vs.vendor_service_id','=','ap.vendor_service_id')
                                ->whereIn('ap.status',['2','3','4'])
                                ->where('ap.vendor_id',$inputs['user_id'])
                                ->where('ap.booking_payment_status','1')
                              //  ->where('ap.payment_status','1')
                                ->whereNull('ap.deleted_at')
                                ->orderBy('ap.appointment_date','asc')
                                ->get();

        if($Appointments->toArray()){
            foreach ($Appointments as $key => $value) {
                $value->profile_image=ImageHelper::getProfileImage($value->profile_image);
                $Appointments[$key]->appointment_time = date('h:i A',strtotime($value->appointment_time));
            }
            return response(['status' => true , 'message' => __('Rcord found') ,'data'=>$Appointments]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }

    public function addProduct(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();

        if(!empty($inputs['product_image'])){
            $rules = [
                'user_id'                  => 'required',
                'product_name_english'      => 'required',
                'price'                     => 'required',
                'offer'                      => 'required',
                'product_image' => 'required|image|mimes:jpeg,png,jpg'
                //'time_slots'                => 'required',
            ];
            $message = [
                'user_id.required'          => __('User id field is required'),
                'product_name_english.required'     => __('Product name field is required'),
                'product_image.required'     => __('Product image field is required'),
                'price.required'      => __('Price field is required'),
                'offer.required'             => __('Offer field is required'),
                //'time_slots.required'       => $langData['time_slots'],
            ];
        }else{
            $rules = [
                'user_id'                  => 'required',
                'product_name_english'               => 'required',
                'price'                     => 'required',
                'offer'                      => 'required',
                //'time_slots'                => 'required',
            ];
            $message = [
                'user_id.required'          => __('User id field is required'),
                'product_name_english.required'     => __('Product name field is required'),
                'price.required'      => __('Price field is required'),
                'offer.required'             => __('Offer field is required'),
                //'time_slots.required'       => $langData['time_slots'],
            ];
        }

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $ProductService                  = new ProductService();
        $ProductService->user_id       = $inputs['user_id'];
        $ProductService->product_name     = $inputs['product_name_english'] ?? NULL;
        $ProductService->product_name_ar  = $inputs['product_name_arabic']  ?? NULL;
        $ProductService->price    = $inputs['price'];
        $ProductService->offer            = $inputs['offer'];

        if($request->hasFile('product_image')) {
            $product_image = str_random('10').'_'.time().'.'.request()->product_image->getClientOriginalExtension();
            request()->product_image->move(public_path('uploads/product_image/'), $product_image);
            $ProductService->product_image            = $product_image;
        }
        //$ProductService->time_slots      = $inputs['time_slots'];
        if($ProductService->save()){
            return response(['status' => true , 'message' => __('Successfully added product') ]);
        }else{
            return response(['status' => false , 'message' => __('Failed to add product') ]);
        }
    }

    public function getProduct(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'           => 'required',
        ];
        $message = [
            'user_id.required'  => $langData['user_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $VendorServices = DB::table('product as p')
                                ->where('p.user_id',$inputs['user_id'])
                                ->whereNull('p.deleted_at')
                                ->get();

        if($VendorServices->toArray()){
            foreach ($VendorServices as $key => $v) {
               // if(app::getLocale() == 'ar')
              //  $VendorServices[$key]->product_name = (!empty($v->product_name_ar) && !is_null($v->product_name_ar) ) ? $v->product_name_ar  :  $v->product_name;
                $v->product_image=ImageHelper::getProductImage($v->product_image);
            }
            return response(['status' => true , 'message' => __('Record found') ,'data'=>$VendorServices]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }

    public function getProductDetails(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'           => 'required',
            'product_id'           => 'required',
        ];

        $message = [
            'user_id.required'  => $langData['user_id'],
            'product_id.required'  => $langData['product_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }

        $VendorService = DB::table('product as p')
                                ->where('p.user_id',$inputs['user_id'])
                                ->where('p.id',$inputs['product_id'])
                                ->whereNull('p.deleted_at')
                                ->first();

        if(!empty($VendorService)){
            $VendorService->product_image=ImageHelper::getProductImage($VendorService->product_image);
            return response(['status' => true , 'message' => __('Record found') ,'data'=>$VendorService]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }

    public function updateProduct(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        if(!empty($inputs['product_image'])){
            $rules = [
                'id' => 'required',
                'product_name_english'               => 'required',
                'price'                     => 'required',
                'offer'                      => 'required',
                'product_image' => 'required|image|mimes:jpeg,png,jpg'
                //'time_slots'                => 'required',
            ];
            $message = [
                'product_name_english.required'     => __('Product name field is required'),
                'product_image.required'     => __('Product image field is required'),
                'price.required'      =>    __('Price field is required'),
                'offer.required'             => __('Offer field is required'),
                //'time_slots.required'       => $langData['time_slots'],
            ];
        }else{
            $rules = [
                'id' => 'required',
                'product_name_english'               => 'required',
                'price'                     => 'required',
                'offer'                      => 'required',
                //'time_slots'                => 'required',
            ];
            $message = [
                'product_name_english.required'     => __('Product name field is required'),
                'product_image.required'     => __('Product image field is required'),
                'price.required'      =>    __('Price field is required'),
                'offer.required'             => __('Offer field is required'),
                //'time_slots.required'       => $langData['time_slots'],
            ];
        }

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $VendorService                  = ProductService::find($inputs['id']);
        $VendorService->product_name     = $inputs['product_name_english'] ?? NULL;
        $VendorService->product_name_ar  = $inputs['product_name_arabic']  ?? NULL;
        $VendorService->price     = $inputs['price'];
        $VendorService->offer    = $inputs['offer'];
        if($request->hasFile('product_name')) {
            $product_name = str_random('10').'_'.time().'.'.request()->product_name->getClientOriginalExtension();
            request()->product_name->move(public_path('uploads/product_name/'), $product_name);
            $VendorService->product_name            = $product_name;
        }
        //$VendorService->time_slots      = $inputs['time_slots'];
        if($VendorService->save()){
            return response(['status' => true , 'message' => __('Successfully updated product') ]);
        }else{
            return response(['status' => false , 'message' => __('Failed to update product') ]);
        }
    }

    public function deleteProduct(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'                   => 'required',
            'product_id'                => 'required',
        ];
        $message = [
            'user_id.required'          => $langData['user_id'],
            'product_id.required'       => $langData['product_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $VendorService                  = ProductService::find($inputs['product_id']);
        if($VendorService->delete()){
            // $VendorService = VendorService::find($inputs['user_id']);
            // $User = User::find($inputs['user_id']);
            // if($VendorService){
            //     $User->availability_status='1';
            // }else{
            //     $User->availability_status='0';
            // }
            return response(['status' => true , 'message' => __('Successfully deleted product') ]);
        }else{
            return response(['status' => false , 'message' => __('Failed to delete product') ]);
        }
    }

    public function vendorOfferAdd (Request $request)
    {
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'user_id'                   => 'required',
            'offer_name_en'             =>  'required',
            'offer_name_ar'             =>  'required',
            'service_id'                =>  'required',
            'offer_type'                =>  'required',
            'price'                     =>  'required',
            'description_en'            =>  'required',
            'description_ar'            =>  'required',
        ];
        $message = [
            'user_id.required'          => $langData['user_id'],
            'offer_name_en.required'    => $langData['offer_name_en'],
            'service_id.required'       => $langData['service_id'],
            'offer_type.required'       => $langData['offer_type'],
            'price.required'            => $langData['price'],
            'description_en.required'   => $langData['description_en'],
        ];
        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }

        $offer_image = '';
        if($request->hasFile('offer_image')) {
            $offer_image = str_random('10').'_'.time().'.'.request()->offer_image->getClientOriginalExtension();
            request()->offer_image->move(public_path('uploads/offer_image/'), $offer_image);
        }

        $offerArr = array(
            'user_id'           =>  $request->user_id,
            'offer_name_en'     =>  $request->offer_name_en,
            'offer_name_ar'     =>  $request->offer_name_ar,
            'service_id'        =>  $request->service_id,
            'offer_type'        =>  $request->offer_type,
            'price'             =>  $request->price,
            'description_en'    =>  $request->description_en,
            'description_ar'    =>  $request->description_ar,
            'offer_image'       =>  $offer_image,
            'created_at'        =>  date('Y-m-d H:i:s'),
            'updated_at'        =>  date('Y-m-d H:i:s'),
        );

        $getOfferId = \DB::table('offers')->insertGetId($offerArr);
        if($getOfferId) {
            return (['status' => true, 'message' => __('Offer added successfully'), 'returnId' => $getOfferId]);
        }else{
            return (['status' => false, 'message' => __('Failed to add Offer')]);
        }
    }

    public function getVendorOfferList (Request $request)
    {
        $langData   = trans('api_vendor');
        $rules = [
            'user_id'                   => 'required',
        ];
        $message = [
            'user_id.required'          => $langData['user_id'],
        ];
        $validator = Validator::make($request->all(), $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $getList = \DB::table('offers')->select('offers.*','vendor_services.service_name','vendor_services.service_name_ar')->where('user_id',$request->user_id)
                    ->leftJoin('vendor_services', function($join) {
                      $join->on('offers.service_id', '=', 'vendor_services.vendor_service_id');
                    })->get();

        if(count($getList) > 0)  {
            foreach($getList as $gl){
                $gl->offer_image = asset('public/uploads/offer_image/'.$gl->offer_image);
            }
            return (['status' => true, 'message' => __('Record Found'), 'data' => $getList]);
        }else{
            return (['status' => false, 'message' => __('No Record Found'), 'data' => [] ]);
        }
    }

    public function deleteVendorOfferList (Request $request)
    {
        $langData   = trans('api_vendor');
        $rules = [
            'offer_id'      =>  'required',
            'user_id'       =>  'required',
        ];
        $message = [
            'offer_id.required'  =>     $langData['offer_id'],
            'user_id.required'   =>     $langData['user_id'],
        ];
        $validator = Validator::make($request->all(), $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $selectOffer = \DB::table('offers')->where('id',$request->offer_id)
                        ->where('user_id',$request->user_id)
                        ->delete();
        if($selectOffer) {
            return (['status' => true, 'message' => __('Offer deleted successfully')]);
        }else{
            return (['status' => false, 'message' => __('Failed to delete Offer, Try again')]);
        }
    }

















}
