<!DOCTYPE html>
<html>
    <head>
        <title>JioyAdmin</title>
        <link rel="stylesheet" href="{{asset('front/css/bootstrap.css')}}">
        {{-- <link rel="stylesheet" href="{{asset('front/css/mystyle.css')}}"> --}}

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="/admin">JIOY</a>
                </li>
                <li class="nav-item">
                <li class="nav-item">
                  <a class="nav-link" href="/produk">Produk</a>
                </li>
                  <a class="nav-link" href="/kategori">Kategori</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/kurir">Pengiriman</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/pelanggan">Pelanggan</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pembelian">Pembelian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/laporan">Laporan</a>
                </li>

              </ul>
        </nav>
        <div class="container mt-4">
            @yield('konten')
        </div>
        <script src="{{asset('front/js/bootstrap.js')}}"></script>
    </body>
</html>