@extends('layouts.mainadmin')

@section('konten')
<h2>Ubah | Kategori</h2>

<form method="POST" action="{{ url('kategori/'.$model->id) }}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="mb-3">
        <label for="nama_kategori" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" name="nama_kategori" value="{{ $model->nama_kategori }}">
        @if ($errors->has('nama_kategori'))
        <div class="text-danger">nama kategori harus diisi !</div>
        @endif
    </div>
    <div class="mb-3">
        <img src="{{ asset('icon/'. $model->icon_kategori) }}" width="50" alt="">
    </div>
    <div class="mb-3">
        <label for="icon_kategori" class="form-label">Icon Kategori</label>
        <img src="{{ $model }}" alt="" srcset="">
        <input type="file" class="form-control" name="icon_kategori">
        @if ($errors->has('icon_kategori'))
        <div class="text-danger">Harus diisi Icon !</div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
    
@endsection