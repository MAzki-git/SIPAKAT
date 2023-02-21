<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function show($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();
        $tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();
        // dd($pengaduan);
        return view('admin.layouts.content.pengaduan.show', compact('tanggapan', 'pengaduan'));
    }
    public function index()
    {
        $pengaduan = Pengaduan::all();
        // $pengaduan = Pengaduan::where('tgl_pengaduan', 'desc')->get();
        return view('admin.layouts.content.pengaduan.index', compact('pengaduan'));
    }
    public function edit($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();
        return view('admin.layouts.content.pengaduan.edit', compact('pengaduan'));
    }
    public function update(Request $request, $id_pengaduan)
    {
        $data = $request->all();
        $validate = Validator::make($data, [
            'judul_laporan' => 'required',
            'isi_laporan' => 'required',
            'tgl_pengaduan' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/pengaduan', 'public');
        }
        date_default_timezone_set('Asia/Bangkok');
        Pengaduan::where('id_pengaduan', $id_pengaduan)->update([
            'nik' => Auth::guard('masyarakat')->user()->nik,
            'judul_laporan' => $data['judul_laporan'],
            'isi_laporan' => $data['isi_laporan'],
            'tgl_pengaduan' => date('Y-m-d h:i:s'),
            'foto' => $data['foto'] ?? '',
            'status' => '0',
        ]);
        return redirect('/showPengaduan')->with('success', 'Pengaduan berhasil diubah');
    }
    public function destroypengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::findOrFail($id_pengaduan);
        $pengaduan->delete();
        return redirect('/pengaduan');
    }
}
