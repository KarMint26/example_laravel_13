<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard | AeroLink - @yield('subtitle')</title>
    <link rel="icon" href="{{ asset('mystyle/images/logo/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.bootstrap5.css">

    <style>
        .sb-sidenav-dark {
            background-color: rgb(0, 58, 117) !important;
        }
        .sb-sidenav-footer {
            background-color: rgb(0, 41, 80) !important;
        }
        .sb-nav-fixed .sb-topnav {
            background-color: rgb(0, 41, 80) !important;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <x-navbar />
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <x-sidebar />
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">@yield('title_dash')</li>
                    </ol>
                    @yield('content')
                </div>
            </main>
            <x-footer />
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    
    {{-- Datatable --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.bootstrap5.js"></script>

    <script src="{{ asset('dashboard/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('dashboard/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/js/datatables-simple-demo.js') }}"></script>

    @yield('custom_script')
</body>

</html>
