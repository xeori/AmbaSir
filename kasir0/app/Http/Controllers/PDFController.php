<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $users = User::get();

        $transaksidetail = TransaksiDetail::find($id);
        $transaksi = transaksi::all(); // Inisialisasi $transaksidetail dengan data dari model TransaksiDetail

        $data = [
            'title' => 'Struk Pembelian ',
            'date' => date('m/d/Y'),
            'users' => $users,
            'transaksidetail' => $transaksidetail,
            'transaksi' => $transaksi,
        ];
        
        $transaksidetail = TransaksiDetail::all();
        // return $transaksidetail;

        
        // return $transaksi;

        $pdf = PDF::loadView('pdf.usersPdf', $data);
        return $pdf->download('struk.pdf');
    }
} 