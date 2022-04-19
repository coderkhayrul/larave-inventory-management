<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecycleBinController extends Controller
{
    public function index(){
        return view('recyclebin');
    }
}
