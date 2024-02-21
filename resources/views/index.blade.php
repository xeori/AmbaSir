@extends('layout.body.main') @section('layout')
@include('sweetalert::alert')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
              <a href="{{ route('user.create') }}" class="btn btn-inverse-info mb-3">
                <i data-feather="user-plus"></i>
                    </a>
        </ol>
    </nav>

    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Users Table</h6>
                  

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Profile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dt)
                                <form action="{{route('user.delete', ['id' =>$dt->id]) }}" method="POST">
                                    @csrf @method('DELETE')
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td>{{ $dt->name }}</td>
                                    <td>{{ $dt->email }}</td>
                                    <td> 
                                        @if($dt->role === 'admin')
                                            <span class="badge bg-danger">Admin</span>
                                        @elseif($dt->role === 'pemilik')
                                            <span class="badge bg-success">Pemilik</span>
                                        @else
                                            <span class="badge bg-primary">Karyawan</span>
                                        @endif
                                    </td>
                                    <td><img src="{{ asset($dt->gambar) }}" alt="" style="max-width: 200px;"></td>
                                    <td>
                                        <div class="d-flex">
                                           
                                            <a href="{{route('user.edit',['id' =>$dt->id]) }}" class="btn btn-inverse-warning btn-icon me-2">
                                                <i class="link-icon" data-feather="edit"></i>
                                            </a>
                                            
                                         
                                               
                                                    <button type="submit" class="btn btn-inverse-danger btn-icon">
                                                        <i class="link-icon" data-feather="trash"></i>
                                                    </button>
                                                </form>
                                          
                                        </div>
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

</div>

@endsection