<?php

namespace App\Http\Controllers;

use App\Models\PurchaseUnit;
use App\Models\SellUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class SellUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = SellUnit::where('su_status', 1)->orderBy('su_id', 'asc')->get();
        return view('sell_unit.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pu_all = PurchaseUnit::where('pu_status', 1)->orderBy('pu_id', 'DESC')->get();
        return view('sell_unit.create', compact('pu_all'));
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
            'su_name' => ['required', 'string', 'max:255'],
        ],[
            'su_name.required' => "Enter Your Name",
        ]);

        $insert = SellUnit::insertGetId([
            'pu_id' => $request->pu_id,
            'su_name' => $request->su_name,
            'su_remarks' => $request->su_remarks,
            'su_slug' => Str::slug($request->su_name, '-'),
            'su_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Sell Unit Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Sell Unit Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellUnit  $sellUnit
     * @return \Illuminate\Http\Response
     */
    public function show(SellUnit $sellUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellUnit  $sellUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(SellUnit $sellUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellUnit  $sellUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellUnit $sellUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellUnit  $sellUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellUnit $sellUnit)
    {
        //
    }
}
