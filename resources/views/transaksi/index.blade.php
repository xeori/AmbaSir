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
                                <tr id="row{{$ts->id}}">
                                    <form id="form{{$ts->id}}"
                                          action="{{ route('transaksi.destroy', ['id' => $ts->id]) }}"
                                          method="POST">
                                        @csrf @method('DELETE')
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
                                            @if($ts->status == 'selesai')
                                            <a id="btnInvoice{{$ts->id}}"
                                               class="btn btn-inverse-success btn-icon"
                                               href="{{ route('invoice', ['id' => $ts->id]) }}">
                                                <i class="link-icon" data-feather="file-text"></i>
                                            </a>
                                            @else
                                            <a id="btnLanjutkan{{$ts->id}}"
                                                    class="btn btn-inverse-warning btn-icon"
                                                    onclick="handleLanjutkan({{ $ts->id }})">
                                                <i class="link-icon" data-feather="flag"></i>
                                            </a>
                                            @endif
                                            <button id="btnDestroy{{$ts->id}}"
                                                    class="btn btn-inverse-danger btn-icon"
                                                    style="display: none;"
                                                    type="submit">
                                                <i class="link-icon" data-feather="trash"></i>
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                            
                            <script>
                                @foreach ($transaksi as $ts)
                                    // Fungsi untuk memeriksa status dan menampilkan tombol yang sesuai
                                    function checkStatus{{$ts->id}}() {
                                        var created_at{{$ts->id}} = "{{ $ts->created_at->toIso8601String() }}";
    var fifteenMinutesAgo = new Date(created_at{{$ts->id}});
    fifteenMinutesAgo.setMinutes(fifteenMinutesAgo.getMinutes() + 1);
                            
                                        var now = new Date();
                                        if (now > fifteenMinutesAgo) {
                                            document.getElementById('status{{$ts->id}}').innerText = 'Expired';
                                            document.getElementById('btnDestroy{{$ts->id}}').style.display = 'inline-block';
                                            document.getElementById('btnLanjutkan{{$ts->id}}').style.display = 'none';
                                            document.getElementById('btnInvoice{{$ts->id}}').style.display = 'none';
                                            clearInterval(interval{{$ts->id}});
                                        }
                                    }
                            
                                    // Panggil fungsi pertama kali saat halaman dimuat
                                    checkStatus{{$ts->id}}();
                            
                                    // Set interval untuk memeriksa status setiap menit
                                    var interval{{$ts->id}} = setInterval(checkStatus{{$ts->id}}, 60000); // 60000 milidetik = 1 menit
                                @endforeach
                            
                                // Fungsi untuk menangani tombol "lanjutkan"
                                function handleLanjutkan(id) {
                                    // Lakukan sesuatu saat tombol "lanjutkan" ditekan
                                    // Misalnya, mengarahkan ke rute "transaksi.lanjutkan"
                                    window.location.href = "{{ route('transaksi.lanjutkan', ['id' => $ts->id]) }}";
                                }
                            </script>
                            
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection