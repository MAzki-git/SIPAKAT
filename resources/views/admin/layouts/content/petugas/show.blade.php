@extends('admin.layouts.app')
@section('title','Dashboard | Show')
@section('header', 'Detail Petugas')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-6">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('/adminlte/dist/img/user4-128x128.jpg') }}" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $petugas->username }}</h3>

                    <p class="text-muted text-center">
                        @if($petugas->level == 'admin')
                        <span class="badge badge-info">{{ $petugas->level }}</span>
                        @else
                        <span class="badge badge-warning">{{ $petugas->level }}</span>
                        @endif
                    </p>
                    <div class="card card-body card-outline card-primary " style="width: 100%">
                        <ul class="list-group ">
                            <li class="list-group-item">
                                <b>Nama :</b> <a class="float-right" style="color:white">{{ $petugas->nama_petugas
                                    }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Telepon :</b> <a class="float-right" style="color: white">{{ $petugas->telp }}</a>
                            </li>
                            <li class="list-group-item">
                                <a class="btn btn-info btn-sm" href="{{ route('edit', $petugas->id_petugas) }}"
                                    style="width: 49%">
                                    <i class=" fas fa-pencil-alt">
                                    </i>
                                </a>
                                <a href="{{ route('delete', $petugas->id_petugas) }}" class="btn btn-danger btn-sm"
                                    style="width: 50%">
                                    <i class=" fas fa-trash">
                                    </i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
    @endsection