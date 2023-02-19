@extends('admin.layouts.app')
@section('title','Dashboard | Update')
@section('header', 'Edit Petugas')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            </div>
            <form action="{{ route('update', $petugas->id_petugas) }}" method="post">
                @csrf
                @method('post')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama petugas</label>
                        <input type="text" value="{{ $petugas->nama_petugas }}" class="form-control" name="nama_petugas"
                            id="NamaInputEmail1" placeholder="Masukan nama petugas">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" value="{{ $petugas->username }}" class=" form-control" name="username"
                            id="NamaInputEmail1" placeholder="Masukan username petugas">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" value="{{ $petugas->password }}" class="form-control" name="password"
                            id="NamaInputEmail1" placeholder="Masukan password petugas">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telepon</label>
                        <input type="number" value="{{ $petugas->telp }}" class="form-control" name="telp"
                            id="NamaInputEmail1" placeholder="Masukan nomor telepon petugas">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Level</label>
                        <select name="level" id="level" class="custom-select">
                            @if($petugas->level == 'admin')
                            <option selected value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                            @else
                            <option selected value="petugas">Petugas</option>
                            <option value="admin">Admin</option>
                            @endif
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection