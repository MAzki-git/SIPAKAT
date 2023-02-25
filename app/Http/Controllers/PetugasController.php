<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    //masyarakat
    public function show($nik)
    {
        $user = Masyarakat::where('nik', $nik)->first();
        return view('admin.layouts.content.masyarakat.show', compact('user'));
    }
    public function index()
    {
        $user = Masyarakat::all();
        return view('admin.layouts.content.masyarakat.index', compact('user'));
    }
    public function create()
    {
        return view('admin.layouts.content.masyarakat.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $validate = validator::make($data, [
            'nik' => 'required|numeric|unique:masyarakats|max:16',
            'nama' => 'required|string|max:255',
            'username' => 'required|unique:masyarakats',
            'password'  => 'required|min:8',
            'telp' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required', 'in:laki-laki,perempuan',
            'alamat' => 'required'
        ], [
            'nik.required' => 'field nik dibutuhkan',
            'nama.required' => 'field nama dibutuhkan',
            'username.required' => 'field username dibutuhkan',
            'password.min' => 'field password dibutuhkan',
            'telp.required' => 'field telepon dibutuhkan',
            'tgl_lahir.required' => 'field tanggal lahir dibutuhkan',
            'gender.required' => 'field gender dibutuhkan',
            'alamat.required' => 'field alamat dibutuhkan',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        $username = Masyarakat::where('username', $data['username'])->first();
        if ($username) {
            return redirect()->back()->with(['username => username sudah digunakan']);
        }
        // dd($data);
        Masyarakat::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'tgl_lahir' => $data['tgl_lahir'],
            'gender' => $data['gender'],
            'alamat' => $data['alamat'],
            // 'foto' => $data['foto' ?? ''],
        ]);

        return redirect('/user')->with('success', 'Data masyarakat berhasil ditambahkan');
    }
    public function edit($nik)
    {
        $user = Masyarakat::Where('nik', $nik)->first();
        return view('admin.layouts.content.masyarakat.edit', compact('user'));
    }
    public function update(Request $request, $nik)
    {
        $validatedData = $request->validate([
            'nik' => 'required|max:16',
            'nama' => 'required|string|max:255',
            'username' => 'required',
            'password'  => 'required|min:8',
            'telp' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required', 'in:laki-laki,perempuan',
            'alamat' => 'required'
        ], [
            'nik.required' => 'field nik dibutuhkan',
            'nama.required' => 'field nama dibutuhkan',
            'username.required' => 'field username dibutuhkan',
            'password.min' => 'field password dibutuhkan',
            'telp.required' => 'field telepon dibutuhkan',
            'tgl_lahir.required' => 'field tanggal lahir dibutuhkan',
            'gender.required' => 'field gender dibutuhkan',
            'alamat.required' => 'field alamat dibutuhkan',
        ]);
        if ($request['nik'] === $nik) {
            Masyarakat::where('nik', $nik)->update([
                'nama' => $request['nama'],
                'username' => $request['username'] ?? '',
                'password' => Hash::make($request['password']) ?? '',
                'telp' => $request['telp'] ?? '',
                'tgl_lahir' => $request['tgl_lahir'],
                'gender' => $request['gender'],
                'alamat' => $request['alamat']

            ]);
        } else {
            Masyarakat::where('nik', $nik)->update($validatedData);
        }
        return redirect('/user')->with('success', 'Data masyarakat berhasil di update');
    }

    public function destroyuser($nik)
    {
        $user = Masyarakat::findOrFail($nik);
        $user->delete();
        return redirect('/user');
    }
    public function usertrash()
    {

        $user = Masyarakat::onlyTrashed()->get();
        return view('admin.layouts.content.masyarakat.trash.index', compact('user'));
    }
    public function restoreuser($nik)
    {
        $user = Masyarakat::onlyTrashed()->findOrFail($nik);
        $user->restore();
        return redirect()->route('user.trash')->with('success', 'Data berhasil dikembalikan');
    }
    public function forcedeleteuser($nik)
    {
        $user = Masyarakat::onlyTrashed()->findOrFail($nik);
        $user->forceDelete();
        return redirect()->route('user.trash');
    }

    public function editprofile()
    {
        // $petugas = petugas::Where('id_petugas', $id_petugas)->first();
        $petugas = Petugas::where('id_petugas', Auth::guard('admin')->user()->id_petugas)->first();
        return view('admin.layouts.content.profile.edit', compact('petugas'));
    }
    public function updateprofile(Request $request, $id_petugas)
    {
        $petugas = Petugas::where('id_petugas', $request->id_petugas)->first();

        $validatedData = $request->validate([
            'nama_petugas' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'telp' => ['required'],
            // 'level' => ['required', 'in:admin,petugas'],
            'tgl_lahir' => ['required'],
            'gender' => ['required', 'in:laki-laki,perempuan'],
        ]);


        Petugas::where('id_petugas', $id_petugas)->update($validatedData);

        return redirect('/profile/petugas')->with('success', 'Profil berhasil diperbarui');
    }
}
