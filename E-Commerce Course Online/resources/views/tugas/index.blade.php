<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('tittle')</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('Modernize-1.0.0/src/assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('Modernize-1.0.0/src/assets/css/styles.min.css')}}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->

    @include('tugas.partisi.sidebar')

    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      
      @include('tugas.partisi.navbar')

      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        @yield('content')
        
      </div>
    </div>
  </div>
  <script src="{{asset('Modernize-1.0.0/src/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('Modernize-1.0.0/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('Modernize-1.0.0/src/assets/js/sidebarmenu.js')}}"></script>
  <script src="{{asset('Modernize-1.0.0/src/assets/js/app.min.js')}}"></script>
  <script src="{{asset('Modernize-1.0.0/src/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{asset('Modernize-1.0.0/src/assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{asset('Modernize-1.0.0/src/assets/js/dashboard.js')}}"></script>
  @stack('script')
  @include('sweetalert::alert')

</body>

</html>