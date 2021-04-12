<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Chat;
use App\Helpers\ImageHelper;
use App\Helpers\ApiHelper;
use Illuminate\Validation\Rule;
use Validator;
use Auth;
use App;
use Hash;
use Redirect,Response,DB,Config;
use Datatables;



class ChatController extends Controller{

    /**
     * Create a new ChatController instance.
     *
     * @return void
     */
    public function __construct(Request $request){
        if($request->lang){
            App::setlocale($request->lang);
        }
    }

    public function sendMessage(Request $request){
        $inputs             = $request->all();
        //$User               = User::where('role','1')->first();
        //$admin_id           = $User->id;
        //$inputs['admin_id'] = $admin_id;

        $Chat = Chat::where(function($query) use ($inputs){
                                    $query->where('sender_id',$inputs['sender_id']);
                                    $query->where('receiver_id',$inputs['receiver_id']);
                                })
                                ->orWhere(function($query) use($inputs){
                                    $query->where('sender_id',$inputs['receiver_id']);
                                    $query->where('receiver_id',$inputs['sender_id']);
                                })
                                ->first();

        if($Chat){
            $ChatData=[
                'sender_id'         => $inputs['sender_id'],
                'receiver_id'       => $inputs['receiver_id'],
                'message'           => $inputs['message'],
                'chat_unique_id'    => $Chat->chat_unique_id,
            ];
            $reload=2;
        }else{
            $ChatData=[
                'sender_id'         => $inputs['sender_id'],
                'receiver_id'       => $inputs['receiver_id'],
                'message'           => $inputs['message'],
                'chat_unique_id'    => 'chat'.time().ApiHelper::otpGenrator(4),
            ];
            $reload=1;
        }

        $InsertChat = Chat::create($ChatData);
        if($InsertChat){
            $chat_unique_id = $InsertChat->chat_unique_id;
            return response()->json(['status' => true ,'message'=>"Your message send successfully", 'data'=>$chat_unique_id, 'reload'=>$reload]);
        }else{
            return response()->json(['status' => false ,'message'=>"Your message send failed, please try again"]);
        }
    }

    public function getAllChats(Request $request){
        $inputs = $request->all();
        $Chats = Chat::where(function($query) use ($inputs){
                                  $query->where('sender_id',$inputs['sender_id']);
                                  //$query->where('other_user_id',$data['other_user_id']);
                                })
                                ->orWhere(function($query) use($inputs){
                                    //$query->where('user_id',$data['other_user_id']);
                                    $query->where('receiver_id',$inputs['sender_id']);
                                })
                        ->groupBy('chat_unique_id')
                        //->select(DB::raw("COUNT(read_status) as read_status"))
                        ->orderBy('created_at')
                        ->get();
                        
        if($Chats->toArray()){
            //return $Chats;
            $lastData=[];
            foreach ($Chats as $key => $value) {
                $Chatdata=Chat::where(function($query) use ($value){
                                  $query->where('chat_unique_id',$value->chat_unique_id);
                                  //$query->where('other_user_id',$data['other_user_id']);
                                })
                                // ->orWhere(function($query) use($inputs){
                                //     //$query->where('user_id',$data['other_user_id']);
                                //     $query->where('receiver_id',$inputs['sender_id']);
                                // })
                                ->latest('created_at')
                                ->first();
                $Chatdata=$Chatdata->toArray();
                array_push($lastData,$Chatdata);
            }

            foreach ($lastData as $key1 => $value1) {
                $ChatCount=Chat::where('receiver_id',$value1['receiver_id'])->where('read_status','0')->count();
                if($inputs['sender_id'] == $value1['receiver_id']){
                    $User=User::where('id',$value1['sender_id'])->first();  
                }else{
                    $User=User::where('id',$value1['receiver_id'])->first();   
                }
                
                $lastData[$key1]['chat_count']="$ChatCount";
                if($User){
                    $lastData[$key1]['user_name']=$User->user_name; 
                    $lastData[$key1]['profile_image']=ImageHelper::getProfileImage($User->profile_image); 
                }else{
                    $lastData[$key1]['user_name']=''; 
                    $lastData[$key1]['profile_image']=''; 
                }
                
            }

            return response()->json(['status' =>  true ,'message'=> __('Record found'),'data'=>$lastData]);
        }else{
            return response()->json(['status' => false ,'message'=> __('Record not found') ]);
        }
    }

    public function getChat(Request $request){
        $inputs = $request->all();
        // $Chat = Chat::where('sender_id',$inputs['sender_id'])->where('receiver_id',$inputs['receiver_id'])->get();
        $Chat = Chat::where(function($query) use ($inputs){
                                    $query->where('sender_id',$inputs['sender_id']);
                                    $query->where('receiver_id',$inputs['receiver_id']);
                                })
                                ->orWhere(function($query) use($inputs){
                                    $query->where('sender_id',$inputs['receiver_id']);
                                    $query->where('receiver_id',$inputs['sender_id']);
                                })
                                ->get();
        if($Chat){
            return response(['status' => true , 'message' => __('Record found'), 'data'=>$Chat]);
        }else{
            return response(['status' => false , 'message' => __('Record not found') ]);
        }
    }

    public function readStatusUpdate(Request $request){
        $inputs = $request->all();
        $chatS = Chat::where('user_id',$inputs['user_id'])->update(['read_status'=>'1']);
        
        if($chatS){
            return response()->json(['status' => true ,'message'=>"Messages read successfully"]);
        }else{
            return response()->json(['status' => false ,'message'=>"Messages read failed"]);
        }
    }
}