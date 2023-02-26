@extends('admin.layouts.app')
@section('title','Admin | Print')
@section('header', 'Print')
@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                Cari berdasarkan tanggal
            </div>
            <div class="card-body">
                <form action="{{ route('print.getlaporan') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="from" class="form-control" placeholder="tanggal awal"
                            onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                    </div>
                    <div class="form-group">
                        <input type="text" name="to" class="form-control" placeholder="tanggal akhir"
                            onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%">Cari laporan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                {{-- Cari berdasarkan tanggal --}}
                <div class="text-center">
                    {{-- <div class="float-righ"> --}}
                        @if($pengaduan ?? '')
                        <a href="{{ route('print.laporan', ['from' => $from, 'to' => $to]) }}" class="btn btn-success"
                            style="width: 50%">Print</a>

                        @endif
                        {{--
                    </div> --}}
                </div>
            </div>
            {{-- $dd($pengaduan) --}}
            <div class="card-body">
                <div class="table-responsive">
                    @if($pengaduan ?? '')

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul pengaduan</th>
                                <th>Tanggal</th>
                                <th>isi laporan</th>
                                <th>kategori laporan</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul_laporan }}</td>
                                <td>{{ $item->tgl_pengaduan }}</td>
                                <td class="embed-responsive">{{ $item->isi_laporan }}</td>
                                <td>{{ $item->kategori->nama }}
                                </td>
                                <td>
                                    @if($item->status=='0')
                                    <span href="#" class="badge badge-danger">Pending</span>
                                    @elseif($item->status == 'proses')
                                    <span href="#" class="badge badge-warning">Proses</span>
                                    @else
                                    <span href="#" class="badge badge-success">selesai</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                </div>
            </div>
            <div class="text-center">
                Tidak ada data
            </div>
            @endif

        </div>
    </div>
</div>
</div>
@endsection