@extends('layout.body.main') @section('layout')
@include('sweetalert::alert')
<div class="page-content">

    <nav class="page-breadcrumb">
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
                                <tr>
                                    <form
                                        action="{{ route('transaksi.destroy', ['id' => $ts->id]) }}"
                                        method="POST">
                                        @csrf @method('DELETE')
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$ts->created_at->format('d F Y')}}</td>
                                        <td>{{$ts->kasir_nama}}</td>
                                        <td>{{format_rupiah($ts->total)}}</td>
                                        <td>@if($ts->status == 'selesai')
                                            <span >Selesai</span>
                                            @else
                                            <span>Lanjutkan</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($ts->status == 'selesai')
                                                <a class="btn btn-inverse-success" href="{{ route('invoice', ['id' => $ts->id]) }}"> <i class="link-icon" data-feather="file-text"></i></a>
                                            @else
                                                <a class="btn btn-inverse-warning" href="{{ route('transaksi.lanjutkan', ['id' => $ts->id]) }}"> <i class="link-icon" data-feather="flag"></i></a>
                                            @endif

                                            @if(auth()->user()->role!="pengguna")
                                            <button type="submit" class="btn btn-inverse-danger">
                                                <i class="link-icon" data-feather="trash"></i>
                                            </button>
                                            @endif
                                        </td>

                                           
                                        </td>
                                    </form>
                                </tr>
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