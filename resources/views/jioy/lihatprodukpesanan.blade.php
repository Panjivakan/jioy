@extends('layouts.main')



@section('konten')

<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Harga</th>

      </tr>
    </thead>
    <tbody>
      @foreach($pembelian_produk as $key=>$value2)
      <tr>
        <th scope="row">{{ $key+1 }}</th>
        <td>{{ $value2->nama_produk }}</td>
        <td>{{ $value2->jumlah }}</td>
        <td>{{ $value2->subharga }}</td>

      </tr>
      @endforeach
      </tbody>
    </table>
    <b>Total Pesanan : Rp. {{ number_format($pembelian->total_pembelian) }}</b><br>
    <b>Ongkir : Rp. {{ number_format($pembelian->tarif) }}</b><br>
    <b>Total : Rp. {{ number_format($pembelian->total_pembelian + $pembelian->tarif) }}</b><br>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Back</a>
@endsection
