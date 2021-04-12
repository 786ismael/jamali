<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\ExpressCheckout;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;

use App\Models\TransactionHistory;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Notification;
use App\Helpers\ApiHelper;

use Braintree;
use Redirect;
use Session;
use URL;
use App;
use DB;

 class PaymentController extends Controller{ 
   
  /**
     * Create a new PaymentController instance.
     *
     * @return void
     */
    public function __construct(Request $request){
      if($request->lang){
          App::setlocale($request->lang);
      }
  }

 	  private $environment = 'sandbox';
 	  private $merchantId  = '9z8qnsjxsr8ywfrh';
 	  private $publicKey   = 'ckr9kgsbzyr24h3p';
 	  private $privateKey  = 'f8e4aa9daf362987f04a2fbb4be48e78';
 	  private $gateway     = null;

      public function __construct(){
        /*echo "Ganesh";
        die;*/
       $this->gateway = new Braintree\Gateway([
        'environment'  => $this->environment,
        'merchantId'   => $this->merchantId,
        'publicKey'    => $this->publicKey,
        'privateKey'   => $this->privateKey,
      ]);

       /** PayPal api context **/
      $paypal_conf = \Config::get('paypal');
      $this->_api_context = new ApiContext(new OAuthTokenCredential(
          $paypal_conf['client_id'],
          $paypal_conf['secret'])
      );
      $this->_api_context->setConfig($paypal_conf['settings']);
     }

     public function cardPayment($data = array()){
        $transaction = $this->gateway->transaction()->sale([
          'amount'             => $data['amount'],
          'paymentMethodNonce' => $data['nonce'],
          'options'            => [ 'submitForSettlement' => true ]
        ]);

        if($transaction->success){
          $transaction = $this->gateway->transaction()->find($transaction->transaction->id);
          $trans['id'] = $transaction->id;
          $trans['currency_iso_Code'] = $transaction->currencyIsoCode;
          $trans['card_type']  = $transaction->creditCard['cardType'];
          $trans['created_at'] = $transaction->createdAt;
          $trans['updated_at'] = $transaction->updatedAt ;
          $trans['amount']     = $transaction->amount;

          return array('status'=> true , 'message' => 'Transaction successfully', 'data' => $trans);
        }else{
          return array('status' => false , 'message' => 'Transaction failed');
      }
     } 

     public function getBraintreeToken(){
  	   return $this->gateway->ClientToken()->generate();
     }
     
    //==============New Paypal Code==========
    public function paypal(Array $payDataInfo){
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($payDataInfo['amount']); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
              ->setTotal($payDataInfo['amount']);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        if($payDataInfo['for_payment']=='1'){

          $redirect_urls->setReturnUrl(URL::to('api/user/status?&sender_id='.$payDataInfo['sender_id'].'&for_payment='.$payDataInfo['for_payment'].'&appointment_id='.$payDataInfo['appointment_id']))
            ->setCancelUrl(URL::to('api/user/error'));

        }else{

        }

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
          $payment->create($this->_api_context);
        }catch (\PayPal\Exception\PPConnectionException $ex) {
          if(\Config::get('app.debug')) {
            \Session::put('error', 'Connection timeout');
            return Redirect('api/user/error');;
          }else {
            \Session::put('error', 'Some error occur, sorry for inconvenient');
            return Redirect('api/user/error');
          }
        }
        foreach ($payment->getLinks() as $link) {
          if ($link->getRel() == 'approval_url') {
            $redirect_url = $link->getHref();
            break;
          }
        }
        \Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
          return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect('api/user/error');
    }

    public function getPaymentStatus(){
      $payment_id   = Input::get('paymentId');
      $for_payment  = Input::get('for_payment');
      $user_id      = Input::get('sender_id');
      if($for_payment=='1'){
        $appointment_id              = Input::get('appointment_id');
      }else{

      }
      Session::forget('paypal_payment_id');
      if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        return Redirect('api/user/error');
      }

      $payment = Payment::get($payment_id, $this->_api_context);
      $execution = new PaymentExecution();
      $execution->setPayerId(Input::get('PayerID'));

      $result = $payment->execute($execution, $this->_api_context);

      if ($result->getState() == 'approved') {
          $id           = $result->transactions[0]->related_resources[0]->sale->id;
          $total        = $result->transactions[0]->related_resources[0]->sale->amount->total;
          $currency     = $result->transactions[0]->related_resources[0]->sale->amount->currency;
          $create_time  = $result->transactions[0]->related_resources[0]->sale->create_time;

          $TransactionHistory                         = new TransactionHistory();
          $TransactionHistory->user_id                = $user_id;
          $TransactionHistory->paypal_charge          = '50';
          $TransactionHistory->payment_method         = '2';
          $TransactionHistory->transaction_id         = $id;
          $TransactionHistory->currency               = $currency;
          $TransactionHistory->amount                 = $total;
          $TransactionHistory->transaction_status     = '1';
          if($for_payment=='1'){//add wallet
           $TransactionHistory->appointment_id               = $appointment_id;
          }else{

          }

          if($TransactionHistory->save()){
            if($for_payment=='1'){
              $Appointment                  = Appointment::find($appointment_id);
              $Appointment->payment_status  = '1';
              $Appointment->update();
                $UserStaust = User::select('id','user_name')->where('role','2')->where('active_status','1')->where('id',$Appointment->user_id)->first();
                
                $Vendor = User::select('id' , 'lat' , 'lng' , 'notification_status' , 'device_type' , 'device_token', 'language')->where('role','3')->where('id',$Appointment->vendor_id)->first();
                if($Vendor){
                        $title              = 'Payment Successfully';
                        $message            = 'Your payment successfully by '.$UserStaust->user_name;
                        $notification_key   = 'Payment_Success';
                    if($Vendor->notification_status == '1'){
                     //   if($Vendor->device_type== 'android'){
                            $notificationData = [
                                'key'             => $notification_key,
                                'title'           => $title,
                                'message'         => $message,
                                'sender_id'       => $UserStaust->id,
                                'receiver_id'     => $Vendor->id,
                                'id'              => $appointment_id
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
          }
          return Redirect('api/user/success');
        }
      return Redirect('api/user/error');
    }

 }