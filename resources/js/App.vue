<template>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <router-link to="/" class="nav-link">Home</router-link>
      <router-link to="/contacts" class="nav-link">Contacts</router-link>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <router-link to="/create" class="nav-link">Create Contact</router-link>
          </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          <li class="nav-item">
            <router-link to="/login" class="nav-link">Login</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/register" class="nav-link">Register</router-link>
          </li>
          <li class="nav-item dropdown">
            <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" v-pre>
              <img alt="avatar" style="width:30px;height:30px;border-radius:50%" src="<?php echo asset('storage/image/user.png')?>">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>-->
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Profile</a>
              <a
                class="dropdown-item"
                href="#"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                role="button"
                v-pre
              >Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <transition>
      <router-view></router-view>
    </transition>
  </div>
</template>

<script>
export default {};
</script>