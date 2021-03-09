<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
       //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->lang == 'ar')
        return view('landing.index_ar');
        else
        return view('landing.index');
    }

    public function termCondition(Request $request){
        if($request->lang == 'ar')
         return view('landing.term_condition_ar');
        else
         return view('landing.term_condition');
    }

    public function privacyPolicy(Request $request){
        if($request->lang == 'ar')
         return view('landing.privacy_policy_ar');
        else
         return view('landing.privacy_policy');
    }

    public function support(Request $request){
        if($request->lang == 'ar')
          return view('landing.support_ar');
        else
          return view('landing.support');
    }
}
