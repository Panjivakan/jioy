<?php
use App\Models\Pembelian;
use App\Models\Pembelian_produk;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Jioy</title>
        <link rel="stylesheet" href="{{asset('front/css/bootstrap.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

        <style>
          sup {
              vertical-align: super;
              font-size: smaller;
          }
          div.tabelsembunyi {
            display:none;
          }
          @media screen and (min-width: 450px) {
            .tampilanproduk {
              width: 20%;
              margin-bottom: 10px;
            }
          }
          @media screen and (min-width: 800px) {
            .tampilanproduk {
              width: 30%;
              margin-bottom: 10px;
            }
          }

        </style>
      </head>
      
    <body>
      @include('sweetalert::alert')
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <div class="mb-3">
          <a class="navbar-brand" href="/">
            <img src="{{ asset('gambar/jioy.png') }}" alt="" width="80" height="30">
          </a>
        </div>
          <div class="mb-3">
          <form method="get" action="{{ route('cari') }}" class="d-flex">
              @csrf
            <input class="form-control me-1" name="cari" type="text" placeholder="Cari Produk ..." aria-label="Search">
            <button class="btn" type="submit"><i class="bi bi-search"></i></button>
          </form>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                
              </li>
            </ul>
            <span class="navbar-text">
              @auth
              <?php
                $pesan = Pembelian::where('pelanggan_id', Auth::guard('pelanggan')->user()->id)->where('status', 0)->first();
                $notif = null;
                if (!empty($pesan)) {
                  $notif = Pembelian_produk::where('pembelian_id', $pesan->id)->count();
                }
              ?>
              <a class="navbar-brand" href="{{ url('checkout') }}">
                <i class="bi bi-handbag"></i><sup>{{ $notif }}</sup>
              </a>
              <a class="navbar-brand" href="/profil">
                <i class="bi bi-person"></i>
              </a>
              {{-- <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="btn btn-link">logout</button>
              </form> --}}
              @endauth
              @guest
                <a href="/login">Login</a>    
              @endguest
            </span>
          </div>
        </div>
      </nav>



        <div class="container mt-4">
            @yield('konten')
        </div>
        <script src="{{asset('front/js/bootstrap.js')}}"></script>
    </body>
</html>