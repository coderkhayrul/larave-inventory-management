<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ContactInfo::where('cont_status', 1)->where('cont_id', 1)->firstOrFail();
        return view('contact_info', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->cont_id;
        $update = ContactInfo::where('cont_id', $id)->where('cont_status', 1)->update([
            'cont_phone1' => $request->cont_phone1,
            'cont_phone2' => $request->cont_phone2,
            'cont_email1' => $request->cont_email1,
            'cont_email2' => $request->cont_email2,
            'cont_add1' => $request->cont_add1,
            'cont_add2' => $request->cont_add2,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        if ($update) {
            Session::flash('success', 'Contact Information Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Contact Information Update Failed!');
            return redirect()->back();
        }
    }
}
