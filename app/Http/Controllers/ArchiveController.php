<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Files;
use App\Models\Temporary;
use App\Models\DeleteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function list_semua()
    {
        return view('archive/semua', [
            
            'title' => 'Semua Bidang',  
            'archive' => Archive::all(),

        ]);
    }
    public function list_adm_keuangan()
    {
        if (Session::has('filename')) {
            Session::remove('filename');
        }
        return view('archive/perbidang', [
            'title' => 'ADM & Keuangan',
            'archive' => Archive::getArchiveByUnit('1')
        ]);
    }

    public function list_perizinan_pertanahan()
    {
        if (Session::has('filename')) {
            Session::remove('filename');
        }
        return view('archive/perbidang', [
            'title' => 'Perizinan & Pertanahan',
            'archive' => Archive::getArchiveByUnit('2')
        ]);
    }

    public function list_k3l()
    {
        if (Session::has('filename')) {
            Session::remove('filename');
        }
        return view('archive/perbidang', [
            'title' => 'K3L',
            'archive' => Archive::getArchiveByUnit('3')
        ]);
    }

    public function list_teknik()
    {
        if (Session::has('filename')) {
            Session::remove('filename');
        }
        return view('archive/perbidang', [
            'title' => 'Teknik',
            'archive' => Archive::getArchiveByUnit('4')
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $id)
    {
        return view('archive/perbidang_create', [
            'title' => 'ADM & Keuangan',
            'unit' => Unit::getUnitById($id),
            'category' => Category::getCategoryByUnit($id),
        ]);
    }

    /**
     * Store a newly created resource in sArchive
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate(
            [
                'archive_name' => 'required|unique:archives,archive_name|regex:/^[\w-]*$/',
                'category_id' => 'required|not_regex:/^(Pilih)$/i',
                'description' => 'required'
            ],
            [
                'archive_name.required' => 'Nama Arsip harus diisi',
                'archive_name.unique' => 'Arsip dengan nama ini sudah ada',
                'archive_name.regex' => 'Jangan gunakan simbol pada penulisan arsip',
                'category_id.not_regex' => 'Kategori harus diisi',
                'description.required' => 'Deskripsi harus diisi',
            ]
        );

        $archive = new Archive([
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'archive_name' => $request->archive_name,
            'description' => $request->description,
            'completeness_status' => $request->gridRadios,
            'additional_info' => $request->additional_info,
        ]);
        $archive->save();
        $id=$archive->id;

        if(Session::has('filename')){
            $namefile = Session::get('filename');
            for ($i = 0; $i < count($namefile); $i++) {
                $temporary = Temporary::where('file_name', $namefile[$i])->first();

                if ($temporary) { //if exist

                        Files::create([
                            'archive_id'=>$id,
                            'file_name' => $namefile[$i],
                        ]);

                        //hapus file and folder temporary
                        $path = storage_path() . '/app/files/tmp/'. $temporary->file_name;
                        if (File::exists($path)) {

                            Storage::move('files/tmp/'.$temporary->file_name, 'files/'.$temporary->file_name);

                            File::delete($path);

                            //delete record in temporary table
                            $temporary->delete();
                        }
                }
            }
            Session::remove('filename');
        }

        //Match Redirect with Unit ID
        if($request->unit_id == '1'){
            return redirect('/archive/adm-keuangan');
        }
        if($request->unit_id == '2'){
            return redirect('/archive/perizinan-pertanahan');
        }
        if($request->unit_id == '3'){
            return redirect('/archive/k3l');
        }
        if($request->unit_id == '4'){
            return redirect('/archive/teknik');
        }
        else{
            return redirect('/archive');
        }
    }

    public function store_temp(Request $request)
    {
            $file=$request->file("file");
            $fileName=$file->getClientOriginalName();
            $file->storeAs('files/tmp/', $fileName);
            
            Temporary::create([
                'file_name' => $fileName
            ]);

            Session::push('filename', $fileName); //save session filename
    
            return $fileName;
    }
    public function destroy_temp(Request $request)
    {
        $db = Temporary::where('file_name', $request->file_name)->first();
        
        if($db){
            $path = storage_path() . '/app/files/tmp/' . $db->file_name;
            if (File::exists($path)) {
                File::delete($path);

                //delete record in table temporaryImage
                Temporary::where([
                    'file_name' => $db->file_name
                ])->delete();

                return 'success';
            }

            else {
                return 'not found';
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show(Archive $archive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $unit_id)
    {
        return view('/archive/perbidang_edit', [
            'archive' => Archive::getArchiveById($id),
            'category' => Category::getCategoryByUnit($unit_id),
            'files' => Files::getFilesByArchive($id),
            'title' => 'Edit Arsip',
        ]);
    }

    public function edit_file(Request $request)
    {
        $file = Files::where('archive_id', $request->archive_id)->get();
        return response()->json([
            'file'=>$file,
            'request' =>$request->archive_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archive $archive, $id)
    {
        $archive=Archive::findOrFail($id);

        $archive->update([
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'archive_name' => $request->archive_name,
            'description' => $request->description,
            'completeness_status' => $request->gridRadios,
            'additional_info' => $request->additional_info,
        ]);

        $id=$archive->id;

        if(Session::has('filename')){
            $namefile = Session::get('filename');
            for ($i = 0; $i < count($namefile); $i++) {
                $temporary = Temporary::where('file_name', $namefile[$i])->first();

                if ($temporary) { //if exist

                        Files::create([
                            'archive_id'=>$id,
                            'file_name' => $namefile[$i],
                        ]);

                        //hapus file and folder temporary
                        $path = storage_path() . '/app/files/tmp/'. $temporary->file_name;
                        if (File::exists($path)) {

                            Storage::move('files/tmp/'.$temporary->file_name, 'files/'.$temporary->file_name);

                            File::delete($path);

                            //delete record in temporary table
                            $temporary->delete();
                        }
                }
            }
            Session::remove('filename');
        }


        //Match Redirect with Unit ID
        if($request->unit_id == '1'){
            return redirect('/archive/adm-keuangan');
        }
        if($request->unit_id == '2'){
            return redirect('/archive/perizinan-pertanahan');
        }
        if($request->unit_id == '3'){
            return redirect('/archive/k3l');
        }
        if($request->unit_id == '4'){
            return redirect('/archive/teknik');
        }
        else{
            return redirect('/archive');
        }
    }

    public function destroy_file($id)
    {
        Files::destroy($id);
  
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $archive = Archive::findOrFail($id);
        $archive->delete();

        //Match Redirect with Unit ID
        if($archive->unit_id == '1'){
            return redirect('/archive/adm-keuangan');
        }
        if($archive->unit_id == '2'){
            return redirect('/archive/perizinan-pertanahan');
        }
        if($archive->unit_id == '3'){
            return redirect('/archive/k3l');
        }
        if($archive->unit_id == '4'){
            return redirect('/archive/teknik');
        }
        else{
            return redirect('/archive');
        }
    }

    public function request_delete(Request $request)
    {
        // Validate
        $request->validate(
            [
                'reason' => 'required',
            ],
            [
                'reason.required' => 'Alasan hapus harus diisi',
            ]
        );

        $deleteRequest = new DeleteRequest([
            'archive_id' => $request->archive_id,
            'user_id' => $request->user_id,
            'reason' => $request->reason
        ]);

        $deleteRequest->save();

        $user = Auth::user();

        //Match Redirect with Unit ID
        if($user->unit_id == '1'){
            return redirect('/archive/adm-keuangan');
        }
        if($user->unit_id == '2'){
            return redirect('/archive/perizinan-pertanahan');
        }
        if($user->unit_id == '3'){
            return redirect('/archive/k3l');
        }
        if($user->unit_id == '4'){
            return redirect('/archive/teknik');
        }
        else{
            return redirect('/archive');
        }
    }
}
