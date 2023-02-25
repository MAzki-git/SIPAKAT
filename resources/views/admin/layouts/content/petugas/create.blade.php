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
                                <input type="text" class="form-control @error('nama_petugas')is-invalid

                                @enderror" name="nama_petugas" placeholder="Masukan nama">

                                @if ($errors->has('nama_petugas'))
                                <div class="text-danger">{{ $errors->first('nama_petugas') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="username">username</label>
                            <div class="form-group">
                                <input type="text" class="form-control @error('username')is-invalid

                                @enderror" name="username" placeholder="Masukan username">
                                @if ($errors->has('username'))
                                <div class="text-danger">{{ $errors->first('username') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" class="form-control @error('password')is-invalid

                                @enderror" name="password" placeholder="Masukan password">
                                @if ($errors->has('password'))
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telpon">telpon</label>
                                <input type="number" class="form-control @error('telp')is-invalid

                                @enderror" name="telp" placeholder="(+62)821165278">
                                @if ($errors->has('telp'))
                                <div class="text-danger">{{ $errors->first('telp') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="level">level</label>
                                <select name="level" id="level" class="custom-select @error('level')is-invalid

                                @enderror">
                                    <option value="petugas" selected>Pilih level (Default petugas)</option>
                                    <option value="petugas">Petugas</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @if ($errors->has('level'))
                                <div class="text-danger">{{ $errors->first('level') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tgl_lahir">Tanggal lahir</label>
                            <input type="text" class="form-control @error('tgl_lahir')is-invalid

                            @enderror" id="datepicker" name="tgl_lahir" placeholder="d/m/Y">
                            @if ($errors->has('tgl_lahir'))
                            <div class="text-danger">{{ $errors->first('tgl_lahir') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="custom-select @error('gender')is-invalid

                                @enderror">
                                    {{-- <option value="laki-laki" selected>Pilih level (Default laki-laki)</option>
                                    --}}
                                    <option value="laki-laki">Laki laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                @if ($errors->has('gender'))
                                <div class="text-danger">{{ $errors->first('gender') }}</div>
                                @endif
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