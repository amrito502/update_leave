<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <meta name="description" content="This is a leave management system.">
    <meta name="author" content="PRF">
    <link rel="shortcut icon" href="{{ asset('assets/img/prf_icon.png') }}" />
    <!-- Title -->
    <title>@yield('meta_title') - PRF Leave Management System</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/bootstrap.min.css">
    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/fonts/style.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/main.css">
    <!-- DateRange css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/daterange/daterange.css" />
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/datatables/dataTables.bs4.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/datatables/dataTables.bs4-custom.css" />
    <link href="{{ url('/') }}/assets/vendor/datatables/buttons.bs.css" rel="stylesheet" />
    <!-- Lobipanel css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/lobipanel/css/lobipanel.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

</head>

<body>
    @include('partials.screen_loader')
    <!-- Page wrapper start -->
    <div class="page-wrapper">
        <!-- Sidebar wrapper start -->
        @include('partials.sidebar')
        <!-- Sidebar wrapper end -->
        <!-- Page content start  -->
        <div class="page-content">
            <!-- Header start -->
            @include('partials.navbar')
            <!-- Header end -->
            <!-- Page header start -->
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">@yield('admin_page_header')</li>
                </ol>
                {{-- <ul class="app-actions">
						<li>
							<a href="#" id="reportrange">
								<span class="range-text"></span>
								<i class="icon-chevron-down"></i>	
							</a>
						</li>
						<li>
							<a href="#">
								<i class="icon-export"></i>
							</a>
						</li>
					</ul> --}}
            </div>
            <!-- Page header end -->
            <!-- Main container start -->
            <div class="main-container">
                @yield('content')
            </div>
            <!-- Main container end -->
        </div>
        <!-- Page content end -->
    </div>
    <!-- Page wrapper end -->

    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ url('/') }}/assets/js/jquery.min.js"></script>
    <script src="{{ url('/') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/js/moment.js"></script>
    <!-- Slimscroll JS -->
    <script src="{{ url('/') }}/assets/vendor/slimscroll/slimscroll.min.js"></script>
    <script src="{{ url('/') }}/assets/vendor/slimscroll/custom-scrollbar.js"></script>
    <!-- Daterange -->
    <script src="{{ url('/') }}/assets/vendor/daterange/daterange.js"></script>
    <script src="{{ url('/') }}/assets/vendor/daterange/custom-daterange.js"></script>
    <!-- Polyfill JS -->
    <script src="{{ url('/') }}/assets/vendor/polyfill/polyfill.min.js"></script>
    <!-- Apex Charts -->
    <script src="{{ url('/') }}/assets/vendor/apex/apexcharts.min.js"></script>
    <script src="{{ url('/') }}/assets/vendor/apex/admin/visitors.js"></script>
    <script src="{{ url('/') }}/assets/vendor/apex/admin/deals.js"></script>
    <script src="{{ url('/') }}/assets/vendor/apex/admin/income.js"></script>
    <script src="{{ url('/') }}/assets/vendor/apex/admin/customers.js"></script>
    <!-- Main JS -->
    <script src="{{ url('/') }}/assets/js/main.js"></script>
    <!-- Data Tables -->
    <script src="{{ url('/') }}/assets/vendor/datatables/dataTables.min.js"></script>
    <script src="{{ url('/') }}/assets/vendor/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Custom Data tables -->
    <script src="{{ url('/') }}/assets/vendor/datatables/custom/custom-datatables.js"></script>
    <script src="{{ url('/') }}/assets/vendor/datatables/custom/fixedHeader.js"></script>
    <!-- Download / CSV / Copy / Print -->
    <script src="{{ url('/') }}/assets/vendor/datatables/buttons.min.js"></script>
    <script src="{{ url('/') }}/assets/vendor/datatables/jszip.min.js"></script>
    <script src="{{ url('/') }}/assets/vendor/datatables/pdfmake.min.js"></script>
    <script src="{{ url('/') }}/assets/vendor/datatables/vfs_fonts.js"></script>
    <script src="{{ url('/') }}/assets/vendor/datatables/html5.min.js"></script>
    <script src="{{ url('/') }}/assets/vendor/datatables/buttons.print.min.js"></script>
    <!-- jQuery UI -->
    <script src="{{ url('/') }}/assets/js/jquery-ui.min.js"></script>
    <!-- Lobipanel -->
    <script src="{{ url('/') }}/assets/vendor/lobipanel/js/lobipanel.js"></script>
    <script src="{{ url('/') }}/assets/vendor/lobipanel/js/lobipanel-custom.js"></script>

</body>

</html>
