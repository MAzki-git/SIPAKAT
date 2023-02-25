@extends('admin.layouts.app')
@section('title','Dashboard | Data masyarakat')
@section('header', 'Data Masyarakat')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{-- <a href="/tambah/user" type="button" class="btn btn-primary">Tambah Masyarakat</a> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Username</th>
                                {{-- <th>Jenis kelamin</th> --}}
                                <th>telepon</th>
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
                                {{-- <td>{{ $item->gender }}</td> --}}
                                <td>{{ $item->telp }}</td>
                                <td class="project-actions text-center">
                                    <a style="width: 40%" class="btn btn-primary btn-sm"
                                        href="{{ route('restore.user', $item->nik) }}">
                                        <i class="fas fa-undo"></i>

                                        </i>
                                    </a>
                                    <a style="width:40%" href="{{ route('force.user', $item->nik ) }}"
                                        class="delete-btn btn btn-danger btn-sm" style="width: 50%">
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
    @section('js')