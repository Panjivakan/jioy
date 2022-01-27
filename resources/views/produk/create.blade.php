@extends('layouts.mainadmin')

@section('konten')
<h2>Tambah | Produk</h2>
<form method="POST" action="{{ url('produk') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
        @if ($errors->has('nama'))
        <div class="text-danger">nama produk harus diisi !</div>
        @endif
    </div>
    <div class="form-group">
        <label for="kategori_id" class="form-label">Kategori</label>
        <select class="form-control" name="kategori_id" id="kategori_id">
            <option value="">Pilih Kategori</option>
            @foreach ($kategori as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
            @endforeach
        </select>
        @if ($errors->has('kategori_id'))
        <div class="text-danger">Kategori harus diisi !</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" value="{{ old('harga') }}">
        @if ($errors->has('harga'))
        <div class="text-danger">Harga Produk ahrus diisi !</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" class="form-control" name="stok" value="{{ old('stok') }}">
        @if ($errors->has('stok'))
        <div class="text-danger">Stok Produk harus diisi !</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto Produk</label>
        <input type="file" class="form-control" name="foto">
        @if ($errors->has('foto'))
        <div class="text-danger">Harus diisi image !</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
        @if ($errors->has('deskripsi'))
        <div class="text-danger">Deskripsi Produk harus diisi !</div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection