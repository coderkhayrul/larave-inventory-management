<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allusers = User::where('status', 1)->get();
        return view('users.index', compact('allusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.add');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:50'],
            'role' => ['required'],
            'password' => ['required', 'confirmed'],
        ], [
            'name.required' => 'Please enter username',
            'email.required' => 'Please enter email',
            'phone.required' => 'Please enter phone number',
            'role.required' => 'Please Select Role',
            'password.required' => 'Please enter Password',
        ]);

        $slug = 'U' . uniqid();
        $insert = User::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'active' => $request->active,
            'slug' => $slug,
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        // User Image Upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = 'user' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 500)->save('uploads/user/' . $imageName);

            User::where('id', $insert)->update([
                'photo' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
        if ($insert) {
            Session::flash('success', 'User Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'User Created Failed!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($slug)
    // {

    //     return view('users.show');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = User::where('slug', $slug)->where('status', 1)->firstOrFail();
        return view('users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'role' => ['required'],
        ], [
            'name.required' => 'Please enter username',
            'phone.required' => 'Please enter phone number',
            'role.required' => 'Please Select Role',
        ]);

        $update = User::where('status', 1)->where('slug',$slug)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'active' => $request->active,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        // User Image Upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = 'user' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 500)->save('uploads/user/' . $imageName);

            User::where('slug', $slug)->update([
                'photo' => $imageName,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $slug)
    {
        $id = $request['delete_data'];
        $delete = User::where('id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'User Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'User Delete Failed!');
            return redirect()->back();
        }
    }
}
