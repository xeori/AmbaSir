<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        // Ambil transaksi dan urutkan berdasarkan status, dengan status "selesai" terlebih dahulu
        $riwayat = Transaksi::orderByRaw("FIELD(status, 'selesai') DESC")->get();
            
        return view('riwayat.index', compact('riwayat'));
    }
    
    

    public function print(Request $request ){ 
        
    }
    public function destroy(string $id)
    {
        $notification = array(
            'message' => 'Transaksi Berhasil Di Hapus',
            'alert-type' => 'success'
        );
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect('kasir/transaksi')->with($notification);
    }
    
}
