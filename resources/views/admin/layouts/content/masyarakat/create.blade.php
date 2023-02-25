@extends('admin.layouts.app')
@section('title','Dashboard | tambah')
@section('header', 'Tambah masyarakat')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-outline card-primary">
            </div>
            <form action="{{ route('store.user') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NIK">NIK</label>
                                <input type="number" class="form-control" name="nik"
                                    placeholder="Masukan Nomor Induk Kependudukan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nama">Nama</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" placeholder="Masukan nama">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Masukan username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Masukan password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="number" class="form-control" id="phone" name="telp"
                                    placeholder="(+62)821165278" required>
                            </div>
                        </div>
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
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tgl_lahir">Tanggal lahir</label>
                            <input type="text" class="form-control" id="datepicker" name="tgl_lahir"
                                placeholder="d/m/Y">
                        </div>
                        <div class="col-md-6">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" cols="10" rows="2"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary float-right mt-3" style="width:30%">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection