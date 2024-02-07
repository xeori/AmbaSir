<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Produk;
use Illuminate\Http\Request;

class TransaksiDetailController extends Controller
{
    public function create(Request $request)
    {
        $produk_id = $request->produk_id;
        $transaksi_id = $request->transaksi_id;
        $tdt = TransaksiDetail::whereProdukId($produk_id)->whereTransaksiId($transaksi_id)->first();
        $transaksi = Transaksi::find($transaksi_id);
        
        // Retrieve diskon value from produk
        $produk = Produk::find($produk_id);
        $diskonPersen = $produk->diskon ?? 0; // Default to 0 if diskon is not set
        
        if ($tdt == null) {
            $subtotal = ($request->subtotal - ($request->subtotal * $diskonPersen / 100));
            $data = [
                'produk_id' => $produk_id,
                'produk_name' => $request->produk_name,
                'transaksi_id' => $transaksi_id,
                'qty' => $request->qty,
                'subtotal' => $subtotal,
            ];
            TransaksiDetail::create($data);
    
            $dt = [
                'total' => $subtotal + $transaksi->total,
            ];
            $transaksi->update($dt);
        } else {
            $subtotal = ($tdt->subtotal + ($request->subtotal - ($request->subtotal * $diskonPersen / 100)));
            $data = [
                'qty' => $tdt->qty + $request->qty,
                'subtotal' => $subtotal,
            ];
            $tdt->update($data);
    
            $dt = [
                'total' => $subtotal + $transaksi->total,
            ];
            $transaksi->update($dt);
        }
    
        return redirect()->route('transaksi.edit', ['id' => $transaksi_id]);
    }
    
   
   
    public function delete(string $id)
    {
      
        $id = request('id');
        $tdt = TransaksiDetail::find($id);
        $tdt -> delete();
        return redirect()->back();
    }

    public function selesai($id)
    {
        $transaksi = Transaksi::find($id);
        $data=[
            'status' => 'selesai'
        ];
        $transaksi->update($data);
        return redirect('transaksi');
    }
}
