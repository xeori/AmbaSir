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
              <a href="{{ route('admin.transaksi') }}" class="nav-link active">
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
                    <option value="{{$p->id}}">{{$p->name}}</option>
                    @endforeach
                  </select>
                  <button type="submit" class="btn btn-primary ">Pilih</button>
                  </div> 
                  </form>
                </div>
              </div>
              
              <!-- knt -->

              <br> 
              <form action="{{ route('admin.transaksidetail.create') }}" method="POST">
                @csrf 
                <input type="hidden" name="produk_id"  value="{{ $p_detail->id }}">
                <input type="hidden" name="produk_name"  value="{{ $p_detail->name }}">
                <input type="hidden" name="transaksi_id"  value="{{ Request::segment(3) }}">
                <input type="hidden" name="subtotal"  value="{{ $subtotal }}">

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
                        <!-- Tambahkan elemen ini untuk menampung nilai qty -->
                        <input type="hidden" id="hiddenQty" value="1">
                      </div>
                      <div class="col-md-8">
                        <div class="d-flex">
                          <button type="button" class="btn btn-primary" onclick="updateQty(-1)"><i class="fas fa-minus"></i></button>
                          <input type="number" class="form-control" name="qty" id="qty" value="1" min="1" oninput="updateSubtotal()">
                          <button type="button" class="btn btn-primary" onclick="updateQty(1)"><i class="fas fa-plus"></i></button>
                        </div>
                        <!-- Menampilkan harga dari database -->
                        <!-- <h5>Harga: Rp {{ $p_detail ? $p_detail->harga : '' }}</h5> -->
                        <!-- Subtotal akan ditampilkan di bawah input qty -->
                        <h5 id="subtotal">Subtotal: Rp {{ $p_detail ? $p_detail->harga : '' }}</h5>
                      </div>
                    </div>
              <div class=" row mt-1">
                <div class="col-md-4">
                  
                </div>
                <div class="col-md-8">
                <a href="{{ route('admin.transaksi') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i>Kembali</a>
                <button type="sumbit" class="btn btn-primary">Tambah <i class="fas fa-arrow-right"></i></button>
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
                  <th>#</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Tanggo</td>
                  <td>4</td>
                  <td>
                    <a href=""><i class="fas fa-times"></i></a>
                  </td>
                </tr>
              </table>
              <a href="" class="btn btn-info"><i class="fas fa-file"></i> Pending</a>
              <a href="" class="btn btn-success"><i class="fas fa-check"></i> Selesai</a>
            </div>
          </div>
        </div>
      </div>
     

      <div class="row p-2">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="">Total Belanja</label>
                <input type="number" name="total_belanja" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Dibayarkan</label>
                <input type="number" name="dibayarkan" class="form-control">
              </div>

              <button type="submit" class="btn btn-primary btn-block">Hitung</button>

              <hr>

              <div class="form-group">
                <label for="">Uang Kembalian</label>
                <input type="number" disabled name="kembalian" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>
     
  </div>   

<script>
  function updateQty(amount) {
    var qtyInput = document.getElementById('qty');
    var newValue = parseInt(qtyInput.value) + amount;

    // Pastikan nilai tidak kurang dari 1
    newValue = newValue < 1 ? 1 : newValue;

    qtyInput.value = newValue;
  }
</script>

<script>
  function updateQty(amount) {
    var qtyInput = document.getElementById('qty');
    var hiddenQty = document.getElementById('hiddenQty');
    var newValue = parseInt(qtyInput.value) + amount;

    // Pastikan nilai tidak kurang dari 1
    newValue = newValue < 1 ? 1 : newValue;

    qtyInput.value = newValue;
    hiddenQty.value = newValue;

    updateSubtotal();
  }

  function updateSubtotal() {
    var qty = document.getElementById('hiddenQty').value;
    var subtotalElement = document.getElementById('subtotal');
    var harga = parseFloat("{{ $p_detail ? $p_detail->harga : 0 }}"); // Menggunakan parseFloat untuk memastikan nilai numerik

    var subtotal = qty * harga;
    subtotalElement.innerText = 'Subtotal: Rp ' + subtotal.toFixed(2);
  }
</script>

@endsection
