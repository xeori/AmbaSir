{{-- @extends('layout.body.main')
@section('layout')
@include('sweetalert::alert')
<div class="page-content">

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Kasir</a></li>
      <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-6   grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Part Komputer</h6>
          <p class="text-muted mb-3">Silahkan Memilih Part Komputer Yang Ingin Di Beli</p>
          <div class="table-responsive">
            <table id="dataTableExample" class="table">
             <thead>
    <tr>
        <th>#</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
  @foreach ($produk as $pd)
  <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $pd->name }}</td>
      <td>{{ $pd->harga }}</td>
      <td>{{ $pd->stok }}</td>
      <td>
          <form action="{{ route('transaksidetail.create') }}" method="POST">
              @csrf
              <input type="hidden" name="produk_id" value="{{ $pd->id }}">
              <input type="hidden" name="produk_name" value="{{ $pd->name }}">
              <input type="hidden" name="harga" value="{{ $pd->harga }}">
              <input type="hidden" name="transaksi_id" value="{{ Request::segment(4) }}">
              <input type="hidden" name="subtotal" value="{{ $subtotal }}"> 
              <input type="hidden" id="hiddenQty" value="1">
              <button type="submit" class="btn btn-inverse-info btn-icon-text">
                <i class="link-icon" data-feather="chevrons-right"></i>
            </button>
        </form>
          </form>
      </td>
  </tr>
  @endforeach
</tbody>

              
            </table>
               
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Part Komputer</h6>
          <p class="text-muted mb-3">Jika Sudah Silahkan Lanjutkan Pembayaran</p>
          <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transaksi_detail as $tdl)
                  <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $tdl->produk_name }}</td>
                    <td>{{ $tdl->qty }}</td>
                    <td>{{ 'Rp.'.format_rupiah ($tdl->subtotal)}}</td>
                    <td>
                      <a href="{{ route('transaksidetail.delete', ['id' => $tdl->id]) }}" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data?')) { document.getElementById('delete-form-{{$tdl->id}}').submit(); }">
                         <i class="link-icon" data-feather="x"></i>
                   </a>
     
                       <form id="delete-form-{{$tdl->id}}" action="{{ route('transaksidetail.delete', ['id' => $tdl->id]) }}" method="POST" style="display: none;">
                           @csrf
                           @method('DELETE')
                       </form>
                       </td>
                  </tr>
              @endforeach
                </tbody>
                   
                
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Pembayaran</h6>
          <form action="" method="GET">
          <div class="form-group mb-3">
            <label class="mb-2"  for="">Total Belanja</label>
            <input type="number" value="{{ optional($transaksi)->total }}" disabled name="total_belanja" class="form-control">
          </div>

          <div class="form-group mb-3">
            <label class="mb-2" for="">Dibayarkan</label>
            <input type="number" name="dibayarkan" value="{{ request('dibayarkan') }}" class="form-control">
          </div>
          @if($kembalian < 0)
          <div class="alert alert-danger">
              Uang tidak cukup. Harap masukkan jumlah uang yang sesuai.
          </div>
      @endif
          <button type="submit" class="btn btn-inverse-warning mb-3" style="width: 100%;">Hitung</button>
        </form>
        </div>
      </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Selesai</h6>
          <div class="form-group mb-3">
            <label class="mb-2" for="">Uang Kembalian</label>
            <input type="number" value="{{ format_rupiah($kembalian) }}" disabled name="kembalian" class="form-control">
        </div>

        <div class="form-group mt-5">
               
          @if($kembalian >= 0)
          <a id="btnSelesai" class="btn btn-inverse-info mb-3" style="width: 100%;" href="{{ route('transaksidetail.selesai', ['id' => Request::segment(4)]) }}">
              <i class="fas fa-frog"></i> Selesai
          </a>
      @else
          <button class="btn btn-inverse-info mb-3" style="width: 100%;" disabled>
              <i class="fas fa-frog"></i> Selesai
          </button>
      @endif
        </div>

        </div>
      </div>
    </div>

  </div>

