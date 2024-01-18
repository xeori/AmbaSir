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
        $data = Kategori::paginate(5);
        $data = [
            'title'  => 'Manajemen Kategori',
            'content' => 'kategori.index',
            'data' => Kategori::paginate(5),
            ];
            
           
            return view('kategori.index', $data,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $data = [
            'title'  => 'Manajemen|Kategori',
            'content' => 'kategori.create'
            ];
            $data = route('admin.kategori');
            return view('kategori.create', compact('data'));
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
        $data = Kategori::find($id);
        return view('kategori.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kategori::find($id);

        // if($data){
        //     $data->delete();
        // }
        // return redirect()->route('admin.kategori');
        if (!$data) {
            return redirect()->route('admin.kategori')->with('error', 'Kategori tidak ditemukan');
        }
    
        $data->delete();
    
        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
