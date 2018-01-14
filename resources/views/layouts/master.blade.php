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
@yield ('content')

  <script src="{{ url('js/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('js/bootstrap.min.js') }}" type="text/javascript"></script>
@yield ('scripts')
</body>
</html>
