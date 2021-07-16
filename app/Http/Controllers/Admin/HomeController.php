<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ApiHelper;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Models\City;
use Auth;
use Datatables;
use DB;

class HomeController extends Controller{
    public function index(){
        $data['user_count']             = User::where('role','2')->count();
        $data['delivery_boy_count']     = User::where('role','3')->count();
        /*$data['category_count']           = Category::count();
        $data['product_count']          = Product::count();

        $data['today_earning']          = Order::whereDay('created_at',date('d'))->sum('total_price');
        $data['monthly_earning']        = Order::whereMonth('created_at',date('m'))->sum('total_price');
        $data['yearly_earning']         = Order::whereYear('created_at',date('Y'))->sum('total_price');
        $data['total_earning']          = Order::sum('total_price');

        $data['today_order_count']      = Order::whereDay('created_at',date('d'))->count();
        $data['monthly_order_count']    = Order::whereMonth('created_at',date('m'))->count();
        $data['yearly_order_count']     = Order::whereYear('created_at',date('Y'))->count();
        $data['total_order_count']      = Order::count();*/

        return view('admin.dashboard',compact('data'));
    }

    public function termCondition(){
        return view('term_condition');
    }

    public function landingPage(Request $request){
       $id = auth::id();
       $id = base64_encode(base64_encode($id));
       return redirect( env('APP_URL') . '/almotelq/jamali/'.$id);
    }

    public function region(Request $request){
        if($request->ajax()){
            $countries =DB::table('countries as u')
                        ->select('u.*')
                        //->leftJoin('zones as z', 'z.zone_id', '=', 'u.zone_id')
                        ->where('u.status', '=', "1")
                        ->get();
            $number_key=1;
            foreach ($countries as $key => $value) {
                $value->number_key=$number_key;
                $value->id=encrypt($value->id);
                $number_key++;
            }
            return datatables()->of($countries)->make(true);
        }

        $data['js'] = ['reagion/index.js'];
        return view('admin.reagion.index',compact('data'));
    }

    public function city(Request $request){
        if($request->ajax()){
            $countries =DB::table('cities as u')
                        ->select('u.*')
                        //->leftJoin('zones as z', 'z.zone_id', '=', 'u.zone_id')
                        ->where('u.country_id', '=', decrypt($request->id))
                        ->whereNull('deleted_at')
                        ->get();
            $number_key=1;
            foreach ($countries as $key => $value) {
                $value->number_key=$number_key;
                $value->city_id=encrypt($value->city_id);
                $number_key++;
            }
            return datatables()->of($countries)->make(true);
        }

        $data['js'] = ['reagion/city.js'];
        $data['id'] = $request->id;
        return view('admin.reagion.city',compact('data'));
    }

    public function createReagion(Request $request)
    {
        return view('admin.reagion.create');
    }

    public function storeReagion(Request $request){
        $inputs = array_except($request->all(), ['_token']);
        $rules = [
            'countries_name'     => 'required'
        ];

        $this->validate($request,$rules);

        $response = Country::create($inputs);
        if($response){
            return  redirect('/admin/region')->with('status' , 'success' )->with('message' , __('Country added successfully!'));
        }else{
            return  redirect('/admin/region')->with('status' , 'failed' )->with('message' , __('Country save failed!'));
        }
    }

    public function editReagion(Request $request){
        $id = decrypt($request->id);
        $data['country'] = Country::where('id',$id)->first();
        return view('admin.reagion.edit',compact('data'));
    }

    public function updateReagion(Request $request){
        $inputs = array_except($request->all(), ['_token']);
        $rules = [
            'countries_name'     => 'required'
        ];

        $this->validate($request,$rules);
        $id = decrypt($inputs['id']);
        $country = Country::find($id);
        $country->countries_name = $inputs['countries_name'];
        $country->countries_iso_code = $inputs['countries_iso_code'];
        $country->countries_isd_code = $inputs['countries_isd_code'];
        if($country->save()){
            return  redirect('/admin/region')->with('status' , 'success' )->with('message' , __('Country updated successfully!'));
        }else{
            return  redirect('/add-rigion')->with('status' , 'failed' )->with('message' , __('Country update failed!'));
        }
    }

    public function deleteReagion(Request $request){
        $id = decrypt($request->id);
        if(Country::where('id',$id)->delete()){
            return response(['status' => 1 , 'message' => __('Country deleted Successfully')]);
        }else{
            return response(['status' => 0 , 'message' => __('Country delete failed')]);
        }
    }

    public function activeStatusChange(Request $request){
        $inputs                     = $request->all();
        $status=$inputs['status'];
        if($status=='0'){
            $change_status='1';
        }else{
            $change_status='0';
        }

        $User                       = Country::find(decrypt($inputs['id']));
        $User->status        = $change_status;
        if($User->update()){
            if($status==0){
                return ['status' => 'success' , 'message' => 'Record activated successfully', 'data'=>$User];
            }else{
                return ['status' => 'success' , 'message' => 'Record deactivated successfully', 'data'=>$User];
            }
        }else{
           return ['status' => 'failed' , 'message' => 'Status updated failed'];
        }
    }

    public function createCity(Request $request){
        $data['country'] = ApiHelper::country();
        return view('admin.reagion.city_create',compact('data'));
    }

    public function storeCity(Request $request)
    {
        $inputs = array_except($request->all(), ['_token']);
        $rules = [
            'name'     => 'required'
        ];

        $this->validate($request,$rules);

        $response = City::create($inputs);
        $id = encrypt($inputs['country_id']);

        if($response){
            return  redirect('/admin/city/'.$id)->with('status' , 'success' )->with('message' , __('City added successfully!'));
        }else{
            return  redirect('/admin/city/'.$id)->with('status' , 'failed' )->with('message' , __('City save failed!'));
        }
    }

    public function editCity(Request $request){
        $id = decrypt($request->id);
        $data['city'] = City::where('city_id',$id)->first();
        $data['country'] = ApiHelper::country();
        return view('admin.reagion.city_edit',compact('data'));
    }

    public function updateCity(Request $request){
        $inputs = array_except($request->all(), ['_token']);
        $rules = [
            'name'     => 'required'
        ];

        $this->validate($request,$rules);
        $id = decrypt($inputs['id']);
        $city = City::find($id);

        $city->country_id = $inputs['countries_name'];
        $city->name = $inputs['name'];
        if($city->save()){
            return  redirect('/admin/city/'.encrypt($inputs['countries_name']))->with('status' , 'success' )->with('message' , __('City updated successfully!'));
        }else{
            return  redirect('/admin/city/'.encrypt($inputs['countries_name']))->with('status' , 'failed' )->with('message' , __('City update failed!'));
        }
    }

    public function deleteCity(Request $request){
        $id = decrypt($request->id);
        if(City::where('city_id',$id)->delete()){
            return response(['status' => 1 , 'message' => __('City deleted Successfully')]);
        }else{
            return response(['status' => 0 , 'message' => __('City delete failed')]);
        }
    }

    public function activeCityStatusChange(Request $request){
        $inputs                     = $request->all();
        $status=$inputs['status'];
        if($status=='0'){
            $change_status='1';
        }else{
            $change_status='0';
        }

        $User                       = City::find(decrypt($inputs['id']));
        $User->status        = $change_status;
        if($User->update()){
            if($status==0){
                return ['status' => 'success' , 'message' => 'Record activated successfully', 'data'=>$User];
            }else{
                return ['status' => 'success' , 'message' => 'Record deactivated successfully', 'data'=>$User];
            }
        }else{
           return ['status' => 'failed' , 'message' => 'Status updated failed'];
        }
    }



}
