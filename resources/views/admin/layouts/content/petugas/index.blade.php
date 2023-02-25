@extends('admin.layouts.app')
@section('title','Dashboard | Data petugas')
@section('header', 'Data Petugas')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="/tambah" type="button" class="btn btn-primary">Tambah petugas</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Telepon</th>
                            <th>level</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$item->nama_petugas }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->telp }}</td>
                            <td>
                                @if($item->level == 'admin')
                                <a href="#" class="badge badge-info">{{ $item->level }}</a>
                                @else
                                <a href="#" class="badge badge-warning">{{ $item->level }}</a>
                                @endif
                            </td>
                            <td class="project-actions text-center">
                                <a class="btn btn-primary btn-sm" href="{{ route('show', $item->id_petugas) }}">
                                    <i class="fas fa-eye">
                                    </i>
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('edit', $item->id_petugas) }}">
                                    <i class=" fas fa-pencil-alt">
                                    </i>
                                </a>
                                <a href="{{ route('delete', $item->id_petugas) }}"
                                    class="delete-btn btn btn-danger btn-sm">
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