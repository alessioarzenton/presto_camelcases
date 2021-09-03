<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="/css/app.css">

    <title>{{$title ?? 'Presto.it'}}</title>

    {{$style ?? ''}}
  </head>
  <body>

    <x-navbar/>

    {{$slot}}

    <x-footer/>

    <script src="/js/app.js"></script>

  </body>
</html>
