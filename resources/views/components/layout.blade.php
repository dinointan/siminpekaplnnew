<!DOCTYPE html>
<html lang="en" style="min-height: 100vh;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="robots" content="noindex,nofollow">

    <title>PLN SIMINPEKA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="20x26" href="/assets/images/Logo_PLN.png">
    <!-- Custom CSS -->
    <link href="/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <script src="/assets/libs/datatables/media/css/jquery.dataTables.min.css"></script>
    <!-- Custom CSS -->
    <link href="/dist/css/style.min.css" rel="stylesheet">
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/assets/libs/select2/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/libs/select2/dist/css/select2-bootstrap-5-theme.min.css" />

    <link rel="stylesheet" type="text/css" href="/assets/libs/datatables-full/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/libs/datatables-full/css/buttons.bootstrap.min.css" />
    <link href="/assets/libs/toastr/build/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
    <link href="/assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="/assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <style>
        .is_active {
            background-color: #27A9E3;
        }

        @media (max-width: 768px) {
            .left-sidebar {
                position: absolute;
                left: -260px;
                z-index: 1001;
                transition: all 0.3s;
            }

            .left-sidebar.show {
                left: 0;
            }
        }
    </style>
    <style>
        /* Responsive Sidebar Layout */
        body,
        html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .wrapper {
            display: flex;
            flex-direction: row;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #111;
            color: white;
            transition: left 0.3s ease;
        }

        .content {
            flex-grow: 1;
            padding: 1rem;
            overflow-x: hidden;
        }

        /* Hide sidebar on small screen */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -250px;
                top: 0;
                bottom: 0;
                z-index: 1000;
            }

            .sidebar.active {
                left: 0;
            }

            .content {
                padding: 1rem;
            }

            .toggle-btn {
                display: block;
                background: none;
                border: none;
                font-size: 1.5rem;
                margin: 1rem;
            }
        }

        /* Desktop */
        @media (min-width: 769px) {
            .toggle-btn {
                display: none;
            }
        }
    </style>

</head>
<script>
    // Auto dismiss alert setelah 3 detik
    setTimeout(function() {
        const alert = document.getElementById('flash-alert');
        if (alert) {
            // Tambah animasi fade-out
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 500); // Hapus elemen setelah fade out
        }
    }, 3000); // 3000ms = 3 detik
</script>

