<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Http\Controllers\Controller;
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
}
