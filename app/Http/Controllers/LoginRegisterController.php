<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\User;
use App\Models\Banner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register_index()
    {
        $units = Unit::orderBy('id', 'desc')->get();
        $banner = Banner::where('type','Login-Regist')->where('status','Aktif')->get()->first();
        return view('login_register/register', [
            'units' => $units,
            'title' => 'Register',
            'banner' => $banner

        ]);
    }
    public function register_create(Request $request)
    {
        // Password Confirmation
        if ($request['password'] != $request['confirm_password']) {
            return back()->withErrors([
                'confirm_password' => ['The provided confirmation does not match the provided password']
            ]);
        }

        // Validate
        $request->validate(
            [
                'nama_depan' => 'required',
                'nama_belakang' => 'required',
                'username' => 'required|min:5|max:20|unique:users,username',
                'username' => 'required|min:5|max:20|unique:users,username',
                'unit_id' => 'required',
                'email' => 'required|email:rfc,dns',
                'password' => 'required',
                'confirm_password' => 'required'
            ],
            [
                'nama_depan.required' => 'Nama depan harus diisi',
                'nama_belakang.required' => 'Nama belakang harus diisi',

                'username.required' => 'Username harus diisi',
                'username.min' => 'Username harus berisi minimal 5 karakter',
                'username.max' => 'Username harus berisi maksimal 20 karakter',
                'username.unique' => 'Username sudah digunakan',

                'unit_id.required' => 'Unit harus diisi',
            ]
        );

        $user = new User([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'username' => $request->username,
            'unit_id' => $request->unit_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        
        return redirect('/login');
        
    }

    public function login_index()
    {
        $banner = Banner::where('type','Login-Regist')->where('status','Aktif')->get()->first();
        return view('login_register/login', [
            'title' => 'Login',
            'banner' => $banner

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login_create(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        // if not succeed
        return back()->withErrors([
            'username' => ['Login failed']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
