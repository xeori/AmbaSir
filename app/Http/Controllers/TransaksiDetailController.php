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
        $qty = $request->qty;
    
        $transaksi = Transaksi::find($transaksi_id);
        $produk = Produk::find($produk_id);
    
        // Check if there is enough stock
        if ($produk->stok < $qty) {
            return redirect()->back()->with('error', 'Stok Melebihi Batas . Stok saat ini: ' . $produk->stok);
        }
    
        $tdt = TransaksiDetail::whereProdukId($produk_id)->whereTransaksiId($transaksi_id)->first();
    
        // Retrieve diskon value from produk
        $diskonPersen = $produk->diskon ?? 0; // Default to 0 if diskon is not set
    
        if ($tdt == null) {
            $subtotal = ($request->subtotal - ($request->subtotal * $diskonPersen / 100));
            $data = [
                'produk_id' => $produk_id,
                'produk_name' => $request->produk_name,
                'transaksi_id' => $transaksi_id,
                'qty' => $qty,
                'subtotal' => $subtotal,
            ];
            TransaksiDetail::create($data);
    
            $dt = [
                'total' => $subtotal + $transaksi->total,
            ];
            $transaksi->update($dt);
    
            // Update the stock
            $produk->decrement('stok', $qty);
        } else {
            $subtotal = ($tdt->subtotal + ($request->subtotal - ($request->subtotal * $diskonPersen / 100)));
            $data = [
                'qty' => $tdt->qty + $qty,
                'subtotal' => $subtotal,
            ];
            $tdt->update($data);
    
            $dt = [
                'total' => $subtotal + $transaksi->total,
            ];
            $transaksi->update($dt);
    
            // Update the stock
            $produk->decrement('stok', $qty);
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
