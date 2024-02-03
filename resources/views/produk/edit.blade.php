@extends('layout.body.main')
@section('layout')
@include('sweetalert::alert')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Produk</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
<div class="card">
  <div class="card-body">



                    <form action="{{route('admin.produk.update',['id' => $produk->id])}}" class="forms-sample" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Nama Produk</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Produk"  value="{{ old('name', $produk->name) }}">
                        
                        @error('name')
                      <span class="text-danger">{{$message}}</span>    
                       
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select Input</label>
                        <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" class="form-select" id="exampleFormControlSelect1">
                            <option selected disabled>--Pilih Kategori--</option>
                            @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $produk->kategori_id ? 'selected' : '' }} >{{ $item->name }}</option>
                        @endforeach
                        </select>
                        @error('kategori_id')
                        <span class="text-danger">{{$message}}</span>    
                         
                          @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">harga</label>
                        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Harga" value="{{ old('name', $produk->harga) }}">
                    
                    @error('harga')
                  <span class="text-danger">{{$message}}</span>    
                   
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Jumlah Stok" value="{{ old('name', $produk->stok) }}">
                
                @error('stok')
              <span class="text-danger">{{$message}}</span>    
               
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="gambar">
            
            @error('gambar')
          <span class="text-danger">{{$message}}</span>    
            @enderror
            @if($produk->gambar)
            <img src="{{ asset($produk->gambar) }}" alt="Produk Image" style="max-width: 200px; height: auto;">
            @endif
        </div>


           <div class="mt-3">
            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <button class="btn btn-secondary">Cancel</button>
           </div>
                           
                       
                       
                    </form>

  </div>

@endsection