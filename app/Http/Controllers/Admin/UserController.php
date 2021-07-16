<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\City;
use App\Models\UserDocument;
use App\Models\DriverVehicle;
use App\Helpers\ImageHelper;
use Illuminate\Validation\Rule;
use Validator;
use Auth;
use Hash;
use Redirect,Response,DB,Config;
use Datatables;


class UserController extends Controller{
   public function index(Request $request){
        if($request->ajax()){
            $users =DB::table('users as u')
                        ->select('u.*')
                        ->where('u.role', '=', "2")
                        ->whereNull('deleted_at')
                        ->get();
            $number_key=1;
            foreach ($users as $key => $value) {
                $value->number_key=$number_key;
                $number_key++;
                $value->profile_image=ImageHelper::getProfileImage($value->profile_image);
            }
            return datatables()->of($users)->make(true);
        }

        $data['js'] = ['user/index.js'];
        return view('admin.user.index',compact('data'));
    }

    public function show(Request $request , $id){
        //$inputs                     = $request->all();
        if($request->ajax()){
            $orders = DB::table('orders as o')
                            ->select('o.*')
                            ->orderBy('o.order_id','desc')
                            ->where('o.user_id',$id)
                            ->whereNull('o.deleted_at')
                            ->get();
            $number_key=1;
            foreach ($orders as $key => $value) {
                $value->number_key=$number_key;
                if($value->delivery_type=='1'){
                    $value->delivery_type='Once';
                }elseif($value->delivery_type=='2'){
                    $value->delivery_type='Daily';
                }else{
                    $value->delivery_type='Custom';
                }

            }
            return datatables()->of($orders)->make(true);
        }

        $data['user']  = User::find($id);
        if($data['user']){
            $data['user']->profile_image=ImageHelper::getProfileImage($data['user']->profile_image);
        }
        $data['js'] = ['user/show.js'];
        return view('admin.user.show',compact('data'));
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

    public function tripHistory(Request $request){
        $inputs                     = $request->all();
        if($request->ajax()){
            $orders = DB::table('trips as t')
                            ->select('t.*','d.user_name as delivery_user_name')
                            ->leftJoin('users as d','t.driver_id','=','d.id')
                            ->orderBy('t.trip_id','desc')
                            ->where('t.user_id',$inputs['user_id'])
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

    public function destroy($id){
          $user = User::find($id);
          if($user->delete())
              return redirect()->route('admin/user/index')->with('status',true)->with('message','Successfully deleted');
          else
              return redirect()->route('admin/user/index')->with('status',false)->with('message','Failed to delete');
    }
}
