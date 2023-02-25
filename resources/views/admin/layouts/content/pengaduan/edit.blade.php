@extends('admin.layouts.app')
@section('title','Pengaduan | Edit')
@section('header', 'Edit Pengaduan ')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <form action="{{ route('update.pengaduan', $pengaduan->id_pengaduan) }}" method="post">
                    @method('post')
                    @csrf
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
                            <label for="exampleInputEmail1">kategori</label>
                            <select name="id_kategori" class="custom-select">
                                @foreach ($kategori as $item )
                                <option value="{{ $item->id_kategori }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <div class="form-group mt-2 ">
                                <label for="exampleInputFile">File input</label>
                                <div class="costum-file">
                                    <input type="file" name="foto" class="form-control" id="validatedCustomFile"
                                        required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right mt-1" style="width: 30%">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection