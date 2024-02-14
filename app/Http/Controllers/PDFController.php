<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Produk;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $users = User::all();
        $users = User::find($id);
        // $transaksi = Transaksi::all();
       
        $transaksidetail = TransaksiDetail::all();
        $transaksidetail = TransaksiDetail::find($id);
        // $transaksidetail = TransaksiDetail::where('	created_at')->get();
        // $produk = Produk::all();
        // $transaksiDetails = TransaksiDetail::with('produk')->where('transaksi_id', $id)->get();
        // $semuaTransaksi = TransaksiDetail::where('transaksi_id', $id)->get();
        // $hasil = TransaksiDetail::find($id);
        // $produk = Produk::find($id);
        // Inisialisasi $transaksidetail dengan data dari model TransaksiDetail
        // $transaksidetail = TransaksiDetail::all();

        
       
       
       
        // return $transaksidetail;
      
        $data = [
            'title' => 'Struk Pembelian ',
            'date' => date('m/d/Y'),
            'users' => $users,
            'transaksidetail' => $transaksidetail,
           
            // 'produk' => $produk,
            // 'hasil' => $hasil,
            // 'semuatransaksi' => $semuaTransaksi,
        ];
        
        // return $transaksi;
        // dd($data);

        $pdf = PDF::loadView('invoice.pdf', $data);
        return $pdf->download('ligma.pdf');
    }
}
