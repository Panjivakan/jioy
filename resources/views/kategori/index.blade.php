@extends('layouts.mainadmin')

@section('konten')
<h1>Kategori</h1>
<a href="{{ url('kategori/create') }}" class="btn btn-primary">Tambah</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Icon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategoris as $key=>$value)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $value->nama_kategori }}</td>
            <td>
                <a href="{{ asset('icon/'.$value->icon_kategori) }}" target="_blank" rel="noopener noreferrer">Lihat Gambar</a>
            </td>
            <td><a href="{{ url('kategori/'.$value->id.'/edit') }}" class="btn btn-warning">Edit</a>
                <form method="POST" action="{{ url('kategori/'.$value->id) }}" style="display: inline-block;">
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
