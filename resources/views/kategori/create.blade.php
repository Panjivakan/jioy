@extends('layouts.mainadmin')

@section('konten')
<h2>Tambah | Kategori</h2>
<form method="POST" action="{{ url('kategori') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nama_kategori" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" name="nama_kategori" value="{{ old('nama_kategori') }}">
        @if ($errors->has('nama_kategori'))
        <div class="text-danger">nama kategori harus diisi !</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="icon_kategori" class="form-label">Icon Kategori</label>
        <input type="file" class="form-control" name="icon_kategori">
        @if ($errors->has('icon_kategori'))
        <div class="text-danger">Harus diisi Icon !</div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection