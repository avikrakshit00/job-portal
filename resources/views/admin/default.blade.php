<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield("login_title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    {{-- start custom css --}}
    @yield("custom_css")
    {{-- end custom css --}}
    {{-- start custom js --}}
    @yield("custom_js")
    {{-- start custom js --}}
    {{-- start custom font --}}
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    {{-- end custom font --}}
  </head>
  <body onload="initDoc();" token="{{csrf_token()}}" style="width: 100%;background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);">
    @yield("content")
  </body>
</html>
