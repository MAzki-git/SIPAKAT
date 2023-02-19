<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function formlogin()
    {
        return view('auth.login-admin');
    }

    public function indexDashboard()
    {
        return view('dashboard.admin-dashboard');
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
            'nama_petugas' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'telp' => ['required'],
            'level' => ['required', 'in:admin,petugas']
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        $username = petugas::where('username', $data['username'])->first();
        if ($username) {
            return redirect()->back()->with(['username => username sudah digunakan']);
        }
        petugas::create([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
        ]);
        return redirect('/petugas');
    }
    public function edit($id_petugas)
    {
        $petugas = petugas::Where('id_petugas', $id_petugas)->first();
        return view('admin.layouts.content.petugas.edit', compact('petugas'));
    }
    public function update(Request $request, $id_petugas)
    {
        $data = $request->all();
        $petugas = petugas::find($id_petugas);

        $petugas->update([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
        ]);
        return redirect('/petugas');
    }
    public function destroy($id_petugas)
    {
        $petugas = petugas::find($id_petugas);
        $petugas->delete();
        return redirect('/petugas');
    }
}
