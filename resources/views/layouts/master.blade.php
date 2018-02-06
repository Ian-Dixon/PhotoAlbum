<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  @yield ('meta')

  <title>Hei</title>
  <link rel="shortcut icon" href="{{  url('favicon.png') }}" type="image/png"/>

  <link rel="stylesheet" href="{{ url('css/style.css') }}" />
  <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" />
  @yield ('styles')
</head>

<body>
  <div class="header">
    <div class="logo">
      <a href="{{ url('/') }}"><img src="favicon.png" height="32px" /></a>
    </div>
    <ul class="nav-links">
      <li class="nav-link"><a href="{{ url('/latest') }}">Latest</a></li>
      <li class="nav-link"><a href="{{ url('/') }}">All</a></li>
      @yield ('nav_links')
    </ul>
  </div>
  <div class="content">
    @yield ('content')
  </div>

  <script src="{{ url('js/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('js/bootstrap.min.js') }}" type="text/javascript"></script>
@yield ('scripts')
</body>
</html>
