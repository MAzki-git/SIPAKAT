@extends('admin.layouts.app')
@section('title','Pengaduan | Show')
@section('header', 'Detail Pengaduan ')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-6">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">Pengaduan</h3>
                    <div class="card-header card-outline card-primary">
                    </div>

                    <div class="card card-body card-outline  " style="width: 100%">
                        <ul class="list-group ">
                            <li class="list-group-item">
                                <b>NIK :</b> <a class="float-right" style="color: white">{{ $pengaduan->nik }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Judul laporan :</b> <a class="float-right" style="color:white">{{
                                    $pengaduan->judul_laporan}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tanggal pengaduan :</b> <a class="float-right" style="color: white">{{
                                    $pengaduan->tgl_pengaduan}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>isi laporan :</b> <a class="float-right" style="color: white">{{
                                    $pengaduan->isi_laporan ??''}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>foto :</b> <a class="float-right embed-responsive" style="color: white">{{
                                    Storage::url($pengaduan->foto) }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>status :</b> <a class="float-right" style="color: white">
                                    @if($pengaduan->status=='0' )
                                    <a href="#" class="badge badge-danger float-right">Pending</a>
                                    @elseif($pengaduan->status == 'proses')
                                    <a href="#" class="badge badge-warning float-right">Proses</a>
                                    @else
                                    <a href="#" class="badge badge-success float-right">selesai</a>
                                    @endif
                                </a>
                            </li>
                            {{-- <li class="list-group-item">
                                <b>Tanggapan:</b> <a class="float-right embed-responsive" style="color: white">{{
                                    $tanggapan->tanggapan}}</a>
                            </li> --}}
                            {{-- <li class="list-group-item">
                                <b>Tanggal tanggapan :</b> <a class="float-right" style="color: white">{{
                                    $tanggapan->tgl_tanggapan}}</a>
                            </li> --}}
                            <li class="list-group-item">
                                <a class="btn btn-info btn-sm" href="{{ route('edit/pengaduan',
                                    $pengaduan->id_pengaduan ) }}" style="width: 49%">
                                    <i class=" fas fa-pencil-alt">
                                    </i>
                                </a>
                                <a href="{{ route('delete/pengaduan', $pengaduan->id_pengaduan ) }}"
                                    class="btn btn-danger btn-sm" style="width: 50%">
                                    <i class=" fas fa-trash">
                                    </i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- Tanggapan --}}
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">Tanggapan</h3>
                    <div class="card-header card-outline card-primary">
                    </div>
                    <div class="card card-body card-outline  " style="width: 100%">
                        <form action="{{ route('tanggapan') }}" method="post">
                            @csrf
                            <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" id="status" class="custom-select">
                                    @if($pengaduan->level == '0')
                                    <option selected value="0">Pending</option>
                                    <option value="Proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                    @elseif ($pengaduan->status=='proses')
                                    <option value="0">Pending</option>
                                    <option selected value="Proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                    @else
                                    <option value="0">Pending</option>
                                    <option value="Proses">Proses</option>
                                    <option selected value="selesai">Selesai</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggapan</label>
                                <textarea type="text" class=" form-control" name="tanggapan">
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection