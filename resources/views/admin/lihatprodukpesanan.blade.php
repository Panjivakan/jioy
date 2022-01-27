@extends('layouts.mainadmin')



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
    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Back</a>
    @if ( $status == 1)
    <form method="POST" action="{{ url('ubahstatus1') }}/{{ $id }}">
        @csrf
        <button class="btn btn-sm btn-warning">Proses Pesanan</button>
    </form>
    @elseif ($status == 2)
    <form method="POST" action="{{ url('ubahstatus2') }}/{{ $id }}">
        @csrf
        <button class="btn btn-sm btn-success">Kirim Pesanan</button>
    </form>
    @else
        <button class="btn btn-sm btn-info">Pesanan Selesai</button>
    @endif
@endsection
