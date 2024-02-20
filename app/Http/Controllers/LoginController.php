<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;
use illuminate\Support\Facades\Auth;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Session;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
     public function index(){
        auth::logout();
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
                return redirect('admin/layout/dashboard');
            } elseif (Auth::user()->role == 'karyawan') {
                return redirect('kasir/transaksi');
            }elseif (Auth::user()->role == 'pemilik'){
                return redirect('admin/layout/dashboard');
            }
        } else { 
            // Jika login gagal, redirect ke halaman login dengan pesan error
            return redirect()->route('login')->with('errorMessage', 'Email atau Password Salah');
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
            'gambar' => 'required|image|mimes:jpg,jpeg,png,gif',
            
                'password' => [
                    'required',
                    Password::min(8)
                      ->mixedCase()
                ],
            ]);

            $data = [
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];

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
                // Jika gambar tidak diunggah, beri nilai default null atau string kosong
                $data['gambar'] = null; // or $data['gambar'] = '';
            }
            // dd($data);
            
            user::create($data);
            
            // ...

            $login = [
                'email'=> $request->email,
                'password'=> $request->password,
            ];
           if(Auth::attempt($login)) {
            return redirect('admin/layout/dashboard');
           }else{ 
            return redirect()->route('login')->with('failed','Incorrect email or password ');
           }

    }

    public function forgot_password()
    {
        return view('auth.forgot-password');
    }

    public function forgot_password_act(Request $request)
    {
        $customMessage = [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.exists' => 'Email tidak terdaftar di database',
        ];
        
        $request->validate([
            'email' => 'required|email|exists:users,email',

        ], $customMessage);

        $token = Str::random(60); // Memperbaiki pemanggilan Str::random()

        PasswordResetToken::updateOrCreate(
            [
                'email'=> $request->email,
            ],

            [
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        Mail::to($request->email)->send(new ResetPasswordMail($token));

        

        
            
        return redirect()->route('forgot_password')->with('success', 'Kami Telah Mengirimkan Reset Password');
    }

    public function validasi_forgot_password(Request $request, $token)
{
    $getToken = PasswordResetToken::where('token', $token)->first();

    if (!$getToken) {
        return redirect()->route('login')->with('failed', 'Token tidak valid');
    }

    return view('auth.validasi-token', compact('token'));
}

public function validasi_forgot_password_act(Request $request)
{
    $customMessage = [
        'password.required' => 'Password tidak boleh kosong',
        'password.min' => 'Password minimal 6 karakter',
    ];

    // Tambahkan pesan debug
    // dd($request->all());

    $request->validate([
        'password' => 'required|min:6',
    ], $customMessage);

    $token = PasswordResetToken::where('token', $request->token)->first();

    if (!$token) {
        return redirect()->route('login')->with('failed', 'Token tidak valid');
    }

    $user = User::where('email', $token->email)->first();

    if (!$user) {
        return redirect()->route('login')->with('failed', 'Email tidak terdaftar di database');
    }

    $user->update([
        'password' => Hash::make($request->password),
    ]);
    dd($request->all());

    $token->delete();

    return redirect()->route('login')->with('success', 'Password berhasil direset');
}



}
    

