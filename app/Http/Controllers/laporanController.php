<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use PDF;


class laporanController extends Controller
{
    public function indexlaporan()
    {
        return view('admin.layouts.content.pengaduan.print.pengaduan');
    }
    public function getlaporan(Request $request)
    {
        $from = $request->from . '' . '00:00:00';
        $to = $request->to . '' . '23:59:59';

        $kategori = kategori::get();
        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();
        return view('admin.layouts.content.pengaduan.print.pengaduan', compact('kategori', 'pengaduan', 'from', 'to'));
    }
    public function printlaporan($from, $to)
    {
        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();
        $pdf = PDF::loadView('admin.layouts.content.pengaduan.print.print', compact('pengaduan'));
        return $pdf->download('laporan-pengaduan.pdf');
    }
}
