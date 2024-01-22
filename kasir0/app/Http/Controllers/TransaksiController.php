<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
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
       $transaksi = Transaksi::create($data);
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
            // dd($produk);


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $qty = $_POST["qty"];
            }
            return view('transaksi.create', compact('produk','p_detail'));
      
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

   protected function addTransaksi()
    {
       
       
    }
}
