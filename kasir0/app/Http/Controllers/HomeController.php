<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function dashboard(){
        return view("dashboard");
        
    }
    
    public function index(){
        $data = User::get();
        return view('index',compact('data'));
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
public function edit(Request $request, $id){ 
    $data = User::find($id);
    return view('edit',compact('data'));
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
            

            User::whereId($id)->update($data);

            return redirect()->route('admin.index');
}

public function delete(Request $request, $id){
    $data = User::find($id);

    if($data){
        $data->delete();
    }
    return redirect()->route('admin.index');
}
}