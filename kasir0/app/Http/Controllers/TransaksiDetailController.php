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
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
       
        $data =[
           'produk_id'=>$request->produk_id,
           'produk_name'=>$request->produk_name,
           'transaksi_id'=>$request->transaksi_id,
           'qty' => $request->qty,
           'subtotal' =>$request->subtotal,
        ];

        $request->validate([
            'transaksi_id' => 'required|integer', // Sesuaikan dengan aturan validasi yang diinginkan
            // ... tambahkan aturan validasi untuk kolom lainnya
        ]);
        
      
     
        $transaksiDetail = TransaksiDetail::create($data);
        
        return redirect()->back()->with('success', 'TransaksiDetail created successfully.');
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
