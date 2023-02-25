<?php

namespace App\Http\Controllers;

use App\Models\Coba;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function CreateOrUpdate(Request $request)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();
        $tanggapan = Tanggapan::where('id_pengaduan', $request->id_pengaduan)->first();

        if ($tanggapan) {
            // dd($request->status);
            $pengaduan->update(['status' => $request->status]);
            $tanggapan->update([
                'tanggapan' => $request->tanggapan,
                'tgl_tanggapan' => date('Y-m-d'),
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);

            return redirect()->route('showPengaduan', $pengaduan->id_pengaduan)->with('status', 'berhasil dikirim');
        } else {
            $pengaduan->update(['status' => $request->status]);
            Tanggapan::create([
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
                'tgl_tanggapan' => date('Y-m-d'),
                'id_pengaduan' => $request->id_pengaduan,
                'tanggapan' => $request->tanggapan,
            ]);
            return redirect()->route('showPengaduan/', $pengaduan->id_pengaduan)->with('status=>berhasil dikirim');
        }
    }
}
