<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\VendorService;
use App\Models\Appointment;
use App\Models\VendorRating;

use App\Models\Notification;
use App\Models\TransactionHistory;
use App\Http\Controllers\api\PaymentController;
use App\Helpers\MoyasarPayment;
use App\Models\FavouriteVendor;
use App\Helpers\ImageHelper;
use App\Helpers\ApiHelper;
use Illuminate\Validation\Rule;
use Validator;
use Auth;
use URL;
use App;
use Hash;
use Redirect,Response,DB,Config;
use Datatables;

class UserController extends Controller{

    /**
     * Create a new UserController instance.
     *
     * @return void
     */
    public function __construct(Request $request){
        if($request->lang){
            App::setlocale($request->lang);
        }
    }


    public function getHomeBackup(Request $request){
        $langData   = trans('api_user');
        $inputs     = $request->all();
        $Categories=[];
        $VendorServices=[];
        $Categories = DB::table('categories as c')
                            ->select('c.*')
                            ->whereNull('c.deleted_at')
                            ->where(function($query) use($inputs){
                                if(!empty($inputs['search_name'])){
                                    $query->whereRaw('LOWER(c.category_name) like ?' , '%'.strtolower($inputs['search_name']).'%');
                                }
                            })
                            ->limit('10')
                            ->get();
        if($Categories->toArray()){
            foreach ($Categories as $c_key => $c_value) {
                $c_value->category_image=ImageHelper::getCategoryImage($c_value->category_image);
                if(app()->getLocale() == 'ar')
                $Categories[$c_key]->category_name = $c_value->category_name_ar;
            }
        }

        // $VendorServices = DB::table('vendor_services as vs')
        //                     ->select('vs.*', 'v.id as vendor_id' , 'v.vendor_type' , 'v.user_name as vendor_user_name', 'v.profile_image as vendor_profile_image', 'v.address as vendor_address',  'v.lat as vendor_lat', 'v.lng as vendor_lng' ,'c.category_name')
        //                     ->leftJoin('users as v','v.id','=','vs.vendor_id')
        //                     ->leftJoin('categories as c','c.category_id','=','vs.category_id')
        //                     ->whereNull('vs.deleted_at')
        //                     ->where(function($query) use($inputs){
        //                         if(!empty($inputs['search_name'])){
        //                             $query->whereRaw('LOWER(vs.service_name) like ?' , '%'.strtolower($inputs['search_name']).'%');
        //                         }
        //                     })
        //                     ->limit('10')
        //                     ->get();

        $VendorServices = User::select('users.id as vendor_id' , 'users.vendor_type' , 'users.user_name as vendor_user_name', 'users.profile_image as vendor_profile_image', 'users.address as vendor_address',  'users.lat as vendor_lat', 'users.lng as vendor_lng')
                                 ->whereIn('users.vendor_type',['1','2'])
                                 ->limit('10')
                                ->get();

        $ArtistArr =[];
        $SalonArr =[];

        if($VendorServices->toArray()){
            if(!empty($inputs['lat'])){
                $lat1 = $inputs['lat'];
                $lng1 = $inputs['lng'];
                foreach ($VendorServices as $key => $value) {
                    if(!empty($value->vendor_lat)){
                        $lat2=$value->vendor_lat;
                    }else{
                        $lat2='21.500436617020146';
                    }
                    if(!empty($value->vendor_lat)){
                        $lng2=$value->vendor_lng;
                    }else{
                       $lng2='39.20221188797471';
                    }
                    $unit='K';
                   // $getDistance=ApiHelper::getDistance($lat1, $lng1, $lat2, $lng2, $unit);
                    $getDistance = 0;
                    $value->distance=$getDistance;
                    $value->vendor_profile_image  = ImageHelper::getProfileImage($value->vendor_profile_image);
                    $vendorRatingCount = DB::table('vendor_ratings as vr')
                                                ->select(DB::raw('SUM(vr.rating) AS rating_sum'),DB::raw('COUNT(vr.vendor_id) AS vendor_count'))
                                                ->where('vr.vendor_id',$value->vendor_id)
                                                ->whereNull('vr.deleted_at')
                                                ->first();
                    if($vendorRatingCount){
                        $rating_sum = $vendorRatingCount->rating_sum;
                        if($rating_sum==0){
                            $value->vendor_rating='0';
                        }else{
                            $vendor_count = $vendorRatingCount->vendor_count;
                            $rating = round($rating_sum/$vendor_count,1);
                            $value->vendor_rating="$rating";
                        }

                    }else{
                        $value->vendor_rating='0';
                    }
                }
                $data=[];
                $VendorServices= $VendorServices->toArray();
                foreach ($VendorServices as $key1 => $value1) {
                    $data[$key1]  = $value1->distance;
                }
                array_multisort($data, SORT_ASC, $VendorServices);

                foreach ($VendorServices as $key3 => $value3) {
                    if($value3->vendor_type=='1'){
                        array_push($ArtistArr,$value3);
                    }elseif($value3->vendor_type=='2'){
                        array_push($SalonArr,$value3);
                    }else{
                        array_push($SalonArr,$value3);
                    }
                    // $VendorServicesArrCount=count($VendorServicesArr);
                    // if($VendorServicesArrCount<=9){
                    //     array_push($VendorServicesArr,$value3);
                    // }
                }
            }
        }

        $VendorServices = DB::table('vendor_services as vs')
                            ->select('vs.*', 'v.id as vendor_id', 'v.user_name as vendor_user_name', 'v.profile_image as vendor_profile_image', 'v.address as vendor_address', 'v.lat as vendor_lat', 'v.lng as vendor_lng' ,'c.category_name')
                            ->leftJoin('users as v','v.id','=','vs.vendor_id')
                            ->leftJoin('categories as c','c.category_id','=','vs.category_id')
                            ->whereNull('vs.deleted_at')
                            ->limit('10')
                            ->get();

        if($VendorServices->toArray()){
             foreach($VendorServices as $key => $value){
                 $VendorServices[$key]->service_image = $this->getServiceImage($value->service_image);
                 $VendorServices[$key]->vendor_profile_image = $this->getProfileImage($value->vendor_profile_image);
             }
        }

        return response(['status' => true , 'message' => __('Record found') ,'data_1'=>$Categories , 'artist_data'=>$ArtistArr, 'salon_data'=>$SalonArr , 'vendor_services'=>$VendorServices]);
    }

