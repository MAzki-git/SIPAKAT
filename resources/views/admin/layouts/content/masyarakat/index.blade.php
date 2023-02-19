@extends('admin.layouts.app')
@section('title','Dashboard | Data masyarakat')
@section('header', 'Data Masyarakat')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="/tambah/user" type="button" class="btn btn-primary">Tambah Masyarakat</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Telpon</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nik }}
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td> {{ $item->username }}</td>
                            <td>{{ $item->telp }}</td>
                            <td class="project-actions text-center">

                                <a class="btn btn-primary btn-sm" href="{{ route('show/user', $item->nik) }}">
                                    <i class="fas fa-eye">
                                    </i>
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('edit/user', $item->nik) }}">
                                    <i class=" fas fa-pencil-alt">
                                    </i>
                                </a>
                                <a href="{{ route('delete/user', $item->nik) }}" class="btn btn-danger btn-sm">
                                    <i class=" fas fa-trash">
                                    </i>
                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection