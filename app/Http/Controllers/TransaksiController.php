<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Produk;
use Illuminate\Http\Request;


class TransaksiController extends Controller
{
    public function index()
    {
      
        $transaksi =Transaksi::get();
        $transaksidetail = TransaksiDetail::all();
       
            
           
            return view('transaksi.index',compact( 'transaksidetail','transaksi' ));
      
    }
    public function create()
    {
       
        $user = Auth::user();
        $data = [
        'user_id' => $user->id,
        'kasir_nama' => $user->name,
        'total' => '0',
        ];

        $dataTransaksi = array_merge($data, $data);
        $transaksi = Transaksi::create($dataTransaksi);
        return redirect()->route('transaksi.edit', ['id' => $transaksi->id]);
    
}
public function lanjutkan( $id)
    {


        $produk = Produk::get();
        $produk_id = request('produk_id');
        $p_detail = Produk::find($produk_id);

        $transaksi_detail = TransaksiDetail::get();
        $transaksi_detail = request('produk_name');
        $transaksi_detail = Produk::find($transaksi_detail);

        // dd($produk);
        $act = request('act');
        $qty = request('qty', 1); // Jika qty tidak ada, berikan nilai default 1
        
        if ($act == 'min') {
            $qty = $qty - 1;
        } elseif ($act == 'plus') {
            $qty = $qty + 1;
        }

        $subtotal = 0;
        if($p_detail){ 
        $subtotal = $qty * $p_detail->harga;
        }

        $transaksi = Transaksi::find($id);

        $dibayarkan = request('dibayarkan');
        $kembalian = $dibayarkan - optional($transaksi)->total;

        $data = [
            'title'     => 'Tambah Transaksi',
            'produk'    => $produk,
            'p_detail'  => $p_detail,
            'qty'       => $qty,
            'transaksi_detail'   => $transaksi_detail,
            'kembalian' => $kembalian,
            'transaksi' => $transaksi,
        ];
        // dd($data);
        $transaksi_detail = TransaksiDetail::whereTransaksiId($id)->get();
       
        $transaksi = Transaksi::find($id);

        return view('transaksi.pembayaran', compact('produk', 'p_detail', 'subtotal', 'qty', 'transaksi_detail', 'transaksi', 'kembalian'));
    }
        public function edit(string $id)
    {
        
        $produk = Produk::get();
        $produk_id = request('produk_id');
        $p_detail = Produk::find($produk_id);

        $transaksi_detail = TransaksiDetail::get();
        $transaksi_detail = request('produk_name');
        $transaksi_detail = Produk::find($transaksi_detail);

        // dd($produk);
        $act = request('act');
        $qty = request('qty', 1); // Jika qty tidak ada, berikan nilai default 1
        
        if ($act == 'min') {
            $qty = $qty - 1;
        } elseif ($act == 'plus') {
            $qty = $qty + 1;
        }

        $subtotal = 0;
        if($p_detail){ 
        $subtotal = $qty * $p_detail->harga;
        }

        $transaksi = Transaksi::find($id);

        $dibayarkan = request('dibayarkan');
        $kembalian = $dibayarkan - optional($transaksi)->total;

        $data = [
            'title'     => 'Tambah Transaksi',
            'produk'    => $produk,
            'p_detail'  => $p_detail,
            'qty'       => $qty,
            'transaksi_detail'   => $transaksi_detail,
            'kembalian' => $kembalian,
            'transaksi' => $transaksi,
        ];
        // dd($data);
        $transaksi_detail = TransaksiDetail::whereTransaksiId($id)->get();

    
   
   
    return view('transaksi.create', compact('produk', 'p_detail', 'qty','subtotal','transaksi_detail','transaksi','kembalian'));

      
    }
    public function destroy(string $id)
    {
        Alert::success('Transaksi', 'Transaksi Berhasil Dihapus');
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect('transaksi');
    }
}