    public function getHome(Request $request){
        $langData   = trans('api_user');
        $inputs     = $request->all();
        $Categories=[];
        $VendorServices=[];
        $Categories = DB::table('categories as c')
                            ->select('c.*')
                            ->whereNull('c.deleted_at')
                            ->where(function($query) use($inputs){
                                if(!empty($inputs['search_name'])){
                                    $query->whereRaw('LOWER(c.category_name) like ?' , '%'.strtolower($inputs['search_name']).'%');
                                }
                            })
                            ->limit('10')
                            ->get();
        if($Categories->toArray()){
            foreach ($Categories as $c_key => $c_value) {
                $c_value->category_image=ImageHelper::getCategoryImage($c_value->category_image);
                if(app::getLocale() == 'ar'){
                    $Categories[$c_key]->category_name = $c_value->category_name_ar;
                }
            }
        }

        $VendorServices = User::select('users.id as vendor_id' , 'users.vendor_type' , 'users.user_name as vendor_user_name', 'users.profile_image as vendor_profile_image', 'users.address as vendor_address',  'users.lat as vendor_lat', 'users.lng as vendor_lng')
                                 ->whereIn('users.vendor_type',['1','2'])
                                 ->where('role','!=','1')
                                 ->limit('10')
                                ->get();


         $ArtistArr =[];
         $SalonArr =[];

        if($VendorServices->toArray()){
            foreach ($VendorServices as $key => $value) {
                $value->vendor_profile_image  = ImageHelper::getProfileImage($value->vendor_profile_image);
                $vendorRatingCount = DB::table('vendor_ratings as vr')
                                            ->select(DB::raw('SUM(vr.rating) AS rating_sum'),DB::raw('COUNT(vr.vendor_id) AS vendor_count'))
                                            ->where('vr.vendor_id',$value->vendor_id)
                                            ->whereNull('vr.deleted_at')
                                            ->first();
                if($vendorRatingCount){
                    $rating_sum = $vendorRatingCount->rating_sum;
                    if($rating_sum==0){
                        $value->vendor_rating='0';
                    }else{
                        $vendor_count = $vendorRatingCount->vendor_count;
                        $rating = round($rating_sum/$vendor_count,1);
                        $value->vendor_rating="$rating";
                    }

                }else{
                    $value->vendor_rating='0';
                }

                if($value->vendor_type == '1')
                      array_push($ArtistArr,$value);
                if($value->vendor_type == '2')
                      array_push($SalonArr,$value);
            }
        }

        $VendorServices = DB::table('vendor_services as vs')
                            ->select('vs.*', 'v.id as vendor_id', 'v.user_name as vendor_user_name', 'v.profile_image as vendor_profile_image', 'v.address as vendor_address', 'v.lat as vendor_lat', 'v.lng as vendor_lng' ,'c.category_name')
                            ->leftJoin('users as v','v.id','=','vs.vendor_id')
                            ->leftJoin('categories as c','c.category_id','=','vs.category_id')
                            ->whereNull('vs.deleted_at')
                            ->limit('10')
                            ->get();

        if($VendorServices->toArray()){
             foreach($VendorServices as $key => $value){
                 if(app::getLocale() == 'ar')
                 $VendorServices[$key]->service_name = (!empty($value->service_name_ar) && !is_null($value->service_name_ar) ) ? $value->service_name_ar  :  $value->service_name;
                 $VendorServices[$key]->service_image = $this->getServiceImage($value->service_image);
                 $VendorServices[$key]->vendor_profile_image = $this->getProfileImage($value->vendor_profile_image);
             }
        }

        $offerData = DB::table('offers as o','v.service_name','v.service_name_ar','v.service_image')
                            ->leftJoin('vendor_services as v','v.vendor_service_id','=','o.service_id')
                            ->orderBy('id','desc')
                            ->limit('10')
                            ->get();
        if($offerData->toArray()){
             foreach($offerData as $key => $value){
                if(!empty($value->offer_image))
                    $value->offer_image = asset('public/uploads/offer_image/'.$value->offer_image);
                else
                    $value->offer_image = asset('public/uploads/others/placeholder.png');
                 // if(app::getLocale() == 'ar')
                 // $VendorServices[$key]->service_name = (!empty($value->service_name_ar) && !is_null($value->service_name_ar) ) ? $value->service_name_ar  :  $value->service_name;
                 $offerData[$key]->service_image = $this->getServiceImage($value->service_image);
             //     $VendorServices[$key]->vendor_profile_image = $this->getProfileImage($value->vendor_profile_image);
            }
        }
        return response(['status' => true , 'message' => __('Record found') ,'data_1'=>$Categories , 'artist_data'=>$ArtistArr, 'salon_data'=>$SalonArr , 'vendor_services'=>$VendorServices,'offer_data'=>$offerData]);
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
        $Category    = Category::select('category_id' , 'category_name', 'category_name_ar' , 'category_image')
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

    public function getServices(Request $request){
        $langData   = trans('api_user');
        $inputs     = $request->all();
        $VendorServices = DB::table('vendor_services as vs')
                            ->select('vs.*', 'v.id as vendor_id', 'v.user_name as vendor_user_name', 'v.profile_image as vendor_profile_image', 'v.address as vendor_address', 'v.lat as vendor_lat', 'v.lng as vendor_lng' ,'c.category_name')
                            ->leftJoin('users as v','v.id','=','vs.vendor_id')
                            ->leftJoin('categories as c','c.category_id','=','vs.category_id')
                            ->whereNull('vs.deleted_at')
                            ->where(function($query) use($inputs,$request){

                                if(!empty($inputs['search_name'])){
                                    $query->whereRaw('LOWER(vs.service_name) like ?' , '%'.strtolower($inputs['search_name']).'%');
                                }
                                if(!empty($request->category_id)){
                                    $query->where('vs.category_id',$request->category_id);
                                }
                                if(!empty($request->vendor_id)){
                                    $query->where('vs.vendor_id',$request->vendor_id);
                                }

                                if(!empty($request->min)){
                                    $query->where('vs.rate','>=',$request->min);
                                }

                                if(!empty($request->max)){
                                    $query->where('vs.rate','<=',$request->max);
                                }

                                if(!empty($request->vendor_type)){
                                    $query->where('v.vendor_type','=',$request->vendor_type);
                                }


                                if(!empty($request->gender)){
                                    $query->where('v.gender','=',$request->gender);
                                }

                                if(!empty($request->address)){
                                    $query->whereRaw('LOWER(v.address) like ?' , '%'.strtolower($request->address).'%');
                                }

                                if(!empty($request->country_id)){
                                    $query->where('v.country_id','=',$request->country_id);
                                }

                                if(!empty($request->city_id)){
                                    $query->where('v.city_id','=',$request->city_id);
                                }

                            })
                            ->get();
        if($VendorServices->toArray()){

            foreach ($VendorServices as $key => $value) {
                if(app::getLocale() == 'ar')
                $VendorServices[$key]->service_name = (!empty($value->service_name_ar) && !is_null($value->service_name_ar) ) ? $value->service_name_ar  :  $value->service_name;
                $VendorServices[$key]->vendor_profile_image  = $this->getProfileImage($value->vendor_profile_image);
                $VendorServices[$key]->service_image  = $this->getServiceImage($value->service_image);
            }
            if(!empty($inputs['lat'])){
                $lat1 = $inputs['lat'];
                $lng1 = $inputs['lng'];
                foreach ($VendorServices as $key => $value) {
                    if(!empty($value->vendor_lat)){
                        $lat2=$value->vendor_lat;
                    }else{
                        $lat2='21.500436617020146';
                    }
                    if(!empty($value->vendor_lat)){
                        $lng2=$value->vendor_lng;
                    }else{
                       $lng2='39.20221188797471';
                    }
                    $unit='K';
                    $getDistance=ApiHelper::getDistance($lat1, $lng1, $lat2, $lng2, $unit);
                      $value->distance=$getDistance;
                }

                $data=[];
                $VendorServices= $VendorServices->toArray();
                foreach ($VendorServices as $key1 => $value1) {
                    $data[$key1]  = $value1->distance;
                }
                array_multisort($data, SORT_ASC, $VendorServices);
            }
            return response(['status' => true , 'message' => __('Record found') , 'data'=>$VendorServices]);
        }else{
            return response(['status' => true , 'message' => __('Record not found') ]);
        }
    }

    public function getVendorDetails(Request $request){
        $langData   = trans('api_user');
        $inputs     = $request->all();

	if($inputs['lang'] == 'ar'){
            $Vendor = DB::table('users as v')
                            ->select('v.id as vendor_id', 'v.user_name as vendor_user_name', 'v.phone_number as vendor_number' , 'v.profile_image as vendor_profile_image', 'v.address as vendor_address', 'v.lat as vendor_lat', 'v.lng as vendor_lng' , 'v.description_ar as vendor_description')
                            ->where('v.id',$inputs['vendor_id'])
                            ->first();
        }else{
            $Vendor = DB::table('users as v')
                            ->select('v.id as vendor_id', 'v.user_name as vendor_user_name', 'v.phone_number as vendor_number' , 'v.profile_image as vendor_profile_image', 'v.address as vendor_address', 'v.lat as vendor_lat', 'v.lng as vendor_lng' , 'v.description as vendor_description')
                            ->where('v.id',$inputs['vendor_id'])
                            ->first();
        }

        if($Vendor){
            $VendorServices=[];
            $VendorPortfolios = [];
            $vendorRatings= [];
            $VendorServices = DB::table('vendor_services as vs')
                            ->select('vs.*','c.category_name','c.category_name_ar','o.price as offer_amount','o.offer_type')
                            ->leftJoin('categories as c','c.category_id','=','vs.category_id')
                            ->leftJoin('offers as o','o.service_id','=','vs.vendor_service_id')
                            ->whereNull('vs.deleted_at')
                            ->where('vs.vendor_id',$Vendor->vendor_id)
                            ->orderBy('vs.vendor_service_id','desc')
                            ->get();
            if($VendorServices->toArray()){
                foreach ($VendorServices as $key => $value) {
                    if(app::getLocale() == 'ar')
                    $VendorServices[$key]->service_name = (!empty($value->service_name_ar) && !is_null($value->service_name_ar) ) ? $value->service_name_ar  :  $value->service_name;
                    $VendorServices[$key]->category_name = (!empty($value->category_name_ar) && !is_null($value->category_name_ar) ) ? $value->category_name_ar  :  $value->category_name;
                    $VendorServices[$key]->service_image = $this->getServiceImage($value->service_image);
                    $VendorServices[$key]->offer_amount = (int)$value->offer_amount;
                }
            }

            $VendorPortfolios = DB::table('vendor_portfolios as vp')
                                ->select('vp.*')
                                ->where('vp.vendor_id',$Vendor->vendor_id)
                                ->whereNull('vp.deleted_at')
                                ->get();
            if($VendorPortfolios->toArray()){
                foreach ($VendorPortfolios as $key => $value) {
                    $value->portfolio_image=ImageHelper::getPortfolioImage($value->portfolio_image);
                }
            }
            $vendorRatings = DB::table('vendor_ratings as vr')
                                ->select('vr.*','u.id as user_id','u.user_name as user_user_name','u.profile_image as user_profile_image')
                                ->leftJoin('users as u','u.id','=','vr.user_id')
                                ->where('vr.vendor_id',$Vendor->vendor_id)
                                ->whereNull('vr.deleted_at')
                                ->get();
            //return $vendorRatings;
            if($vendorRatings->toArray()){
                foreach ($vendorRatings as $key_2 => $value_2) {
                    $value_2->user_profile_image=ImageHelper::getPortfolioImage($value_2->user_profile_image);
                }
            }

            $Vendor->vendor_services=$VendorServices;
            $Vendor->Vendor_portfolios=$VendorPortfolios;
            $Vendor->vendor_ratings=$vendorRatings;
            $Vendor->vendor_profile_image = ImageHelper::getProfileImage($Vendor->vendor_profile_image);

            $vendorRatingCount = DB::table('vendor_ratings as vr')
                                        ->select(DB::raw('SUM(vr.rating) AS rating_sum'),DB::raw('COUNT(vr.vendor_id) AS vendor_count'))
                                        ->where('vr.vendor_id',$Vendor->vendor_id)
                                        ->whereNull('vr.deleted_at')
                                        ->first();

            $vendorProducts = DB::table('product')->select('id as product_id','product_name','product_name_ar','product_image','price','offer')->where('user_id',$inputs['vendor_id'])->get();
            if($vendorProducts->toArray()){
                foreach($vendorProducts as $key => $value){
                    if(app::getLocale() == 'ar')
                    $vendorProducts[$key]->product_name = (!empty($value->product_name_ar) && !is_null($value->product_name_ar) ) ? $value->product_name_ar  :  $value->product_name;
                    $vendorProducts[$key]->product_image = $this->getProductImage($value->product_image);
                }
            }
            $Vendor->products = $vendorProducts ?? array();
            $vendor_offer = DB::table('offers as o')                  
                            ->leftJoin('vendor_services as vs','o.service_id','=','vs.vendor_service_id')
                            ->where('o.user_id',$request->vendor_id)
                            ->orderBy('o.id','desc')
                            ->get();
            if(!empty($vendor_offer->toArray())){
                foreach($vendor_offer as $key=>$vo){
                    $vendor_offer[$key]->service_image = $this->getServiceImage($vo->service_image);
                }
            }
            $Vendor->offers = $vendor_offer;

            if($vendorRatingCount){
                $rating_sum = $vendorRatingCount->rating_sum;
                if($rating_sum==0){
                    $Vendor->rating='0';
                }else{
                    $vendor_count = $vendorRatingCount->vendor_count;
                    $rating = round($rating_sum/$vendor_count,1);
                    $Vendor->rating="$rating";
                }

            }else{
                $Vendor->rating='0';
            }
            $inputs['user_id'] = $inputs['user_id'] ?? '';
            $isExist = FavouriteVendor::where(['user_id'=>$inputs['user_id'],'vendor_id'=>$inputs['vendor_id']])->count();
            $Vendor->is_favourite = $isExist > 0 ? 1 : 0;
            return response(['status' => true , 'message' => __('Record found') , 'data'=>$Vendor]);
           }else{
            return response(['status' => true , 'message' => __('Record not found') ]);
         }
    }

    public function getNearByService(Request $request){
        $langData   = trans('api_user');
        $inputs     = $request->all();
        $VendorServices = DB::table('vendor_services as vs')
                            ->select('vs.*', 'v.id as vendor_id', 'v.user_name as vendor_user_name', 'v.profile_image as vendor_profile_image', 'v.address as vendor_address', 'v.lat as vendor_lat', 'v.lng as vendor_lng' ,'c.category_name')
                            ->leftJoin('users as v','v.id','=','vs.vendor_id')
                            ->leftJoin('categories as c','c.category_id','=','vs.category_id')
                            ->whereNull('vs.deleted_at')
                            ->where(function($query) use($inputs){
                                if(!empty($inputs['search_name'])){
                                    $query->whereRaw('LOWER(vs.service_name) like ?' , '%'.strtolower($inputs['search_name']).'%');
                                    $query->orWhereRaw('LOWER(c.category_name) like ?' , '%'.strtolower($inputs['search_name']).'%');

                                }
                            })
                            ->get();

        if($VendorServices->toArray()){
            if(!empty($inputs['lat'])){
                $lat1 = $inputs['lat'];
                $lng1 = $inputs['lng'];
                foreach ($VendorServices as $key => $value) {
                    if(!empty($value->vendor_lat)){
                        $lat2=$value->vendor_lat;
                    }else{
                        $lat2='21.500436617020146';
                    }
                    if(!empty($value->vendor_lat)){
                        $lng2=$value->vendor_lng;
                    }else{
                       $lng2='39.20221188797471';
                    }
                    $unit='K';
                    $getDistance=ApiHelper::getDistance($lat1, $lng1, $lat2, $lng2, $unit);
                    $value->distance=$getDistance;

                    $value->vendor_profile_image  = ImageHelper::getProfileImage($value->vendor_profile_image);
                    $value->rating11='4.5';
                }
                $data=[];
                $VendorServices= $VendorServices->toArray();
                foreach ($VendorServices as $key1 => $value1) {
                    $data[$key1]  = $value1->distance;
                }
                array_multisort($data, SORT_ASC, $VendorServices);
                // $VendorServicesArr=[];
                // foreach ($VendorServices as $key3 => $value3) {
                //     $VendorServicesArrCount=count($VendorServicesArr);

                //     if($VendorServicesArrCount<=9){
                //         array_push($VendorServicesArr,$value3);
                //     }
                // }
            }
            return response(['status' => true , 'message' => __('Record found') ,'data'=>$VendorServices]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }





    public function getOrders(Request $request){
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
                                ->select('ap.*', 'v.id as vendor_id', 'v.user_name as vendor_user_name', 'v.profile_image as vendor_profile_image', 'v.address as vendor_address', 'v.lat as vendor_lat', 'v.lng as vendor_lng' ,'c.category_name','vr.rating','vr.review')
                                ->leftJoin('users as v','v.id','=','ap.user_id')
                                ->leftJoin('vendor_services as vs','vs.vendor_service_id','=','ap.vendor_service_id')
                                ->leftJoin('categories as c','c.category_id','=','vs.category_id')
                                ->leftJoin('vendor_ratings as vr','vr.appointment_id','=','ap.appointment_id')
                                ->where('ap.user_id',$inputs['user_id'])
                                ->whereIn('ap.status',['0','1'])
                                ->where('ap.booking_payment_status','1')
                                ->whereNull('ap.deleted_at')
                                ->orderBy('ap.appointment_date','asc')
                                ->get();
        if($Appointments->toArray()){
            foreach ($Appointments as $key => $value) {
                $value->vendor_profile_image=ImageHelper::getProfileImage($value->vendor_profile_image);
                $Appointments[$key]->appointment_time = date('h:i A',strtotime($value->appointment_time));
            }
            return response(['status' => true , 'message' => __('Record_found') ,'data'=>$Appointments]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }

    public function getOrderDetails(Request $request){
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
        $Appointment = DB::table('appointments as ap')
                                ->select('ap.*', 'v.id as vendor_id', 'v.user_name as vendor_user_name', 'v.profile_image as vendor_profile_image', 'v.address as vendor_address', 'v.lat as vendor_lat', 'v.lng as vendor_lng' ,'c.category_name','vr.rating','vr.review')
                                ->leftJoin('users as v','v.id','=','ap.vendor_id')
                                ->leftJoin('vendor_services as vs','vs.vendor_service_id','=','ap.vendor_service_id')
                                ->leftJoin('categories as c','c.category_id','=','vs.category_id')
                                ->leftJoin('vendor_ratings as vr','vr.appointment_id','=','ap.appointment_id')
                                ->where('ap.user_id',$inputs['user_id'])
                                ->where('ap.appointment_id',$inputs['appointment_id'])
                                ->whereNull('ap.deleted_at')
                                ->first();
        if($Appointment){

            $vendorRating = DB::table('vendor_ratings')->select('vendor_rating_id as rating_id','rating','review','user_id','users.user_name','users.phone_number','users.profile_image')->join('users','vendor_ratings.user_id','=','users.id')->where('vendor_ratings.appointment_id',$Appointment->appointment_id)->get();
            $avgRating = DB::table('vendor_ratings')->where('vendor_id',$Appointment->vendor_id)->avg('rating');

            if($vendorRating->toArray()){
                foreach($vendorRating as $key => $value){
                  $vendorRating[$key]->profile_image = $this->getProfileImage($value->profile_image);
                }
            }
            $Appointment->vendor_rating_list = $vendorRating[0] ?? array();
            $Appointment->avg_rating = $avgRating ?? '0';
            $Appointment->appointment_time = date('h:i A',strtotime($Appointment->appointment_time));

            $Appointment->vendor_profile_image=ImageHelper::getProfileImage($Appointment->vendor_profile_image);
            return response(['status' => true , 'message' => __('Record_found') ,'data'=>$Appointment]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }

    public function createOrder(Request $request){

        $langData   = trans('api_user');
        $inputs = $request->all();
        $rules = [
            'user_id'           => 'required',
            'vendor_id'           => 'required',
            'vendor_service_id'           => 'required',
            'appointment_date'           => 'required',
            'appointment_time'           => 'required',

        ];
        $message = [
            'user_id.required'  => $langData['user_id'],
            'vendor_id.required'  => $langData['vendor_id'],
            'vendor_service_id.required'  => $langData['vendor_service_id'],
            'appointment_date.required'  => $langData['appointment_date'],
            'appointment_time.required'  => $langData['appointment_time'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $User = User::find($inputs['user_id']);
        $VendorService = VendorService::find($inputs['vendor_service_id']);
        $Vendor = User::find($inputs['vendor_id']);

        $sericeAmount = $VendorService->service_cost;

        /**
         *  Calculate Payment
        */
        $tax             = 15;
        $adminCommission = 10;

        // $taxAmount               =  ($tax / 100) * $sericeAmount;
        // $totalServiceAmount      =  $sericeAmount + $taxAmount;
        // $bookingAmount           =  ($adminCommission/100) * $sericeAmount;
        // $adminCommissionAmount   = ($adminCommission/100) * $totalServiceAmount;
        // $totalPayableAmount      = $totalServiceAmount + $adminCommissionAmount;
        // $remainingServiceAmount  = $totalPayableAmount - $bookingAmount;
        //  $sericeAmount            = $request->servicecast;

        $taxAmount               =  str_replace( array( '\'', '"',
        ',' , ';', '<', '>' ), ' ',$request->tax);
        $totalServiceAmount      =  str_replace( array( '\'', '"',
        ',' , ';', '<', '>' ), ' ',$request->totalamount);
        $bookingAmount           =  str_replace( array( '\'', '"',
        ',' , ';', '<', '>' ), ' ',$request->bookingamount);
        $adminCommissionAmount   =  str_replace( array( '\'', '"',
        ',' , ';', '<', '>' ), ' ',$request->admincommision);
        $totalPayableAmount      =  str_replace( array( '\'', '"',
        ',' , ';', '<', '>' ), ' ',$request->netpaybleamount);
        $remainingServiceAmount  =  str_replace( array( '\'', '"',
        ',' , ';', '<', '>' ), ' ',$request->remain_amonunt);

        $Appointment = new Appointment();
        $Appointment->user_id = $User->id;
        $Appointment->vendor_id = $Vendor->id;
        $Appointment->vendor_service_id = $VendorService->vendor_service_id;
        $Appointment->user_name = $User->user_name;
        $Appointment->phone_number = $User->phone_number;
        $Appointment->email = $User->email;
        $Appointment->service_name = $VendorService->service_name;

        $Appointment->service_amount           = $sericeAmount;
        $Appointment->tax_percentage           = $tax;
        $Appointment->tax_amount               = $taxAmount;
        $Appointment->total_service_amount     = $totalServiceAmount;
        $Appointment->booking_amount           = $bookingAmount;
        $Appointment->commission_percentage    = $adminCommission;
        $Appointment->commission_amount        = $bookingAmount;
        $Appointment->total_payable_amount     = $totalServiceAmount;
        $Appointment->remaining_amount         = $remainingServiceAmount;
        $Appointment->booking_payment_status   = '0';
        $Appointment->remaining_payment_status = '0';
        $Appointment->booking_payment_date     = date('Y-m-d H:i:s');

        $inputs['appointment_date'] = str_replace('/', '-', $inputs['appointment_date']);
        $Appointment->appointment_date = date('Y-m-d',strtotime($inputs['appointment_date']));
        $Appointment->appointment_time = date('h:i:A',strtotime($inputs['appointment_time']));

        if($Appointment->save()){
            $amount = $bookingAmount;
            return redirect('payment?appointment_id='.$Appointment->appointment_id.'&amount=' . $amount);
        }else{
            return response(['status' => false , 'message' => __('Failed to place order') ]);
        }
    }

    public function createOrderCOD(Request $request){
        $langData   = trans('api_user');
        $inputs = $request->all();
        $rules = [
            'user_id'           => 'required',
            'vendor_id'           => 'required',
            'vendor_service_id'           => 'required',
            'appointment_date'           => 'required',
            'appointment_time'           => 'required',

        ];
        $message = [
            'user_id.required'  => __('User id field is required'),
            'vendor_id.required'  => __('Vendor id field is required'),
            'vendor_service_id.required'  => __('Vendor service id field is required'),
            'appointment_date.required'  => __('Appointment date field is required'),
            'appointment_time.required'  => __('Appointment time field is required'),
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $User = User::find($inputs['user_id']);
        $VendorService = VendorService::find($inputs['vendor_service_id']);
        $Vendor = User::find($inputs['vendor_id']);

        $Appointment = new Appointment();
        $Appointment->user_id = $User->id;
        $Appointment->vendor_id = $Vendor->id;
        $Appointment->vendor_service_id = $VendorService->vendor_service_id;
        $Appointment->user_name = $User->user_name;
        $Appointment->phone_number = $User->phone_number;
        $Appointment->email = $User->email;
        $Appointment->service_name = $VendorService->service_name;
        $Appointment->price = $VendorService->rate;

        $Appointment->service_cost   = $VendorService->service_cost;
        $Appointment->booking_amount = $VendorService->booking_amount;
        $Appointment->tax            = $inputs['tax'] ?? '0';

        $inputs['appointment_date'] = str_replace('/', '-', $inputs['appointment_date']);
        $Appointment->appointment_date = date('Y-m-d',strtotime($inputs['appointment_date']));
        $Appointment->appointment_time = date('h:i:A',strtotime($inputs['appointment_time']));
        $Appointment->payment_method   = 'COD';
        if($Appointment->save()){
            /** Notification */
                $UserStaust = User::select('id','user_name')->where('role','2')->where('active_status','1')->where('id',$Appointment->user_id)->first();

                $Vendor = User::select('id' , 'lat' , 'lng' , 'notification_status' , 'device_type' , 'device_token', 'language')->where('role','3')->where('id',$Appointment->vendor_id)->first();
                if($Vendor){
                        $title              = 'New booking';
                        $message            = 'You have a new booking by '.$UserStaust->user_name;
                        $notification_key   = 'new_order';
                    if($Vendor->notification_status == '1'){
                            $notificationData = [
                                'key'             => $notification_key,
                                'title'           => $title,
                                'message'         => $message,
                                'sender_id'       => $UserStaust->id,
                                'receiver_id'     => $Vendor->id,
                                'id'              => $Appointment->appointment_id
                            ];

                            $Notification = new Notification();
                            $Notification->sender_id=$UserStaust->id;
                            $Notification->receiver_id=$Vendor->id;
                            $Notification->title=$title;
                            $Notification->message=$message;
                            $Notification->json_data=json_encode($notificationData);
                            $Notification->save();

                            $device_token=[$Vendor->device_token];
                            ApiHelper::sendNotificationAndroid($device_token,$notificationData);
                            ApiHelper::vendorIosNotification($device_token,$notificationData['title']);
                    }
                }
            return response(['status' => true , 'message' => __('Thank you to place order') ]);
        }else{
            return response(['status' => false , 'message' => __('Failed to place order')]);
        }
    }

    public function addRating(Request $request){
        $langData   = trans('api_user');
        $inputs = $request->all();
        $rules = [
            'user_id'            => 'required',
            'appointment_id'     => 'required',
            'rating'             => 'required',
            'review'             => 'required',
        ];
         $message = [
            'user_id.required'          => __('User id field is required'),
            'appointment_id.required'   => __('Appointment id field is required'),
            'rating.required'           => __('Rating field is required'),
            'review.required'           => __('Review field is required'),
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        //==============User Check==============
        $UserStaust = User::where('role','2')->where('id',$inputs['user_id'])->first();
        if($UserStaust){
            $Appointment=Appointment::where('appointment_id',$inputs['appointment_id'])->first();
            if($Appointment){
                $VendorRating = VendorRating::where('appointment_id',$Appointment->appointment_id)->where('vendor_id',$Appointment->vendor_id)->first();
                if(!$VendorRating){
                    $VendorRating               = new VendorRating();
                    $VendorRating->user_id      = $Appointment->user_id;
                    $VendorRating->vendor_id    = $Appointment->vendor_id;
                    $VendorRating->appointment_id      = $Appointment->appointment_id;
                    $VendorRating->rating       = $inputs['rating'];
                    $VendorRating->review       = $inputs['review'];
                    if($VendorRating->save()){
                        $Appointment->update();
                        \DB::table('appointments')->where('appointment_id',$Appointment->appointment_id)->update(['is_rating'=>'1']);
                        return response(['status' => true , 'message' => __('Thank you to give your feedback') ]);
                    }else{
                        return response(['status' => false , 'message' => __('Failed to give rating') ]);
                    }
                }else{
                    return response(['status' => false , 'message' => __('Already given rating') ]);
                }
            }else{
                return response(['status' => false , 'message' => __('Record not found') ]);
            }
        }else{
            return response(['status' => false , 'message' => __('This user id does not exist') ]);
        }
    }

    public function cardPayment(Request $request){
        $inputs = $request->all();
        $BrainTree = new PaymentController();

        $response  = $BrainTree->cardPayment([
            'amount'  => $inputs['amount'],
            'nonce'   => $inputs['nonce'],
        ]);

        if($response['status']){
            $insertData = array();
            $TransactionHistory                       = new TransactionHistory();
            $TransactionHistory->user_id              = $inputs['user_id'];
            $TransactionHistory->paypal_charge        = '50';
            $TransactionHistory->payment_method       = '1';//card payment
            $TransactionHistory->transaction_id       = $response['data']['id'];
            $TransactionHistory->currency             = $response['data']['currency_iso_Code'];
            $TransactionHistory->amount               = $response['data']['amount'];
            $TransactionHistory->transaction_status   = '1';

            if($inputs['for_payment']=='1'){
                $TransactionHistory->appointment_id               = $inputs['appointment_id'];
            }else{

            }
            if($TransactionHistory->save()){
                if($inputs['for_payment']=='1'){
                    $Appointment           = Appointment::find($inputs['appointment_id']);
                    $Appointment->payment_status  = '1';
                    $Appointment->update();

                    $UserStaust = User::select('id','user_name')->where('role','2')->where('active_status','1')->where('id',$Appointment->user_id)->first();

                    $Vendor = User::select('id' , 'lat' , 'lng' , 'notification_status' , 'device_type' , 'device_token', 'language')->where('role','3')->where('id',$Appointment->vendor_id)->first();
                    if($Vendor){
                            $title              = 'Payment Successfully';
                            $message            = 'Your payment successfully by '.$UserStaust->user_name;
                            $notification_key   = 'Payment_Success';
                        if($Vendor->notification_status == '1'){
                          //  if($Vendor->device_type== 'android'){
                                $notificationData = [
                                    'key'             => $notification_key,
                                    'title'           => $title,
                                    'message'         => $message,
                                    'sender_id'       => $UserStaust->id,
                                    'receiver_id'     => $Vendor->id,
                                ];

                                $Notification = new Notification();
                                $Notification->sender_id=$UserStaust->id;
                                $Notification->receiver_id=$Vendor->id;
                                $Notification->title=$title;
                                $Notification->message=$message;
                                $Notification->json_data=json_encode($notificationData);
                                $Notification->save();

                                $device_token=[$Vendor->device_token];
                                ApiHelper::sendNotificationAndroid($device_token,$notificationData);
                                ApiHelper::vendorIosNotification($device_token,$notificationData['title']);
                                //echo $notificationStatus;
                                //die;
                           // }
                        }
                    }
                }else{

                }
                return Redirect('api/user/success');

            }else{
                return Redirect('api/user/error');
            }
        }else{
            return Redirect('api/user/error');
        }
    }

    public function success(){
        return view('paypal.success');
    }

    public function error(){
        return view('paypal.cancel');
    }

    public function getUser($id){
        $langData   = trans('api_user');
        $user = User::where('vendor_type',$id)->where('role','!=','1')->whereNull('deleted_at')->get();

            if(!empty($user)){
                foreach ($user as $key => $res) {
                    if(!empty($res->profile_image)){
                        $res->profile_image = asset('public/uploads/profiles/'.$res->profile_image);
                    }else{
                        $res->profile_image = asset('public/uploads/profiles/user-image-not-available.jpg');
                    }

                    $rating = DB::table('vendor_ratings as vr')->where('vendor_id',$res->id)->avg('rating');
                    $user[$key]->vendor_rating = round($rating);
                }

                if($id == 1){
                    return response(['status' => true , 'message' => __('Record found') ,'data'=>$user]);
                }else{
                    return response(['status' => true , 'message' => __('Record not found') ,'data'=>$user]);
                }
            }else{
                if($id == 1){
                    return response(['status' => false , 'message' => __('Record found') ]);
                }else{
                    return response(['status' => false , 'message' => __('Record not found') ]);
                }

            }

    }

    public function getAllUser(Request $request){

        $langData   = trans('api_user');

        $user       = User::where('active_status','1')
                           ->where(function($query) use ($request){
                               if($request->search){
                                   $query->whereRaw('LOWER(user_name) like ?' , '%'.strtolower($request->search).'%');
                               }
                           })
                           ->whereNull('deleted_at')->get();

            if(!empty($user)){
                foreach ($user as $key => $res) {
                    if(!empty($res->profile_image)){
                        $res->profile_image = asset('public/uploads/profiles/'.$res->profile_image);
                    }else{
                        $res->profile_image = asset('public/uploads/profiles/user-image-not-available.jpg');
                    }
                }
                    return response(['status' => true , 'message' => __('Record found') ,'data'=>$user]);
            }else{
                    return response(['status' => false , 'message' => __('Record not found') ]);
            }
    }

      public function getServiceDetails(Request $request){
        $langData   = trans('api_vendor');
        $inputs = $request->all();
        $rules = [
            'service_id'           => 'required',
        ];

        $message = [
            'service_id.required'  => $langData['service_id'],
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);
        }
        $VendorService = VendorService::select('vendor_services.*','c.category_name','c.category_name_ar','v.user_name as vendor_name','v.profile_image as vendor_profile','v.specialist as vendor_description','v.address','o.price as offer_amount','o.offer_type')
                                ->leftJoin('categories as c','c.category_id','=','vendor_services.category_id')
                                ->leftJoin('users as v','v.id','=','vendor_services.vendor_id')
                                ->leftJoin('offers as o','o.service_id','=','vendor_services.vendor_service_id')
                                ->where('vendor_services.vendor_service_id',$inputs['service_id'])
                                ->whereNull('vendor_services.deleted_at')
                                ->first();
       //                $VendorServices[$key]->service_name = (!empty($value->service_name_ar) && !is_null($value->service_name_ar) ) ? $value->service_name_ar  :  $value->service_name;
        if($VendorService){
            $VendorService->service_name   = (!empty($VendorService->service_name_ar) && !is_null($VendorService->service_name_ar) ) ? $VendorService->service_name_ar  :  $VendorService->service_name;
            $VendorService->category_name  = (!empty($VendorService->category_name_ar) && !is_null($VendorService->category_name_ar) ) ? $VendorService->category_name_ar  :  $VendorService->category_name;
            $VendorService->vendor_profile = $this->getProfileImage($VendorService->vendor_profile);
            $VendorService->service_image  = $this->getServiceImage($VendorService->service_image);
            return response(['status' => true , 'message' => __('Record found') ,'data'=>$VendorService]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
     }

     public function getProfileImage($image){
        if($image){
           return asset('public/uploads/profiles/'.$image);
        }
        return asset('public/images/user-default-image.png');
     }

     public function getServiceImage($image){
        if($image){
           return asset('public/uploads/service_image/'.$image);
        }
        return asset('public/images/image-not-found.jpg');
     }

     public function getProductImage($image){
        if($image){
            return asset('public/uploads/product_image/'.$image);
         }
         return asset('public/images/image-not-found.jpg');
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
                                ->select('ap.*', 'v.id as vendor_id', 'v.user_name as vendor_user_name', 'v.profile_image as vendor_profile_image', 'v.address as vendor_address', 'v.lat as vendor_lat', 'v.lng as vendor_lng' ,'c.category_name','vr.rating','vr.review')
                                ->leftJoin('users as v','v.id','=','ap.user_id')
                                ->leftJoin('vendor_services as vs','vs.vendor_service_id','=','ap.vendor_service_id')
                                ->leftJoin('categories as c','c.category_id','=','vs.category_id')
                                ->leftJoin('vendor_ratings as vr','vr.appointment_id','=','ap.appointment_id')
                                ->where('ap.user_id',$inputs['user_id'])
                              //  ->whereIn('ap.payment_status',['1'])
                                ->whereNull('ap.deleted_at')
                                ->where('ap.booking_payment_status','1')
                                ->whereIn('ap.status',['2','3','4'])
                                ->whereNull('ap.deleted_at')
                                ->orderBy('ap.appointment_date','asc')
                                ->get();
        if($Appointments->toArray()){
            foreach ($Appointments as $key => $value) {
                $value->vendor_profile_image=ImageHelper::getProfileImage($value->vendor_profile_image);
                $Appointments[$key]->appointment_time = date('h:i A',strtotime($value->appointment_time));
            }
            return response(['status' => true , 'message' => __('Record found') ,'data'=>$Appointments]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }

    public function payRemainingAmount(Request $request){
         $Appointment = Appointment::find($request->appointment_id);
         $amount = $Appointment->remaining_amount;
        return redirect('payment?appointment_id='.$Appointment->appointment_id.'&amount=' . $amount);
    }

    public function addFavourite(Request $request){

        $input = $request->only('user_id','vendor_id');

        $rules = [
            'user_id'     => 'required',
            'vendor_id'   => 'required',
        ];

        $validator = Validator::make($request->all(), $rules );

        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]]);
        }

        $isExist = FavouriteVendor::where($input)->count();

        if($isExist){
            return ['status'=>false,'message'=>__('Already added to favourite')];
        }

        $insertId  = FavouriteVendor::insert($input);

        if($insertId)
             return ['status'=>true,'message'=>__('Success')];
        else
             return ['status'=>false,'message'=>__('Failed')];

    }

    public function removeFavourite(Request $request){

        $input = $request->only('user_id','vendor_id');

        $rules = [
            'user_id'     => 'required',
            'vendor_id'   => 'required',
        ];

        $validator = Validator::make($request->all(), $rules );

        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]]);
        }

        $favouriteVendor  = FavouriteVendor::where($input)->first();

        if($favouriteVendor && $favouriteVendor->delete())
             return ['status'=>true,'message'=>__('Success')];
        else
             return ['status'=>false,'message'=>__('Failed')];

    }

    public function favouriteList(Request $request){

        $input = $request->only('user_id');

        $rules = [
            'user_id'     => 'required'
        ];

        $validator = Validator::make($request->all(), $rules );

        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]]);
        }

        $favouriteVendors  = FavouriteVendor::where('user_id',$input['user_id'])->get();

        if($favouriteVendors->toarray()){
            $data = array();
            foreach($favouriteVendors as $key => $value){

                $profileImage = ImageHelper::getProfileImage($value->vendor->profile_image);

                $rating = DB::table('vendor_ratings')->where('vendor_id',$value->vendor_id)->avg('rating');

                array_push($data,[
                     'id'        => $value->id,
                     'vendor_id' => $value->vendor_id,
                     'name'      => $value->vendor->user_name ?? '',
                     'email'     => $value->vendor->email ?? '',
                     'phone'     => $value->vendor->phone_number ?? '',
                     'type'      => $value->vendor->vendor_type ?? '',
                     'address'   => $value->vendor->address ?? '',
                     'profile_image' => $profileImage,
                     'rating'   =>  number_format($rating,1) ?? '0'
                ]);
            }
            return ['status'=>true,'message'=>__('Record found'),'data'=>$data];
        }
        return ['status'=>false,'message'=>__('Record not found')];

    }

    public function getAllVendorOfferList (Request $request)
    {
        $langData   = trans('api_vendor');
        // $rules = [
        //     'user_id'                   => 'required',
        // ];
        // $message = [
        //     'user_id.required'          => $langData['user_id'],
        // ];
        // $validator = Validator::make($request->all(), $rules , $message);
        // if ($validator->fails()) {
        //     $errors =  $validator->errors()->all();
        //     return response(['status' => false , 'message' => $errors[0]] , 200);
        // }
        $getList = \DB::table('offers')->select('offers.*','vendor_services.service_name','vendor_services.service_name_ar')
                    ->leftJoin('vendor_services', function($join) {
                      $join->on('offers.service_id', '=', 'vendor_services.vendor_service_id');
                    })->orderBy('id','desc')->get();

        if(count($getList) > 0)  {
            foreach($getList as $gl){
                if(!empty($gl->offer_image))
                    $gl->offer_image = asset('public/uploads/offer_image/'.$gl->offer_image);
                else
                $gl->offer_image = asset('public/uploads/others/placeholder.png');

            }
            return (['status' => true, 'message' => __('Record Found'), 'data' => $getList]);
        }else{
            return (['status' => false, 'message' => __('No Record Found'), 'data' => [] ]);
        }
    }

	public function countryList(Request $request){
	   $country = ApiHelper::country();
        	if(!empty($country->toArray())){
        	   	 return response(['status' => true , 'message' => __('Record found'), 'data'=>$country ]);
	        }else{
        	    return response(['status' => false , 'message' => __('Rrecord not found') ]);
	        }
	}

	public function cityList(Request $request)
    {
        $langData   = trans('api_auth');
        $inputs = $request->all();
        $rules = [
            'country_id' => 'required'
        ];
         $message = [
            'country_id.required'           => __('Country id field is required')
        ];

        $validator = Validator::make($inputs, $rules , $message);
        $cities = ApiHelper::city($request->country_id);
        if(!empty($cities->toArray())){
            return response(['status' => true , 'message' => __('Record found'), 'data'=>$cities ]);
        }else{
            return response(['status' => false , 'message' => __('Rrecord not found') ]);
        }
    }

}
