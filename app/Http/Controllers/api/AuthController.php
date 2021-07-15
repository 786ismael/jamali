<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Document;
use App\Models\Notification;
use App\Models\VehicleType;
use App\Models\Page;
use App\Models\AppRating;
use App\Models\Support;

use Illuminate\Validation\Rule;
use Validator;
use Auth;
use Hash;
use App;
use Redirect,Response,DB,Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use App\Helpers\ImageHelper;
use App\Helpers\ApiHelper;


class AuthController extends Controller{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(Request $request){
        if($request->lang){
            App::setlocale($request->lang);
        }
    }

    public function signUp(Request $request){  
        $langData   = trans('api_auth');
        $inputs     = $request->all();
        $rules = [
            'role'          => 'required',
            'user_name'     => 'required',
         //   'email'         => ['required', Rule::unique('users', 'email')->where('role', $inputs['role'])],

            'phone_number'  => ['required', Rule::unique('users', 'phone_number')->where('role', $inputs['role'])],
            'password'      => 'required',
            //'vendor_type'      => 'required',
            //'device_type'   => 'required',
            //'device_token'  => 'required',
        ];

        $message = [
            'role.required'             => __('Role field is required'),
            'user_name.required'        => __('User name field is required'),
          //  'email.required'            => $langData['email'],
         //   'email.unique'              => $langData['email_unique'],
            
            'phone_number.required'     => __('Phone number field is required'),
            'phone_number.unique'       => __('This phone number already exist'),
            'password.required'         => __('Password field is required'),
            //'vendor_type.required'         => $langData['vendor_type'],
            //'device_type.required'      => $langData['device_type'],
            //'device_token.required'     => $langData['device_token'],

        ];


        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }
        //===================Image Upload Hear============
        $profile_image=null;
        if($request->hasFile('profile_image')) {
            $profile_image = str_random('10').'_'.time().'.'.request()->profile_image->getClientOriginalExtension();
            request()->profile_image->move(public_path('uploads/profiles/'), $profile_image);
        }
        $otp                        = ApiHelper::otpGenrator(4);
        $User                     = new User;
        $User->otp                = $otp;
        $User->role               = $inputs['role'];
        $User->user_name          = $inputs['user_name'];
        $User->email              = $inputs['email'] ?? NULL;
        $User->phone_number       = $inputs['phone_number'];
        $User->password           = Hash::make($inputs['password']);
        //$User->device_type        = $inputs['device_type'];
        //$User->device_token       = $inputs['device_token'];
        if(!empty($inputs['vendor_type'])){
            if($inputs['vendor_type']=='1'){
                $User->vendor_type = '1';
                $User->specialist = !empty($inputs['specialist'])?$inputs['specialist']:'';
            }else{
                $User->vendor_type = '2';
            }
        }
        
        $User->api_status         = '0';

        if(!empty($inputs['address'])){
            $User->address       = $inputs['address'];
        }
        if(!empty($inputs['lat'])){
            $User->lat       = $inputs['lat'];
        }
        if(!empty($inputs['lang'])){
            $User->lng       = $inputs['lng'];
        }
        if($profile_image){
            $User->profile_image  = $profile_image;
        }
        if(!empty($inputs['lang'])){
            $User->language       = $inputs['lang'];
        }
        if(!empty($inputs['device_type'])){
            $User->device_type       = $inputs['device_type'];
        }
        if(!empty($inputs['device_token'])){
            $User->device_token       = $inputs['device_token'];
        }
        if(!empty($inputs['phone_number'])){
            $User->phone_number       = $inputs['phone_number'];
        }
        if(!empty($inputs['gender'])){
            $User->gender       = $inputs['gender'];
        }
        
