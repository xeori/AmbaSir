@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.kategori.update',['id' => $data->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Edit category Form</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form>
                        <div class="card-body">
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$data->name}}" placeholder="Enter name category">
                          @error('name')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                         
                          @enderror
                        </div>

                        
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                            <a href="{{ $data }}" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
                          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
              </div><!-- /.container-fluid -->

            </form>
      </section>
   
  </div>   

@endsection