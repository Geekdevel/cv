@extends('layouts.index')

@section('description')
This is the site where you can create your resume
@endsection

@section('author')
{{ Auth::user()->name }}
@endsection

@section('keywords')
Profile, resume, create, ...
@endsection

@section('title')
Admin panel {{ Auth::user()->name }}
@endsection

@section('content')
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
@endsection
