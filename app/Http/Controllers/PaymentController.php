<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Notification;
use App\Helpers\ApiHelper;
use DB;
use App\User;
use Session;

class PaymentController extends Controller
{
    public function paymentForm(Request $request){

        $appointmentId = $request->appointment_id;
        $Appointment = Appointment::find($appointmentId);

        if($Appointment->booking_payment_status != '1'){
            $amount  = $Appointment->booking_amount;
        }

        if($Appointment->booking_payment_status == '1' && $Appointment->remaining_payment_status != '1'){
            $amount  = $Appointment->remaining_amount;
        }

        if($Appointment->booking_payment_status == '1' && $Appointment->remaining_payment_status == '1'){
            return redirect()->route('payment.failed');
        }
       return view('payment.form');
    }

    public function paymentCallBack(Request $request){
        
        $appointmentId = $request->appointment_id;
        $Appointment = Appointment::find($appointmentId);

        $paymentFor = null;
        $amount     = $request->amount;

        if($request->status == 'paid'){

            if($Appointment->booking_payment_status != '1'){
                \DB::table('appointments')->where('appointment_id',$appointmentId)->update(['booking_payment_status'=>'1','booking_payment_date'=>date('Y-m-d H:i:s')]);
                $paymentFor =='booking_amount';
            }

            if($Appointment->booking_payment_status == '1' && $Appointment->booking_payment_status != '1'){
                \DB::table('appointments')->where('appointment_id',$appointmentId)->update(['remaining_payment_status'=>'1','remaining_payment_date'=>date('Y-m-d H:i:s')]);
                $paymentFor =='remaining_amount';
            }

        }
        
        \DB::table('transaction_history')->insert([
           'user_id'            => $Appointment->user_id,
           'appointment_id'     => $request->appointment_id,
           'transaction_id'     => $request->id,
           'currency'           => 'SAR',
           'amount'             => $amount,
           'transaction_status' => $request->status == 'paid' ? '1' : '0'
        ]);

        if($paymentFor =='booking_amount'){

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
                         'id'              => $appointmentId
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
                     if(count($device_token) > 0);
                     ApiHelper::vendorIosNotification($device_token,$notificationData['title']);
                    }
            }
        }
        
        return view('payment.callBack');

    }

    public function payment(Request $request){        
        $data = $request->all();
        $data['appointment_id'] = $request->appointment_id;
        $this->makePayment($data);
    }

    protected function makePayment($data){

        $appointmentId = $data['appointment_id'];
        $Appointment   = Appointment::find($appointmentId);

        if($Appointment->booking_payment_status != '1'){
            $amount        = $Appointment->booking_amount;
            $description   = 'User ' . $Appointment->user_id . ' paid booking amount for appointment ' . $appointmentId;
        }

        if($Appointment->booking_payment_status == '1' && $Appointment->remaining_payment_status != '1'){
            $amount        = $Appointment->remaining_amount;
            $description   = 'User ' . $Appointment->user_id . ' paid remainig amount for appointment ' . $appointmentId;
        }
        
        if($Appointment->booking_payment_status == '1' &&  $Appointment->remaining_payment_status == '1'){
            return redirect()->route('payment.failed');
        }
        
        if($Appointment->remaining_payment_status == '1'){
            return redirect()->route('payment.failed');
        }

        $fields['callback_url'] = $data['callback_url'];
        $fields['publishable_api_key'] = $data['publishable_api_key'];
        $fields['amount']         = ($amount * 100);
        $fields['source[type]']   = $data['creditcard'] ?? 'creditcard';
        $fields['description']    = $description;
        $fields['source[name]']   = $data['source']['name'];
        $fields['source[number]'] = str_replace(' ','',$data['source']['number']);
        $fields['source[month]']  = $data['source']['month'];
        $fields['source[year]']   = $data['source']['year'];
        $fields['source[cvc]']    = $data['source']['cvc'];
        $headers = [
            'Accept:application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://api.moyasar.com/v1/payments.html");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $server_output = curl_exec($ch);
        
        curl_close ($ch);        
        if($this->isJson($server_output)){
            $res    = json_decode($server_output,true);
            $name   = $data['source']['name'];
            $number = $data['source']['number'];
            $month  = $data['source']['month'];
            $year   = $data['source']['year'];
            $cvc    = $data['source']['cvc'];
            $name_error   = '';
            $number_error = '';
            $month_error  = '';
            $year_error   = '';
            $cvc_error    = '';
            if(!empty($res['errors'])){
                foreach($res['errors'] as $k=>$r){
                    if($k == 'company')
                       $number_error = 'Invalid card number';
                    if($k == 'name')
                       $name_error   = 'Please enter card holder name';
                    if($k == 'last_name')
                       $name_error  = 'Please enter correct card holder name';
                    if($k == 'month')
                       $month_error = 'Invalid expiry month';
                    if($k == 'year')
                       $year_error  = 'Invalid expiry year';
                    if($k == 'cvc')
                       $cvc_error   = 'Invalid expiry year';
                }
            }
            $urlString = "payment?appointment_id=$appointmentId&name_error=$name_error&number_error=$number_error&month_error=$month_error&year_error=$year_error&cvc_error=$cvc_error&name=$name&number=$number&month=$month&year=$year&cvc=$cvc&amount=$amount";
            $url = url($urlString);
            header("Location: $url");
            die;
        }else{

           // $Appointment = Appointment::find($appointmentId);

            // $isNotificaton = '0';

            // if($Appointment->booking_payment_status != '1'){
            //     \DB::table('appointments')->where('appointment_id',$appointmentId)->update(['booking_payment_status'=>'1','booking_payment_date'=>date('Y-m-d H:i:s')]);
            //     $isNotificaton = '1';
            // }
    
            // if($Appointment->booking_payment_status == '1' && $Appointment->remaining_payment_status != '1'){
            //     \DB::table('appointments')->where('appointment_id',$appointmentId)->update(['remaining_payment_status'=>'1','remaining_payment_date'=>date('Y-m-d H:i:s')]);
            //     $isNotificaton = '0';
            // }
            
            // try{

                // if($isNotificaton){
                //                     /** Notification */
                //         $UserStaust = User::select('id','user_name')->where('role','2')->where('active_status','1')->where('id',$Appointment->user_id)->first();
                            
                //         $Vendor = User::select('id' , 'lat' , 'lng' , 'notification_status' , 'device_type' , 'device_token', 'language')->where('role','3')->where('id',$Appointment->vendor_id)->first();
                //         if($Vendor){
                //             $title              = 'New booking';
                //             $message            = 'You have a new booking by '.$UserStaust->user_name;
                //             $notification_key   = 'new_order';
                //             if($Vendor->notification_status == '1'){
                //                 $notificationData = [
                //                     'key'             => $notification_key,
                //                     'title'           => $title,
                //                     'message'         => $message,
                //                     'sender_id'       => $UserStaust->id,
                //                     'receiver_id'     => $Vendor->id,
                //                     'id'              => $appointmentId
                //                 ];

                //                 $Notification = new Notification();
                //                 $Notification->sender_id=$UserStaust->id;
                //                 $Notification->receiver_id=$Vendor->id;
                //                 $Notification->title=$title;
                //                 $Notification->message=$message;
                //                 $Notification->json_data=json_encode($notificationData);
                //                 $Notification->save();

                //                 $device_token=[$Vendor->device_token];
                //                 ApiHelper::sendNotificationAndroid($device_token,$notificationData);
                //                 if(count($device_token) > 0);
                //                 ApiHelper::vendorIosNotification($device_token,$notificationData['title']);

                //             }
                //         }
                // }
            // }catch( \Exception $e){

            // }
            $data1['res'] = $server_output;
            $html = [];
            $content = explode('<a href="', $server_output);
            $content = explode('">redirected',$content[1]);
            $url = $content[0];
            header("Location: $url");
            die;
        }
    }

    function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

}
