@extends('layout.body.main')
@section('layout')
@include('sweetalert::alert')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Kategori</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
<div class="card">
  <div class="card-body">



                    <form action="{{route('admin.kategori.update',['id' => $kategori->id])}}" class="forms-sample" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Nama Kategori</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$kategori->name}}" id="exampleInputUsername1" autocomplete="off" placeholder="Masukan Nama Kategori">
                        
                        @error('name')
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