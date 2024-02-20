<style>
    /* Gaya CSS Anda di sini */
    @page {
        size: A4; /* Mengatur ukuran kertas menjadi A4 */
        margin: 0; /* Menghapus margin */
    }

    body {
        font-family: Arial, sans-serif;
        margin: 1cm; /* Menambahkan margin ke seluruh badan dokumen */
        font-size: 14px; /* Mengurangi ukuran font */
    }

    /* Gaya untuk tabel */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 6px; /* Mengurangi padding */
        text-align: left;
        font-weight: normal;
        max-width: 200px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        font-family: Arial, sans-serif; /* Menggunakan sans-serif untuk teks tabel */
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .text-end {
        text-align: right;
    }

    .text-start {
        text-align: left;
    }

    .container-fluid {
        margin-bottom: 10px; /* Mengurangi margin */
    }

    .row {
        margin-left: -10px; /* Mengurangi margin */
        margin-right: -10px; /* Mengurangi margin */
    }

    .col-md-12 {
        padding-left: 10px; /* Mengurangi padding */
        padding-right: 10px; /* Mengurangi padding */
    }

    .col-lg-3 {
        padding-left: 10px; /* Mengurangi padding */
        padding-right: 10px; /* Mengurangi padding */
    }

    .col-md-6 {
        padding-left: 10px; /* Mengurangi padding */
        padding-right: 10px; /* Mengurangi padding */
    }

    .ps-0 {
        padding-left: 0;
    }

    .pe-0 {
        padding-right: 0;
    }

    .mt-1 {
        margin-top: 0.5rem; /* Mengurangi margin */
    }

    .mt-2 {
        margin-top: 1rem; /* Mengurangi margin */
    }

    .mt-4 {
        margin-top: 2rem; /* Mengurangi margin */
    }

    .mt-5 {
        margin-top: 2.5rem; /* Mengurangi margin */
    }

    .mb-1 {
        margin-bottom: 0.5rem; /* Mengurangi margin */
    }

    .mb-2 {
        margin-bottom: 1rem; /* Mengurangi margin */
    }

    .mb-3 {
        margin-bottom: 1.5rem; /* Mengurangi margin */
    }

    .mb-5 {
        margin-bottom: 2rem; /* Mengurangi margin */
    }

    .text-muted {
        color: #6c757d;
    }

    .fw-bolder {
        font-weight: bold;
    }

    .fw-normal {
        font-weight: normal;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
        display: inline-block;
        font-weight: 400;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }

    .btn-outline-primary {
        color: #007bff;
        border-color: #007bff;
        display: inline-block;
        font-weight: 400;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }

    .larger-text {
        font-size: 1.2em; /* Sesuaikan ukuran huruf dengan kebutuhan Anda */
    }
</style>

<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 ps-0">
                            <p class="mt-1 mb-1 larger-text"><b>Amba Sir</b></p>
                            <p class="larger-text">Jalan Raya Sarirogo,<br> Kec. Sidoarjo,<br>Jawa Timur 61252.</p>
                            <h5 class="mt-5 mb-2 text-muted larger-text" style="margin-bottom: 0.25rem;">Nama Kasir</h5>
                            <p class="larger-text" style="margin-top: 0.25rem;">{{ $namaKasir }}</p>
                        </div>
                        <div class="col-lg-3 pe-0">
                            <h4 class="text-end text-muted mt-4 mb-2 larger-text" style="margin-bottom: 0.25rem;">Invoice</h4>
                            <h6 class="text-end mb-5 pb-4 larger-text" style="margin-top: 0.25rem;"># INV-00230{{ $transaksiId }}</h6>
                            
                            <p class="text-end text-muted mb-1 larger-text" style="margin-bottom: 0.25rem;">Total Transaksi</p>
                            <h4 class="text-end fw-normal mb-3 larger-text" style="margin-top: 0.25rem;">Rp. {{ format_rupiah($total) }}</h4>
                            
                            <p class="text-end text-muted mb-1 larger-text">Tanggal Transaksi</p>
                            <h6 class="text-end fw-normal larger-text" style="margin-top: 0.25rem;">{{ $tanggalTransaksi->format('d F Y') }}</h6>
                            
                            
                        </div>
                    </div>
                    <div class="container-fluid mt-3 d-flex justify-content-center w-100"> <!-- Mengurangi margin top -->
                        <div class="table-responsive w-100">
                            <table>
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
                                    <?php $totalDiskon = 0; // Inisialisasi total diskon ?>
                                    @foreach ($semuaTransaksi as $index => $tks)
                                    <?php
                                    // Hitung diskon untuk produk saat ini
                                    $diskonProduk = $tks->produk->diskon;
                                    $qty = $tks->qty;
                                    $diskon = ($diskonProduk / 100) * $qty * $tks->produk->harga;
                            
                                    // Tambahkan diskon untuk produk saat ini ke total diskon
                                    $totalDiskon += $diskon;
                                    ?>
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $tks->produk_name }}</td>
                                        <td class="text-end">{{ $tks->qty }}</td>
                                        <td class="text-end">{{ format_rupiah($tks->produk->harga) }}</td>
                                        <td class="text-end">{{ $tks->produk->diskon }}%</td>
                                        <td class="text-end">{{ format_rupiah($tks->subtotal) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container-fluid mt-3 w-100"> <!-- Mengurangi margin top -->
                        <div class="row">
                            <div class="col-md-6 ms-auto">
                                <div class="table-responsive">
                                    <table>
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
                </div>
            </div>
        </div>
    </div>
</div>
