<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
</head>
<body>
<div id="app">

  <div class="row">
      <div class="col-12 text-right" style="text-align: right;">
          @guest
              <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
              @if (Route::has('register'))
                  <a class="btn btn-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
              @endif
          @else
              <button type="button" class="btn btn-success">Hi, {{ Auth::user()->name }}</button>
              <a class="btn btn-danger" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          @endguest

      </div>
  </div>

    <main>

        <div class="row">
            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
                <p class="alert alert-success">{{ Session::get('error') }}</p>
            @endif
        </div>

        @yield('content')
    </main>
</div>
@stack('js')
</body>
</html>
