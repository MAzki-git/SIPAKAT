@extends('user.layouts.app')

@section('css')
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
        <div class="col-lg-8 col-md-12 col-sm-12 col-12 col">
            <div class="content content-top shadow">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                @endif
                @if (Session::has('pengaduan'))
                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                @endif
                <div class="card mb-3">Tulis Laporan Disini</div>
                <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input name="judul_laporan" placeholder="Masukkan judul Laporan" class="form-control"
                            rows="4">{{ old('judul_laporan') }}</input>
                    </div>
                    <div class="form-group">
                        <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                            rows="4">{{ old('isi_laporan') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">kategori</label>
                        <select name="id_kategori" class="custom-select">
                            @foreach ($kategori as $item )
                            <option value="{{ $item->id_kategori }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-custom mt-2">Kirim</button>
                </form>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 col">
            <div class="content content-bottom shadow">
                <div class="card-header" style="width: 100%">
                    <div>
                        <img src="{{ asset('/users/images/user_default.svg') }}" alt="user profile" class="photo">
                        <div class="self-align">
                            <h5><a style="color: #6a70fc" href="#">{{ Auth::guard('masyarakat')->user()->nama }}</a>
                            </h5>
                            <p class="text-dark">{{ Auth::guard('masyarakat')->user()->username }}</p>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <p class="italic mb-0">pending</p>
                                <div class="text-center">
                                    {{ $pending }}
                                </div>
                            </div>
                            <div class="col">
                                <p class="italic mb-0">Proses</p>
                                <div class="text-center">
                                    {{ $proses}}
                                </div>
                            </div>
                            <div class="col">
                                <p class="italic mb-0">Selesai</p>
                                <div class="text-center">
                                    {{ $selesai }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="" style="text-decoration:none;">Laporan saya</a>
                    </li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A third item</li>
                    {{-- <li class="list-group-item">
                        <a href="/logout/admin" <i class="fa fa-power-off"></i>
                            <p>Logout</p>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-8">
                {{-- <a class="d-inline tab {{ $siapa != 'me' ? 'tab-active' : ''}} mr-4" href="">
                    Semua
                </a>
                <a class="d-inline tab {{ $siapa == 'me' ? 'tab-active' : ''}}" href="">
                    Laporan Saya
                </a>
                <hr> --}}
            </div>
            {{-- @foreach ($pengaduan as $pengaduan => $v)
            <div class="col-lg-8">
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
            @endforeach --}}
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