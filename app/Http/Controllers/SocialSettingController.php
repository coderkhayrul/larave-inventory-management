<?php

namespace App\Http\Controllers;

use App\Models\SocialSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class SocialSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SocialSetting::where('sm_status', 1)->where('sm_id' ,1)->firstOrFail();
        return view('social_setting', compact('data'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialSetting  $socialSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->sm_id;
        $update = SocialSetting::where('sm_id', 1)->where('sm_status', $id)->update([
            'sm_facebook' => $request->sm_facebook,
            'sm_twitter' => $request->sm_twitter,
            'sm_linkedin' => $request->sm_linkedin,
            'sm_dribbble' => $request->sm_dribbble,
            'sm_youtube' => $request->sm_youtube,
            'sm_slack' => $request->sm_slack,
            'sm_instagram' => $request->sm_instagram,
            'sm_behance' => $request->sm_behance,
            'sm_google' => $request->sm_google,
            'sm_raddit' => $request->sm_raddit,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($update) {
            Session::flash('success', 'Social Features Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Social Features Updated Failed!');
            return redirect()->back();
        }
    }
}
