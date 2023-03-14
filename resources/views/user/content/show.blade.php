@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
    integrity="sha384-HVSkflmJvKtDQ2tPz3+XuMpK1LVkA7RlYp08hqV7LrpwLwvD++Q2Kyq3qvd7W16j" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/users/css/landing.css') }}">
<link rel="stylesheet" href="{{ asset('/users/css/laporan.css') }}">
@endsection

@section('title', 'SIPAKAT - Sistem Pengaduan Masyarakat')

{{-- request untuk status tab --}}
{{-- {{ request('status') == null ? 'active' : '' }} --}}


@section('content')
{{-- Section Header --}}
<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="/dashboard/user">
                    <h4 class="semi-bold mb-0 text-white">SIPAKAT</h4>
                    <p class="italic mt-0 text-white">Sistem Pengaduan Masyarakat</p>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @if(Auth::guard('masyarakat')->check())
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-expanded="false" style="color: white;">
                                {{
                                Auth::guard('masyarakat')->user()->nama
                                }}
                            </a>
                            <div class="dropdown-menu">
                                {{-- <a class="dropdown-item" href="#">Another action</a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout/admin">Logout</a>
                            </div>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

</section>
{{-- Section Card --}}
<div class="container">
    <div class="row justify-content-between">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 col">
            <div class="content content-top shadow">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                @endif
                @if (Session::has('pengaduan'))
                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                @endif
                <div class="card-header" style="color: #1219f0">
                    <h4 class="text-center" style="color: #1219f0">DATA PENGADUAN</h4>
                </div>
                <ul class="list-group ">
                    <li class="list-group-item">
                        <b style="color: black">NIK :</b> <a class="float-right" style="color: black">{{ $pengaduan->nik
                            }}</a>
                    </li>
                    <li class="list-group-item">
                        <b style="color: black">Judul laporan :</b> <a class="float-right" style="color:black">{{
                            $pengaduan->judul_laporan}}</a>
                    </li>
                    <li class="list-group-item">
                        <b style="color: black
                        ">Tanggal pengaduan :</b> <a class="float-right" style="color: black">{{
                            $pengaduan->tgl_pengaduan}}</a>
                    </li>
                    <li class="list-group-item">
                        <b style="color: black">isi laporan :</b> <a class="float-right" style="color: black">{{
                            $pengaduan->isi_laporan }}</a>
                    </li>
                    <li class="list-group-item">
                        <b style="color: black">Kategori laporan :</b> <a class="float-right" style="color: black">
                            {{ $pengaduan->kategori->nama }}</a>
                    </li>
                    <li class="list-group-item">
                        <b style="color: black">Alamat :</b> <a class="float-right" style="color: black">{{
                            $pengaduan->alamat}}</a>
                    </li>
                    <li class="list-group-item">
                        <b style="color: black">foto :</b> <a class="float-right" style="color: black">
                            <img src="/storage/{{ $pengaduan->foto }}" alt="" class="embed-responsive"
                                data-toggle="modal" data-target="#myModal"> </a>
                    </li>
                    <li class="list-group-item">
                        <b style="color: black">status :</b> <a class="float-right" style="color: black">
                            @if($pengaduan->status=='0' )
                            <span class="badge badge-danger float-right">Pending</span>
                            @elseif($pengaduan->status == 'proses')
                            <span class="badge badge-warning float-right">Proses</span>
                            @else
                            <span class="badge badge-success float-right">selesai</span>
                            @endif
                        </a>
                    </li>
                    <li class="list-group-item">

                        @if($pengaduan->status == 0)
                        <a class="btn btn-info btn-sm" href="{{ route('edit/pengaduan',$pengaduan->id_pengaduan ) }}"
                            style="width: 100%">
                            Edit
                        </a>
                        @endif
                        <a href="/user/laporan" class="btn btn-primary btn-sm mt-2" style="width:100%">Kembali</a>

                    </li>
                </ul>
                <div class="card-header">

                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('js')

    @endsection