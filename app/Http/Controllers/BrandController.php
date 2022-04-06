<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Brand::where('brand_status', 1)->orderBy('brand_id', 'asc')->get();
        return view('brand.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
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
            'brand_name' => ['required', 'string', 'max:255'],
        ],[
            'brand_name.required' => "Enter Your Name",
        ]);

        $creator = Auth::user()->id;
        $insert = Brand::insertGetId([
            'brand_name' => $request->brand_name,
            'brand_slug' => Str::slug($request->brand_name, '-'),
            'brand_creator' => $creator,
            'brand_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        // Product Category Image Upload
        if ($request->hasFile('brand_image')) {
            $image = $request->file('brand_image');
            $imageName = 'B' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('uploads/brand/' . $imageName);

            Brand::where('brand_id', $insert)->update([
                'brand_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }


        if ($insert) {
            Session::flash('success', 'Brand Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Brand Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = Brand::where('brand_status', 1)->where('brand_slug', $slug)->firstOrFail();
        return view('brand.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'brand_name' => ['required', 'string', 'max:255'],
        ],[
            'brand_name.required' => "Enter Your Name",
        ]);

        $editor  = Auth::user()->id;
        $update = Brand::where('brand_status', 1)->where('brand_slug', $slug)->update([
            'brand_name' => $request->brand_name,
            'brand_editor' => $editor,
            'brand_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        // User Image Upload
        if ($request->hasFile('brand_image')) {
            $image = $request->file('brand_image');
            $imageName = 'B' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('uploads/brand/' . $imageName);
            Brand::where('brand_slug', $slug)->update([
                'brand_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
        if ($update) {
            Session::flash('success', 'Brand Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Brand Update Failed!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $id = $request['delete_data'];
        $delete = Brand::where('brand_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Brand Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Brand Delete Failed!');
            return redirect()->back();
        }
    }
}
