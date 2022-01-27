@extends('layouts.mainadmin')

@section('konten')
<h1>Produk</h1>
    <a href="{{ url('produk/create') }}" class="btn btn-primary">Tambah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Foto</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produks as $key=>$value)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->kategori->nama_kategori }}</td>
                <td>{{ $value->harga }}</td>
                <td>{{ $value->stok }}</td>
                <td>
                    <a href="{{ asset('img/'.$value->foto) }}" target="_blank" rel="noopener noreferrer">Lihat Gambar</a>
                </td>
                <td>{{ $value->deskripsi }}</td>
                <td><a href="{{ url('produk/'.$value->id.'/edit') }}" class="btn btn-warning">Edit</a>
                    <form method="POST" action="{{ url('produk/'.$value->id) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
