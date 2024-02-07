<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::all();
        $produk =Produk::get();
            
           
            return view('produk.index',compact ('produk'));
    }
    public function create()
    {
        $konz = route('produk');
        $kategori = Kategori::all();
        // $kategori =Kategori::get();
        // $kategori = route('produk');
        return view('produk.create',compact('kategori','konz'));
    }
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
            $storage = 'images/';
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name;

        }else{
            $data ['gambar'] = 'null';
        }
        Produk::create($data);
        return redirect()->route('produk');
    }
    public function edit(string $id)
    {
        $konz = route('produk');
        $produk = Produk::find($id);
        $kategori = Kategori::get();
        return view('produk.edit',compact('produk','kategori','konz'));
    }
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
        Alert::success('Success', 'Produk Berhasil Di Update');
        return redirect()->route('produk');
    }
    public function destroy(string $id)
    {
        $data = Produk::find($id);
        $data->delete();
        Alert::success('Success', 'Produk Berhasil Di Hapus');
        return redirect()->route('produk')->with('success', 'Produk berhasil dihapus');
    }

}
