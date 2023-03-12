@include('admin.layouts.partials.head')

<body class="hold-transition login-page">
    <div class="col-9">
        {{-- @if ($errors->count() > 0)
        @foreach ($errors->all() as $error)
        <ul>
            <li class="text-danger fs-sm">{{ $error }}</li>
        </ul>
        @endforeach
        @endif --}}
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
                                <input type="number" class="form-control @error('nik')is-invalid

                                @enderror" name="nik" placeholder="Masukan Nomor Induk Kependudukan">
                                @if ($errors->has('nik'))
                                <div class="text-danger">{{ $errors->first('nik') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nama">Nama</label>
                            <div class="form-group">
                                <input type="text" class="form-control @error('nama')is-invalid

                                @enderror" name="nama" placeholder="Masukan nama">
                                @if ($errors->has('nama'))
                                <div class="text-danger">{{ $errors->first('nama') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('nama')is-invalid

                                @enderror" name="username" placeholder="Masukan username">
                                @if ($errors->has('username'))
                                <div class="text-danger">{{ $errors->first('username') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password')is-invalid

                                @enderror" name="password" placeholder="Masukan password">
                                @if ($errors->has('password'))
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="number" class="form-control @error('telp')is-invalid

                                @enderror" id="phone" name="telp" placeholder="(+62)821165278">
                                @if ($errors->has('telp'))
                                <div class="text-danger">{{ $errors->first('telp') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="custom-select @error('gender')is-invalid

                                @enderror">
                                    <option selected disabled>Pilih jenis kelamin</option>

                                    <option value="laki-laki">Laki laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                @if ($errors->has('gender'))
                                <div class="text-danger">{{ $errors->first('gender') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tgl_lahir">Tanggal lahir</label>
                            <input type="text" class="form-control @error('tgl_lahir')is-invalid

                            @enderror" id="datepicker" name="tgl_lahir" placeholder="d/m/Y">
                            @if ($errors->has('tgl_lahir'))
                            <div class="text-danger">{{ $errors->first('tgl_lahir') }}</div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control @error('alamat')is-invalid

                            @enderror" cols="10" rows="1"></textarea>
                            @if ($errors->has('alamat'))
                            <div class="text-danger">{{ $errors->first('alamat') }}</div>
                            @endif
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