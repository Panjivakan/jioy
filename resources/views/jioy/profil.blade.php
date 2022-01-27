@extends('layouts.main')



@section('konten')
<div class="card">
    <div class="card-header">
      PROFIL
      <span>
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="btn btn-primary btn-sm">Logout</button>
        </form> 
      </span>
    </div>
    
    <div class="card-body">
      <h5 class="card-title">Nama :</h5>
      <p class="card-text">{{ Auth::guard('pelanggan')->user()->nama }}</p>
      <h5 class="card-title">Alamat :</h5>
      <p class="card-text">{{ Auth::guard('pelanggan')->user()->alamat }}</p>
      <h5 class="card-title">Telepon :</h5>
      <p class="card-text">{{ Auth::guard('pelanggan')->user()->telepon }}</p>
      <h5>Status Belanja : </h5>
      <button onclick="tabelstatus1()" class="btn btn-outline-warning">Sedang Diproses</button>
      <button onclick="tabelstatus2()" class="btn btn-outline-success">Sedang Dikirim</button>
      <button onclick="tabelstatus3()" class="btn btn-outline-info">Selesai</button>

      <div id="tabelstatus"></div>
      <script>
        function tabelstatus1(){
          var x = document.getElementById("statuspesanan1").innerHTML;
          document.getElementById("tabelstatus").innerHTML = x;
        }
        function tabelstatus2(){
          var x = document.getElementById("statuspesanan2").innerHTML;
          document.getElementById("tabelstatus").innerHTML = x;
        }
        function tabelstatus3(){
          var x = document.getElementById("statuspesanan3").innerHTML;
          document.getElementById("tabelstatus").innerHTML = x;
        }
      </script>
<div class="tabelsembunyi">
  <div id="statuspesanan1">
      <h5 class="card-title">Sedang Diproses</h5>
      @if (!empty($pembelian))
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Total Pesanan</th>
            <th scope="col">Tanggal Pesanan</th>
            <th scope="col">Jam Pesanan</th>
            <th scope="col">Liat Produk</th>

          </tr>
        </thead>
        <tbody>
          @foreach($pembelian as $key=>$value1)
          <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $value1->total_pembelian + $value1->tarif }}</td>
            <td>{{ $value1->created_at->format('d-m-Y') }}</td>
            <td>{{ $value1->created_at->format('H:i') }}</td>
            <td><a href="{{ url('produkpesanan/'.$value1->id) }}" class="btn btn-info">Detail</a></td>
          </tr>
          @endforeach
          </tbody>
        </table>
        @else
        <h6>Pesanan Kosong</h6>
        @endif
      </div>
      <div id="statuspesanan2">
      <h5 class="card-title">Sedang Dikirim</h5>
      @if (!empty($pembelian2))
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Total Pembelian</th>
            <th scope="col">Tanggal Pengiriman</th>
            <th scope="col">Jam Pengiriman</th>
            <th scope="col">Liat Produk</th>

          </tr>
        </thead>
        <tbody>
          @foreach($pembelian2 as $key=>$value2)
          <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $value2->total_pembelian }}</td>
            <td>{{ $value2->updated_at->format('d-m-Y') }}</td>
            <td>{{ $value2->updated_at->format('H:i') }}</td>
            <td><a href="{{ url('produkpesanan/'.$value2->id) }}" class="btn btn-info">Detail</a></td>

          </tr>
          @endforeach
          </tbody>
        </table>
      @else
        <h6>Pesanan Kosong</h6>
      @endif
      </div>
      <div id="statuspesanan3">
      <h5 class="card-title">Pesanan Diterima</h5>
      @if (!empty($pembelian3))
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Total Pembelian</th>
            <th scope="col">Tanggal Penerimaan</th>
            <th scope="col">Jam Penerimaan</th>
            <th scope="col">Liat Produk</th>

          </tr>
        </thead>
        <tbody>
        @foreach($pembelian3 as $key=>$value3)
          <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $value3->total_pembelian }}</td>
            <td>{{ $value3->updated_at->format('d-m-Y') }}</td>
            <td>{{ $value3->updated_at->format('H:i') }}</td>
            <td><a href="{{ url('produkpesanan/'.$value3->id) }}" class="btn btn-info">Detail</a></td>

          </tr>
          @endforeach
          </tbody>
        </table>
        @else
        <h6>Pesanan Kosong</h6>
        @endif
      </div>
      </div>
    </div>
  </div>

  
@endsection
