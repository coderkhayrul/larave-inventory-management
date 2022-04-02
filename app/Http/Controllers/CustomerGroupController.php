<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class CustomerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = CustomerGroup::where('cg_status', 1)->orderBy('cg_id', 'ASC')->get();
        return view('customergroup.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customergroup.create');
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
            'cg_name' => ['required', 'string', 'max:255'],
        ], [
            'cg_name.required' => 'Please enter Customer Group',
        ]);

        $slug = 'CG' . uniqid();
        $insert = CustomerGroup::insertGetId([
            'cg_name' => $request->cg_name,
            'cg_remarks' => $request->cg_remarks,
            'cg_slug' => $slug,
            'cg_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Customer Group Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Customer Group Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerGroup  $customerGroup
     * @return \Illuminate\Http\Response
     */
    // public function show(CustomerGroup $customerGroup)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerGroup  $customerGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $slug)
    {
        $data = CustomerGroup::where('cg_status', 1)->where('cg_slug', $slug)->firstOrFail();
        return view('customergroup.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerGroup  $customerGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'cg_name' => $request->cg_name,
        ],[
            'cg_name.required' => 'Enter Group Name',
        ]);

        $insert = CustomerGroup::where('cg_status', 1)->where('cg_slug', $slug)->update([
            'cg_name' => $request->cg_name,
            'cg_remarks' => $request->cg_remarks,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Customer Group Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Customer Group Updated Failed!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerGroup  $customerGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $id = $request['delete_data'];
        $delete = CustomerGroup::where('cg_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Customer Group Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Customer Group Delete Failed!');
            return redirect()->back();
        }
    }
}
