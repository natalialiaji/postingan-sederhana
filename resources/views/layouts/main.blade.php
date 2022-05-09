<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset("bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- style css --}}
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    
    {{-- style trix --}}
    <link rel="stylesheet" href="{{ asset('/css/trix.css') }}">
    
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>WEB BERITA || {{ $active }}</title>
  </head>
  @include('partials.navbar')
  <body>
        <div class="container">
            @yield('container')
        </div>
        
    <script src="{{ asset("bootstrap/js/bootstrap.bundle.min.js") }}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>