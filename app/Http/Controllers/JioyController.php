<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\produk;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Pembelian_produk;
use Alert;
// use RealRashid\SweetAlert\Facades\Alert;

use App\Models\kurir;
// use app\storage\Session;




class JioyController extends Controller
{
    protected function index()
    {
        $produks = Produk::all();
        $kategoris = kategori::all();

        // dd($produks);
        return view('jioy.welcome', compact('produks', 'kategoris'));
    }
    protected function filterkategori($id)
    {
        $produks = Produk::where('kategori_id', $id)->get();
        $kategoris = kategori::all();

        // dd($produks);
        return view('jioy.welcome', compact('produks', 'kategoris'));
    }
    protected function cari(Request $request)
    {
        $keyword = $request->cari;
        $produks = Produk::where('nama', 'like', "%" . $keyword . "%")->get();
        $kategoris = kategori::all();

        // dd($produks);
        return view('jioy.welcome', compact('produks', 'kategoris'));
    }
    protected function keranjang($id, Request $request)
    {

        $produk = Produk::where('id', $id)->first();

        $cekp = Pembelian::where('pelanggan_id', Auth::guard('pelanggan')->user()->id)->where('status', 0)->first();
        if (empty($cekp)) {
            $pembelian = new Pembelian;
            $pembelian->pelanggan_id = Auth::guard('pelanggan')->user()->id;
            $pembelian->kurir_id = 0;
            $pembelian->daerah = 0;
            $pembelian->tarif = 0;
            $pembelian->alamat = 0;
            $pembelian->total_pembelian = 0;
            $pembelian->status = 0;
            $pembelian->save();
        }


        $pembelian_baru = Pembelian::Where('pelanggan_id', Auth::guard('pelanggan')->user()->id)->where('status', 0)->first();

        // cek pesanan jika sudah ada
        $cekpp = Pembelian_produk::where('produk_id', $produk->id)->where('pembelian_id', $pembelian_baru->id)->first();
        if (empty($cekpp)) {
            // dd('kosong');
            $pembelian_produk = new Pembelian_produk;
            $pembelian_produk->pembelian_id = $pembelian_baru->id;
            $pembelian_produk->pelanggan_id = Auth::guard('pelanggan')->user()->id;
            $pembelian_produk->produk_id = $id;
            $pembelian_produk->nama_produk = $produk->nama;
            $pembelian_produk->foto_produk = $produk->foto;
            $pembelian_produk->jumlah = $request->jumlah;
            $pembelian_produk->subharga = $produk->harga * $request->jumlah;
            $pembelian_produk->harga = $produk->harga;
            $pembelian_produk->save();
        } else {
            // dd('ada');
            $pembelian_produk = Pembelian_produk::where('produk_id', $produk->id)->where('pembelian_id', $pembelian_baru->id)->first();
            $pembelian_produk->jumlah = $request->jumlah;

            $subharga_pembelian = $produk->harga * 1;
            $pembelian_produk->subharga = $pembelian_produk->subharga + $subharga_pembelian;
            $pembelian_produk->update();
        }
        // dd($pembelian_produk->subharga);
        $pembelian = Pembelian::where('pelanggan_id', Auth::guard('pelanggan')->user()->id)->where('status', 0)->first();
        $pembelian->total_pembelian = $pembelian->total_pembelian + $produk->harga * $request->jumlah;
        $pembelian->update();

        // Alert::info('Info Title', 'Info Message');
        // toast('Your Post as been submited!', 'success');

        alert()->success('Berhasil', 'Produk Sudah Ditambahkan ke keranjang');

        return redirect('/');
    }
    protected function profil()
    {
        $pelanggans = Pelanggan::all();
        $pembelian_produk = 0;
        $pembelian_produk1 = 0;
        $pembelian_produk2 = 0;
        $pembelian_produk3 = 0;
        $id_pel = Auth::guard('pelanggan')->user()->id;
        $pembelian = Pembelian::where('pelanggan_id', $id_pel)->where('status', 1)->get();
        $pembelian2 = Pembelian::where('pelanggan_id', $id_pel)->where('status', 2)->get();
        $pembelian3 = Pembelian::where('pelanggan_id', $id_pel)->where('status', 3)->get();


        // $pembelians = Pembelian::where('pelanggan_id', Auth::guard('pelanggan')->user()->id)->where('status', 0)->first();
        // if (!empty($pembelian)) {
        //     $pembelian_produk = Pembelian_produk::where('pembelian_id', $pembelians->id)->get();
        // }
        // $pembelian1 = Pembelian::where('pelanggan_id', Auth::guard('pelanggan')->user()->id)->where('status', 1)->first();
        // if (!empty($pembelian1)) {
        //     $pembelian_produk1 = Pembelian_produk::where('pembelian_id', $pembelian1->id)->get();
        // }
        // $pembelian2 = Pembelian::where('pelanggan_id', Auth::guard('pelanggan')->user()->id)->where('status', 2)->first();
        // if (!empty($pembelian2)) {
        //     $pembelian_produk2 = Pembelian_produk::where('pembelian_id', $pembelian2->id)->get();
        // }
        // $pembelian3 = Pembelian::where('pelanggan_id', Auth::guard('pelanggan')->user()->id)->where('status', 3)->first();
        // if (!empty($pembelian3)) {
        //     $pembelian_produk3 = Pembelian_produk::where('pembelian_id', $pembelian3->id)->get();
        // }
        // dd($pembelian);
        return view('jioy.profil', compact('pelanggans', 'pembelian', 'pembelian2', 'pembelian3'));
    }
    protected function pembelian($id)
    {
        $pelanggans = Pelanggan::all();
        return view('jioy.profil', compact('pelanggans'));
    }

    protected function produkpesanan($id)
    {
        $pembelian_produk = Pembelian_produk::where('pembelian_id', $id)->get();
        return view('jioy.lihatprodukpesanan', compact('pembelian_produk'));
    }

    protected function adminprodukpesanan($id, $status)
    {
        $pembelian_produk = Pembelian_produk::where('pembelian_id', $id)->get();
        return view('admin.lihatprodukpesanan', compact('pembelian_produk', 'status', 'id'));
    }

    protected function checkout()
    {
        $pembelian = Pembelian::where('pelanggan_id', Auth::guard('pelanggan')->user()->id)->where('status', 0)->first();
        if (!empty($pembelian)) {
            $pembelian = Pembelian::where('pelanggan_id', Auth::guard('pelanggan')->user()->id)->where('status', 0)->first();
            $pembelian_produk = Pembelian_produk::where('pembelian_id', $pembelian->id)->get();
            $kurirs = Kurir::all();
            return view('jioy.checkout', compact('pembelian', 'pembelian_produk', 'kurirs'));
        } else {
            alert()->warning('Kosong', 'Silakan Pilih Produk');
            return redirect('/');
        }
    }
    protected function delete($id)
    {
        $pembelian_produk = Pembelian_produk::where('id', $id)->first();
        $pembelian = Pembelian::where('id', $pembelian_produk->pembelian_id)->first();
        $pembelian->total_pembelian = $pembelian->total_pembelian - $pembelian_produk->subharga;
        $pembelian->update();

        $pembelian_produk->delete();
        alert()->success('Berhasil', 'Produk Sudah Dihapus');
        return redirect('checkout');
        // return view('jioy.checkout', compact('pembelian_produk'));
    }
    protected function detail($id)
    {
        $produk = Produk::where('id', $id)->first();
        return view('jioy.detail', compact('produk'));
    }
    protected function konfirmasi(Request $request)
    {
        $kurir = Kurir::where('id', $request->kurir_id)->first();
        if (empty($kurir)) {
            alert()->error('Gagal', 'Silakan Pilih Daerah Pengiriman');
            return redirect('checkout');
        }
        $pembelian = Pembelian::where('pelanggan_id', Auth::guard('pelanggan')->user()->id)->where('status', 0)->first();
        $pembelian_id = $pembelian->id;
        $pembelian_produks = Pembelian_produk::where('pembelian_id', $pembelian_id)->get();

        foreach ($pembelian_produks as $pembelian_produks) {
            $produk = Produk::where('id', $pembelian_produks->produk_id)->first();

            if ($produk->stok < $pembelian_produks->jumlah) {
                alert()->error('Gagal', 'Pesanan Anda Melebihi Stok');
                return redirect('/');
            }
        }

        $pembelian->kurir_id = $kurir->id;
        $pembelian->daerah = $kurir->daerah;
        $pembelian->tarif = $kurir->tarif;
        $pembelian->alamat = $request->alamat;
        $pembelian->status = 1;
        $pembelian->update();

        $pembelian_produk = Pembelian_produk::where('pembelian_id', $pembelian_id)->get();

        foreach ($pembelian_produk as $pembelian_produk) {
            $produk = Produk::where('id', $pembelian_produk->produk_id)->first();
            $produk->stok = $produk->stok - $pembelian_produk->jumlah;
            $produk->update();

            alert()->success('Berhasil', 'Pesanan Anda Segera di Proses');
            return redirect('/');
        }
    }
    protected function ubahstatus1($id)
    {
        $pembelian = Pembelian::where('id', $id)->where('status', 1)->first();
        $pembelian->status = 2;
        $pembelian->update();

        alert()->success('Berhasil', 'Pesanan Anda Segera di Proses');
        return redirect('pembelian');
    }
    protected function ubahstatus2($id)
    {
        $pembelian = Pembelian::where('id', $id)->where('status', 2)->first();
        $pembelian->status = 3;
        $pembelian->update();

        alert()->success('Berhasil', 'Pesanan Anda Segera di Proses');
        return redirect('pembelian');
    }
}
