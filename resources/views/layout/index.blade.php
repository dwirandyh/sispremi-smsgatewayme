<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title>Administrator</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('admin/css/theme-default.css') }}"/>
    <!-- EOF CSS INCLUDE -->
</head>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container page-navigation-top-fixed">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar page-sidebar-fixed scroll">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
            <li class="xn-logo">
                <a href="#">{{ Auth::user()->name }}</a>
                <a href="#" class="x-navigation-control"></a>
            </li>
            <li class="xn-profile">
                <a href="#" class="profile-mini">
                    <img src="{{ asset('admin.png') }}" alt="{{ Auth::user()->name }}"/>
                </a>
                <div class="profile">
                    <div class="profile-image">
                        <img src="{{ asset('admin.png') }}" alt="{{ Auth::user()->name }}"/>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name">{{ Auth::user()->name }}</div>
                        <div class="profile-data-title"><a href="{{ url('/logout') }}">Logout</a></div>
                    </div>
                    <div class="profile-controls">
                        <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                        <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                    </div>
                </div>
            </li>
            <li class="xn-title">Navigation</li>
            <li>
                <a href="{{ url('/') }}"><span class="fa fa-dashboard"></span> <span class="xn-text">Beranda</span></a>
            </li>
            <li>
                <a href="{{ url('/pelanggan') }}"><span class="fa fa-users"></span> <span class="xn-text">Pelanggan</span></a>
            </li>
            <li>
                <a href="{{ url('/penerima_santunan') }}"><span class="fa fa-users"></span> <span class="xn-text">Penerima Santunan</span></a>
            </li>
            <li>
                <a href="{{ url('/agen') }}"><span class="fa fa-user"></span> <span class="xn-text">Agen</span></a>
            </li>
            <li>
                <a href="{{ url('/asuransi') }}"><span class="fa fa-book"></span> <span class="xn-text">Asuransi</span></a>
            </li>
            <li>
                <a href="{{ url('/pembayaran') }}"><span class="fa fa-money"></span> <span class="xn-text">Pembayaran</span></a>
            </li>
        </ul>
        <!-- END X-NAVIGATION -->
    </div>
    <!-- END PAGE SIDEBAR -->

    <!-- PAGE CONTENT -->
    @yield('content')
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->

<!-- START PRELOADS -->
<audio id="audio-alert" src="{{ asset('admin/audio/alert.mp3') }}" preload="auto"></audio>
<audio id="audio-fail" src="{{ asset('admin/audio/fail.mp3') }}" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="{{ asset('admin/js/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/jquery/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/bootstrap/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('admin/js/plugins/bootstrap/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/plugins/bootstrap/bootstrap-timepicker.min.js') }}"></script>
<!-- END PLUGINS -->

<!-- THIS PAGE PLUGINS -->
<script type="text/javascript"
        src="{{ asset('admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('admin/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<!-- END PAGE PLUGINS -->

<!-- START TEMPLATE -->
<script type="text/javascript" src="{{ asset('admin/js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/actions.js') }}"></script>
<!-- END TEMPLATE -->

@yield('js')
<!-- END SCRIPTS -->
</body>
</html>






