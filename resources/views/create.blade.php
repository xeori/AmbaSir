@extends('layout.body.main')
@section('layout')
@include('sweetalert::alert')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Users</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
<div class="card">
  <div class="card-body">



                    <form action="{{ route('user.store') }}" class="forms-sample" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-3">
                            <label for="exampleInputUsername1" class="form-label">Username</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Username">
                        
                        @error('nama')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                        <div class="mt-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Email">
                        
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                        <div class="mt-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" autocomplete="off" placeholder="Password">
                       
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                       
                    <div class="mt-3">
                        <label class="form-label" for="role">Role:</label>
                        <select name="role" class="form-control" id="role">
                            <option value="pengguna">Pengguna</option>
                            <option value="admin">Admin</option>
                            <!-- Tambahkan opsi untuk peran lain jika diperlukan -->
                        </select>
                    </div>
                        
                        @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    
                        
                    <div class="mt-3">
                        <label for="exampleInputUsername1" class="form-label">Foto Profile</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" id="gambar" autocomplete="off" placeholder="gambar">
                        
                        @error('gambar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                

                  <div class="mt-3">
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
                    <a class="btn btn-secondary me-2" href="{{ route('produk') }}">Back</a>
                  </div>
                
                            
                       
                       
                    

  </div>

@endsection