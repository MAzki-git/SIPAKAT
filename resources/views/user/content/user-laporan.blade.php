@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
    integrity="sha384-HVSkflmJvKtDQ2tPz3+XuMpK1LVkA7RlYp08hqV7LrpwLwvD++Q2Kyq3qvd7W16j" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/users/css/landing.css') }}">
<link rel="stylesheet" href="{{ asset('/users/css/laporan.css') }}">
@endsection

@section('title', 'SIPAKAT - Sistem Pengaduan Masyarakat')

@section('content')
{{-- Section Header --}}
<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="">
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
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout/user">Logout</a>
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
                <div class="card mb-3 card-outline card-primary">
                    <div class="card-header card-outline card-primary">
                        <div>
                            <img src="{{ asset('/users/images/user_default.svg') }}" alt="user profile" class="photo">
                            <div class="self-align">
                                <h5><a style="color:#6a70fc" href="#">{{ Auth::guard('masyarakat')->user()->nama }}</a>
                                </h5>
                                <p class="text-primary">{{ Auth::guard('masyarakat')->user()->username }}</p>
                            </div>
                            <div class="row text-center">
                                <div class="col">
                                    <p class="italic mb-0  text-danger">pending</p>
                                    <div class="text-center text-danger">
                                        {{ $pending }}
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="italic mb-0 text-warning">Proses</p>
                                    <div class="text-center text-warning">
                                        {{ $proses}}
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="italic mb-0 text-success">Selesai</p>
                                    <div class="text-center text-success">
                                        {{ $selesai }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col-lg-12 mt-4">
            <div class="content content-top shadow">
                {{-- <div class="card"> --}}
                    <div class="card-header card-outline card-primary">
                        @foreach ($pengaduan as $pengaduan => $v)
                        <div class="col-lg-12">
                            <div class="laporan-top">
                                <img src="{{ asset('/users/images/user_default.svg') }}" alt="profile" class="profile">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p>{{ $v->user->nama }}</p>
                                        @if ($v->status == '0')
                                        <p class="text-danger">Pending</p>
                                        @elseif($v->status == 'proses')
                                        <p class="text-warning">{{ ucwords($v->status) }}</p>
                                        @else
                                        <p class="text-success">{{ ucwords($v->status) }}</p>
                                        @endif
                                    </div>
                                    <div>
                                        <p>{{ $v->tgl_pengaduan->format('d M, h:i') }}</p>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('edit/pengaduan',$v->id_pengaduan) }}"
                                class="btn btn-primary float-right">Edit
                                <i class=" fas fa-pencil-alt">
                                </i>
                            </a>

                            <div class="laporan-mid">
                                <div class="judul-laporan">
                                    {{ $v->judul_laporan }}
                                </div>
                                <p>{{ $v->isi_laporan }}</p>
                            </div>

                            <div class="laporan-bottom">
                                @if ($v->foto != null)
                                <img src="{{ Storage::url($v->foto) }}" alt="{{ 'Gambar '.$v->judul_laporan }}"
                                    class="gambar-lampiran">
                                @endif
                                @if ($v->tanggapan != null)
                                <p class="mt-3 mb-1">{{ 'Tanggapan dari '. $v->tanggapan->petugas->nama_petugas }}</p>
                                <p class="light">{{ $v->tanggapan->tanggapan }}</p>
                                @endif
                            </div>
                            <hr>
                        </div>
                        @endforeach
                    </div>
                    {{--
                </div> --}}
            </div>
        </div>
    </div>
</div>
{{-- Footer --}}
<div class="mt-5">
    <hr>
    <div class="text-center">
        <p class="italic text-secondary">© 2021 Ihsanfrr • All rights reserved</p>
    </div>
</div>
@endsection

@section('js')

@endsection