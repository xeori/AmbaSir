<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produk::all();
        $produk =Produk::get();
            
           
            return view('produk.index',compact ('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $konz = route('admin.produk');
        $kategori = Kategori::all();
        // $kategori =Kategori::get();
        // $kategori = route('admin.produk');
        return view('produk.create',compact('kategori','konz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required',
            'kategori_id'=> 'required',
            'harga'=>'required',
            'stok'=>'required',
        ]);
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time(). "_".$gambar->getClientOriginalName();
            $storage = 'uploads/images/';
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name;

        }else{
            $data ['gambar'] = 'null';
        }
        Produk::create($data);
        return redirect()->route('admin.produk');
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
        $konz = route('admin.produk');
        $produk = Produk::find($id);
        $kategori = Kategori::get();
        return view('produk.edit',compact('produk','kategori','konz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);
    
        // Cek apakah ada perubahan pada gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time() . "_" . $gambar->getClientOriginalName();
            $storage = 'uploads/images/';
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name;
        }
    
        // Lakukan update hanya pada kolom-kolom yang diubah
        Produk::whereId($id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Produk::find($id);
        $data->delete();
        return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus');
    }
}
