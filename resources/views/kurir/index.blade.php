@extends('layouts.mainadmin')

@section('konten')
<h1>Pengiriman</h1>
<a href="{{ url('kurir/create') }}" class="btn btn-primary">Tambah</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Daerah</th>
            <th>Tarif</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kurir as $key=>$value)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $value->daerah }}</td>
            <td>{{ $value->tarif }}</td>
            <td><a href="{{ url('kurir/'.$value->id.'/edit') }}" class="btn btn-warning">Edit</a>
                <form method="POST" action="{{ url('kurir/'.$value->id) }}" style="display: inline-block;">
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
