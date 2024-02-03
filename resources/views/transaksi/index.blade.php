@extends('layout.body.main') @section('layout')
@include('sweetalert::alert')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('transaksi.create') }}" class="btn btn-inverse-primary ">
                buat Transaksi</a>
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
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>User</th>
                                    <th>Payment</th>
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
                                        <td>{{$ts->created_at}}</td>
                                        <td>{{$ts->status}}</td>
                                        <td>{{$ts->total}}</td>
                                        <td>{{$ts->kasir_nama}}</td>
                                        <td>
                                            @if($ts->status == 'selesai')
                                                <a class="btn btn-info btn" href="{{ route('generate-pdf', ['id' => $ts->id]) }}"><i class="fas fa-file"></i> Cetak Struk</a>
                                            @else
                                                <a class="btn btn-inverse-success" href="{{ route('transaksi.lanjutkan', ['id' => $ts->id]) }}"><i class="fas fa-money-bill"></i> Bayarkan</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a
                                            href="{{ route('produk.edit', ['id' => $ts->id]) }}"
                                            class="btn btn-inverse-warning">
                                            <i class="link-icon" data-feather="edit"></i>
                                        </a>

                                        <button type="submit" class="btn btn-inverse-danger">
                                            <i class="link-icon" data-feather="trash"></i>
                                        </button>
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