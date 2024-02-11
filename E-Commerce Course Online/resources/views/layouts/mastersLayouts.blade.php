@extends('layouts.base')

@section('base_content')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('partials_pages.sidebars')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
        @include('partials_pages.navbar')
      <!--  Header End -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">@yield('title_content')</h5>
            @yield('content_page')
          </div>
        </div>
      </div>
    </div>
    @include('sweetalert::alert')
  </div>

@endsection
