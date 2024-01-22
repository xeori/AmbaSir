<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\TransaksiDetail;

use Illuminate\Http\Request;

class TransaksiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Mendeklarasikan objek $data
        $data = new \stdClass();
    
        // Menambahkan properti ke objek $data
        $data->produk_name = $request->produk_name;
        $data->transaksi_id = $request->transaksi_id;
        $data->qty = $request->qty;
        $data->subtotal = $request->subtotal;
        $data->produk_id = $request->produk_id;
    
        // Menampilkan nilai dari $data
        // dd($data);
    
        // Deklarasi variabel lainnya
        $produk = Produk::all();
        $produk_id = $request->produk_id;
        $p_detail = Produk::find($produk_id);

        $transaksi = Transaksi::all();
        $transaksi_id = $request->transaksi_id;
        $p_detail = Transaksi::find($transaksi_id);
    
        // ...
    
        // Proses selanjutnya
        TransaksiDetail::create((array) $data); // Jika metode create memerlukan array, konversikan objek menjadi array
        return view('transaksi.index', compact('data', 'produk', 'p_detail'));
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
        //
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
