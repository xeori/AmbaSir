@extends('layout.body.main') @section('layout')
@include('sweetalert::alert')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('produk.create') }}" class="btn btn-inverse-primary ">
                Tambah Produk</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Tabel Produk</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Diskon</th>
                                    <th>Stok</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $pdk)
                                <tr>
                                    <form
                                        action="{{ route('produk.destroy', ['id' => $pdk->id]) }}"
                                        method="POST">
                                        @csrf @method('DELETE')
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pdk->name }}</td>
                                        <td>{{ $pdk->kategori->name }}</td>
                                        <td>{{ $pdk->harga }}</td>
                                        <td>{{ $pdk->diskon }}%</td>
                                        <td>{{ $pdk->stok }}</td>
                                        <td><img src="{{ asset($pdk->gambar) }}" alt="" style="max-width: 200px;"></td>
                                        <td>
                                            <a
                                                href="{{ route('produk.edit', ['id' => $pdk->id]) }}"
                                                class="btn btn-inverse-warning">
                                                <i class="link-icon" data-feather="edit"></i>
                                            </a>

                                            <button type="submit" class="btn btn-inverse-danger">
                                                <i class="link-icon" data-feather="trash"></i>
                                            </button>
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