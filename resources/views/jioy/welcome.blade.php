@extends('layouts.main')



@section('konten')
<h2>Kategori</h2>
<div class="row align-items-start">
  @foreach($kategoris as $key=>$kategori)
  <div class="col-md-2 mt-3">
    <div class="card text-center" style="width: 8rem;">
      <form method="post" action="{{ url('filterkategori') }}/{{ $kategori->id  }}" >
        @csrf
        <button type="submit" class="btn">
          <img src="{{ asset('icon/'.$kategori->icon_kategori) }}" class="card-img-top" alt="..." width="">
            <div class="card-body">
              <p size="3" class="card-title">{{ $kategori->nama_kategori }}</p>
            </div>
          </button>
      </form>
          </div>
        </div>

  @endforeach

<h2 class="mt-5">Produk</h2>
<div class="row align-items-start">
    @foreach($produks as $key=>$value)
   
    <div class="tampilanproduk">
    <div class="card" style="width: 10rem;">
      <img src="{{ asset('img/'.$value->foto) }}" class="card-img-top" alt="..." width="">
      <div class="card-body">
        <h5 class="card-title">{{ $value->nama }}</h5>
        <p class="card-text">{{ $value->harga }}</p>
        {{-- <p>Jumlah</p>
        <input type="text" name="jumlah" class="form-control mb-2" style="width: 50px"> --}}
        <form method="post" action="{{ url('detail') }}/{{ $value->id  }}" >
          @csrf
          <button type="submit" class="btn btn-primary"><i class="bi bi-bag-plus"></i> Beli</button>
        </form>
      </div>
    </div>
    </div>

    @endforeach
  </div>
{{-- </div> --}}

    
@endsection
