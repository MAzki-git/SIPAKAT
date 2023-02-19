<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
            'nik' => ['required'],
            'nama' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'telp' => ['required'],
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        $username = Masyarakat::where('username', $data['username'])->first();
        if ($username) {
            return redirect()->back()->with(['username => username sudah digunakan']);
        }
        Masyarakat::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
        ]);
        return redirect('/user');
    }
    public function edit($nik)
    {
        $user = Masyarakat::Where('nik', $nik)->first();
        return view('admin.layouts.content.masyarakat.edit', compact('user'));
    }
    public function update(Request $request, $nik)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'password'  => 'required',
            'telp' => 'required',
        ]);
        if ($request['nik'] === $nik) {
            Masyarakat::where('nik', $nik)->update([
                'nama' => $request['nama'],
                'username' => $request['username'] ?? '',
                'password' => Hash::make($request['password']),
                'telp' => $request['telp'] ?? '',

            ]);
        } else {
            Masyarakat::where('nik', $nik)->update($validatedData);
        }
        // $data = $request->all();
        // $user = masyarakat::findOrFail($nik);

        // $user->update([
        //     'nik' => $data['nik'],
        //     'nama' => $data['nama_petugas'],
        //     'username' => $data['username'],
        //     'password' => Hash::make($data['password']),
        //     'telp' => $data['telp'],
        // ]);
        return redirect('/user');
    }

    public function destroyuser($nik)
    {
        $user = Masyarakat::findOrFail($nik);
        $user->delete();
        return redirect('/user');
    }
}
