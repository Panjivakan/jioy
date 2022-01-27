<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.css')}}">

    <style>
        body {
            margin: 25px 50px 75px 100px;
        }
        table.table {
            position: relative;

        }
    </style>
    <title>Cetak Laporan</title>
</head>
<body>
    <h1 class="text-center">LAPORAN PEMBELIAN UKM JIOY</h1>
    <h4 class="text-center mb-5">Bersukacitalah Senantiasa</h4>

    <h3>Dari : {{ $request->tgldari }} Sampai : {{ $request->tglke }}</h3>
    <table class="table table-bordered mr-2">
        <thead class="text-center">
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
    <script type="text/javascript">
        window.print();
    </script> 
</body>
</html>