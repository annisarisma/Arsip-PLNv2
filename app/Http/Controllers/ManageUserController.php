<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DeleteRequest;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datas = User::query();

        if($request->filled('unit')){
            $datas->where('unit_id', $request->unit);
        }
        if($request->filled('status')){
            $datas->where('status', $request->status);
        }
        if($request->filled('sort')){
            $datas->orderBy('updated_at', $request->sort);
        }

        // $datas = User::orderBy('id', 'desc')->get();
        $delete_requests = DeleteRequest::all();
        return view('manage_user/manage_user', [
            'no' => 1,
            'n_deleteRequest' => 1,
            'datas' => $datas->orderBy('id', 'desc')->get(),
            'delete_requests' => $delete_requests,
            'title' => 'Kelola Pengguna'
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
    public function manage_user_accept(Request $request, User $user)
    {
        $username = $user->username;
        $user->update([
            'status' => $request->status,
            'role' => $request->role,
        ]);

        return redirect('/manage-user')
            ->with('success', 'Permintaan user' . $username . ' telah disetujui');
    }

    public function manage_user_dennied(Request $request, User $user)
    {
        $username = $user->username;
        $user->update([
            'status' => $request->status,
        ]);

        return redirect('/manage-user')
            ->with('success', 'Permintaan user' . $username . ' telah ditolak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_user_destroy(User $user)
    {
        //
        $nama = $user->username;
        try {
            $user->delete();
            return back()
                ->with('success-destroy', 'User ' . $nama . ', berhasil di hapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()
                ->with('failed', 'User ' . $nama . ' gagal dihapus karena sedang digunakan dalam data lain');
        }
    }

    public function manage_request_destroy(DeleteRequest $delete_request)
    {
        //
        $nama = $delete_request->archive->archive_name;
        try {
            $delete_request->delete();
            return back()
                ->with('success', 'Berhasil menolak pengajuan hapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()
                ->with('failed', 'Gagal menerima pengajuan hapus arsip');
        }
    }

    public function manage_request_accept(Archive $accept_request)
    {
        //
        $nama = $accept_request->archive_name;
        try {
            $accept_request->delete();
            return back()
                ->with('success', 'Berhasil menerima pengajuan hapus, dan arsip "' . $nama . '", berhasil di hapus dari database');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()
                ->with('failed', 'Gagal menerima pengajuan hapus arsip');
        }
    }

    public function manage_request_accept_selected(Request $request)
    {
        // 
        foreach ($request->checkbox as $key => $value) {
            $archive = Archive::findOrFail($value);
            $nama = $archive->archive_name;
            $archive->delete();
        }
        return back()
            ->with('success', 'Berhasil menerima pengajuan hapus, dan arsip "' . $nama . '", berhasil di hapus dari database');

        // return $request->checkbox;
    }
}
