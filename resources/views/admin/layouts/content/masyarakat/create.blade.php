@extends('admin.layouts.app')
@section('title','Dashboard | Input')
@section('header', 'Tambah masyarakat')

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
                        <label for="exampleInputEmail1">NIK</label>
                        <input type="number" class="form-control" name="nik" id="NikInputEmail1"
                            placeholder="Masukan Nomor Induk Kependudukan" value="{{ old('nik') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama </label>
                        <input type="text" class="form-control" name="nama" id="NamaInputEmail1"
                            placeholder="Masukan nama " value="{{ old('nama') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username" id="NamaInputEmail1"
                            placeholder="Masukan username " value="{{ old('username') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" name="password" id="NamaInputEmail1"
                            placeholder="Masukan password " value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telepon</label>
                        <input type="number" class="form-control" name="telp" id="NamaInputEmail1"
                            placeholder="Masukan nomor telepon " value="{{ old('telp') }}">
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