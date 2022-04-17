<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ExpenseCategory::where('expcate_status', 1)->orderBy('expcate_id', 'ASC')->get();
        return view('expense.category.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.category.create');
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
            'expcate_name' => ['required', 'string', 'max:255'],
            'expcate_code' => ['required', 'string', 'max:255'],
        ],[
            'expcate_name.required' => "Enter Your Name",
            'expcate_code.required' => "Select Code Category",
        ]);

        $creator = Auth::user()->id;
        $slug = 'EC' . uniqid();
        $insert = ExpenseCategory::insertGetId([
            'expcate_code' => $request->expcate_code,
            'expcate_name' => $request->expcate_name,
            'expcate_remarks' => $request->expcate_remarks,
            'expcate_creator' => $creator,
            'expcate_slug' => $slug,
            'expcate_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Expense Category Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Expense Category Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseCategory $expenseCategory, $slug)
    {
        $data = ExpenseCategory::where('expcate_status', 1)->where('expcate_slug', $slug)->firstOrFail();
        return view('expense.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'expcate_name' => ['required', 'string', 'max:255'],
            'expcate_code' => ['required', 'string', 'max:255'],
        ],[
            'expcate_name.required' => "Enter Your Name",
            'expcate_code.required' => "Select Code Category",
        ]);

        $editor = Auth::user()->id;
        $id = $request->expcate_id;
        $insert = ExpenseCategory::where('expcate_status', 1)
            ->where('expcate_slug', $slug)
            ->where('expcate_id', $id)
            ->update([
                'expcate_code' => $request->expcate_code,
                'expcate_name' => $request->expcate_name,
                'expcate_remarks' => $request->expcate_remarks,
                'expcate_creator' => $editor,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        if ($insert) {
            Session::flash('success', 'Expense Category Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Expense Category Updated Failed!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $id = $request['delete_data'];
        $delete = ExpenseCategory::where('expcate_id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Expense Category Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Expense Category Delete Failed!');
            return redirect()->back();
        }
    }
}
