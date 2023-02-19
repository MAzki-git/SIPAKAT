@extends('admin.layouts.app')
@section('title','Dashboard | Update')
@section('header', 'Edit masyarakat')

@section('content')

<div class="row">
    {{--
    <!-- left column --> --}}
    <div class="col-12">
        {{--
        <!-- general form elements --> --}}
        <div class="card card-primary">
            <div class="card-header">
            </div>
            <form action="{{ route('update/user', $user->nik) }}" method="post">
                @csrf
                @method('post')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label>
                        <input class="form-control" type="text" value="{{ $user->nik }}" name="nik" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama </label>
                        <input type="text" value="{{ $user->nama }}" class="form-control" name="nama"
                            id="NamaInputEmail1" placeholder="Masukan nama ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" value="{{ $user->username }}" class=" form-control" name="username"
                            id="NamaInputEmail1" placeholder="Masukan username ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" name="password" id="NamaInputEmail1"
                            placeholder="Masukan password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telepon</label>
                        <input type="number" value="{{ $user->telp }}" class="form-control" name="telp"
                            id="NamaInputEmail1" placeholder="Masukan nomor telepon ">
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