</div>
@endsection --}}
@extends('layout.body.main')
@section('layout')
@include('sweetalert::alert')
<div class="page-content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="row p-2">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class=" row mt-1">
                <div class="col-md-4">
                  <label for="">Code Product</label>
                </div>
                <div class="col-md-8">
                  <form action="" method="GET">
                  <div class="u-flex">
                  <select name="produk_id" class="form-control" id="produk_id">
                  @foreach($produk as $p)
                  @if($p->stok > 0)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endif
                    @endforeach
                  </select>
                  <button type="submit" class="btn btn-inverse-info mt-3">Pilih</button>
                  </div> 
                  </form>
                </div>
              </div>
              
              <!-- knt -->

              <br> 
              <form action="{{ route('transaksidetail.create') }} "method="POST">
                @csrf 
                @if ($p_detail)
                  <input type="hidden" name="produk_id" value="{{ $p_detail->id }}">
              @endif
              
                <input type="hidden" name="produk_name"  value="{{  $p_detail ? $p_detail->name : ''  }}">
                <input type="hidden" name="transaksi_id" value="{{ Request::segment(4) }}">
                <input type="hidden" name="subtotal"  value="{{ $subtotal  }}">
                
              
              <div class=" row mt-1">
                <div class="col-md-4">
                  <label for="">Product Name</label>
                </div>
                <div class="col-md-8">
                <input type="text" class="form-control" value="{{ $p_detail ? $p_detail->name : '' }}" disabled name="nama_produk">

                </div>
              </div>
      
              <div class=" row mt-1">
                <div class="col-md-4">
                  <label for="">Harga Satuan</label>
                </div>
                <div class="col-md-8">
                <input type="text" class="form-control" value="{{ $p_detail ? $p_detail->harga : '' }}" disabled name="harga">

                </div>
              </div>

            

              <div class="row mt-1">
                      <div class="col-md-4">
                       <label for="">QTY</label>
                        <input type="hidden" id="hiddenQty" value="1">
                      </div>
                      
                      <div class="col-md-8">
                        <div class="d-flex">
                        <a href="?produk_id={{ request('produk_id') }}&act=min&qty={{ $qty }}" class="btn btn-inverse-primary"><i class="link-icon" data-feather="minus"></i></a>
                        
                          <input type="number" value="{{$qty}}" id="qty" class="form-control" name="qty">
                          <a href="?produk_id={{ request('produk_id') }}&act=plus&qty={{ $qty }}" class="btn btn-inverse-primary"> <i class="link-icon" data-feather="plus"></i></a>

                          
              </div>
              @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
                        <!-- Menampilkan harga dari database -->
                        <!-- <h5>Harga: Rp {{ $p_detail ? $p_detail->harga : '' }}</h5> -->
                        <!-- Subtotal akan ditampilkan di bawah input qty -->
                        <h5 class="m-2" id="subtotal">Subtotal: Rp. {{ format_rupiah($subtotal)}}</h5>
                      </div>
                    </div>
              <div class=" row mt-1">
                <div class="col-md-4">
                  
                </div>
                <div class="col-md-8">

                <button type="submit" class="btn btn-inverse-info btn-icon-text">Tambah Data<i class="link-icon" data-feather="chevrons-right"></i></button>
                </div>
              </div>
</form>
            </div>
          </div>
        </div>

       
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
             
              <table class="table">
                <tr>
                  <th>No</th>
                  <th>Nama Product</th>
                  <th>QTY</th>
                  <th>Subtotal</th>
                  <th>#</th>
                  
                </tr>
                @foreach($transaksi_detail as $td)
                <tr>
                <td>{{$loop->iteration}}</td>
                  <td>{{$td->produk_name}}</td>
                  <td>{{$td->qty}}</td>
                  <td>{{ 'Rp.'.format_rupiah ($td->subtotal)}}</td>
                  <td>
                 <a href="{{ route('transaksidetail.delete', ['id' => $td->id]) }}" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data?')) { document.getElementById('delete-form-{{$td->id}}').submit(); }">
                    <i class="link-icon" data-feather="x"></i>
              </a>

                  <form id="delete-form-{{$td->id}}" action="{{ route('transaksidetail.delete', ['id' => $td->id]) }}" method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                  </form>


                  </td>
                </tr>
                @endforeach
              </table>
              
                
                @if($kembalian >= 0)
    <a id="btnSelesai" class="btn btn-inverse-info btn" href="{{ route('transaksidetail.selesai', ['id' => Request::segment(4)]) }}">
        <i class="fas fa-frog"></i> Selesai
    </a>
@else
    <button class="btn btn-inverse-info btn" disabled>
        <i class="fas fa-frog"></i> Selesai
    </button>
@endif

              <!-- <a href="transaksidetail.selesai" b class="btn btn-success"><i class="fas fa-check"></i> Selesai</a> -->
           
            </div>
          
          </div>
        </div>
      </div>
     

      <div class="row p-2">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <form action="" method="GET">
              <div class="form-group mb-3">
                <label class="mb-2"  for="">Total Belanja</label>
                <input type="number" value="{{ optional($transaksi)->total }}" disabled name="total_belanja" class="form-control">
              </div>

              <div class="form-group mb-3">
                <label class="mb-2" for="">Dibayarkan</label>
                <input type="number" name="dibayarkan" value="{{ request('dibayarkan') }}" class="form-control">
              </div>

              <button type="submit" class="btn btn-inverse-info btn-block mb-3">Hitung</button>
            </form>
             

              @if($kembalian < 0)
    <div class="alert alert-danger">
        Uang tidak cukup. Harap masukkan jumlah uang yang sesuai.
    </div>
@endif

<div class="form-group mb-3">
    <label class="mb-2" for="">Uang Kembalian</label>
    <input type="number" value="{{ format_rupiah($kembalian) }}" disabled name="kembalian" class="form-control">
</div>
            </div>
          </div>
        </div>
      </div>
      </section>
     
  </div>  
  
  


@endsection 