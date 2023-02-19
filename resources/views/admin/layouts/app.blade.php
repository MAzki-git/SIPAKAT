<!DOCTYPE html>
<html lang="en">
{{-- AdminLTE head link --}}
@include('admin.layouts.partials.head')

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        {{-- AdminLTE perloader --}}
        @include('admin.layouts.partials.preloader')
        {{-- AdminLTE navbar --}}
        @include('admin.layouts.partials.navbar')
        {{-- AdminLTE sidebar --}}
        @include('admin.layouts.partials.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('header')</h1>
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
                    @yield('content')
                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
            {{--
            <!-- Control sidebar content goes here --> --}}
        </aside>
        @include('admin.layouts.partials.footer')
    </div>
    @include('admin.layouts.partials.js')
</body>

</html>