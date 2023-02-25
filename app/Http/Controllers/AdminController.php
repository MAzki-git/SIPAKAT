<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Validator;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\PaginationServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;




class AdminController extends Controller
{
    public function formlogin()
    {
        return view('auth.login-admin');
    }

    public function indexDashboard()
    {
        $proses = Pengaduan::where('status', 'proses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();
        $petugas = Petugas::where('level', 'petugas')->count();
        $user = Masyarakat::all()->count();
        $masyarakat = Masyarakat::paginate('4');
        $pengaduan = Pengaduan::paginate('6');

        return view('dashboard.admin-dashboard', compact('masyarakat', 'pengaduan', 'petugas', 'user', 'proses', 'selesai'));
    }

    public function login(Request $request)
    {
        $username = Petugas::where('username', $request->username)->first();

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar!']);
        }

        $password = Hash::check($request->password, $username->password);

        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai!']);
        }

        $auth = Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password
        ]);

        if ($auth) {
            return redirect('/dashboard/admin');
        } else {
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
        }
    }
    public function logout()
    {

        Auth::guard('admin')->logout();
        return redirect('/login/admin');
    }


    //petugas & admin
    public function show($id_petugas)
    {
        $petugas  = petugas::find($id_petugas);
        return view('admin.layouts.content.petugas.show', compact('petugas'));
    }

    public function index()
    {
        $petugas = petugas::all();
        return view('admin.layouts.content.petugas.index', compact('petugas'));
    }
    public function create()
    {
        return view('admin.layouts.content.petugas.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $validate = validator::make($data, [
            'nama_petugas' => 'required|string|max:255',
            'username' => 'required|string|unique:petugas',
            'password' => 'required|min:8',
            'telp' => 'required',
            'level' => 'required', 'in:admin,petugas',
            'tgl_lahir' => 'required',
            'gender' => 'required', 'in:laki-laki,perempuan',

        ], [
            'nama_petugas.required' => 'Field nama ini dibutuhkan',
            'username.required' => 'Field username dibutuhkan',
            'password.min' => 'Password minimal 8 karakter',
            'telp.required' => 'Field nomor telepon dibutuhkan',
            'level.required' => 'Field level ini dibutuhkan',
            'tgl_lahir.required' => 'field tanggal lahir dibutuhkan',
            'gender.required' => 'field gender ini dibutuhkan',

        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        $username = petugas::where('username', $data['username'])->first();
        if ($username) {
            return redirect()->back()->with(['username => username sudah digunakan']);
        }
        // dd($data);
        petugas::create([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
            'gender' => $data['gender'],
            'tgl_lahir' => $data['tgl_lahir']
        ]);

        // Alert::success('Your Post as been submited!', 'success');
        return redirect('/petugas')->with('success', 'Berhasil Ditambahkan');
    }
    public function edit($id_petugas)
    {
        $petugas = petugas::Where('id_petugas', $id_petugas)->first();
        return view('admin.layouts.content.petugas.edit', compact('petugas'));
    }
    public function update(Request $request, $id_petugas)
    {
        $petugas = petugas::find($id_petugas);
        $data = $request->all();
        $validate = validator::make($data, [
            'nama_petugas' => 'required|string|max:255',
            'username' => 'required',
            'password' => 'required|min:8',
            'telp' => 'required',
            'level' => 'required', 'in:admin,petugas',
            'tgl_lahir' => 'required',
            'gender' => 'required', 'in:laki-laki,perempuan',

        ], [
            'nama_petugas.required' => 'Field nama ini dibutuhkan',
            'username.required' => 'Field username dibutuhkan',
            'password.min' => 'Password minimal 8 karakter',
            'telp.required' => 'Field nomor telepon dibutuhkan',
            'level.required' => 'Field level ini dibutuhkan',
            'tgl_lahir.required' => 'field tanggal lahir dibutuhkan',
            'gender.required' => 'field gender ini dibutuhkan',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        $petugas->update([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => Hash::make($data['password'] ?? ''),
            'telp' => $data['telp'] ?? '',
            'level' => $data['level'],
            'gender' => $data['gender'],
            'tgl_lahir' => $data['tgl_lahir']
        ]);
        return redirect('/petugas')->with('success', 'Berhasil di update');
    }
    public function destroy($id_petugas)
    {
        $petugas = petugas::find($id_petugas);
        $petugas->delete();
        return redirect('/petugas');
    }
    public function petugastrash()
    {

        $petugas = Petugas::onlyTrashed()->get();
        return view('admin.layouts.content.petugas.trash.index', compact('petugas'));
    }
    public function restorepetugas($id_petugas)
    {
        $petugas = Petugas::onlyTrashed()->findOrFail($id_petugas);
        $petugas->restore();
        return redirect()->route('petugas.trash')->with('success', 'Data berhasil dikembalikan');
    }
    public function forcedeletepetugas($id_petugas)
    {
        $petugas = Petugas::onlyTrashed()->findOrFail($id_petugas);
        $petugas->forceDelete();
        return redirect()->route('petugas.trash');
    }
}
