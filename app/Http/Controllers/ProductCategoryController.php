<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ProductCategory::where('pc_status', 1)->orderBy('pc_id', 'asc')->get();
        return view('product.category.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.category.create');
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
            'pc_name' => ['required', 'string', 'max:255'],
            'pc_parent' => ['required', 'string', 'max:255'],
        ],[
            'pc_name.required' => "Enter Your Name",
            'pc_parent.required' => "Select Parent Category",
        ]);

        $creator = Auth::user()->id;
        $insert = ProductCategory::insertGetId([
            'pc_name' => $request->pc_name,
            'pc_parent' => $request->pc_parent,
            'pc_slug' => Str::slug($request->pc_name, '-'),
            'pc_creator' => $creator,
            'pc_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        // Product Category Image Upload
        if ($request->hasFile('pc_image')) {
            $image = $request->file('pc_image');
            $imageName = 'pc' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('uploads/product/category/' . $imageName);

            ProductCategory::where('pc_id', $insert)->update([
                'pc_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }


        if ($insert) {
            Session::flash('success', 'Product Category Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Product Category Created Failed!');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = ProductCategory::where('pc_slug', $slug)->where('pc_status', 1)->firstOrFail();
        return view('product.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'pc_name' => ['required', 'string', 'max:255'],
        ], [
            'pc_name.required' => 'Enter Product Name',
        ]);
        $editor  = Auth::user()->id;
        $update = ProductCategory::where('pc_status', 1)->where('pc_slug', $slug)->update([
            'pc_name' => $request->pc_name,
            'pc_parent' => $request->pc_parent,
            'pc_editor' => $editor,
            'pc_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        // User Image Upload
        if ($request->hasFile('pc_image')) {
            $image = $request->file('pc_image');
            $imageName = 'PC' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('uploads/product/category/' . $imageName);

            ProductCategory::where('pc_slug', $slug)->update([
                'pc_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($update) {
            Session::flash('success', 'User Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'User Update Failed!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $id = $request['delete_data'];
        $delete = ProductCategory::where('pc_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Product Category Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Product Category Delete Failed!');
            return redirect()->back();
        }
    }
}
