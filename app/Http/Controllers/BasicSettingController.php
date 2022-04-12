<?php

namespace App\Http\Controllers;

use App\Models\BasicSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BasicSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BasicSetting::where('basic_status', 1)->firstOrFail();
        return view('basic_setting', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BasicSetting  $basicSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasicSetting $basicSetting)
    {
        $this->validate($request,[
            'basic_company' => ['required', 'string', 'max:255'],
            'basic_title' => ['required', 'string', 'max:255'],
        ],[
            'basic_company.required' => "Enter Your Company Name",
            'basic_title.required' => "Enter Your Company Tt",
        ]);
        $id = $request->basic_id;
        $update = BasicSetting::where('basic_status', 1)->where('basic_id', $id)->update([
            'basic_company' => $request->basic_company,
            'basic_title' => $request->basic_title,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        // Basic Logo Image Upload
        if ($request->hasFile('basic_logo')) {
            $image = $request->file('basic_logo');
            $imageName = 'basic' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('uploads/basic_setting/' . $imageName);
            BasicSetting::where('basic_id', $id)->update([
                'basic_logo' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        // Basic Footer Logo Image Upload
        if ($request->hasFile('basic_flogo')) {
            $image = $request->file('basic_flogo');
            $imageName = 'basicf' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('uploads/basic_setting/' . $imageName);
            BasicSetting::where('basic_id', $id)->update([
                'basic_flogo' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        // Basic Favicon Image Upload
        if ($request->hasFile('basic_favicon')) {
            $image = $request->file('basic_favicon');
            $imageName = 'basicfi' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(32, 32)->save('uploads/basic_setting/' . $imageName);
            BasicSetting::where('basic_id', $id)->update([
                'basic_favicon' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($update) {
            Session::flash('success', 'Basic Setting Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Basic Setting Update Failed!');
            return redirect()->back();
        }
    }
}
