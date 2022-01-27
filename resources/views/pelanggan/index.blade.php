@extends('layouts.mainadmin')

@section('konten')
<h1>Pelanggan</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelangan</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pelanggan as $key=>$value)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $value->nama }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->telepon }}</td>
            <td>
                <form method="POST" action="{{ url('pelanggan/'.$value->id) }}" style="display: inline-block;">
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