<body>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div class="preloader" style="display: none; background: transparent;" id="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" class="mini-sidebar" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">

                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="/">
                        <!-- Logo icon -->
                        <b class="logo-icon ps-2">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <div style="display: flex; align-items: center;">
                                <img src="/assets/images/Logo_PLN.png" alt="Logo PLN"
                                    style="width: 30px; margin-right: 10px;" class="light-logo" />
                            </div>

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->

                        <span
                            style="font-size: 18px; font-family: 'apple-system',BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji; color: #f9f5f5;">
                            PLN SIMINPEKA
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="/assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
                                href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                               <img src="{{ asset('storage/pengguna/' . (auth()->user()->foto ?? 'd1.jpg')) }}"
                                    alt="user" class="rounded-circle" width="31">
                                <span class="fw-bold text-white mx-2">{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.show') }}"><i
                                        class="fas fa-user me-1 ms-1"></i>
                                    Profil Saya</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"
                                    onclick="document.getElementById('logout').submit()"><i
                                        class="fa fa-power-off me-1 ms-1"></i>
                                    Keluar</a>
                                <form action="{{ route('logout') }}" method="POST" id="logout">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        <li class="sidebar-item {{ request()->is('dashboard') ? 'selected' : '' }}">
                            <a class="sidebar-link waves-effect waves-dark" href="/" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        @if (auth()->user()->role == 'admin')
                            <li class="sidebar-item {{ request()->is('user/*') ? 'selected' : '' }}">
                                <a class="sidebar-link waves-effect waves-dark " href="{{ route('pengguna.index') }}"
                                    aria-expanded="false">
                                    <i class="mdi mdi-account-multiple"></i><span class="hide-menu">User
                                        Pengguna</span>
                                </a>
                            </li>
                        @endif
                        <li class="sidebar-item {{ request()->is('inventory/*') ? 'selected' : '' }}">
                            <a class="sidebar-link has-arrow waves-effect waves-dark " href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="mdi mdi-package-variant-closed"></i>
                                <span class="hide-menu">Perabotan</span>
                            </a>
                            <ul aria-expanded="false"
                                class="collapse first-level {{ request()->is('inventory/*') ? 'in' : '' }}">
                                @if (auth()->user()->role !== 'pegawai')
                                    <li class="sidebar-item">
                                        <a href="{{ route('kategori.index') }}"
                                            class="sidebar-link {{ request()->is('inventory/category/*') ? 'active' : '' }}">
                                            <i class="mdi mdi-format-list-bulleted-type"></i>
                                            <span class="hide-menu">Kategori</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('lokasi.index') }}"
                                            class="sidebar-link {{ request()->is('inventory/lokasi/*') ? 'active' : '' }}">
                                            <i class="mdi mdi-map-marker"></i>
                                            <span class="hide-menu">Lokasi</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item {{ request()->is('inventory/item/*') ? 'active' : '' }}">
                                        <a href="{{ route('mutasi.index') }}" class="sidebar-link ">
                                            <i class="mdi mdi-swap-horizontal"></i>
                                            <span class="hide-menu">Mutasi Perabotan</span>
                                        </a>
                                    </li>
                                @endif
                                <li class="sidebar-item {{ request()->is('inventory/item/*') ? 'active' : '' }}">
                                    <a href="{{ route('perabotan.index') }}" class="sidebar-link ">
                                        <i class="mdi mdi-package-variant-closed"></i>
                                        <span class="hide-menu">Data Perabotan</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- @if (auth()->user()->role == 'owner' || auth()->user()->role == 'supervisor')
                        @endif --}}
                        @if (auth()->user()->role !== 'admin')
                            <li class="sidebar-item {{ request()->is('profile/*') ? 'selected' : '' }}">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <i class="mdi mdi-account"></i>
                                    <span class="hide-menu">Profil</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a href="{{ route('profile.show') }}" class="sidebar-link">
                                            <i class="mdi mdi-account-circle"></i>
                                            <span class="hide-menu">Profil Saya</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('profile.edit') }}" class="sidebar-link">
                                            <i class="mdi mdi-account-edit"></i>
                                            <span class="hide-menu">Ubah Profil</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false" onclick="document.getElementById('logout').submit()">
                                <i class="mdi mdi-logout"></i><span class="hide-menu">Keluar</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">{{ $title }}</h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                {{ $slot }}
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <br>
            <footer class="footer text-center">
                All Rights Reserved by PLN SIMINPEKA.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <script src="/dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="/dist/js/jquery-ui.min.js"></script>
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="/assets/libs/flot/excanvas.js"></script>
    <script src="/assets/libs/flot/jquery.flot.js"></script>
    <script src="/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="/dist/js/pages/chart/chart-page-init.js"></script>
    <script src="/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="/assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="/assets/libs/toastr/build/toastr.min.js"></script>
    <script src="/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/libs/moment/min/moment.min.js"></script>
    <script src="/assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="/dist/js/pages/calendar/cal-init.js"></script>

    <script id="__bs_script__">
        //<![CDATA[
        document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.24.4'><\/script>"
            .replace("HOST", location.hostname));
        //]]>
    </script>

    <script>
        var datatableLanguageOptions = {
            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
            "sProcessing": "Sedang memproses...",
            "sLengthMenu": "Tampilkan _MENU_ entri",
            "sZeroRecords": "Tidak ditemukan data yang sesuai",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix": "",
            "sSearch": "Cari:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
            }
        };

        var select2Options = {
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        };

        $(document).ready(function() {
            $('#invalid-is-invalid-single-field').select2(select2Options);
        });

        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2500",
        };

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>
