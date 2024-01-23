<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title'  => 'Manajemen Transaksi',
            'content' => 'transaksi.index',
            'transaksi' => Transaksi::paginate(5),
            ];
            
           
            return view('transaksi.index', $data,compact('data'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
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
        return redirect()->route('admin.transaksi.edit', ['id' => $transaksi->id]);
    
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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
        $kembalian = $dibayarkan - $transaksi->total;

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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



 
}
