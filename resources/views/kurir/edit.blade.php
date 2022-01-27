@extends('layouts.mainadmin')

@section('konten')
<h2>Ubah | pengirirman</h2>

<form method="POST" action="{{ url('kurir/'.$model->id) }}">
    @method('PATCH')
    @csrf
    <div class="mb-3">
        <label for="daerah" class="form-label">Nama Daerah</label>
        <input type="text" class="form-control" name="daerah" value="{{ $model->daerah }}">
        @if ($errors->has('daerah'))
        <div class="text-danger">Nama daerah harus diisi !</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="tarif" class="form-label">Tarif</label>
        <input type="number" class="form-control" name="tarif" value="{{ $model->tarif }}">
        @if ($errors->has('tarif'))
        <div class="text-danger">Tarif harus diisi !</div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
    
@endsection