@extends('admin.layouts.app')
@section('title','Dashboard | Data petugas')
@section('header', 'Data Petugas')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{-- <a href="/tambah" type="button" class="btn btn-primary">Tambah petugas</a> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
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
                                    <a style="width: 40%" class="btn btn-primary btn-sm"
                                        href="{{ route('restore.petugas', $item->id_petugas) }}">
                                        <i class="fas fa-undo"></i>

                                        </i>
                                    </a>
                                    <a style="width:40%" href="{{ route('force.petugas', $item->id_petugas ) }}"
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
</div>
@endsection