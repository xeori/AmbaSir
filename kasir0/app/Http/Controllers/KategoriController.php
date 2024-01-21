<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::paginate(5);
      
           
            return view('kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
      
            $kategori = route('admin.kategori');
            return view('kategori.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:kategoris'
        ]);
        
        $data['name'] = $request->name;
        
    
        Kategori::create($data);
        Alert::success('Success','data added successfully!');
        return redirect()->route('admin.kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:kategoris'
        ]);
        
        $kategori['name'] = $request->name;
        
    
        Kategori::whereId($id)->update($kategori);
        return redirect()->route('admin.kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
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
    
        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
