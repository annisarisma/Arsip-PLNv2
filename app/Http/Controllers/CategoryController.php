<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Unit;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('category/category', [
            'title' => 'Kategori',
            'category' => Category::all(),
            'chip' => 'Semua Bidang'
        ]);
    }

    // Filter per Unit //
    public function show_admkeu() {
        return view('category/category', [
            'title' => 'Kategori',
            'category' => Category::getCategoryByUnit('1'),
            'chip' => 'ADM & KEUANGAN'
        ]);
    }
    public function show_pp() {
        return view('category/category', [
            'title' => 'Kategori',
            'category' => Category::getCategoryByUnit('2'),
            'chip' => 'PERIZINAN & PERTANAHAN'
        ]);
    }
    public function show_k3l() {
        return view('category/category', [
            'title' => 'Kategori',
            'category' => Category::getCategoryByUnit('3'),
            'chip' => 'K3L'
        ]);
    }
    public function show_teknik() {
        return view('category/category', [
            'title' => 'Kategori',
            'category' => Category::getCategoryByUnit('4'),
            'chip' => 'TEKNIK'
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
        return view('category/category_create', [
            'title' => 'Kategori',
            'unit' => Unit::all()
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
        $category = new Category([
            'unit_id' => $request->unit_id,
            'category_name' => $request->category_name,

        ]);
        $category->save();

        //Match Redirect with Unit ID
        if($request->unit_id == '1'){
            return redirect('/category/adm-keuangan');
        }
        if($request->unit_id == '2'){
            return redirect('/category/perizinan-pertanahan');
        }
        if($request->unit_id == '3'){
            return redirect('/category/k3l');
        }
        if($request->unit_id == '4'){
            return redirect('/category/teknik');
        }
        else{
            return redirect('/category');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('/category/category_edit', [
            'category' => Category::getCategoryById($id),
            'unit' => Unit::all(),
            'title' => 'Kategori',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category=Category::findOrFail($id);

        $category->update([
            'unit_id' => $request->unit_id,
            'category_name' => $request->category_name,
        ]);

        //Match Redirect with Unit ID
        if($category->unit_id == '1'){
            return redirect('/category/adm-keuangan');
        }
        if($category->unit_id == '2'){
            return redirect('/category/perizinan-pertanahan');
        }
        if($category->unit_id == '3'){
            return redirect('/category/k3l');
        }
        if($category->unit_id == '4'){
            return redirect('/category/teknik');
        }
        else{
            return redirect('/category');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        //Match Redirect with Unit ID
        if($category->unit_id == '1'){
            return redirect('/category/adm-keuangan');
        }
        if($category->unit_id == '2'){
            return redirect('/category/perizinan-pertanahan');
        }
        if($category->unit_id == '3'){
            return redirect('/category/k3l');
        }
        if($category->unit_id == '4'){
            return redirect('/category/teknik');
        }
        else{
            return redirect('/category');
        }
    }

}
