@extends('admin.layouts.app')
@section('title','Dashboard | Input')
@section('header', 'Tambah Petugas')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-outline card-primary">
            </div>
            <form action="{{ route('store.petugas') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama_petugas" placeholder="Masukan nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="username">username</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Masukan username">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Masukan password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telpon">telpon</label>
                                <input type="number" class="form-control" name="telp" placeholder="(+62)821165278">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="level">level</label>
                                <select name="level" id="level" class="custom-select">
                                    <option value="petugas" selected>Pilih level (Default petugas)</option>
                                    <option value="petugas">Petugas</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tgl_lahir">Tanggal lahir</label>
                            <input type="text" class="form-control" id="datepicker" name="tgl_lahir"
                                placeholder="d/m/Y">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="custom-select">
                                    {{-- <option value="laki-laki" selected>Pilih level (Default laki-laki)</option>
                                    --}}
                                    <option value="laki-laki">Laki laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" cols="10" rows="2"></textarea>
                        </div>
                    </div> --}}
                    <button class="btn btn-primary float-right " style="width:30%">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection