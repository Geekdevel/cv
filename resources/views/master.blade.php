<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="description" content="@yield('description', 'This resume vue')">
  <meta name="author" content="@yield('author', 'I am')">
  <meta name="keywords" content="@yield('keywords', 'resume, vue, test')">


  <title>
    @yield('title', 'Resume Vue')
  </title>

  <!-- Custom fonts for this template-->
  <link href="/sb-admin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="/css/sb-admin.css" rel="stylesheet">
  <link href="/css/all.css" rel="stylesheet">
  <link href="/css/app.css" rel="stylesheet">

  <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body id="page-top">
<div id="app">
  <app-nav :user="{{ Auth::user() }}"></app-nav>
  <div id="wrapper">

    <!-- Sidebar -->
    <app-sidebar></app-sidebar>

    <div id="content-wrapper">

      <div class="container-fluid">
        @include('flash-message')
        <router-view :user="{{ Auth::user() }}"></router-view>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © {{ config('app.name', 'Resume') }} {{ date('Y') }}</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->
</div>
</body>

</html>

