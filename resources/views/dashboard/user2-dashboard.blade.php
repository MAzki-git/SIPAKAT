@section('title','Admin | Dashboard')
@include('admin.layouts.partials.head')
@include('admin.layouts.partials.preloader')
@include('admin.layouts.partials.navbar')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard user</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-navy elevation-1"><i class=" fa-solid fas fa-user-tie"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Petugas</span>
                            <span class="info-box-number">
                                32
                                {{-- <small>%</small> --}}
                            </span>
                        </div>
                        {{--
                        <!-- /.info-box-content --> --}}
                    </div>
                    {{--
                    <!-- /.info-box --> --}}
                </div>
                {{--
                <!-- /.col --> --}}
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Masyarakat</span>
                            <span class="info-box-number">23</span>
                        </div>
                        {{--
                        <!-- /.info-box-content --> --}}
                    </div>
                    {{--
                    <!-- /.info-box --> --}}
                </div>
                {{--
                <!-- /.col --> --}}

                {{--
                <!-- fix for small devices only --> --}}
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-business-time"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pengaduan proses</span>
                            <span class="info-box-number">23</span>
                        </div>
                        {{--
                        <!-- /.info-box-content --> --}}
                    </div>
                    {{--
                    <!-- /.info-box --> --}}
                </div>
                {{--
                <!-- /.col --> --}}
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-lime elevation-1"><i class="fas fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pengaduan selesai</span>
                            <span class="info-box-number">23</span>
                        </div>
                        {{--
                        <!-- /.info-box-content --> --}}
                    </div>
                    {{--
                    <!-- /.info-box --> --}}
                </div>
                {{--
                <!-- /.col --> --}}
            </div>
        </div>
    </section>
</div>
<aside class="control-sidebar control-sidebar-dark">
    {{--
    <!-- Control sidebar content goes here --> --}}
</aside>

@include('admin.layouts.partials.footer')
@include('admin.layouts.partials.js')