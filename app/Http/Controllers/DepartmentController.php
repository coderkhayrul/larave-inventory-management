<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Department::where('department_status', 1)->orderBy('department_id' , 'ASC')->get();
        return view('department.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
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
            'department_name' => ['required', 'string', 'max:255'],
        ],[
            'department_name.required' => "Enter Your Name",
        ]);

        $insert = Department::insertGetId([
            'department_name' => $request->department_name,
            'department_remarks' => $request->department_remarks,
            'department_slug' => Str::slug($request->department_name, '-'),
            'department_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Department Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Department Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = Department::where('department_status', 1)->where('department_slug', $slug)->firstOrFail();
        return view('department.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'department_name' => ['required', 'string', 'max:255'],
        ],[
            'department_name.required' => "Enter Your Name",
        ]);
        $id = $request->department_id;
        $update = Department::where('department_status', 1)->where('department_slug', $slug)->where('department_id', $id)->update([
            'department_name' => $request->department_name,
            'department_remarks' => $request->department_remarks,
            'department_slug' => Str::slug($request->department_name, '-'),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Department Updated successfully');
            return redirect()->route('department.index');
        } else {
            Session::flash('error', 'Department Updated Failed!');
            return redirect()->route('department.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $id = $request['delete_data'];
        $delete = Department::where('department_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Department Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Department Delete Failed!');
            return redirect()->back();
        }
    }
}
