<?php

namespace App\Http\Controllers;

use App\Models\Biller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BillerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Biller::where('biller_status', 1)->orderBy('biller_id', 'ASC')->get();
        return view('billder.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('billder.create');
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
            'biller_name' => ['required', 'string', 'max:255'],
            'biller_phone' => ['required', 'string', 'max:20'],
            'biller_company' => ['required', 'string', 'max:255'],
        ],[
            'biller_name.required' =>  'Enter  Customer Name',
            'biller_phone.required' =>  'Enter Phone',
            'biller_company.required' =>  'Enter Company Name',
        ]);

        $slug = 'B' . uniqid();
        $creator = Auth::user()->id;
        $insert = Biller::insertGetId([
            'biller_name' => $request->biller_name,
            'biller_email' => $request->biller_email,
            'biller_company' => $request->biller_company,
            'biller_phone' => $request->biller_phone,
            'biller_address' => $request->biller_address,
            'biller_city' => $request->biller_city,
            'biller_country' => $request->biller_country,
            'biller_slug' => $slug,
            'biller_creator' => $creator,
            'biller_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Biller Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Biller Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biller  $biller
     * @return \Illuminate\Http\Response
     */
    public function show(Biller $biller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biller  $biller
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $slug)
    {
        $data = Biller::where('biller_status', 1)->where('biller_slug', $slug)->firstOrFail();
        return view('billder.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Biller  $biller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'biller_name' => ['required', 'string', 'max:255'],
            'biller_phone' => ['required', 'string', 'max:20'],
            'biller_company' => ['required', 'string', 'max:255'],
        ],[
            'biller_name.required' =>  'Enter  Customer Name',
            'biller_phone.required' =>  'Enter Phone',
            'biller_company.required' =>  'Enter Company Name',
        ]);
        $editor = Auth::user()->id;
        $id = $request->biller_id;
        $insert = Biller::where('biller_status', 1)->where('biller_slug', $slug)->where('biller_id', $id)->update([
            'biller_name' => $request->biller_name,
            'biller_email' => $request->biller_email,
            'biller_company' => $request->biller_company,
            'biller_phone' => $request->biller_phone,
            'biller_address' => $request->biller_address,
            'biller_city' => $request->biller_city,
            'biller_country' => $request->biller_country,
            'biller_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Biller Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Biller Updated Failed!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biller  $biller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request['delete_data'];
        $delete = Biller::where('biller_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Biller Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Biller Delete Failed!');
            return redirect()->back();
        }
    }
}
