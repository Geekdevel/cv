<template>
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <router-link :to="{ name: 'profileedit' }" class="nav-link"> <i class="fas fa-user-tag"></i> <span>Profile</span></router-link>
      </li>
      <li class="nav-item active">
        <router-link :to="{ name: 'resumes' }" class="nav-link"> <i class="far fa-address-card"></i> <span>Resumes</span></router-link>
      </li>
      <li class="nav-item active">
        <router-link :to="{ name: 'resumescreate' }" class="nav-link"> <i class="fas fa-pen-nib"></i> <span>Create Resume</span></router-link>
      </li>
    </ul>
</template>
<script>
</script>
