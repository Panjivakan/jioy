<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::all();
        // dd($produks);
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $model = new produk;
        $kategori = kategori::all();
        return view('produk.create', compact('model', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new produk;
        $this->validate($request, [
            'nama' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'deskripsi' => 'required'
        ]);
        $nm = $request->foto;
        // membuat nama foto menjadi random berdasarkan waktu
        $namafile = time() . rand(100, 999) . "." . $nm->getClientOriginalName();
        $model->nama = $request->nama;
        $model->kategori_id = $request->kategori_id;
        $model->harga = $request->harga;
        $model->stok = $request->stok;
        $model->foto = $request->foto = $namafile;
        $nm->move(public_path() . '/img', $namafile);
        $model->deskripsi = $request->deskripsi;
        $model->save();

        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = produk::find($id);
        $kategori = kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = produk::findorfail($id);
        $this->validate($request, [
            'nama' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'deskripsi' => 'required'
        ]);
        $model->nama = $request->nama;
        $model->kategori_id = $request->kategori_id;
        $model->harga = $request->harga;
        $model->stok = $request->stok;
        $nm = $request->foto;
        if (!empty($nm)) {
            // membuat nama foto menjadi random berdasarkan waktu
            $namafile = time() . rand(100, 999) . "." . $nm->getClientOriginalName();
            $model->foto = $request->foto = $namafile;
            $nm->move(public_path() . '/img', $namafile);
        }
        $model->deskripsi = $request->deskripsi;
        $model->update();

        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // @dd('i am here');
        $hapus = produk::findorfail($id);
        $foto = public_path('img/') . $hapus->foto;
        // dd($foto);
        if (file_exists($foto)) {
            @unlink($foto);
        }
        $hapus->delete();
        return redirect('produk');
    }
}
