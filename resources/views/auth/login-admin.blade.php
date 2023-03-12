<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SIPAKAT | Login</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="/img/favicon.png" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{ asset('/logins/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/logins/css/material-bootstrap-wizard.css') }}" rel="stylesheet" />

    {{--
    <!-- CSS Just for demo purpose, dont include it in your project --> --}}
    <link href="{{ asset('/logins/css/demo.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="image-container set-full-height" style="background-image: url('/img/wizard-city.jpg')">
        {{--
        <!--   Big container   --> --}}
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="purple" id="wizard">

                            <div class="wizard-header">
                                <h3 class="wizard-title">
                                    <div class=" text-center mt-3">
                                        <a href="" class="h5"><b>SIPA</b><b style="color: #007bff">KAT</b></a>
                                    </div>
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#location" data-toggle="tab">Login User</a></li>
                                    <li><a href="#facilities" data-toggle="tab">Login Petugas</a></li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="location">
                                    {{-- <div class="row"> --}}
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Login sebagai masyarakat</h4>
                                        </div>
                                        <form action="{{ route('login.post') }}" method="post">
                                            @csrf
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control " name="username"
                                                        placeholder="Masukan username">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control " name="password"
                                                        placeholder="Masukan password">
                                                </div>
                                            </div>
                                            <div class="wizard-footer">
                                                <div class="pull-right">
                                                    <button type="submit" class="btn btn-primary">Login</button>
                                                </div>
                                                <a href="/register" class="pull-left mt-10">Register</a>

                                                <div class="clearfix"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="facilities">
                                        <h4 class="info-text">Login sebagai petugas & admin. </h4>
                                        <form action="/login/auth" method="post">
                                            @csrf
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control " name="username"
                                                        placeholder="Masukan username">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control " name="password"
                                                        placeholder="Masukan password">
                                                </div>
                                            </div>
                                            <div class="wizard-footer">
                                                <div class="pull-right">
                                                    <button type="submit" class="btn btn-primary">Login</button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer">
                <div class="container text-center">
                    <a href=""></a>
                </div>
            </div>
        </div>

</body>
<!--   Core JS Files   -->
<script src="{{ asset('/logins/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/logins/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/logins/js/jquery.bootstrap.js') }}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('/logins/js/material-bootstrap-wizard.js') }}"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{ asset('/logins/js/jquery.validate.min.js') }}"></script>

</html>