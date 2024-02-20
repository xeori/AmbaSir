<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use Dompdf\Options;
use Carbon\Carbon;
class RiwayatController extends Controller
{
    public function index()
    {
        $transaksi_id = TransaksiDetail::get();
        $riwayat = Transaksi::all();
        // Ambil transaksi dan urutkan berdasarkan status, dengan status "selesai" terlebih dahulu
        $riwayat = Transaksi::orderByRaw("FIELD(status, 'selesai') DESC")->get();
            
        return view('riwayat.index', compact('riwayat','transaksi_id'));
    }
    
    public function generatePDF( )
    {   
        $transaksiDetails = TransaksiDetail::all();
        return view('riwayat.riwayat_pdf',compact('transaksiDetails'));
    }

    public function print(Request $request)
{
    // Ambil semua data transaksi detail dari database
    $allTransaksiDetails = TransaksiDetail::all();
    
    // Dapatkan opsi yang dipilih dari formulir
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Parse the dates using Carbon for proper date handling
    $startDateTime = Carbon::parse($startDate)->startOfDay();
    $endDateTime = Carbon::parse($endDate)->endOfDay();

    // Query TransaksiDetail based on the date range
    $transaksiDetails = TransaksiDetail::whereBetween('created_at', [$startDateTime, $endDateTime])->get();

    // Gunakan opsi yang dipilih untuk mengambil data tertentu dari database
    if (!empty($selectedOptions)) {
        $transaksiDetails = TransaksiDetail::whereIn('kolom_tersedia', $selectedOptions)->get();
    } else {
        // Jika tidak ada opsi yang dipilih, gunakan semua data
        $transaksiDetails = $allTransaksiDetails;
    }

    // Konfigurasi Dompdf
    $options = new Options();
    $options->set('isRemoteEnabled', true);

    // Inisialisasi Dompdf
    $dompdf = new Dompdf($options);

    // Load tampilan blade dan berikan data transaksi detail
    $html = view('riwayat.riwayat_pdf', compact('transaksiDetails'))->render();

    // Tambahkan konten ke PDF
    $dompdf->loadHtml($html);

    // Render PDF
    $dompdf->render();

    // Unduh PDF
    return $dompdf->stream('laporan-pengeluaran.pdf');
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
