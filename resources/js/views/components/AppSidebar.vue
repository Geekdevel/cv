<template>
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <router-link v-if="chekProfileWisUser" :to="{ name: 'profileedit' }" class="nav-link"> <i class="fas fa-user-tag"></i> <span>Profile</span></router-link>
      </li>
      <li class="nav-item active">
        <router-link :to="{ name: 'resumes' }" class="nav-link"> <i class="far fa-address-card"></i> <span>Resumes</span></router-link>
      </li>
      <li class="nav-item active">
        <router-link :to="{ name: 'resumescreate' }" class="nav-link"> <i class="fas fa-pen-nib"></i> <span>Create Resume</span></router-link>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <router-link :to="{ name: 'master' }" class="dropdown-item">Home</router-link>
          <router-link :to="{ name: 'profilecreate' }" class="dropdown-item">Create Profile</router-link>
        </div>
      </li>
    </ul>
</template>
<script>
  export default {

    props: {
      user: {}
    },

    computed: {
      chekProfileWisUser() {
        if (this.user.profile){
          return true
        }
        else {
          return false
        }
      }
    }
  }
</script>
