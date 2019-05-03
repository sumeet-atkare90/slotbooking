<!DOCTYPE html>
<html>
    @include('layout.head') @yield('custom_styles')
</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
    @include('layout.header')
    @include('layout.leftsidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
    @include('layout.footer')
    @include('layout.rightsidebar')
    </div>

    @yield('custom_scripts')
</body>

</html>