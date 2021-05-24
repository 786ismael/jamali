<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Zone;
use App\Models\ZoneStop;

use App\Helpers\ImageHelper;
use Illuminate\Validation\Rule;
use Validator;
use Auth;
use Hash;
use Redirect,Response,DB,Config;
use Datatables;


class VendorContoller extends Controller{
   public function index(Request $request){
        if($request->ajax()){
            $delivery_boy =DB::table('users as u')
                        ->select('u.*')
                        //->leftJoin('zones as z', 'z.zone_id', '=', 'u.zone_id')
                        ->where('u.role', '=', "3")
                        ->get();
            $number_key=1;
            foreach ($delivery_boy as $key => $value) {
                $value->profile_image=ImageHelper::getProfileImage($value->profile_image);
                $value->number_key=$number_key;
                $number_key++;
            }
            return datatables()->of($delivery_boy)->make(true);
        }

        $data['js'] = ['vendor/index.js'];
        return view('admin.vendor.index',compact('data'));
    }

   public function create(){
        $data['zones']=Zone::get();
        $data['js'] = ['vendor/create.js'];
        return view('admin.vendor.create',compact('data'));
    }
    public function store(Request $request){
        $inputs      = $request->all();
        $rules = [
            'zone_name'     => 'required',
            'user_name'     => 'required',
            'email'         => ['required', Rule::unique('users', 'email')->where('role', '3')],
            'phone_number'  => ['required', Rule::unique('users', 'phone_number')->where('role', '3')],
            'password'          => 'min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password'  => 'required|min:8',
        ];
       
        $this->validate($request,$rules);

        $profile_image=null;
        if($request->hasFile('profile_image')) {
            $profile_image = str_random('10').'_'.time().'.'.request()->profile_image->getClientOriginalExtension();
            request()->profile_image->move(public_path('uploads/profiles/'), $profile_image);
        }
        
        $User                     = new User;
        $User->role               = '3';
        $User->zone_id            = $inputs['zone_name'];
        $User->user_name          = $inputs['user_name'];
        $User->email              = $inputs['email'];
        $User->phone_number       = $inputs['phone_number'];
        $User->password           = Hash::make($inputs['password']);
        if($profile_image){
            $User->profile_image  = $profile_image;
        }
        if($User->save()){
            return back()->with('success','Delivery boy added successfully');
        }else{
            return back()->with('error','Delivery boy failed,please try again');
        }
    }

    public function show(Request $request, $id){
        $data['user']           = User::find($id); ; 
        if($data['user']){
            $data['user']->profile_image=ImageHelper::getProfileImage($data['user']->profile_image);
            $data['user']->registration_card=ImageHelper::getRegistrationCardImage($data['user']->registration_card);
            $data['user']->document_1=ImageHelper::getDocumentImage($data['user']->document_1);
            $data['user']->document_2=ImageHelper::getDocumentImage($data['user']->document_2);
            $data['user']->document_3=ImageHelper::getDocumentImage($data['user']->document_3);
            // if($data['user']->driverDocument){
            //     foreach ($data['user']->driverDocument as $key => $value) {
            //        $value->document =ImageHelper::getDriverDocumentImage($value->document);
            //     }
            // }
        }  
        //return $data['user'];
        $data['js'] = ['vendor/show.js'];
        return view('admin.vendor.show',compact('data'));   
    }
    public function edit($id){
        $data['user']       = User::find($id);
        if($data['user']){
            $data['user']->profile_image=ImageHelper::getProfileImage($data['user']->profile_image);
        }
        $data['zones']      = Zone::get();      
        $data['js'] = ['vendor/create.js'];
        return view('admin.vendor.edit',compact('data'));    
    }
    public function update(Request $request,$id){
      
         $rules = [
            'name'    => 'required',
            'email'   => 'required|unique:users,email,'.$id.',id,deleted_at,NULL',
            'phone'   => 'required|unique:users,phone_number,'.$id.',id,deleted_at,NULL',
         ];
 
           // Validate 
          $validator = \Validator::make($request->all(), $rules);
          if($validator->fails()){
             return array('status' => 'error' , 'msg' => 'failed to add ad', '' , 'errors' => $validator->errors());
          }
          $fullnameArr = explode(' ',$request->name);
          $user = User::find($id);
          $user->user_name    = $request->name;
          $user->first_name   = $fullnameArr[0] ?? NULL;
          $user->last_name    = $fullnameArr[1] ?? NULL;
          $user->email        = $request->email;
          $user->phone_number = $request->phone;

          if($user->update())
                return ['status'=>'success','message'=>'Successfully updated'];
          else
                return ['status'=>'failed','message'=>'Failed to update'];
    }

    public function activeStatusChange(Request $request){
        $inputs                     = $request->all();
        $status=$inputs['status'];
        if($status=='0'){
            $change_status='1';
        }else{
            $change_status='0';
        }
        
        $User                       = User::find($inputs['id']);
        $User->active_status        = $change_status;
        if($User->update()){
            if($status==0){
                return ['status' => 'success' , 'message' => 'User activated successfully', 'data'=>$User];
            }else{
                return ['status' => 'success' , 'message' => 'User deactivated successfully', 'data'=>$User]; 
            }
        }else{
           return ['status' => 'failed' , 'message' => 'Status updated failed'];   
        }
    }

    public function approveStatusChange(Request $request){
        $inputs                     = $request->all();
        $status=$inputs['status'];
        if($status=='0'){
            $change_status='1';
        }else{
            $change_status='0';
        }
        
        $User                       = User::find($inputs['id']);
        $User->approve_status        = $change_status;
        if($User->update()){
            if($status==0){
                return ['status' => 'success' , 'message' => 'User approved successfully', 'data'=>$User];
            }else{
                return ['status' => 'success' , 'message' => 'User unapproved successfully', 'data'=>$User]; 
            }
        }else{
           return ['status' => 'failed' , 'message' => 'Status updated failed'];   
        }
    }

    public function tripHistory(Request $request){
        $inputs                     = $request->all();
        if($request->ajax()){
            $orders = DB::table('trips as t')
                            ->select('t.*','u.user_name')
                            ->leftJoin('users as u','t.user_id','=','u.id')
                            ->orderBy('t.trip_id','desc')
                            ->where('t.driver_id',$inputs['user_id'])
                            //->where('o.status',$inputs['status'])
                            ->where(function($query) use($inputs){
                                if($inputs){
                                    if($inputs['status']=='0'){
                                        $query->whereIn('t.status',['0']);
                                    }elseif($inputs['status']=='1'){
                                        $query->whereIn('t.status',['1']);
                                    }elseif($inputs['status']=='2'){
                                        $query->whereIn('t.status',['2','3']);
                                    }

                                }
                             })
                            ->whereNull('t.deleted_at')
                            ->get();
            $number_key=1;
            foreach ($orders as $key => $value) {
                $value->number_key=$number_key;
                if($value->status=='0'){
                    $value->status='Pending';
                }elseif($value->status=='1'){
                    $value->status='Completed';
                }elseif($value->status=='2'){
                    $value->status='Cancellled';
                }elseif($value->status=='3'){
                    $value->status='Cancellled';
                }else{
                    $value->status='Other';
                }
            }
            return datatables()->of($orders)->make(true);
        }
    }

     public function destroy($id){
        $user = User::find($id);
        if($user->delete())
            return redirect()->route('admin/vendor/index')->with('status',true)->with('message','Successfully deleted');
        else
            return redirect()->route('admin/vendor/index')->with('status',false)->with('message','Failed to delete');
     }
}
