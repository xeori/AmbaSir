<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Produk;
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
        $this->addtransaksi();



        $data = [
            'title'  => 'Manajemen|Transaksi',
            'content' => 'produk.create',
            // 'produk' => $produk,
            ];
            $data = route('admin.transaksi');
            $produk = Produk::all();
            $produk_id = request('produk_id');
            $p_detail = Produk::find($produk_id);
            // dd($produk);


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $qty = $_POST["qty"];
            }
            return view('transaksi.create', compact('data','produk','p_detail'));
    
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

    function addtransaksi()
    {
        $data =[
            'user_id' => auth()->user()->id,
            'kasir_name' => auth()->user()->name,
            'total' => 0,

        ];
        Transaksi::create($data);

    }
}
