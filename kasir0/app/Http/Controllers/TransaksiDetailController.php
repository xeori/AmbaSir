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
        
       
        $data = new \stdClass();
   
       
        $data =[
           'produk_id'=>$request->produk_id,
           'produk_name'=>$request->produk_name,
           'transaksi_id'=>$request->transaksi_id,
           'qty' => $request->qty,
           'subtotal' =>$request->subtotal,
        ];

        $request->validate([
            'transaksi_id' => 'required|integer',
            // ... tambahkan aturan validasi untuk kolom lainnya
        ]);
        
      
     
        try {
            TransaksiDetail::create($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect()->back();
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
