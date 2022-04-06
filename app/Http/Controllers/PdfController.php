<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function index(){
        $all= Customer::where('customer_status', 1)->orderBy('customer_id', 'asc')->get();
        return view('pdf.customer', compact('all'));
    }
}
