@include('admin.layouts.partials.head')

<body class="hold-transition login-page">
    <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="tab-content">
                <div id="form1" style="display: block" class="tab-pane active">
                    <div class="login-box">
                        <div class="card-header text-center">
                            <a href="/login" class="h1"><b>SIPA</b><b style="color: #007bff">KAT</b></a>
                        </div>
                        <div class="card-body">
                            <div class="card-header">
                                <p class="login-box-msg">Sign in to start your session</p>
                            </div>
                            <div class="card-header">
                                <div class="container mt-1 mb-3">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="form1">User login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="form2">Admin login</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <form action="/login/auth" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="username" id="username" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" id="password" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <a href="/register" class="text-center">Daftar</a>
                                    </div>
                                    <div class=" col-4">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.partials.js')
</body>