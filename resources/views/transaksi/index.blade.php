@extends('layout.body.main') @section('layout')
@include('sweetalert::alert')
<div class="page-content">

    <nav class="page-breadcrumb">
        <div id="alertMessage" class="alert alert-info alert-dismissible fade show" role="alert">
            Selamat datang 
            {{ $pengguna }}
            di Kasir UKK
            !!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
        <script>
            // Menghilangkan alert setelah 5 detik
            setTimeout(function(){
                var alertMessage = document.getElementById('alertMessage');
                alertMessage.remove();
            }, 5000); // 5000 milidetik = 5 detik
        </script>
        <ol class="breadcrumb">
            <a href="{{ route('transaksi.create') }}" class="btn btn-inverse-info ">
                Buat Transaksi</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Tabel Transaksi</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>User</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $ts)
                                <tr id="row{{$ts->id}}">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$ts->created_at->format('d F Y')}}</td>
                                    <td>{{$ts->kasir_nama}}</td>
                                    <td>{{format_rupiah($ts->total)}}</td>
                                    <td>
                                        @if($ts->status == 'selesai')
                                            <span>Selesai</span>
                                        @else
                                            <span id="status{{$ts->id}}">Lanjutkan</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            @if($ts->status == 'selesai')
                                                <a id="btnInvoice{{$ts->id}}"
                                                    class="btn btn-inverse-success btn-icon"
                                                    href="{{ route('invoice', ['id' => $ts->id]) }}">
                                                    <i class="link-icon" data-feather="file-text"></i>
                                                </a>
                                                <form id="formPrint{{$ts->id}}"
                                                    action="{{ route('print.invoice', ['id' => $ts->id]) }}"
                                                    method="POST">
                                                  @csrf
                                                  <button type="submit" class="btn btn-inverse-primary btn-icon" style="margin-left: 5px;">
                                                      <i data-feather="printer" class="link-icon"></i>
                                                  </button>
                                              </form>
                                            @endif
                                           
                                            <form id="formDestroy{{$ts->id}}"
                                                  action="{{ route('transaksi.destroy', ['id' => $ts->id]) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button id="btnDestroy{{$ts->id}}"
                                                        class="btn btn-inverse-danger btn-icon"
                                                        style="display: none;"
                                                        type="submit">
                                                    <i class="link-icon" data-feather="trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                
                       
                            @foreach ($transaksi as $ts)
                            <script>
                                @if ($ts->status != 'selesai')
                                    document.getElementById('status{{$ts->id}}').innerText = 'Expired';
                                    document.getElementById('btnDestroy{{$ts->id}}').style.display = 'inline-block';
                                    document.getElementById('btnLanjutkan{{$ts->id}}').style.display = 'none';
                                    document.getElementById('btnInvoice{{$ts->id}}').style.display = 'none';
                                @endif
                            </script>
                            @endforeach


                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection