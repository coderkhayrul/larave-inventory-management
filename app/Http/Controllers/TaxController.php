<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Tax::where('tax_status', 1)->orderBy('tax_id', 'asc')->get();
        return view('tax.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tax.create');
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
            'tax_name' => ['required', 'string', 'max:255'],
        ],[
            'tax_name.required' => "Enter Your Name",
        ]);

        $insert = Tax::insertGetId([
            'tax_name' => $request->tax_name,
            'tax_percent' => $request->tax_percent,
            'tax_remarks' => $request->tax_remarks,
            'tax_slug' => Str::slug($request->tax_name, '-'),
            'tax_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Tax Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Tax Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = Tax::where('tax_status', 1)->where('tax_slug', $slug)->firstOrFail();
        return view('tax.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'tax_name' => ['required', 'string', 'max:255'],
        ],[
            'tax_name.required' => "Enter Your Name",
        ]);
        $id = $request->tax_id;
        $update = Tax::where('tax_status', 1)->where('tax_slug', $slug)->where('tax_id', $id)->update([
            'tax_name' => $request->tax_name,
            'tax_percent' => $request->tax_percent,
            'tax_remarks' => $request->tax_remarks,
            'tax_slug' => Str::slug($request->tax_name, '-'),
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Tax Updated successfully');
            return redirect()->route('tax.index');
        } else {
            Session::flash('error', 'Tax Updated Failed!');
            return redirect()->route('tax.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request['delete_data'];
        $delete = Tax::where('tax_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Tax Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Tax Delete Failed!');
            return redirect()->back();
        }
    }
}
