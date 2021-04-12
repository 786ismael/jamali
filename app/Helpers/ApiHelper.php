<?php

namespace App\Helpers;

use Session;
use App;
use Carbon\Carbon;
use url;

class ApiHelper {
    public static function otpGenrator($number){ 
        $generator = "1357902468"; 
        $otp = ""; 
        for ($i = 1; $i <= $number; $i++) { 
            $otp .= substr($generator, (rand()%(strlen($generator))), 1); 
        }
        return $otp; 
    }

    public static function smsSendFunction($number,$otp,$message){
        $curl = curl_init();
        $api_key='24aec2f0-40cb-11ea-9fa5-0200cd936042';
        $url='http://2factor.in/API/V1/'.$api_key.'/SMS/'.$number.'/'.$otp.'/'.$message.'';

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
        ),
        ));

        $response   = curl_exec($curl);
        $err         = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return ['status'=>false,'message'=>$err];
        } else {
            return ['status'=>true,'data'=>$response];
        }
    }

    public static function getDistance($lat1, $lon1, $lat2, $lon2, $unit) {
        $lat1 = (float) $lat1;
        $lon1 = (float) $lon1;
        $lat2 = (float) $lat2;
        $lon2 = (float) $lon2;
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        }
        else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                $miles=$miles * 1.609344;
                return round($miles,2);
            } else if ($unit == "N") {
                $miles=$miles * 0.8684;
                return round($miles,2);
            } else {
                return round($miles,2);
            }
        }
    }

    public static function sendNotificationAndroid($token=null,$data){
        /*
        $url            = 'https://fcm.googleapis.com/fcm/send';
        $token          = $token;
        $message=[
            'title'     => $data['title'],
            'message'   => $data['message'],
            'vibrate'   => 1,
            'sound'     => 1,
            'largeIcon' => 'large_icon',
            'smallIcon' => 'small_icon',
        ];
        $fields = array(
            'registration_ids' => $token,
            'data'             => $data,
        );
        $headers = array(
            'Authorization: key=' . "AAAAD2JJ9_0:APA91bHQm0nu8XGqwORFFG7_NC_z71Rcj9vJNhsBadzlkoC560JnryKHogU6XmWQPKFf730chaqbSqN9UWGV3mCUqiJHiM7AqmIuujQ3aSVeVbUA48KSYNbL9CtWuB1yrpt8yb4BHXQa",
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE)  {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        print_r($result);
        die;
        if($ch){
            return true;
        }else{
            return false;
        }*/
        $registration_ids =  $token;
        $message = array(
          "message" => [
            'title'     => $data['title'],
            'message'   => $data['message'],
            'vibrate'   => 1,
            'sound'     => 1,
            'largeIcon' => 'large_icon',
            'smallIcon' => 'small_icon',
          ]
        );
      
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array(
        'registration_ids' => $registration_ids,
        'data' => $message,
        );
        $headers = array(
        'Authorization: key=AAAAD2JJ9_0:APA91bHQm0nu8XGqwORFFG7_NC_z71Rcj9vJNhsBadzlkoC560JnryKHogU6XmWQPKFf730chaqbSqN9UWGV3mCUqiJHiM7AqmIuujQ3aSVeVbUA48KSYNbL9CtWuB1yrpt8yb4BHXQa',
        'Content-Type: application/json'
        );
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        
        if ($result === FALSE)
          {
          die('Curl failed: ' . curl_error($ch));
          }
        curl_close($ch);
    }

    public static function sendNotificationWeb($token=null,$data){
        if (!defined('API_ACCESS_KEY')) define('API_ACCESS_KEY', 'AAAA9cOVskk:APA91bFgZwKYhARcHOQM8HAiCJAYQB3joJ71KjA6ATpk938pfP9GJ4B08ucxCRS5AMPKs-0RYdpHRkBYuBp4VoGD0_-PdZPAn95dr3M4zpZIQJq_uf09i1dw0nEuW9EocTu8VXnpesEH');
        //define( 'API_ACCESS_KEY', 'AAAA9cOVskk:APA91bFgZwKYhARcHOQM8HAiCJAYQB3joJ71KjA6ATpk938pfP9GJ4B08ucxCRS5AMPKs-0RYdpHRkBYuBp4VoGD0_-PdZPAn95dr3M4zpZIQJq_uf09i1dw0nEuW9EocTu8VXnpesEH');
        if(gettype($token)=='array'){
            $registrationIDs = $token;
        }else{
            $registrationIDs = [$token];
        }   
        
        $fcmMsg = array(
            'title'             => $data['title'],
            'body'              =>  $data['message'],
            'icon'              => url('public/admin_assets/images/logo.png'),
            'click_action'      => $data['click_action']
        );
        
        $fcmFields = array(
            'registration_ids'  => $registrationIDs,
            'priority'          => 'high',
            'notification'      => $fcmMsg
        );

        $headers = array(
            'Authorization: key=' . 'AAAA9cOVskk:APA91bFgZwKYhARcHOQM8HAiCJAYQB3joJ71KjA6ATpk938pfP9GJ4B08ucxCRS5AMPKs-0RYdpHRkBYuBp4VoGD0_-PdZPAn95dr3M4zpZIQJq_uf09i1dw0nEuW9EocTu8VXnpesEH',
            'Content-Type: application/json'
        );
        
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, false );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        return true;
    }
    
    public static function iosNotification($token=null,$data){
        //try {
            if(!empty($token)){
                $token = $token; 
                $title = $data['title'];
                $data  = $data['message'];
                $passphrase  ='PushChat';
                //$Certificate = public_path('one_pem.pem');
                $Certificate=config_path('nashmi_mac.pem');
                //$Certificate=config_path('nashmi_ambuj.pem');
                
                $ctx = stream_context_create();
                
                stream_context_set_option($ctx, 'ssl', 'local_cert', $Certificate);
                stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

                $fp =stream_socket_client(
                'ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

                if (!$fp)
                exit("Failed to connect: $err $errstr" . PHP_EOL);

                $body['aps']=[
                'alert' => $title,
                'data'  => $data,
                $passphrase  = $passphrase,
                $Certificate = $Certificate,
                ];

                $ctx = stream_context_create();
                stream_context_set_option($ctx, 'ssl', 'local_cert', $Certificate);
                stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

                $fp =stream_socket_client(
                'ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

                if (!$fp)
                exit("Failed to connect: $err $errstr" . PHP_EOL);

                $body['aps']=[
                    'alert' => $title,
                    'data'  => $data,
                    'sound' => 'default',
                    'badge' => 1,
                ];

                $payload = json_encode($body);
                //echo $payload;
                //die;
                $msg=chr(0).pack('n', 32).pack('H*', trim($token)) . pack('n', strlen($payload)).$payload;
                //echo $msg;
                //die;
                $result=fwrite($fp, $msg, strlen($msg));
               // print_r($result);
                fclose($fp);
                return true;
                /*echo '<pre>';
                print_r($result);
                die;
                 return "Sent";*/
            }
        //} catch (Exception $e) {
         // print_r($e); 
        //} 
    }

    public static function userIosNotification($tokens,$alert){

        try{
            if($tokens){
                      foreach($tokens as $token){
      
                      $Certificate= public_path('JmaliUser.pem');
      
                      $passphrase='';
      
                      $ctx = stream_context_create();
                      stream_context_set_option($ctx, 'ssl', 'local_cert', $Certificate);
                      stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
      
      
                      $fp =stream_socket_client(
                      'ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
      
      
                      if (!$fp)
                      exit("Failed to connect: $err $errstr" . PHP_EOL);
      
                      $body['aps']=[
                      'alert' => $alert,
                      'sound' => 'default',
                      'badge' => 1,
                      ];
      
                      $payload = json_encode($body);
                      $msg=chr(0).pack('n', 32).pack('H*', trim($token)) . pack('n', strlen($payload)).$payload;
                      $result=fwrite($fp, $msg, strlen($msg));
                      fclose($fp);
                      }
            }
        }catch(\Exception $e){
        }
  
    }

    public static function vendorIosNotification($tokens,$alert){
        try{
            if($tokens){
                foreach($tokens as $token){
                    $passphrase='';
                        $Certificate= public_path('Jamalivendor.pem');
                
                    $ctx = stream_context_create();
                    stream_context_set_option($ctx, 'ssl', 'local_cert', $Certificate);
                    stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
                
                
                    $fp =stream_socket_client(
                            'ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
                
                
                    if (!$fp)
                        exit("Failed to connect: $err $errstr" . PHP_EOL);
                
                    $body['aps']=[
                        'alert' => $alert,
                        'sound' => 'default',
                        'badge' => 1,
                    ];
                
                    $payload = json_encode($body);
                    $msg=chr(0).pack('n', 32).pack('H*', trim($token)) . pack('n', strlen($payload)).$payload;
                    $result=fwrite($fp, $msg, strlen($msg));
                    fclose($fp);
                }
            }
        }catch(\Exception $e){
            
        }
    }
}


    