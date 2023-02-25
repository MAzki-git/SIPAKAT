@extends('admin.layouts.app')
@section('title','Dashboard | Show')
@section('header', 'Detail Petugas')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-10">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('/adminlte/dist/img/user4-128x128.jpg') }}" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $user->username }}</h3>
                    {{--
                    <h6 class="text-muted text-center">
                        <span class="badge badge-info">{{ $user->nik }}</span>

                    </h6> --}}
                    <div class="card card-body card-outline card-primary " style="width: 100%">
                        <ul class="list-group ">
                            <li class="list-group-item">
                                <b>NIK :</b>
                                <h5 class="float-right" style="color:white"><span class="badge badge-light">{{
                                        $user->nik
                                        }}</span></h5>
                            </li>
                            <li class="list-group-item">
                                <b>Username :</b> <a class="float-right" style="color:white">{{ $user->username
                                    }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Nama :</b> <a class="float-right" style="color:white">{{ $user->nama
                                    }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Jenis kelamin :</b> <a class="float-right" style="color:white">{{ $user->gender
                                    }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tanggal lahir :</b> <a class="float-right" style="color:white">{{ $user->tgl_lahir
                                    }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Telepon :</b> <a class="float-right" style="color: white">{{ $user->telp }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Alamat :</b> <a class="float-right" style="color: white">{{
                                    $user->alamat }}</a>
                            </li>
                            <li class="list-group-item">
                                <a class="btn btn-info btn-sm" href="{{ route('edit/user', $user->nik) }}"
                                    style="width: 49%">
                                    <i class=" fas fa-pencil-alt">
                                    </i>
                                </a>
                                <a href="{{ route('delete/user', $user->nik) }}" class="btn btn-danger btn-sm"
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