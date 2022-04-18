<?php

namespace App\Http\Controllers;

use App\Models\WareHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class WareHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = WareHouse::where('wh_status', 1)->orderBy('wh_id', 'ASC')->get();
        return view('warehouse.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warehouse.create');
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
            'wh_name' => ['required', 'string', 'max:255'],
        ],[
            'wh_name.required' => "Enter Your Name",
        ]);
        $creator = Auth::user()->id;
        $slug = "WH" . uniqid();
        $insert = WareHouse::insertGetId([
            'wh_name' => $request->wh_name,
            'wh_phone' => $request->wh_phone,
            'wh_email' => $request->wh_email,
            'wh_address' => $request->wh_address,
            'wh_create' => $creator,
            'wh_slug' => $slug,
            'wh_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'WareHouse Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'WareHouse Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WareHouse  $wareHouse
     * @return \Illuminate\Http\Response
     */
    public function show(WareHouse $wareHouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WareHouse  $wareHouse
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = WareHouse::where('wh_status', 1)->where('wh_slug', $slug)->firstOrFail();
        return view('warehouse.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WareHouse  $wareHouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'wh_name' => ['required', 'string', 'max:255'],
        ],[
            'wh_name.required' => "Enter Your Name",
        ]);
        $id = $request->wh_id;
        $editor = Auth::user()->id;
        $update = WareHouse::where('wh_status', 1)->where('wh_id', $id)->where('wh_slug', $slug)->update([
            'wh_name' => $request->wh_name,
            'wh_phone' => $request->wh_phone,
            'wh_email' => $request->wh_email,
            'wh_address' => $request->wh_address,
            'wh_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'WareHouse Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'WareHouse Updated Failed!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WareHouse  $wareHouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $id = $request['delete_data'];
        $delete = WareHouse::where('wh_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'WareHouse Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'WareHouse Delete Failed!');
            return redirect()->back();
        }
    }
}
