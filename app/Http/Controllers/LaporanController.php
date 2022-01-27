<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use Illuminate\Http\Request;
use App\Models\Pembelian_produk;
use Carbon\Carbon;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelian_produk = Pembelian_produk::all();
        return view('laporan.index', compact('pembelian_produk'));
    }
    public function cetak()
    {
        $pembelian_produk = Pembelian_produk::all();
        return view('laporan.cetak', compact('pembelian_produk'));
    }
    public function filterdate(Request $request)
    {
        $dari = Carbon::createFromFormat('Y-m-d', $request->tgldari)->startOfDay();
        $ke = Carbon::createFromFormat('Y-m-d', $request->tglke)->endOfDay();

        $pembelian_produk = Pembelian_produk::whereBetween('created_at', [$dari, $ke])->get();
        return view('laporan.index', compact('pembelian_produk'));
    }
    public function cetakbytanggal(Request $request)
    {
        $dari = Carbon::createFromFormat('Y-m-d', $request->tgldari)->startOfDay();
        $ke = Carbon::createFromFormat('Y-m-d', $request->tglke)->endOfDay();

        $pembelian_produk = Pembelian_produk::whereBetween('created_at', [$dari, $ke])->get();
        return view('laporan.cetakbytanggal', compact('pembelian_produk', 'request'));
    }
}
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
