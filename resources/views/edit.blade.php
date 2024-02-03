@extends('layout.body.main')
@section('layout')
@include('sweetalert::alert')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Users</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
<div class="card">
  <div class="card-body">



                    <form action="{{route('user.update',['id' => $data->id])}}" class="forms-sample" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Username</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" value="{{$data->name  }}" placeholder="Username">
                        </div>
                        @error('nama')
                        <small>{{$message}}</small>
                        @enderror

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" value="{{$data->email}}" placeholder="Email">
                        </div>
                        @error('email')
                        <small>{{$message}}</small>
                        @enderror

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" autocomplete="off"  placeholder="Password">
                        </div>
                 
         
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select name="role" class="form-control" id="role">
                                <option value="pengguna" {{ $user->role === 'pengguna' ? 'selected' : '' }}>Pengguna</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <!-- Tambahkan opsi untuk peran lain jika diperlukan -->
                            </select>
                            
                      @error('role')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                          </div>
                       

                      <br>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                       
                       
                    </form>

  </div>

@endsection