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
        $produk_id = $request->produk_id;
        $transaksi_id = $request->transaksi_id;
       $tdt = TransaksiDetail::whereProdukId($produk_id)->whereTransaksiId($transaksi_id)->first();
        $transaksi = Transaksi::find($transaksi_id);
       if($tdt == null){

        $data =[
           'produk_id'=> $produk_id,
           'produk_name'=>$request->produk_name,
           'transaksi_id'=> $transaksi_id,
           'qty' => $request->qty,
           'subtotal' =>$request->subtotal,
        ];
        TransaksiDetail::create($data);
        $detailtransaksi = [
            'total' =>$request ->subtotal + $transaksi->total,
        ];
        $transaksi->update($detailtransaksi);
    }else{
    $data = [
        'qty'=> $tdt->qty + $request->qty,
        'subtotal'=>$tdt->subtotal + $request->subtotal,
    ];
    $tdt->update($data);

    $detailtransaksi = [
        'total' =>$request ->subtotal + $transaksi->total,
    ];
    $transaksi->update($detailtransaksi);
    }
    return redirect()->route('admin.transaksi.edit', ['id' => $transaksi_id]);
   
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
        return redirect('admin.transaksi');
    }
}
