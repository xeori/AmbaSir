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



                    <form action="{{ route('admin.user.store') }}" class="forms-sample" method="POST">
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
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-secondary">Cancel</button>
                  </div>
                            
                       
                       
                    </form>

  </div>

@endsection