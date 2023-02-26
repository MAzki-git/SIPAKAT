<?php



namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Pengaduan;
use App\Models\Masyarakat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login-masyarakat');
    }

    public function indexDashboard()
    {
        $kategori = kategori::get();
        $status = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->first();
        // $pengaduan = Pengaduan::all();
        $pengaduan = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->orderBy('tgl_pengaduan', 'desc')->get();
        $pending = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', '=', '0']])->get()->count();
        $proses = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'proses']])->get()->count();
        $selesai = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'selesai']])->get()->count();
        return view('dashboard.user-dashboard', compact('status', 'kategori', 'pengaduan', 'pending', 'proses', 'selesai'));
    }
    public function userlaporan()
    {

        $pengaduan = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->orderBy('tgl_pengaduan', 'desc')->get();
        $pending = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', '=', '0']])->get()->count();
        $proses = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'proses']])->get()->count();
        $selesai = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'selesai']])->get()->count();
        return view('user.content.user-laporan', compact('pengaduan', 'pending', 'proses', 'selesai'));
    }
    public function login(Request $request)
    {
        $username = Masyarakat::where('username', $request->username)->first();

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);

        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
        }

        if (Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/dashboard/user');
        } else {
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
        }
    }

    public function formRegister()
    {
        return view('auth.register-masyarakat');
    }
    public function registerpost(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
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
            return redirect()->back()->with(['pesan' => $validate->errors()]);
        }

        $username = Masyarakat::where('username', $request->username)->first();

        if ($username) {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar']);
        }

        Masyarakat::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'tgl_lahir' => $data['tgl_lahir'],
            'gender' => $data['gender'],
            'alamat' => $data['alamat'],
        ]);

        return redirect('login/user');
    }

    public function logout()
    {
        Auth::guard('masyarakat')->logout();

        return redirect('/login/user');
    }
    public function store(Request $request)
    {
        $data = $request->all();

        // dd($request->all());
        $validate = Validator::make($data, [
            'judul_laporan' => 'required',
            'isi_laporan' => 'required',
            'id_kategori' => 'required',
        ], [
            'judul_laporan.required' => 'Field judul laporan dibutuhkan',
            'isi_laporan.required' => 'Field isi laporan dibutuhkan',
            'id_kategori.required' => 'Field kategori dibutuhkan'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/pengaduan', 'public');
        }

        date_default_timezone_set('Asia/Bangkok');

        $pengaduan = Pengaduan::create([
            'judul_laporan' => $data['judul_laporan'],
            'tgl_pengaduan' => date('Y-m-d h:i:s'),
            'nik' => Auth::guard('masyarakat')->user()->nik,
            'id_kategori' => $data['id_kategori'],
            'isi_laporan' => $data['isi_laporan'],
            'foto' => $data['foto'] ?? '',
            'status' => '0',

        ]);


        if ($pengaduan) {
            return redirect()->route('masyarakat-dashboard', 'me')->with(['pengaduan' => 'Berhasil terkirim!', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['pengaduan' => 'Gagal terkirim!', 'type' => 'danger']);
        }
    }
}
