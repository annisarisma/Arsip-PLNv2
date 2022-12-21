<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $archives = Archive::where('user_id', $user->id)->get();

        return view('user/user', [
            'user' => $user,
            'archives' => $archives,
            'title' => 'User'
        ]);
    }

    public function manage_banner()
    {
        return view('user/kelola_banner', [
            'title' => 'User'
        ]);
    }

    public function manage_banner_create()
    {
        return view('user/kelola_banner_create', [
            'title' => 'User'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('user/user_edit', [
            'user' => $user,
            'title' => 'User'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update_profile(Request $request, User $user)
    {
        // Validation

        $request->validate(
            [
                'nama_depan' => 'required',
                'nama_belakang' => 'required',
                'email' => 'required',
                'username' => 'required|unique:users,username',
            ],
            [
                'nama_depan.required' => 'Nama depan harus diisi',
                'nama_belakang.required' => 'Nama belakang harus diisi',
                'email.required' => 'Email harus diisi',
                'username.required' => 'Username harus diisi',
                'username.unique' => 'Username telah digunakan',

            ]
        );

        $user->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'username' => $request->username
        ]);

        return redirect('/user/edit-profile')
                ->with('success', 'Profile berhasil diubah');
    }

    public function update_password(Request $request, User $user)
    {
        // Password Confirmation
        if ($request['new_password'] != $request['new_password_confirm']) {
            return back()->withErrors([
                'new_password_confirm' => ['The provided confirmation does not match the provided password']
            ]);
        }

        $request->validate(
            [
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => 'required',
            ],
            [
                'current_password.required' => 'Password harus diisi',
                'new_password' => 'Password harus diisi'
            ]
        );

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect('/user/edit-profile')
                ->with('success', 'Password berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
