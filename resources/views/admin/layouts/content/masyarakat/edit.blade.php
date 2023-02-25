@extends('admin.layouts.app')
@section('title','Dashboard | Update')
@section('header', 'Edit masyarakat')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-outline card-primary">
            </div>
            <form action="{{ route('update/user', $user->nik) }}" method="post">
                @csrf
                @method('post')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NIK">NIK</label>
                                <input type="number" class="form-control" name="nik"
                                    placeholder="Masukan Nomor Induk Kependudukan" value="{{ $user->nik }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nama">Nama</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" placeholder="Masukan nama"
                                    value="{{ $user->nama }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Masukan username"
                                    value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Masukan password" value="{{ $user->password }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="number" class="form-control" value="{{ $user->telp }}" id="phone"
                                    name="telp" placeholder="(+62)821165278" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="custom-select">
                                    @if($user->gender == 'laki-laki')
                                    <option selected value="laki-laki">laki laki</option>
                                    <option value="perempuan">Perempuan</option>
                                    @else
                                    <option selected value="Perempuan">Perempuan</option>
                                    <option value="laki-laki">laki laki</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tgl_lahir">Tanggal lahir</label>
                            <input type="text" class="form-control" id="datepicker" name="tgl_lahir" placeholder="d/m/Y"
                                value="{{ $user->tgl_lahir }}">
                        </div>
                        <div class="col-md-6">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" cols="10"
                                rows="2">{{ $user->alamat }}</textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary float-right mt-3" style="width:30%">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection