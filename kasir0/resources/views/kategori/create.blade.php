@extends('layout.main')
@section('sidebar')
<li class="nav-item">
  <a href="{{route('admin.dashboard')}}" class="nav-link {{Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
    <i class="nav-icon fas fa-th"></i>
    <p>
      Dashboard
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
     </li>

     <li class="nav-item">
      <a href="{{route('admin.index')}}" class="nav-link {{Route::currentRouteName() == 'index' ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Users
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>

     <li class="nav-item">
      <a href="{{ route('admin.kategori') }}" class="nav-link {{Route::currentRouteName() == 'kategori' ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>
          Kategori
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
         </li>

         <li class="nav-item">
          <a href="{{ route('admin.produk') }}" class="nav-link {{Route::currentRouteName() == 'produk' ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Produk
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
             </li>

             <li class="nav-item">
              <a href="{{ route('admin.transaksi') }}" class="nav-link {{Route::currentRouteName() == 'transaksi' ? 'active' : '' }}">
                <i class="nav-icon fas fa-exchange-alt"></i>
                <p>
                  Transaksi
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
                 </li>

         </li>
         <li class="nav-item">
          <a href="{{route('logout')}}" class="nav-link ">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
             </li>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('admin.kategori.store')}}" method="POST">
                @csrf
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Add category Form</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form>
                        <div class="card-body">
                          <div class="form-group">
                            <label for="name">Name Category</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name category">
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
          </div>
      </section>
   
  </div>   

@endsection