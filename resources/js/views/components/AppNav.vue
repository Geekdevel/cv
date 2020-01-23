<template>
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/master"> {{ user.name }} </a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <ul class="nav d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item">
        <button type="button" class="btn btn-sm btn-outline-light text-white order-1 order-sm-0" href="#">
          Logout
        </button>
       <!--  <a class="btn btn-sm btn-outline-light text-white order-1 order-sm-0" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a> -->

         <!--  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form> -->
      </li>
    </ul>

  </nav>
</template>
<script>
  export default {
    name: 'AppNav',

    props: {
      user: {}
    },

    data() {
      return {

      }
    },

    methods: {
      logautClick() {

      }
    }
  }
</script>
