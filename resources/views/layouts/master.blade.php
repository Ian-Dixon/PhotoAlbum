<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  @yield ('meta')

  <title>Hei</title>
  <link rel="shortcut icon" href="{{  url('favicon.png') }}" type="image/png"/>

  <link rel="stylesheet" href="{{ url('css/style.css') }}" />
  @yield ('styles')
</head>

<body>
@yield ('content')

@yield ('scripts')
</body>
</html>
