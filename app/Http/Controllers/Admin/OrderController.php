<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Appointment;

use Session;
use App\Helpers\ImageHelper;
use Illuminate\Validation\Rule;
use Validator;
use Auth;
use Hash;
use Redirect,Response,DB,Config;
use Datatables;


class OrderController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $appointments = DB::table('appointments as ap')
                            ->select('ap.*','u.user_name','v.user_name as vendor_user_name')
                            ->leftJoin('users as u','u.id', '=','ap.user_id')
                            ->leftJoin('users as v','v.id', '=','ap.vendor_id')
                            ->orderBy('ap.appointment_id','desc')
                            ->whereNull('ap.deleted_at')
                            ->get();
            $number_key=1;
            foreach ($appointments as $key => $value) {
                $value->number_key=$number_key; 
                if($value->status=='0'){
                    $value->status='Pending';
                }elseif($value->status=='1'){
                    $value->status='Accpted';
                }elseif($value->status=='2'|| $value->status=='3'){
                    $value->status='Rejected';
                }   
            }
            return datatables()->of($appointments)->make(true);
        }
       $data['js'] = ['order/index.js'];
        return view('admin.order.index',compact('data'));
    }

    public function show(Request $request, $id){
        $data['appointment'] = DB::table('appointments as ap')
                            ->select('ap.*','u.user_name','u.profile_image','v.user_name as vendor_user_name')
                            ->leftJoin('users as u','u.id', '=','ap.user_id')
                            ->leftJoin('users as v','v.id', '=','ap.vendor_id')
                            ->where('ap.appointment_id',$id)
                            ->whereNull('ap.deleted_at')
                            ->first();
        if($data['appointment']){
            $data['appointment']->profile_image = ImageHelper::getProfileImage($data['appointment']->profile_image);
        }
        return view('admin.order.show',compact('data'));
    }

    public function update(Request $request,$id){
        $rules = [
            'booking_date' => 'required',
            'booking_time' => 'required'
        ];
        $request->validate($rules);
        $Appointment = Appointment::find($id);
        $Appointment->appointment_date = date('Y-m-d',strtotime($request->booking_date));
        $Appointment->appointment_time = date('H:i:s',strtotime($request->booking_time));
        if($Appointment->update())
            return back()->with('status',true)->with('message','Updated successfully');
        else
            return back()->with('status',false)->with('message','Failed to update');
    }

    public function orderStatusChange(Request $request){
        $inputs                     = $request->all();
        $status                     = $inputs['status'];
    
        $Order                          = Order::find($inputs['order_id']);
        $Order->status                  = $inputs['status'];
        if($Order->update()){
            if($status==0){
                return ['status' => 'success' , 'message' => 'Order pending successfully', 'data'=>$Order];
            }elseif($status==1){
                return ['status' => 'success' , 'message' => 'Order completed successfully', 'data'=>$Order]; 
            }elseif($status==2){
                return ['status' => 'success' , 'message' => 'Order Rejecet successfully', 'data'=>$Order]; 
            }else{
                return ['status' => 'success' , 'message' => 'Order other successfully', 'data'=>$Order];  
            }
        }else{
           return ['status' => 'failed' , 'message' => 'Status updated failed'];   
        }
    }

    public function destroy($id){
        $order = Appointment::find($id);
        if($order->delete())
            return redirect()->route('admin/order/index')->with('status',true)->with('message','Successfully deleted');
        else
            return redirect()->route('admin/order/index')->with('status',false)->with('message','Failed to delete');
     }
}
