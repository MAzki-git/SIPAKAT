<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function show($id_pengaduan)
    {
        $kategori = kategori::all();
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
        $kategori = kategori::all();
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();
        return view('user.content.edit', compact('pengaduan', 'kategori'));
    }
    public function update(Request $request, $id_pengaduan)
    {
        // dd($request->all());
        $data = $request->all();
        $validate = Validator::make($data, [
            'judul_laporan' => 'required',
            'isi_laporan' => 'required',
            'alamat' => 'required',
            'id_kategori' => 'required',
        ], [
            'judul_laporan.required' => 'Field judul laporan dibutuhkan',
            'isi_laporan.required' => 'Field isi laporan dibutuhkan',
            'alamat.required' => 'field alamat dibutuhkan',
            'id_kategori.required' => 'Field kategori dibutuhkan'
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
            'tgl_pengaduan' => date('Y-m-d h:i:s'),
            'alamat' => $data['alamat'],
            'id_kategori' => $data['id_kategori'],
            'isi_laporan' => $data['isi_laporan'],
            'foto' => $data['foto'] ?? '',
            'status' => '0',
        ]);
        return redirect('/user/laporan
        ')->with('success', 'Pengaduan berhasil diubah');
    }
    public function destroypengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::findOrFail($id_pengaduan);
        $pengaduan->delete();
        return redirect('/pengaduan');
    }
    public function softtrash()
    {
        $pengaduan = pengaduan::onlyTrashed()->get();

        return view('admin.layouts.content.pengaduan.trash.index', compact('pengaduan'));
    }
    public function restorepengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::onlyTrashed()->findOrFail($id_pengaduan);
        $pengaduan->restore();
        return redirect('/pengaduan')->with('success', 'Data berhasil dikembalikan');
    }
    public function forcedeletepengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::onlyTrashed()->findOrFail($id_pengaduan);
        $pengaduan->forceDelete();
        return redirect()->route('soft.trash');
    }

    public function destroypengaduanuser($id_pengaduan)
    {
        $pengaduan = Pengaduan::findOrFail($id_pengaduan);
        $pengaduan->delete();
        return redirect('/user/laporan');
    }
}
