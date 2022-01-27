@extends('layouts.main')



@section('konten')

<h1>Keranjang</h1>
    <h3>Produk Belanja</h3>
    @foreach ($pembelian_produk as $object)
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ asset('img/'.$object->foto_produk) }}" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $object->nama_produk }}</h5>
              <p class="card-text">Jumlah</p>
              <p>{{ $object->jumlah }}</p>
              <p class="card-text"><small class="text-muted">{{ $object->subharga }}</small></p>
              <form method="post" action="{{ url('checkout') }}/{{ $object->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    <h3>Alamat Pengiriman</h3>
    <div class="col-md-4">
    <h6>Harga dan Tarif</h6>
 <form method="post" action="{{ url('checkoutkonfirmasi') }}">
  @csrf
    <select class="mb-4 form-select" aria-label="Default select example" name="kurir_id" id="kurir_id" required>
        <option selected>Pilih Daerah | Tarif</option>
        @foreach($kurirs as $key=>$kurir)
        <option value="{{ $kurir->id }}">{{ $kurir->daerah }} | Rp.{{ $kurir->tarif }}</option>
        @endforeach
      </select>
      <h6>Detail Alamat</h6>
    <textarea name="alamat" id="alamat" cols="50" rows="2">{{ Auth::guard('pelanggan')->user()->alamat }}</textarea>
    </div>
    <button class="btn btn-warning" type="submit">Total Belanja : Rp. {{ number_format($pembelian->total_pembelian) }} | Checkout</button>
  </form>
    
@endsection
