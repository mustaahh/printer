<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('dashboard/assets') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title> @yield('page_title') </title>

    <meta name="description" content="" />
    

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('dashboard/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('dashboard/assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Basic -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 ">
      <div class="container-fluid">
        <div class="app-brand demo m-2">
          <a href="{{ route('home') }}" class="app-brand-link">
            <i class='bx bxs-printer bx-md'></i>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">printly</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>
        
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown disabled">
              <a
                class="nav-link  disabled "
                href="javascript:void(0)"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Best printer shop in town!
              </a>
              
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="javascript:void(0)">Brand</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('home-brands') }}">Brands</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home-best-sellers') }}">Best Sellers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home-products') }}">Products</a>
            </li>
            
          </ul>

              
          <div class="navbar-nav"> 
            <div class="nav-item d-flex align-items-center">
              <label for="searchbar">  
                <i class="bx bx-search fs-4 lh-0 m-2"></i>
              </label>
              <input
                type="text"
                class="form-control border-0 shadow-none"
                placeholder="Search..."
                aria-label="Search..."
                id="searchbar"
              />
            </div>
          </div>
          <button type="button" class="btn btn-info m-2">Sign In</button>
          <button type="button" class="btn btn-outline-info m-2">Sign Up</button>
        </div>
      </div>
    </nav>

    <div class="content-wrapper">
              @yield('main-content')
  
            </div>


    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
      <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
          © Copyright
          <script>
            document.write(new Date().getFullYear());
          </script>, made with ❤️ by
          <a href="github.com/mustaahh" target="_blank" class="footer-link fw-bolder">Mustaahh</a>
        </div>
      </div>
    </footer>
    <!-- / Footer -->
    <!--/ Basic -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('dashboard/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('dashboard/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('dashboard/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('dashboard/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready( function () {
        $('.table').DataTable();
        $('#searchbar').on('keyup', function () {
          var table = $('.table').DataTable();
          table.search(this.value).draw();
        });
        });
    </script>
  </body>
</html>
