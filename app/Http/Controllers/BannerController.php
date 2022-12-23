<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user/kelola_banner', [
            'title' => 'Kelola Banner',
            'banner_1' => Banner::where('type', 'Dashboard')->get(),
            'banner_2' => Banner::where('type', 'Login-Regist')->get(),
            'banner' => Banner::where('type','Dashboard')->where('status','Aktif')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/kelola_banner_create', [
            'title' => 'Tambah Banner'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate(
            [
                'type' => 'required|not_regex:/^(Pilih)$/i',
                'title' => 'required',
                'image' => 'required',
            ],
            [
                'title.required' => 'Judul Banner harus diisi',
                'type.not_regex' => 'Tipe Banner harus diisi',
                'image.required' => 'Harus ada gambar yang diupload!',
            ]
        );

        if($request->hasFile("image")){
            $file=$request->file("image");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/Banner"), $imageName);
            $banner = new Banner([
                'title' => $request->title,
                'type' => $request->type,
                'description' => $request->description,
                'image' => $imageName

            ]);
        $banner->save();
        }
        return redirect('/user/manage-banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner, $id)
    {
        return view('/user/kelola_banner_edit', [
            'banner' => Banner::find($id),
            'title' => 'Tambah Banner'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner, $id)
    {
        $banner = Banner::find($id);

        // Validate
        $request->validate(
            [
                'type' => 'required|not_regex:/^(Pilih)$/i',
                'title' => 'required',
                'image' => 'required',
            ],
            [
                'title.required' => 'Judul Banner harus diisi',
                'type.not_regex' => 'Tipe Banner harus diisi',
                'image.required' => 'Harus ada gambar yang diupload!',
            ]
        );

        if($request->hasFile("image")){
            $file=$request->file("image");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/Banner"), $imageName);
            $banner->update([
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'image' => $imageName
        ]);
        }
        else{
            $banner->update([
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
        ]);
        }
        return redirect('/user/manage-banner');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner, $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return redirect('/user/manage-banner');
    }

    public function update_status(Request $request, $id)
    {

        if ($request->status_tidak_aktif){
            $banner = Banner::find($id);
            $banner->update([
                'status' => $request->status_tidak_aktif,
        ]);
        }
        else{
            $banner = Banner::find($request->id_banner_aktif);
            $banner->update([
                'status' => $request->status_aktif,
        ]);
        }

        
        return redirect('/user/manage-banner');

    }
}