        $User->save();
        if($User){
           $User->profile_image  = ImageHelper::getProfileImage($User->profile_image);
            return response(['status' => true , 'message' => __('Successfully registered'),'data'=>$User]);
        }else{
             return response(['status' => false , 'message' => __('Failed to register')]);
        }
    }


    public function profileImageUpdate(Request $request){  
        $langData   = trans('api_auth');
        $inputs     = $request->all();
        $rules = [
            'id'          => 'required',
            //'role'     => 'required',
            //'role'     => 'required',
        ];

        $message = [
            'id.required'             => __('Id field is required'),
            //'role.required'             => $langData['role'],
            'profile_image.required'     => __('Profile image field is required'),

        ];

        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }
        //===================Image Upload Hear============
        $profile_image=null;
        if($request->hasFile('profile_image')) {
            $profile_image = str_random('10').'_'.time().'.'.request()->profile_image->getClientOriginalExtension();
            request()->profile_image->move(public_path('uploads/profiles/'), $profile_image);
        }
        $User                     = User::find($inputs['id']);
        if($profile_image){
            $User->profile_image  = $profile_image;
        }
        $User->save();
        if($User){
           $User->profile_image  = ImageHelper::getProfileImage($User->profile_image);
            return response(['status' => true , 'message' => __('Successfully image uploaded'),'data'=>$User]);
        }else{
            return response(['status' => false , 'message' => __('Failed to upload profile image')]);
        }
    }

    // public function ImageUpload(Request $request){  
    //     $langData   = trans('api_auth');
    //     $inputs     = $request->all();
    //     $rules = [
    //         'id'            => 'required',
    //     ];

    //     $message = [
    //         'id.required'             => $langData['id'],
    //     ];

    //     $validator = Validator::make($inputs, $rules,$message);
    //     if ($validator->fails()) {
    //         $errors =  $validator->errors()->all();
    //         return response(['status' => false , 'message' => $errors[0]] , 200);              
    //     }
    //     $registration_card=null;
    //     if($request->hasFile('registration_card')) {
    //         $registration_card = str_random('10').'_'.time().'.'.request()->registration_card->getClientOriginalExtension();
    //         request()->registration_card->move(public_path('uploads/registration_card/'), $registration_card);
    //     }

    //     $document_1=null;
    //     if($request->hasFile('document_1')) {
    //         $document_1 = str_random('10').'_'.time().'.'.request()->document_1->getClientOriginalExtension();
    //         request()->document_1->move(public_path('uploads/document/'), $document_1);
    //     }

    //     $document_2=null;
    //     if($request->hasFile('document_2')) {
    //         $document_2 = str_random('10').'_'.time().'.'.request()->document_2->getClientOriginalExtension();
    //         request()->document_2->move(public_path('uploads/document/'), $document_2);
    //     }

    //     $document_3=null;
    //     if($request->hasFile('document_3')) {
    //         $document_3 = str_random('10').'_'.time().'.'.request()->document_3->getClientOriginalExtension();
    //         request()->document_3->move(public_path('uploads/document/'), $document_3);
    //     }

        
    //     $User                     = User::find($inputs['id']);
    //     if($registration_card){
    //         $User->registration_card  = $registration_card;
    //     }
    //     if($document_1){
    //         $User->document_1  = $document_1;
    //     }
    //     if($document_2){
    //         $User->document_2  = $document_2;
    //     }
    //     if($document_3){
    //         $User->document_3  = $document_3;
    //     }
    //     if($User->save()){
    //         //return $User;
    //         $User->profile_image  = ImageHelper::getProfileImage($User->profile_image);
    //         $User->registration_card = ImageHelper::getRegistrationCardImage($User->registration_card);
    //         $User->document_1 = ImageHelper::getDocumentImage($User->document_1);
    //         $User->document_2 = ImageHelper::getDocumentImage($User->document_2);
    //         $User->document_3 = ImageHelper::getDocumentImage($User->document_3);
    //         return response(['status' => true , 'message' => $langData['record_found'],'data'=>$User]);
    //     }else{
    //         return response(['status' => false , 'message' => $langData['record_not_found']]);
    //     }
    // }

    

    public function ImageUpload(Request $request){
       
        $langData   = trans('api_auth');
        $inputs     = $request->all();
        $rules = [
            'id'            => 'required',
        ];

        $message = [
            'id.required'             => __('Id field is required'),
        ];

        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }

        $data=[];
        $image=null;
        if($request->hasFile('image')) {
            if(request()->image->getClientOriginalExtension()){
                $ext2=request()->image->getClientOriginalExtension();
            }else{
                $ext2='png';
            }
            $image = str_random('10').'_'.time().'.'.$ext2;
            if($inputs['image_status']=='1'){
                request()->image->move(public_path('uploads/registration_card/'), $image);
            }elseif($inputs['image_status']=='2'){
                request()->image->move(public_path('uploads/document/'), $image);
            }elseif($inputs['image_status']=='3'){
                request()->image->move(public_path('uploads/document/'), $image);
            }elseif($inputs['image_status']=='4'){
                request()->image->move(public_path('uploads/document/'), $image);
            }
            
            if($image){
                $User                     = User::find($inputs['id']);
                if($inputs['image_status']=='1'){
                    $User->registration_card  = $image;
                }
                if($inputs['image_status']=='2'){
                    $User->document_1  = $image;
                }
                if($inputs['image_status']=='3'){
                    $User->document_2  = $image;
                }
                if($inputs['image_status']=='4'){
                    $User->document_3  = $image;
                }
                if($User->save()){
                    $User->profile_image  = ImageHelper::getProfileImage($User->profile_image);
                    $User->registration_card = ImageHelper::getRegistrationCardImage($User->registration_card);
                    $User->document_1 = ImageHelper::getDocumentImage($User->document_1);
                    $User->document_2 = ImageHelper::getDocumentImage($User->document_2);
                    $User->document_3 = ImageHelper::getDocumentImage($User->document_3);
                    return response(['status' => true , 'message' => __('Successfully uploaded image'),'data'=>$User]);
                }else{
                    return response(['status' => true , 'message' => __('Record not found')]);
                }
                //return response(['status' => true , 'message' => $langData['record_found'],'data'=>$data]);
            }else{
                return response(['status' => true , 'message' => __('Record not found')]);
            }
        }
    }

    public function updateDetails1(Request $request){
        $langData   = trans('api_auth');
        $inputs     = $request->all();
        $rules = [
            'id'                                  => 'required',
            'registration_card'                   => 'required',
        ];

        $message = [
            'id.required'                           => __('Id field is required'),
            'registration_card.required'            => __('Registration card is required'),
        ];

        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }
        $userStatus=User::where('id',$inputs['id'])->where('role','3')->first();
        if($userStatus){
            //===================Image Upload Hear============
            $imageData=[];
            if(!empty($inputs['image1'])){
                array_push($imageData,$inputs['image1']);
            }
            if(!empty($inputs['image2'])){
                array_push($imageData,$inputs['image2']);
            }
            if(!empty($inputs['image3'])){
                array_push($imageData,$inputs['image3']);
            }
            if(!empty($inputs['image4'])){
                array_push($imageData,$inputs['image4']);
            }
            $User                     = User::find($userStatus->id);
            $User->api_status         = '1';
            if(!empty($inputs['vehicle_image'])){
                 $User->vehicle_image      = $inputs['vehicle_image'];
            }
            if(!empty($inputs['selfie_image'])){
                 $User->selfie_image      = $inputs['selfie_image'];
            }
            if($User->save()){
                $documentData=[];
                foreach ($imageData as $key => $value) {
                    $temp               = [];
                    $temp['document']   = $value;
                    $temp['user_id']    = $User->id;
                    array_push($documentData, $temp);
                }
                Document::insert($documentData); 
                return response(['status' => true , 'message' => __('Successfully updated profile'),'data'=>$User]);
            }else{
                return response(['status' => true , 'message' => __('Failed to update profile')]);
            }
        }else{
            return response(['status' => false , 'message' => __('This user id does not exist')]); 
        }
    }

    public function login(Request $request){
        $langData   = trans('api_auth');
        $inputs     = $request->all();
     //   return response(['status' => false , 'message' => $inputs['phone_number'] ]);
        $rules = [
            'role'              => 'required',
            'phone_number'      => 'required',
            'password'          => 'required',
            'device_type'       => 'required',
            'device_token'      => 'required',
        ];

        $message = [
            'role.required'             => __("Role field is required"),
            'phone_number.required'     => __('Phone number field is required'),
            'password.required'         => __('Password field is required'),
            'device_type.required'      => $langData['device_type'],
            'device_token.required'     => $langData['device_token'],
        ];
        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }

        $emailStatus=User::where('role',$inputs['role'])
                            ->where('phone_number',$inputs['phone_number'])
                            ->first();
        
        if($emailStatus){
             if(password_verify($request->password, $emailStatus->password) ) {
                    $User                     = User::find($emailStatus['id']);
                    $User->device_type        = $inputs['device_type'];
                    $User->device_token       = $inputs['device_token'];
                    if($inputs['lang']){
                        $User->language       = $inputs['lang'];
                    }
                    $User->update();
                    $User->profile_image      = ImageHelper::getProfileImage($User->profile_image);
                    return response(['status' => true , 'message' => __('Successfully logged in') , 'data'=>$User]);
             }else{
                return response(['status' => false , 'message' => __('Invalid credentials')]);
             }
        }else{
            return response(['status' => false , 'message' => __('Invalid credentials') ]);
        }
    }

    public function socialLogin(Request $request){
        $langData   = trans('api_auth');
        $inputs     = $request->all();
        $rules = [
            'role'              => 'required',
            'social_type'       => 'required',
            'social_id'         => 'required',
            'device_type'       => 'required',
            'device_token'      => 'required',
        ];

        $message = [
            'role.required'             => __('Role field is required'),
            'social_type.required'      => __('Social type field is required'),
            'social_id.required'        => __('Social id field is required'),
            'device_type.required'      => $langData['device_type'],
            'device_token.required'     => $langData['device_token'],
        ];
        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }

        $User=User::where('role',$inputs['role'])->where('social_type',$inputs['social_type'])->where('social_id',$inputs['social_id'])->first();
        if($User){
            $User                     = User::find($User['id']);
            $User->device_type        = $inputs['device_type'];
            $User->device_token       = $inputs['device_token'];
            if($User->save()){
                $User->profile_image      = ImageHelper::getProfileImage($User->profile_image);
                return response(['status' => true , 'message' => $langData['login_success'], 'data'=>$User]);
            } 
        }else{
            $User = new User();
            $User->role                 = $inputs['role'];
            $User->social_type          = $inputs['social_type'];
            $User->social_id            = $inputs['social_id'];
            $User->device_type          = $inputs['device_type'];
            $User->device_token         = $inputs['device_token'];
            if($User->save()){
                $User                     = User::find($User['id']);
                $User->profile_image      = ImageHelper::getProfileImage($User->profile_image);
                return response(['status' => true , 'message' => __('Successfully logged in'), 'data'=>$User]);
            }
        }
    }

        public function forgotPassword(Request $request){
        $langData   = trans('api_auth');
        $inputs     = $request->all();
        $rules = [
            'role'       => 'required',
            'phone_number'      => 'required',
        ];

        $message = [
            'role.required'          => __("Role field is required"),
            'phone_number.required'  => __("Phone number field is required")
        ];

        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }

          $user = User::where('phone_number',$inputs['phone_number'])->whereNull('deleted_at')->first();

          if($user){
              $otp  = ApiHelper::otpGenrator(4);
              $user->otp                = $otp;
              $user->otp_verify_status  = '0';
              $user->update();
              $message = __('Your jamali forgot otp is ') . $otp;
              $this->sendMessage($inputs['phone_number'],$message);
//              return response(['status' => true , 'message' => __('Otp sent'),'data'=>$user]);
          }else{
               return response(['status' => false , 'message' => __('Failed to send otp')]);
          }   
    }

    public function sendMessage($mobileNumber,$message){
          $url    = "https://apps.gateway.sa/vendorsms/pushsms.aspx";
            $dataArray = [
               "user" => "almotelq",
               "password" => "q1w2e3r4",
               "msisdn" => $mobileNumber,
               "sid" => "JAMALI",
               "msg" => $message,
               "fl"  => "0"
            ];
            $curl   = curl_init();
            $data   = http_build_query($dataArray);
            $getUrl = $url."?".$data;

            curl_setopt_array($curl, array(
              CURLOPT_URL => $getUrl,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
		if ($err) {
              // echo "cURL Error #:" . $err;
//                error_log("cURL Error #:" . print_r($err,TRUE));
			    Log::info($err);

            } else {
              //echo $response;
		    Log::info($response);
  //            error_log("cURL Error #:" . print_r($response,TRUE));
            }
            // if ($err) {
            //   echo "cURL Error #:" . $err;
            // } else {
            //   echo $response;
            // }
    }

    public function forgotPasswordBackUp(Request $request){
        $langData   = trans('api_auth');
        $inputs     = $request->all();
        $rules = [
            'role'          => 'required',
            'email'         => 'required',
        ];

        $message = [
            'role.required'         => $langData['role'],
            'email.required'        => $langData['email'],
        ];

        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }

        $emailStatus=User::where('role',$inputs['role'])->where('email',$inputs['email'])->first();
        if($emailStatus){
                $otp                        = ApiHelper::otpGenrator(4);
                $mailData = array(
                    'first_name'    => $emailStatus->user_name,
                    'email'         => $emailStatus->email,
                    'user_name'     => $emailStatus->user_name,
                    'form_name'     => 'shive@gmail.com',
                    'schedule_name' => 'Shive',
                    'template'      => 'email_otp_send',
                    'subject'       => 'Shive',
                    'otp'           => $otp, 
                );

                $User                     = User::find($emailStatus['id']);
                $User->otp                = $otp;
                $User->otp_verify_status  = '0';
                $User->update();
                if(!empty($mailData) && !empty($emailStatus->email && !is_null($emailStatus->email))){
                    Mail::to($emailStatus->email)->send(new NotifyMail($mailData));
                }else{
                     return response(['status' => false , 'message' => $langData['otp_not_send']]);
                }     
            return response(['status' => true , 'message' => $langData['otp_send_success'],'data'=>$User]);
        }else{
            return response(['status' => false , 'message' => $langData['email_not_exist']]);
        }
    }

    public function resendOtp(Request $request){
        $langData   = trans('api_auth');
        $inputs = $request->all();
        $rules = [
            'role'                  => 'required',
            'id'                    => 'required',
        ];
        $message = [
            'role.required'         => __('Role field is required'),
            'id.required'            => __("Id field is required"),
        ];

        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }
        $MobileStatus=User::where('role',$inputs['role'])->where('id',$inputs['id'])->first();
        if($MobileStatus){
            $otp                        = ApiHelper::otpGenrator(4);
            $User                       = User::find($MobileStatus['id']);
            $User->otp                  = $otp;
            if($User->update()){
                return response(['status' => true , 'message' => __('Your otp sent on your mobile mumber'),'data'=>$User]);
            }else{
                return response(['status' => false , 'message' => __('Otp send failed') ]);
            }
            
        }else{
            return response(['status' => false , 'message' => __('This Mobile number does not exits')]);
        }  
    }

     public function otpVerify(Request $request){
        $inputs = $request->all();
        $rules = [
            'id'                => 'required',
            'otp'               => 'required',
        ];

        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }
        $UserStatus=User::where('id',$inputs['id'])->first();
        if($UserStatus){
            if($UserStatus->otp_verify_status=='0'){
                if($UserStatus->otp==$inputs['otp']){
                    $UserStatus->otp_verify_status='1';
                    $UserStatus->otp='0000';
                    if($UserStatus->update()){
                        return response(['status' => true , 'message' => __('Otp verified successfully'),'data'=>$UserStatus]);
                    }else{
                       return response(['status' => false , 'message' => __('Otp verified failed,please enter try again') ]);   
                    }
                }else{
                    return response(['status' => false , 'message' => __('Otp verified failed,please enter right otp') ]);
                }
            }else{
               return response(['status' => false , 'message' => __('Your otp already verified') ]); 
            }     
        }else{
            return response(['status' => false , 'message' => __('Otp verified failed,please enter right otp') ]);
        }
    }

    

    public function forgotPasswordChange(Request $request){
        $langData   = trans('api_auth');
        $inputs     = $request->all();
        $rules = [
            'id'          => 'required',
            'otp'         => 'required',
            'password'    => 'required',
        ];

        $message = [
            'id.required'             => __('Id field is required'),
            'otp.required'            => __('Otp field is required'),
            'password.required'       => __('Password field is required'),
        ];

        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }

        $userStatus=User::where('id',$inputs['id'])->first();
        if($userStatus){
            $otpStatus=User::where('id',$inputs['id'])->where('otp',$inputs['otp'])->first();
            if($otpStatus){
                $User                     = User::find($userStatus['id']);
                $User->password           = Hash::make($inputs['password']);
                $User->otp_verify_status  = '1';
                if($User->update()){
                    return response(['status' => true , 'message' => __('Successfully changed password')]);
                }else{
                    return response(['status' => false , 'message' => __('Failed to change password')]);
                }
                
            }else{
                return response(['status' => false , 'message' => __('Failed to verify otp')]);
            }
        }else{
            return response(['status' => false , 'message' => __('Failed to verify otp') ]);
        }
    }

    public function getProfile(Request $request){
        $langData   = trans('api_auth');
        $inputs     = $request->all();
        $rules = [
            'id'          => 'required',
        ];

        $message = [
            'id.required'             => __('Id field is required'),
        ];

        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }

        $User=User::where('id',$inputs['id'])->first();
        if($User){
            $User->profile_image  = ImageHelper::getProfileImage($User->profile_image);
            $User->registration_card = ImageHelper::getRegistrationCardImage($User->registration_card);
            $User->document_1 = ImageHelper::getDocumentImage($User->document_1);
            $User->document_2 = ImageHelper::getDocumentImage($User->document_2);
            $User->document_3 = ImageHelper::getDocumentImage($User->document_3);
            return response(['status' => true , 'message' => __("Record found"), 'data'=>$User]);  
        }else{
            return response(['status' => false , 'message' => __("Record not found")]);
        }
    }

    public function profileUpdate(Request $request){
        $langData   = trans('api_auth');
        $inputs     = $request->all();
        $rules = [
            'id'                => 'required',
            'role'              => 'required',
            'user_name'         => 'required',
         //   'email'             => [Rule::unique('users', 'email')->where('role', $inputs['role'])->ignore($inputs['id'], 'id')],
            'phone_number'      => ['required', Rule::unique('users', 'phone_number')->where('role', $inputs['role'])->ignore($inputs['id'], 'id')],
        ];

        $message = [
            'id.required'               => __('Id field is required'),
            'role.required'             => __('Role field is required'),
            'user_name.required'        => __('User name field is required'),
        //    'email.required'            => __('Email field is required'),
            'phone_number.required'     => __('Phone field is required')
        ];

        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }
        $userStatus=User::where('id',$inputs['id'])->first();
        if($userStatus){
            //===================Image Upload Hear============
            $profile_image=null;
            if($request->hasFile('profile_image')) {
                $profile_image = str_random('10').'_'.time().'.'.request()->profile_image->getClientOriginalExtension();
                request()->profile_image->move(public_path('uploads/profiles/'), $profile_image);
            }

            $User                     = User::find($userStatus->id);
            $User->user_name          = $inputs['user_name'];
            $User->email              = $inputs['email'] ?? NULL;
            $User->phone_number       = $inputs['phone_number'];
            if(!empty($inputs['phone_number'])){
                $User->phone_number       = $inputs['phone_number'];
            }
            if($profile_image){
                $User->profile_image          = $profile_image;
            }
            if(!empty($inputs['address'])){
                $User->address       = $inputs['address'];
            }
            if(!empty($inputs['lat'])){
                $User->lat       = $inputs['lat'];
            }
            if(!empty($inputs['lng'])){
                $User->lng       = $inputs['lng'];
            }
            if(!empty($inputs['description_english'])){
                $User->description       = $inputs['description_english'] ?? '';
            }
            if(!empty($inputs['description_arabic'])){
                $User->description_ar    = $inputs['description_arabic'] ?? '';
            }
            if($User->update()){
                $User = User::find($User->id);
                if($User){
                    $User->profile_image  = ImageHelper::getProfileImage($User->profile_image);
                }
                return response(['status' => true , 'message' => __('Successfully updated profile'),'data'=>$User]);
            }else{
                return response(['status' => true , 'message' => __('Failed to update profile')]);
            }
        }else{
            return response(['status' => false , 'message' => __('This user id does not exist')]); 
        }
    }

    public function getNotfication(Request $request){
        $langData   = trans('api_auth');
        $inputs     = $request->all();

        $rules = [
            'id'          => 'required',
        ];

        $message = [
            'id.required'             => $langData['id'],
        ];

        if($inputs['id']){
            $notificationData = Notification::where('receiver_id',$inputs['id'])->orderBy('notification_id','desc')->get();
            if($notificationData->toArray()){
                foreach($notificationData as $key => $value){
                    $notificationData[$key]->id = '';
                    $notificationData[$key]->type = '';
                    if($value){
                         $arr = json_decode($value->json_data);
                         $notificationData[$key]->id   = $arr->id   ?? '';
                         $notificationData[$key]->type = $arr->key ?? '';
                    }
                    $notificationData[$key]->date = date('Y-m-d h:i A',strtotime($value->created_at));
                }
               return response(['status' => true , 'message' => __('Record found'), 'data'=>$notificationData]);
            }else{
               return response(['status' => false , 'message' => __('Record not found')]);
            }  
        } 
    }

    public function getNotficationCount(Request $request){
        $langData   = trans('api_auth');
        $inputs     = $request->all();

        $rules = [
            'id'          => 'required',
        ];

        $message = [
            'id.required'             => __('Id field is required'),
        ];

        if($inputs['id']){
            $NotificationCount = Notification::where('receiver_id',$inputs['id'])->where('read_status','0')->count();
            if($NotificationCount){
               return response(['status' => true , 'message' => __('Record found'), 'data'=>$NotificationCount]);
            }else{
               return response(['status' => true , 'message' => __('Record not found'), 'data'=>$NotificationCount]);
            }  
        } 
    }

    public function notficationRead(Request $request){
        $langData   = trans('api_auth');
        $inputs     = $request->all();

        $rules = [
            'id'          => 'required',
        ];

        $message = [
            'id.required'             => $langData['id'],
        ];

        if($inputs['id']){
            $Notification = Notification::where('receiver_id',$inputs['id'])->update(['read_status'=>'1']);
            if($Notification){
               return response(['status' => true , 'message' => __('Record found') ]);
            }else{
               return response(['status' => false , 'message' => __('Record not found') ]);
            }  
        } 
    }

    public function changePassword(Request $request){
        $langData = trans('api_auth');
        $inputs    = $request->all();
        $rules = [
            'id'                => 'required',
            'old_password'      => 'required',
            'new_password'      => 'required',
        ];
        $message = [
            'id.required'                       => __('Id field is required'),
            'old_password.required'             => __('Old password is required'),
            'new_password.required'             => __('New password is required'),
        ];
        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }

        $User = User::find($inputs['id']);
        if (!(Hash::check($request->old_password,  $User->password))) {
            return response(['status' => false , 'message' => __('Your old password does not match')] , 200);
        }

        elseif(strcmp($request->old_password, $request->new_password) == 0){
            return response(['status' => false , 'message' => __('Your new password can not be same to old password')] , 200);
        }

        $User  = User::find($inputs['id']);
        $User->password = Hash::make($inputs['new_password']);
        if($User->update()){
            return response(['status' => true , 'message' => __('Successfully changed password')] , 200);
        }
        return response(['status' => false , 'message' => __('Failed to change password')] , 200);
    }

    public function page(Request $request){
        $langData = trans('api_auth');
        $inputs    = $request->all();
        
        $Page = Page::where('type',$inputs['page_type'])->first();
        if($Page){
            return response(['status' => true , 'message' => __('Record found'), 'data'=>$Page]);
        }else{
            return response(['status' => false , 'message' => __('Record not found')]);
        }
    }

    public function updateAddress(Request $request){
        $langData   = trans('api_auth');
        $inputs     = $request->all();
        $rules = [
            'id'                => 'required',
            'address'           => 'required',
            'lat'               => 'required',
            'lng'               => 'required',
        ];

        $message = [
            'id.required'               => __('Id field is required'),
            'address.required'          => __('Address field is required'),
            'lat.required'              => $langData['lat'],
            'lng.required'              => $langData['lng'],
        ];

        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }

        $userStatus=User::where('id',$inputs['id'])->first();
        if($userStatus){
            //===================Image Upload Hear============
            $User                     = User::find($userStatus->id);
            $User->address            = $inputs['address'];
            $User->lat                = $inputs['lat'];
            $User->lng                = $inputs['lng'];
            if($User->save()){
                return response(['status' => true , 'message' => __('Successfully updated profile')]);
            }else{
                return response(['status' => true , 'message' => __('Failed to update profile')]);
            }
        }else{
            return response(['status' => false , 'message' => __('This user id field is required')]); 
        }
    }

    public function getLatLng(Request $request){
        $langData   = trans('api_auth');
        $inputs     = $request->all();
        $rules = [
            'id'                => 'required',
        ];

        $message = [
            'id.required'               => __('Id field is required'),
        ];

        $validator = Validator::make($inputs, $rules,$message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }

        $userStatus=User::select('lat','lng')->where('id',$inputs['id'])->first();
        if($userStatus){
            return response(['status' => true , 'message' => __('Record found'),'data'=>$userStatus]);
        }else{
            return response(['status' => false , 'message' => __('Record not found')]); 
        }
    }

    public function addAppRating(Request $request){
        $langData   = trans('api_auth');
        $inputs = $request->all();
        $rules = [
            'user_id'            => 'required',
            'rating'             => 'required',
            'review'             => 'required',
        ];
         $message = [
            'user_id.required'          => __('User id field is required'),
            'rating.required'           => __('Rating field is required'),
            'review.required'           => __('Review field is required'),
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }
        //==============User Check==============
        $UserStaust = User::where('id',$inputs['user_id'])->first();
        if($UserStaust){
            $AppRating = DB::table('app_ratings')->select('*')->where('user_id','7')->first();
            if(!$AppRating){
                $AppRating               = new AppRating();
                $AppRating->user_id      = $UserStaust->id;
                $AppRating->rating       = $inputs['rating'];
                $AppRating->review       = $inputs['review'];
                if($AppRating->save()){
                    return response(['status' => true , 'message' => __('Thank you to given your feedback') ]);
                }else{
                    return response(['status' => false , 'message' => __('Failed to give rating') ]);
                }
            }else{
                return response(['status' => false , 'message' => __("Already given rating") ]);
            }
        }else{
            return response(['status' => false , 'message' => __('This user id does not exist') ]);  
        }
    }

    public function getAppRating(Request $request){
        $langData   = trans('api_auth');
        $inputs = $request->all();
        $rules = [
            'user_id'            => 'required',
        ];
        $message = [
            'user_id.required'          => __('User id field is required'),
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }
        //==============User Check==============
        $UserStaust = User::where('id',$inputs['user_id'])->first();
        if($UserStaust){
            $AppRating = DB::table('app_ratings')->select('*')->get();
            if($AppRating){
                return response(['status' => true , 'message' => __('Record found') , 'data'=>$AppRating ]);
               
            }else{
                return response(['status' => false , 'message' => __('Rrecord not found') ]);
            }
        }else{
            return response(['status' => false , 'message' => __('This user id does not exist') ]);  
        }
    }

    public function sendSupportRequest(Request $request){
        $langData   = trans('api_auth');
        $inputs = $request->all();
        $rules = [
            'user_id'            => 'required',
            'support_type'       => 'required',
            'message'            => 'required',
        ];
         $message = [
            'user_id.required'           => __('User id field is required'),
            'support_type.required'      => __('Support type field is required'),
            'message.required'           => __('Message field is required'),
        ];

        $validator = Validator::make($inputs, $rules , $message);
        if ($validator->fails()) {
            $errors =  $validator->errors()->all();
            return response(['status' => false , 'message' => $errors[0]] , 200);              
        }
        //==============User Check==============
        $UserStaust = User::where('id',$inputs['user_id'])->first();
        if($UserStaust){
            $Support               = new Support();
            $Support->user_id      = $UserStaust->id;
            $Support->support_type = $inputs['support_type'];
            $Support->user_name    = $UserStaust->user_name;
            $Support->phone_number = $UserStaust->phone_number;
            $Support->email        = $UserStaust->email;
            $Support->message      = $inputs['message'];
            if($Support->save()){
                return response(['status' => true , 'message' => __('Successfully sent request') ]);
            }else{
                return response(['status' => false , 'message' => __('Failed to send request') ]);
            }
            
        }else{
            return response(['status' => false , 'message' => __('This user id does not exist') ]);  
        }
    }
   
    public function termCondition(Request $request){
            $lang = $request->lang;
            if($lang == 'ar'){
                return view('api.term_condition_arabic');
            }else{
                return view('api.term_condition_english');
            }
    }

    public function privacyPolicy(Request $request){
            $lang = $request->lang;
            if($lang == 'ar'){
                    return view('api.privacy_policy_arabic');
            }else{
                    return view('api.privacy_policy_english');
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
