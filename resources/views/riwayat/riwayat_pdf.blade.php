<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <style>
        /* Gaya CSS Anda di sini */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
@php
    // Urutkan $transaksiDetails berdasarkan transaksi_id
    $transaksiDetails = $transaksiDetails->sortBy('transaksi_id');
@endphp

<body>
    @foreach ($transaksiDetails->groupBy('transaksi_id') as $transaksi_id => $transaksi)
        <div style="margin-bottom: 15px;">
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="4">Transaksi ID: # INV-00230{{ $transaksi_id }}</th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $key => $trx)
                        <tr>
                            @if ($key === 0)
                                <td rowspan="{{ count($transaksi) }}">{{ $key + 1 }}</td>
                                <td rowspan="{{ count($transaksi) }}">{{ $trx->created_at->format('d F Y') }}</td>
                                <td>{{ $trx->produk_name }}</td>
                                <td>{{ $trx->qty }}</td>
                            @else
                                <td>{{ $trx->produk_name }}</td>
                                <td>{{ $trx->qty }}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
    </body>
    
    
    

</html>
