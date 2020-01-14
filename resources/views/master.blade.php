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

  <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body id="page-top">
<div id="app">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/master"> {{ Auth::user()->name }} </a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <ul class="nav nav-pills ml-1">
      <li class="nav-item">
        <a class="btn btn-link btn-sm text-white order-1 order-sm-0" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
      </li>
    </ul>


  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/master">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="{{ route('password.request') }}">
            {{ __('Forgot Password') }}
          </a>

          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <router-link :to="{ name: 'master' }" class="dropdown-item">Home</router-link>
          <router-link :to="{ name: 'profilecreate' }" class="dropdown-item">Create Profile</router-link>
          <router-link :to="{ name: 'profileedit' }" class="dropdown-item">Edit Profile</router-link>
          <router-link :to="{ name: 'resumescreate' }" class="dropdown-item">Create Resume</router-link>
          <router-link :to="{ name: 'resumes' }" class="dropdown-item">Resumes</router-link>
          <router-link :to="{ name: 'showresume' }" class="dropdown-item">Resume Show</router-link>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">
        <router-view :user="{{ Auth::user() }}"></router-view>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

</div>
</body>

</html>

