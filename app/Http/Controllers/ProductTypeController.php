<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ProductType::where('pt_status' ,1)->get();
        return view('product.type.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'pt_name' => ['required', 'string', 'max:255'],
        ],[
            'pc_name.required' => "Enter Your Name",
        ]);

        $creator = Auth::user()->id;
        $insert = ProductType::insertGetId([
            'pt_name' => $request->pt_name,
            'pt_remarks' => $request->pt_remarks,
            'pt_slug' => Str::slug($request->pt_name, '-'),
            'pt_creator' => $creator,
            'pt_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Product Type Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Product Type Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = ProductType::where('pt_status', 1)->where('pt_slug', $slug)->firstOrFail();
        return view('product.type.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $slug)
    {
        $this->validate($request,[
            'pt_name' => ['required', 'string', 'max:255'],
        ],[
            'pc_name.required' => "Enter Your Name",
        ]);

        $editor = Auth::user()->id;
        $insert = ProductType::where('pt_status', 1)->where('pt_slug', $slug)->update([
            'pt_name' => $request->pt_name,
            'pt_remarks' => $request->pt_remarks,
            'pt_editor' => $editor,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Product Type Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Product Type Updated Failed!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$slug)
    {
        $id = $request['delete_data'];
        $delete = ProductType::where('pt_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Product Type Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Product Type Delete Failed!');
            return redirect()->back();
        }
    }
}
