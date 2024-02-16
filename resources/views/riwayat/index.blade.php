@extends('layout.body.main') @section('layout')
@include('sweetalert::alert')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <form id="printForm" action="{{ route('riwayat.print') }}" method="POST">
                @csrf
            <button type="submit" class="btn btn-inverse-info">
                 <i data-feather="printer"></i>
            </button>
        </form>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Histori Transaksi</h6>
                    <div id="alertMessage" class="alert alert-danger" role="alert" style="display: none;">
                        <i data-feather="alert-circle"></i>
                        Minimal Pilih 5 Yang Mau Di Print
                    </div>
                    <div class="table-responsive">
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
                                            <th>Select</th> <!-- Kolom baru untuk checkbox -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($riwayat as $ryt)
                                        <tr>
                                            <form
                                                action="{{ route('riwayat.destroy', ['id' => $ryt->id]) }}"
                                                method="POST">
                                                @csrf @method('DELETE')
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$ryt->created_at->format('d F Y')}}</td>
                                                <td>{{$ryt->kasir_nama}}</td>
                                                <td>{{format_rupiah($ryt->total)}}</td>
                                                <td>@if($ryt->status == 'selesai')
                                                    <span >Selesai</span>
                                                    @else
                                                    <span>Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(auth()->user()->role!="pengguna")
                                                    <button type="submit" class="btn btn-inverse-danger  btn-icon">
                                                        <i class="link-icon" data-feather="trash"></i>
                                                    </button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($ryt->status == 'selesai')
                                                    <input  id="deleteForm" type="checkbox" class="form-check-input" value="{{$ryt->id}}">
                                                    @endif
                                                </td>
                                            </form>
                                            <script>
                                                document.getElementById('printForm').addEventListener('submit', function(event) {
                                                    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                                                    if (checkboxes.length < 5) {
                                                        event.preventDefault();
                                                        document.getElementById('alertMessage').style.display = 'block'; // Menampilkan pesan kesalahan
                                                        setTimeout(function() {
                                                            document.getElementById('alertMessage').style.display = 'none'; // Sembunyikan pesan kesalahan setelah 3 detik
                                                        }, 3000);
                                                    }
                                                });
                                            </script>
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

</div>

@endsection