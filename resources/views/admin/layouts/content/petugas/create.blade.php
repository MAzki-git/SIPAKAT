@extends('admin.layouts.app')
@section('title','Dashboard | Input')
@section('header', 'Tambah Petugas')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            </div>
            <form action="/store" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama petugas</label>
                        <input type="text" class="form-control" name="nama_petugas" id="NamaInputEmail1"
                            placeholder="Masukan nama petugas" value="{{ old('nama_petugas') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username" id="NamaInputEmail1"
                            placeholder="Masukan username petugas" value="{{ old('username') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" name="password" id="NamaInputEmail1"
                            placeholder="Masukan password petugas" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telepon</label>
                        <input type="number" class="form-control" name="telp" id="NamaInputEmail1"
                            placeholder="Masukan nomor telepon petugas" value="{{ old('telp') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Level</label>
                        <select name="level" id="level" class="custom-select">
                            <option value="petugas" selected>Pilih level (Default petugas)</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12">
        @if(Session::has('username'))
        <div class="alert alert-danger">
            {{ Session::get('username') }}
        </div>
        @endif
        @if($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection