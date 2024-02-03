<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;


class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('userAkses:admin');
    }
    public function index()
    {
        $kategori = Kategori::all();
      
           
            return view('kategori.index', compact('kategori'));
    }
    public function create()
    {
       
      
            $kategori = route('admin.kategori');
            return view('kategori.create', compact('kategori'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:kategoris'
        ]);
        
        $data['name'] = $request->name;
        
    
        Kategori::create($data);
    
        return redirect()->route('admin.kategori');
    }
    public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit',compact('kategori'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:kategoris'
        ]);
        
        $kategori['name'] = $request->name;
        
    
        Kategori::whereId($id)->update($kategori);
        Alert::success('Kategori', 'Kategori Berhasil di Update');
        return redirect()->route('admin.kategori');
    }
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);

        // if($kategori){
        //     $kategori->delete();
        // }
        // return redirect()->route('admin.kategori');
        if (!$kategori) {
            return redirect()->route('admin.kategori')->with('error', 'Kategori tidak ditemukan');
        }
    
        $kategori->delete();
        Alert::success('Kategori', 'Kategori Berhasil Di Hapus');
        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
