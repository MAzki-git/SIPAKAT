@extends('admin.layouts.app')
@section('title','Pengaduan | Edit')
@section('header', 'Edit Pengaduan ')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <form action="" method="">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul laporan</label>
                            <input type="text" name="judul_laporan" class="form-control"
                                value="{{ $pengaduan->judul_laporan }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Isi laporan</label>
                            <textarea name="isi_laporan" rows="5"
                                class="form-control">{{ $pengaduan->isi_laporan }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection