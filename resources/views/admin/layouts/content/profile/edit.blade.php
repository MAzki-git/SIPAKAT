@extends('admin.layouts.app')
@section('title','Admin | Profile')
@section('header', 'Profile')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ Auth::guard('admin')->user()->nama_petugas }}</h3>
                    <p class="text-muted text-center">
                        <span class="badge badge-primary">{{ Auth::guard('admin')->user()->level }}</span>
                    </p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Username :</b> <a class="float-right">{{ Auth::guard('admin')->user()->username }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tanggal lahir :</b> <a class="float-right">{{ Auth::guard('admin')->user()->tgl_lahir
                                }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>telepon :</b> <a class="float-right">{{ Auth::guard('admin')->user()->telp }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Jenis kelamin :</b> <a class="float-right">{{ Auth::guard('admin')->user()->gender }}</a>
                        </li>
                    </ul>
                    {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-outline card-primary">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            {{-- <span class="btn btn-primary" style="height: 100%">Settings</span> --}}
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        {{-- <div class="tab-pane" id="settings"> --}}
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName"
                                            placeholder="nama_petugas">
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName2" placeholder="username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience"
                                            placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection