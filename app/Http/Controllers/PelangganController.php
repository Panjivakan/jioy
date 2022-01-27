<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        // dd($produks);
        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Pelanggan();
        return view('register', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'nama'      => 'required|string|max:25',
                'email'     => 'required|email:dns|unique:pelanggans,email',
                'telepon'   => 'required|numeric|min:10',
                'password'  => 'required|alpha_num|min:6',
                'alamat'    => 'required|string'
            ]
        );

        // $dataArray = array(
        //     "nama"     => $request->nama,
        //     "email"    => $request->email,
        //     "telepon"  => $request->telepon,
        //     "password" => $request->password,
        //     "alamat"  => $request->alamat

        // );
        $validateData['password'] = Hash::make($validateData['password']);

        $pelanggan = Pelanggan::create($validateData);
        if (!is_null($pelanggan)) {
            return back()->with("success", "Berhasil! Data Berhasil disimpan");
        } else {
            return back()->with("failed", "Gagal! Data Berhasil disimpan");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Pelanggan::findorfail($id);
        $hapus->delete();
        return redirect('pelanggan');
    }
}
