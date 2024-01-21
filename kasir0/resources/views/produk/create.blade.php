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
      <a href="{{ route('admin.kategori') }}" class="nav-link">
        <i class="nav-icon fas fa-list"></i>
        <p>
          Kategori
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
         </li>

         <li class="nav-item">
          <a href="{{ route('admin.produk') }}" class="nav-link active">
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
    <!-- /.content-header -->
    <section class="content">
        <form action="{{ route('admin.produk.store') }} "method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row p-2">
            <div class="col-md-6">
              <div class="card">
            <div class="card-body">
                
                <label for="">Nama Kategori</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Kategori" value="">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
    
                    <label for="">Nama Kategori</label>
                    <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" id="">
                        <option value="">--Kategori--</option>
                       @foreach ($kategori as $item)
                           <option value="{{ $item->id }}">{{ $item->name }}</option>
                       @endforeach
                    </select>
                    @error('kategori_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
    
                    <label for="">Harga</label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga" value="">
                    @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
    
                    <label for="">Stok</label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Stok" value="">
                    @error('stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
    
                    <label for="">Gambar</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" value="">
                    @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  
                   
                    <a href="{{ $konz }}" class="btn btn-info mt-2"><i class="fas fa-arrow-left"></i>Kembali</a>
                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i>Simpan</button>
          
                </div>
              </div>
            </div>
      
      
    
        
            </div>
          </div>
        </form>
      
      </section>
   
    </div>
   
@endsection