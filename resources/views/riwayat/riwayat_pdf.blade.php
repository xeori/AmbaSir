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
<body>
    <h1>Laporan Pengeluaran</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Transaksi ID</th>
                <th>Tanggal</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <!-- Tambahkan kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            <!-- Looping data transaksi di sini -->
            @foreach ($transaksiDetails as $trx)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $trx->transaksi_id }}</td>
                <td>{{ $trx->created_at->format('d F Y') }}</td>
                <td>{{ $trx->produk_name }}</td>
                <td>{{ $trx->qty }}</td>
                <!-- Tambahkan kolom lain sesuai kebutuhan -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
