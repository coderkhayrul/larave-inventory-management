<?php

namespace App\Http\Controllers;

use App\Models\PurchaseUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class PurchaseUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = PurchaseUnit::where('pu_status', 1)->orderBy('pu_id', 'asc')->get();
        return view('purchase_unit.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchase_unit.create');
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
            'pu_name' => ['required', 'string', 'max:255'],
        ],[
            'pu_name.required' => "Enter Your Name",
        ]);

        $insert = PurchaseUnit::insertGetId([
            'pu_name' => $request->pu_name,
            'pu_remarks' => $request->pu_remarks,
            'pu_slug' => Str::slug($request->pu_name, '-'),
            'pu_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Purchase Unit Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Purchase Unit Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseUnit  $purchaseUnit
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseUnit $purchaseUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseUnit  $purchaseUnit
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = PurchaseUnit::where('pu_status', 1)->where('pu_slug', $slug)->firstOrFail();
        return view('purchase_unit.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseUnit  $purchaseUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // return $request->all();
        $this->validate($request,[
            'pu_name' => ['required', 'string', 'max:255'],
        ],[
            'pu_name.required' => "Enter Your Name",
        ]);

        $update = PurchaseUnit::where('pu_status', 1)->where('pu_id', $request->pu_id)->update([
            'pu_name' => $request->pu_name,
            'pu_remarks' => $request->pu_remarks,
            'pu_slug' => Str::slug($request->pu_name, '-'),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Purchase Unit Updated successfully');
            return redirect()->route('purchase.unit.index');
        } else {
            Session::flash('error', 'Purchase Unit Updated Failed!');
            return redirect()->route('purchase.unit.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseUnit  $purchaseUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request['delete_data'];
        $delete = PurchaseUnit::where('pu_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Purchase Unit Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Purchase Unit Delete Failed!');
            return redirect()->back();
        }
    }
}
