@extends('layouts.main')



@section('konten')

    <form method="post" action="{{ url('keranjang') }}/{{ $produk->id }}">
        @csrf
        <div class="card mb-3" style="max-width: 740px;">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="{{ asset('img/'.$produk->foto) }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h2 class="card-title">{{ $produk->nama }}</h2>
                    <h6 class="card-title">Rp. {{ $produk->harga }}</h6>
                    <h5 class="card-title">Deskripsi Produk:</h5>
                    <p>{{ $produk->deskripsi }}</p>
                    <h6 class="card-title">Stok : {{ $produk->stok }}</h6>
                    <p class="card-text">Jumlah</p>
                    <input type="text" name="jumlah" id="jumlah" value="1" style="width: 30px" onchange="myFunction()"> x {{ $produk->harga }} = <p id="total">{{ $produk->harga }}</p>
                    <script>
                        function myFunction() {
                          var j = document.getElementById("jumlah");
                          var x = document.getElementById("total");
                          x.innerHTML = j.value * ["{{ $produk->harga }}"];

                        //   x.value = x.value*["{{ $produk->harga }} "];
                        }
                    </script>
                    <button class="btn btn-warning mt-2" type="submit">Tambah Ke Keranjang</button>
                    </div>
                </div>
            </div>
        </div>
    
@endsection
