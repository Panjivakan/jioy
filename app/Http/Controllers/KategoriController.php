<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new kategori;
        return view('kategori.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new kategori;
        $this->validate($request, [
            'nama_kategori' => 'required',
            'icon_kategori' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);
        $nm = $request->icon_kategori;
        // membuat nama foto menjadi random berdasarkan waktu
        $namafile = time() . rand(100, 999) . "." . $nm->getClientOriginalName();
        $model->nama_kategori = $request->nama_kategori;
        $model->icon_kategori = $request->icon_kategori = $namafile;
        $nm->move(public_path() . '/icon', $namafile);
        $model->save();

        return redirect('kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = kategori::find($id);
        return view('kategori.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = kategori::findorfail($id);
        $this->validate($request, [
            'nama_kategori' => 'required',
            'icon_kategori' => 'image|mimes:jpg,png,jpeg,gif,svg'
        ]);
        $model->nama_kategori = $request->nama_kategori;
        $nm = $request->icon_kategori;
        // dd($model->icon_kategori);
        if (!empty($nm)) {
            // membuat nama foto menjadi random berdasarkan waktu
            $namafile = time() . rand(100, 999) . "." . $nm->getClientOriginalName();
            $model->icon_kategori = $request->icon_kategori = $namafile;
            $nm->move(public_path() . '/icon', $namafile);
        }
        $model->save();

        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = kategori::findorfail($id);
        $icon = public_path('icon/') . $hapus->icon;
        // dd($foto);
        if (file_exists($icon)) {
            @unlink($icon);
        }
        $hapus->delete();
        return redirect('kategori');
    }
}
