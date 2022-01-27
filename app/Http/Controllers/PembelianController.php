<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use App\Models\Pembelian_produk;
use Illuminate\Http\Request;


class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelian = Pembelian::where('status', 1)->orWhere('status', 2)->orWhere('status', 3)->orderBy('status')->get();
        return view('pembelian.index', compact('pembelian'));
    }
}
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
