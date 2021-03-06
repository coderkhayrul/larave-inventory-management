<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PDF;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Customer::where('customer_status', 1)->orderBy('customer_id', 'asc')->get();
        return view('customer.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cg_all = CustomerGroup::where('cg_status', 1)->OrderBy('cg_id', 'ASC')->get();
        return view('customer.create', compact('cg_all'));
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
            'cg_id' => ['required', 'integer', 'max:255'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_company' => ['required', 'string', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:20'],
            'customer_address' => ['required', 'string', 'max:255'],
            'customer_remarks' => ['required', 'string', 'max:255'],
        ],[
            'cg_id.required' =>  'Enter Group Name',
            'customer_name.required' =>  'Enter  Customer Name',
            'customer_phone.required' =>  'Enter Phone',
            'customer_address.required' =>  'Enter Address',
            'customer_company.required' =>  'Enter Company Name',
            'customer_remarks.required' =>  'Enter Remarks'
        ]);

        $slug = 'C' . uniqid();
        $creator = Auth::user()->id;
        $insert = Customer::insertGetId([
            'cg_id' => $request->cg_id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_company' => $request->customer_company,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'customer_city' => $request->customer_city,
            'customer_state' => $request->customer_state,
            'customer_postal' => $request->customer_postal,
            'customer_country' => $request->customer_country,
            'customer_remarks' => $request->customer_remarks,
            'customer_slug' => $slug,
            'customer_creator' => $creator,
            'customer_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Customer Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Customer Created Failed!');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $customer = Customer::where('customer_slug', $slug)->where('customer_status', 1)->firstOrFail();
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $customer = Customer::where('customer_slug', $slug)->where('customer_status', 1)->firstOrFail();
        $cg_all = CustomerGroup::where('cg_status', 1)->OrderBy('cg_id', 'ASC')->get();
        return view('customer.edit', compact('customer','cg_all'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'cg_id' => ['required', 'integer', 'max:255'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_company' => ['required', 'string', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:20'],
            'customer_address' => ['required', 'string', 'max:255'],
            'customer_remarks' => ['required', 'string', 'max:255'],
        ],[
            'cg_id.required' =>  'Enter Group Name',
            'customer_name.required' =>  'Enter  Customer Name',
            'customer_phone.required' =>  'Enter Phone',
            'customer_address.required' =>  'Enter Address',
            'customer_company.required' =>  'Enter Company Name',
            'customer_remarks.required' =>  'Enter Remarks'
        ]);

        $editor = Auth::user()->id;
        $update = Customer::where('customer_status', 1)->where('customer_slug', $slug)->update([
            'cg_id' => $request->cg_id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_company' => $request->customer_company,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'customer_city' => $request->customer_city,
            'customer_state' => $request->customer_state,
            'customer_postal' => $request->customer_postal,
            'customer_country' => $request->customer_country,
            'customer_remarks' => $request->customer_remarks,
            'customer_slug' => $slug,
            'customer_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($update) {
            Session::flash('success', 'Customer Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Customer Updated Failed!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request['delete_data'];
        $delete = Customer::where('customer_id', $id)->where('customer_status', 1)->update([
            'customer_status' => 0
        ]);

        if ($delete) {
            Session::flash('success', 'Customer Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Customer Delete Failed!');
            return redirect()->back();
        }
    }
    public function generatePDF(){
        $all= Customer::where('customer_status', 1)->orderBy('customer_id', 'asc')->get();
        $pdf = PDF::loadView('pdf.customer',compact('all'));
        return $pdf->download('customer.pdf');
    }
}
