<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;


class KategoriController extends Controller
{
   
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        $search = $request->input('search');

        // Gunakan query builder untuk melakukan pencarian
        $kategori = Kategori::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%$search%");
        })->get();
      
           
            return view('kategori.index', compact('kategori'));
    }
    public function create()
    {
       
      
            $kategori = route('kategori');
            return view('kategori.create', compact('kategori'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:kategoris'
        ]);
        
        $data['name'] = $request->name;
        
    
        Kategori::create($data);
    
        return redirect()->route('kategori');
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
        $notification = array(
            'message' => 'Kategori Berhasil Di Update',
            'alert-type' => 'success'
        );
        
        return redirect('kategori')->with($notification);
    }
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);


        if (!$kategori) {
            return redirect()->route('kategori')->with('error', 'Kategori tidak ditemukan');
        }
    
        $kategori->delete();
        $notification = array(
            'message' => 'Kategori Berhasil Di Hapus',
            'alert-type' => 'success'
        );
        
        return redirect('kategori')->with($notification);
    }
}
