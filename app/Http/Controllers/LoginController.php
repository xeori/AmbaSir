<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
     public function index(){
        return view('auth.login');

    }

    public function login_proses(Request $request){
        $request->validate([
            'email' =>'required',
            'password'=> 'required',

        ]);
        $data = [
            'email'=> $request->email,
            'password'=> $request->password,
        ];
       if(Auth::attempt($data)) {
        
        if (Auth::user()->role == 'admin') {
            return redirect('layout/dashboard');
        } elseif (Auth::user()->role == 'pengguna') {
            return redirect('transaksi');
            
        }
       }else{ 
        Alert::error('Failed', 'Email Atau Password Salah');
        return redirect()->route('login');
       }
    }

    public function logout(){
        Auth::logout();
        Alert::error('Logout', 'Anda Berhasil Log out');
        return redirect()->route('login');
    }
    public function register(){
        return view('auth.register');
    }
    public function register_proses(Request $request){
        $request->validate([
            'nama'=> 'required',
            'email' => 'required|email|unique:users,email',
            
                'password' => [
                    'required',
                    Password::min(8)
                      ->mixedCase()
                ],
            ]);

            $data['name'] = $request->nama;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);

            user::create($data);

            $login = [
                'email'=> $request->email,
                'password'=> $request->password,
            ];
           if(Auth::attempt($login)) {
            return redirect('layout/dashboard');
           }else{ 
            return redirect()->route('login')->with('failed','Incorrect email or password ');
           }

    }
}
