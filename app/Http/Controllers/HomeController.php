<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function dashboard(){
        return view("layout/dashboard");
        
    }
    public function index(){
        $data = User::get();
        return view('index',compact('data'));
    }
    public function edit(Request $request, $id){ 
        $data = User::find($id);
        $user = User::find($id);
        return view('edit',compact('data','user'));
    }
    public function create(){
       
        return view('create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|string|max:30',
            'nama'=> 'required|string',
            
                'password' => [
                    'required',
                    Password::min(8)
                      ->mixedCase()
                ],
            ]);
            
            if($validator->fails())
                return redirect()->back()->withErrors($validator);
            
                $data['email'] = $request->email;
                $data['name'] = $request->nama;
                $data['password'] = Hash::make($request->password);

         
                User::create($data);
                
                return redirect()->route('index');
}
public function update(Request $request, $id){
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|string|max:30',
        'nama'=> 'required|string',
        'password'=> 'nullable',
        ]);
        
        if($validator->fails())
            return redirect()->back()->withErrors($validator);
        
            $data['email'] = $request->email;
            $data['name'] = $request->nama;

            if($request->password){
                $data['password'] = Hash::make($request->password);
            }
            
    $request->validate([
        'role' => 'required|in:pengguna,admin', // Sesuaikan dengan peran yang diperlukan
        // Validasi dan aturan validasi lainnya
    ]);

    $user = User::find($id);
    $user->update([
        'role' => $request->input('role'),
        // Update atribut pengguna lainnya sesuai kebutuhan
    ]);
            

            User::whereId($id)->update($data);
            Alert::success('User', 'User Berhasil Diedit');
            return redirect()->route('index');
}
public function delete(Request $request, $id){
    $data = User::find($id);

    if($data){
        $data->delete();
        Alert::success('User', 'User Berhasil Dihapus');
    }
    
    return redirect()->route('index');
}

}
