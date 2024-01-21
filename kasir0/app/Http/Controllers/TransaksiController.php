<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Http\Request;

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
        $data = [
            'title'  => 'Manajemen|Transaksi',
            'content' => 'kategori.create'
            ];
            $data = route('admin.transaksi');
            return view('transaksi.create', compact('data'));
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
