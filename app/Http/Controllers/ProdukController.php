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
        $produk = Produk::orderBy('kategori_id', 'desc')->get();
            
           
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
    public function store(Request $request ) 
    {
        $data = $request->validate([

            'name'=> 'required',
            'kategori_id'=> 'required',
            'harga'=>'required|numeric|min:1',
            'stok' => 'required|numeric|min:1',
            'diskon'=>'nullable|min:1', // Mengubah 'required' menjadi 'nullable'
            'gambar'=>'required',
        ]);
    

        // Periksa apakah ada nilai diskon yang diberikan
      
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time(). "_".$gambar->getClientOriginalName();
            $storage = 'images/';
        
            // Cek apakah pemindahan gambar berhasil
            if ($gambar->move($storage, $file_name)) {
                $data['gambar'] = $storage . $file_name;
            } else {
                // Tampilkan pesan kesalahan jika pemindahan gagal
                return redirect()->back()->withInput()->withErrors(['gambar' => 'Pemindahan gambar gagal']);
            }
        } else {
            // Jika gambar tidak diunggah, beri nilai default 'null'
            $data['gambar'] = 'nul';
        }
        
    
        Produk::create($data);
        // dd($data);
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
            'penyanyi' => 'required',
            'diskon' => 'required',
        ]);
    
        // Cek apakah ada perubahan pada gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time() . "_" . $gambar->getClientOriginalName();
            $storage = 'images/';
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name;
        }
    
        // Lakukan update hanya pada kolom-kolom yang diubah
        Produk::whereId($id)->update($data);
        $notification = array(
            'message' => 'Produk Berhasil Di Update',
            'alert-type' => 'success'
        );
        
        return redirect('admin/produk')->with($notification);
    }
    public function destroy(string $id)
    {
        $data = Produk::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Produk Berhasil Di Hapus',
            'alert-type' => 'success'
        );
        
        return redirect('admin/produk')->with($notification);
    }

}