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
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Users Table</h6>
                  

                    <div class="table-responsive">
                        <table class="table">
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
                                        <td>{{ $dt->role }}</td>
                                        <td><img src="{{ asset($dt->gambar) }}" alt="" style="max-width: 200px;"></td>
                                        <td>
                                            <a
                                                href="{{route('user.edit',['id' =>$dt->id]) }}"
                                                class="btn btn-inverse-warning  btn-icon">
                                                <i class="link-icon" data-feather="edit"></i>
                                            </a>

                                            <button type="submit" class="btn btn-inverse-danger  btn-icon">
                                                <i class="link-icon" data-feather="trash"></i>
                                            </button>
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

</div>

@endsection