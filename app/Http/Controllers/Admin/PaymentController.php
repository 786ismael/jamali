<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index(){
        return view('admin.payment.index');
    }

    public function create(){
        return view('admin.payment.create');
    }
    public function document(){
        return view('admin.payment.document');
    }

    public function invoice(){
        return view('admin.payment.invoice');
    }
    public function details(){
        return view('admin.payment.details');
    }
    public function edit(){
        return view('admin.payment.edit');
    }
    public function update(){
        return view('admin.payment.index');
    }
    public function destroy(){
        return view('admin.payment.index');
    }
}
