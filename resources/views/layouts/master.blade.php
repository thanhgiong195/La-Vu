<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <title>@yield('title')</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="nav-link" href="{{ route('home') }}">{{ __('base.home') }} <span class="sr-only">(current)</span></a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{  route('contact.create') }}">{{ __('base.create') }}</a>
          </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('base.login') }}</a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('base.register') }}</a>
          </li>
          @endif
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" v-pre>
              <img alt="avatar" style="width:30px;height:30px;border-radius:50%" src="<?php echo asset('storage/image/user.png')?>">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('profile') }}">{{ __('base.profile') }}</a>
              <a class="dropdown-item" href="#" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" role="button" v-pre>
                {{ __('base.logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @endif

          @if (Lang::locale() === 'vi')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('switchLang') }}" onclick="event.preventDefault();
              document.getElementById('lang-form').submit();">
              VI
            </a>
            <form id="lang-form" action="{{ route('switchLang') }}" method="POST" style="display: none;">
              <select name="locale" class="dropdown" onchange='this.form.submit();'>
                  <option value="en" selected>EN</option>
              </select>
              {{ csrf_field() }}
            </form>
          </li>

          @elseif (Lang::locale() === 'en')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('lang-form').submit();">
              EN
            </a>
            <form id="lang-form" action="{{ route('switchLang') }}" method="POST" style="display: none;">
              <select name="locale" class="dropdown" onchange='this.form.submit();'>
                  <option value="vi" selected>VI</option>
              </select>
              {{ csrf_field() }}
            </form>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div style="margin: 40px auto">
      @if (session('success'))
        <div class="alert alert-danger">
          {{ session('success')}}
        </div><br />
      @endif
      @yield('content')
    </div>
  </div>
</body>
<style>
  .alert {
    position: absolute;
    z-index: 1;
    right: 10px;
    top: 70px;
  }
</style>
<script>
  setTimeout(() => {
    $('.alert').hide('slow');
  }, 2000);
</script>
</html>