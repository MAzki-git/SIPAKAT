@include('admin.layouts.partials.head')

<body class="hold-transition login-page">
    <div class="col-9">
        <div class="card card-outline card-primary">
            <div class=" text-center mt-3">
                <a href="/login" class="h1"><b>SIPA</b><b style="color: #007bff">KAT</b></a>
            </div>
            <div class="card-header card-outline text-center">
                Form register
            </div>
            <form action="{{ route('register.auth') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NIK">NIK</label>
                                <input type="number" class="form-control" name="nik"
                                    placeholder="Masukan Nomor Induk Kependudukan">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nama">Nama</label>
                            <div class="form-group">
                                <input type="text" class="form-control " name="nama" placeholder="Masukan nama">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control " name="username" placeholder="Masukan username">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control " name="password"
                                    placeholder="Masukan password">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="number" class="form-control" id="phone" name="telp"
                                    placeholder="(+62)821165278">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="custom-select">
                                    {{-- <option value="laki-laki" selected>Pilih level (Default laki-laki)</option>
                                    --}}
                                    <option value="laki-laki">Laki laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tgl_lahir">Tanggal lahir</label>
                            <input type="text" class="form-control" id="datepicker" name="tgl_lahir"
                                placeholder="d/m/Y">

                        </div>
                        <div class="col-md-6">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" cols="10" rows="1"></textarea>
                        </div>
                    </div>
                    <a href="/logout/admin" class="float-left mt-3">Login</a>
                    <button class="btn btn-primary float-right mt-3" style="width:40%">Register</button>
                </div>
            </form>
        </div>
    </div>
    @include('admin.layouts.partials.js')
</body>