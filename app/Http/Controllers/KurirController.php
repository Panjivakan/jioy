<?php

namespace App\Http\Controllers;

use App\Models\kurir;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kurir = kurir::all();
        return view('kurir.index', compact('kurir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new kurir;
        return view('kurir.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new kurir;
        $this->validate($request, [
            'daerah' => 'required',
            'tarif' => 'required'
        ]);
        $model->daerah = $request->daerah;
        $model->tarif = $request->tarif;
        $model->save();

        return redirect('kurir');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function show(kurir $kurir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = kurir::find($id);
        return view('kurir.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = kurir::find($id);
        $this->validate($request, [
            'daerah' => 'required',
            'tarif' => 'required'
        ]);
        $model->daerah = $request->daerah;
        $model->tarif = $request->tarif;
        $model->save();

        return redirect('kurir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kurir  $kurir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = kurir::findorfail($id);
        $hapus->delete();
        return redirect('kurir');
    }
}
