@extends('layout.body.main')
@section('layout')
<div class="page-content">

 

    <div class="row">
        <div class="col-md-12">
<div class="card">
  <div class="card-body">
    <div class="container-fluid d-flex justify-content-between">
      <div class="col-lg-3 ps-0">
        <a href="#" class="noble-ui-logo logo-light d-block mt-3">Kasir<span>Ukk</span></a>                 
        <p class="mt-1 mb-1"><b>Kasir Sederhana</b></p>
        <p>Jalan Raya Siwalan Panji,<br> Kec. Sidoarjo,<br>Jawa Timur 61252.</p>
        <h5 class="mt-5 mb-2 text-muted">Nama Kasir</h5>
        <p>{{ $namaKasir }}</p>
      </div>
      <div class="col-lg-3 pe-0">
        <h4 class="fw-bolder text-uppercase text-end mt-4 mb-2">invoice</h4>
        <h6 class="text-end mb-5 pb-4"># INV-00230{{ $transaksiId }}</h6>
        <p class="text-end text-muted mb-1">Total Transaksi</p>
        <h4 class="text-end fw-normal mb-3">Rp. {{ format_rupiah($total) }}</h4>
        <p class="text-end text-muted mb-1">Tanggal Transaksi</p>
        <h6 class="text-end fw-normal">{{ $tanggalTransaksi->format('d F Y') }}</h6>
      </div>
    </div>
    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
      <div class="table-responsive w-100">
          <table class="table table-bordered">
            <thead>
              <tr>
                  <th>#</th>
                  <th>Nama Produk</th>
                  <th class="text-end">Quantity</th>
                  <th class="text-end">Harga</th>
                  <th class="text-end">Diskon</th>
                  <th class="text-end">Total</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $totalDiskon = 0; // Inisialisasi total diskon
          ?>
              @foreach ($semuaTransaksi as $tks)
       
              <?php
            // Hitung diskon untuk produk saat ini
            $diskonProduk = $tks->produk->diskon;
            $qty = $tks->qty;
            $diskon = ($diskonProduk / 100) * $qty * $tks->produk->harga;
        
            // Tambahkan diskon untuk produk saat ini ke total diskon
            $totalDiskon += $diskon;
        ?>
              

              <tr class="text-end">
                <td class="text-start">{{$loop->iteration}}</td>
                <td class="text-start">{{ $tks->produk_name }}</td>
                <td>{{ $tks->qty }}</td>
                <td>{{ format_rupiah ($tks->produk->harga) }}</td>
                <td>{{ ($tks->produk->diskon) }}%</td>
                <td>{{ format_rupiah ($tks->subtotal) }}</td>
              </tr>
             
             
              
            </tbody>
            @endforeach
          </table>
        </div>
    </div>
    <div class="container-fluid mt-5 w-100">
      <div class="row">
        <div class="col-md-6 ms-auto">
            <div class="table-responsive">
              <table class="table">
                  <tbody>
                   
                    <tr>
                      <td>Total Diskon (%)</td>
                      <td class="text-end">{{ format_rupiah($totalDiskon) }}</td>
                    </tr>
                    
                    <tr class="bg-dark">
                      <td class="text-bold-800">Total</td>
                      <td class="text-bold-800 text-end">Rp. {{ format_rupiah($total) }}</td>
                    </tr>
                 
                  </tbody>

              </table>
            </div>
        </div>
      </div>
    </div>
    <div class="container-fluid w-100">
      <a href="{{ route('transaksi') }}" class="btn btn-primary float-end mt-4 ms-2"><i data-feather="send" class="me-3 icon-md"></i>Selesai</a>
    
    </div>
  </div>
</div>
        </div>
    </div>
</div>
@endsection

