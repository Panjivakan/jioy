@extends('layouts.mainadmin')

@section('konten')
<h1>Laporan</h1>
<form action="{{ url('filterdate') }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><label for="tgldari">Tanggal Awal :</label> <input type="date" name="tgldari" class="form-control" value="{{ date('d-m-Y') }}">&nbsp;</span>
          <span class="input-group-text"><label for="tglke">Tanggal Akhir :</label> <input type="date" name="tglke" class="form-control" value="{{ date('d-m-Y') }}">&nbsp;</span>
        </div>
        <button type="submit" class="btn btn-info btn-sm">Cari</i></button>
      </div>
</form>
    <a href="{{ url('cetak') }}" class="btn btn-info" target="_blank"><i class="bi bi-printer"></i> Cetak</a>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Cetak Pertanggal</button>
    
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Pelanggan</th>
                <th>Alamat</th>
                <th>Tanggal Pesanan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelian_produk as $key=>$value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->nama_produk }}</td>
                <td>{{ $value->jumlah }}</td> 
                <td>{{ $value->subharga }}</td>
                <td>{{ $value->pelanggan->nama }}</td>
                <td>{{ $value->pembelian->alamat }}</td>
                <td>{{ $value->created_at->format('d-m-Y') }}</td>
                <td>
                    @if ( $value->pembelian->status == 1)
                    <div class="text-warning">Pesanan Diproses</div>
                    @elseif ($value->pembelian->status == 2)
                    <div class="text-success">Pesanan Dikirim</div>
                    @else
                    <div class="text-info">Pesanan Selesai</div>
                    @endif
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('cetakbytanggal') }}" target="_blank">
        @csrf
      <div class="modal-body">
            Tanggal Mulai : <input type="date" name="tgldari" id="tgldari" value="{{ date('d-m-Y') }}" class="form-control mb-2">&nbsp;
            Sampai : <input type="date" name="tglke" id="tglke" value="{{ date('d-m-Y') }}" class="form-control">&nbsp;
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Cetak</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@endsection
