<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Supplier::where('supplier_status', 1)->orderBy('supplier_id', 'asc')->get();
        return view('supplier.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
            'supplier_name' => ['required', 'string', 'max:255'],
            'supplier_company' => ['required', 'string', 'max:255'],
            'supplier_phone' => ['required', 'string', 'max:20'],
            'supplier_address' => ['required', 'string', 'max:255'],
            'supplier_remarks' => ['required', 'string', 'max:255'],
        ],[
            'cg_id.required' =>  'Enter Group Name',
            'supplier_name.required' =>  'Enter  supplier Name',
            'supplier_phone.required' =>  'Enter Phone',
            'supplier_address.required' =>  'Enter Address',
            'supplier_company.required' =>  'Enter Company Name',
            'supplier_remarks.required' =>  'Enter Remarks'
        ]);

        $slug = 'S' . uniqid();
        $creator = Auth::user()->id;
        $insert = Supplier::insertGetId([
            'supplier_name' => $request->supplier_name,
            'supplier_email' => $request->supplier_email,
            'supplier_company' => $request->supplier_company,
            'supplier_phone' => $request->supplier_phone,
            'supplier_address' => $request->supplier_address,
            'supplier_city' => $request->supplier_city,
            'supplier_state' => $request->supplier_state,
            'supplier_postal' => $request->supplier_postal,
            'supplier_country' => $request->supplier_country,
            'supplier_remarks' => $request->supplier_remarks,
            'supplier_slug' => $slug,
            'supplier_creator' => $creator,
            'supplier_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Supplier Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Supplier Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $supplier = Supplier::where('supplier_slug', $slug)->where('supplier_status', 1)->firstOrFail();
        return view('supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $slug)
    {
        $supplier = Supplier::where('supplier_slug', $slug)->where('supplier_status', 1)->firstOrFail();
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'supplier_name' => ['required', 'string', 'max:255'],
            'supplier_company' => ['required', 'string', 'max:255'],
            'supplier_phone' => ['required', 'string', 'max:20'],
            'supplier_address' => ['required', 'string', 'max:255'],
            'supplier_remarks' => ['required', 'string', 'max:255'],
        ],[
            'supplier_name.required' =>  'Enter  Supplier Name',
            'supplier_phone.required' =>  'Enter Phone',
            'supplier_address.required' =>  'Enter Address',
            'supplier_company.required' =>  'Enter Company Name',
            'supplier_remarks.required' =>  'Enter Remarks'
        ]);

        $editor = Auth::user()->id;
        $update = Supplier::where('supplier_status', 1)->where('supplier_slug', $slug)->update([
            'supplier_name' => $request->supplier_name,
            'supplier_email' => $request->supplier_email,
            'supplier_company' => $request->supplier_company,
            'supplier_phone' => $request->supplier_phone,
            'supplier_address' => $request->supplier_address,
            'supplier_city' => $request->supplier_city,
            'supplier_state' => $request->supplier_state,
            'supplier_postal' => $request->supplier_postal,
            'supplier_country' => $request->supplier_country,
            'supplier_remarks' => $request->supplier_remarks,
            'supplier_slug' => $slug,
            'supplier_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($update) {
            Session::flash('success', 'Supplier Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Supplier Updated Failed!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request['delete_data'];
        $delete = Supplier::where('supplier_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Supplier Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Supplier Delete Failed!');
            return redirect()->back();
        }
    }
}
