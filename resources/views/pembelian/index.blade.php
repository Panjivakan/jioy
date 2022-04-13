@extends('layouts.mainadmin')

@section('konten')
<h1>Pembelian</h1>
<form method="get" action="{{ route('caripembelian') }}" class="d-flex mb-3">
    @csrf
  <input class="form-control me-1" name="cari" type="text" placeholder="Cari Kode Pembelian ..." aria-label="Search">
  <button class="btn" type="submit"><i class="bi bi-search"></i></button>
</form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pembelian</th>
                <th>Pelanggan</th>
                <th>Daerah</th>
                <th>Alamat</th>
                <th>Tanggal Pesanan</th>
                <th>Waktu Pesanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach($pembelian as $key=>$value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->id }}</td>
                <td>{{ $value->pelanggan->nama }}</td>
                <td>{{ $value->daerah }}</td>
                <td>{{ $value->alamat }}</td>
                <td>{{ $value->updated_at->format('d-m-Y H:i') }}</td>
                <td>{{ $value->updated_at->format('H:i') }}</td>

                <td>
                    @if ( $value->status == 1)
                    <a href="{{ url('adminprodukpesanan') }}/{{ $value->id }}/{{ $value->status }}" class="btn btn-sm btn-warning">Detail</a>
                    {{-- <form method="POST" action="{{ url('ubahstatus1') }}/{{ $value->pembelian_id }}">
                        @csrf
                        <button class="btn btn-sm btn-warning">Proses Pesanan</button>
                    </form> --}}
                    @elseif ($value->status == 2)
                    <a href="{{ url('adminprodukpesanan') }}/{{ $value->id }}/{{ $value->status }}" class="btn btn-sm btn-success">Detail</a>

                    {{-- <form method="POST" action="{{ url('ubahstatus2') }}/{{ $value->pembelian_id }}">
                        @csrf
                        <button class="btn btn-sm btn-success">Kirim Pesanan</button>
                    </form> --}}
                    @else
                    <a href="{{ url('adminprodukpesanan') }}/{{ $value->id }}/{{ $value->status }}" class="btn btn-sm btn-info">Detail</a>

                        {{-- <button class="btn btn-sm btn-info">Pesanan Selesai</button> --}}
                    @endif
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
