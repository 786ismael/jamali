<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

use App\Helpers\ImageHelper;
use Illuminate\Validation\Rule;
use Validator;
use Auth;
use Hash;
use Redirect,Response,DB,Config;
use Datatables;


class CategoryController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $categories = DB::table('categories as c')
                            ->select('c.*',)
                            //->join('categories as c', 'c.category_id','=','p.category_id')
                            ->whereNull('c.deleted_at')
                            ->orderBy('c.category_id','desc')
                            ->get();
            $number_key=1;
            foreach ($categories as $key => $value) {
                $value->number_key=$number_key;
                $number_key++;
                $value->category_image=ImageHelper::getCategoryImage($value->category_image);
            }
            return datatables()->of($categories)->make(true);
        }
        $data['js'] = ['category/index.js'];
        return view('admin.category.index',compact('data'));
    }

    public function create(){
        $data['js'] = ['category/create.js'];
        return view('admin.category.create',compact('data'));
    }
    public function store(Request $request){
        $inputs      = $request->all();
        $rules = [
            'category_name'     => 'required',
            'category_image'    => 'required',
            'category_name_ar'  => 'required'
        ];
       
        $this->validate($request,$rules);
        $category_image = null;
        if ($request->hasFile('category_image')) {
            $category_image = str_random('10').'_'.time().'.'.request()->category_image->getClientOriginalExtension();
            request()->category_image->move(public_path('uploads/category/'), $category_image);
        }

        $Category                     = new Category();
        $Category->category_name       = $inputs['category_name'];
        $Category->category_name_ar       = $inputs['category_name_ar'];
        if($category_image){
           $Category->category_image   = $category_image; 
        }
        if($Category->save()){
            return Redirect('admin/category')->with('success','Category added successfully');
        }else{
            return back()->with('error','Category added failed,please try again');
        }
    }

    public function show(Request $request, $id){
        $data['product']    = Product::find($id);
        if($data['product']){
            $data['product']->product_image=ImageHelper::getProductImage($data['product']->product_image);
            if($data['product']->category_id==2){
                if($request->ajax()){
                    $product_combos = DB::table('product_combos as pc')
                                    ->select('pc.*')
                                    ->where('pc.product_id',$data['product']->product_id)
                                    ->whereNull('pc.deleted_at')
                                    ->get();
                    $number_key=1;
                    foreach ($product_combos as $key => $value) {
                       $value->number_key=$number_key;
                       $number_key++;
                    }
                    return datatables()->of($product_combos)->make(true);
                }
            }  
        }      
        $data['js'] = ['product/show.js'];
        return view('admin.product.show',compact('data'));   
    }

    public function edit($id){
        $data['category']    = Category::find($id);
        if($data['category']){
            $data['category']->category_image=ImageHelper::getCategoryImage($data['category']->category_image);
        }
        $data['js'] = ['category/create.js'];
        return view('admin.category.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $inputs      = $request->all();
        $rules = [
            'category_name'     => 'required',
            'category_name_ar'  => 'required'           
        ];
       
        $this->validate($request,$rules);
        $category_image = null;
        if ($request->hasFile('category_image')) {
            $category_image = str_random('10').'_'.time().'.'.request()->category_image->getClientOriginalExtension();
            request()->category_image->move(public_path('uploads/category/'), $category_image);
        }

        $Category                     = Category::find($id);
        $Category->category_name       = $inputs['category_name'];
        $Category->category_name_ar       = $inputs['category_name_ar'];
        if($category_image){
           $Category->category_image   = $category_image; 
        }
        if($Category->save()){
            return Redirect('admin/category')->with('success','Category updated successfully');
        }else{
            return back()->with('error','Category updated failed,please try again');
        }
    }
}
