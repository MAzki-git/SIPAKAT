@extends('admin.layouts.app')
@section('title','Admin | Dashboard')
@section('header', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-navy elevation-1"><i class=" fa-solid fas fa-user-tie"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Petugas</span>
                <span class="info-box-number">
                    {{$petugas}}
                </span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Masyarakat</span>
                <span class="info-box-number">{{$user}}</span>
            </div>
        </div>
    </div>

    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-business-time"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Pengaduan proses</span>
                <span class="info-box-number">{{ $proses }}</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-lime elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pengaduan selesai</span>
                <span class="info-box-number">{{ $selesai }}</span>
            </div>
        </div>
    </div>

    {{-- //datapengaduan --}}
    <div class="col-6">
        <div class="card mt-4">
            <div class="card-header border-transparent">
                <h3 class="card-title">Pengaduan</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul laporan</th>
                                <th>Status</th>
                                <th style="text-align: center">Tanggal pengaduan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul_laporan }}</td>
                                <td>@if($item->status=='0')
                                    <span href="#" class="badge badge-danger">Pending</span>
                                    @elseif($item->status == 'proses')
                                    <span href="#" class="badge badge-warning">Proses</span>
                                    @else
                                    <span href="#" class="badge badge-success">selesai</span>
                                    @endif
                                </td>
                                <td>{{ $item->tgl_pengaduan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="float-right">
                    {{ $pengaduan->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- //data masyarakat --}}
    <div class="col-6">
        <div class="card mt-4">
            <div class="card-header border-transparent">
                <h3 class="card-title">Masyarakat</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($masyarakat as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nama }}
                                </td>
                                <td>{{ $item->username}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="float-right">
                    {{ $pengaduan->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection