<!DOCTYPE html>
<html lang="en" class="bg-white">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Golos+Text:wght@400..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Press+Start+2P&display=swap" rel="stylesheet">
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  
  <link href="{{asset("assets/css/bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("assets/css/jasny-bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("assets/css/custom.css")}}" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  
  @vite('resources/css/app.css')
  <title>@yield('title', 'Seeka - Job Board')</title>
</head>

@yield('content')


<script src="{{asset("assets/js/jquery.min.js")}}"></script>
<script src="{{asset("assets/js/popper.min.js")}}"></script>
<script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/js/jasny-bootstrap.min.js")}}"></script>

<footer class="bg-white white:bg-gray-900 m-4">
  <div class="w-full max-w-screen-lg mx-auto p-4 md:py-8">
    <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="{{route('home.index')}}" class="hover:underline">Seeka™</a>. All Rights Reserved.</span>
  </div>
</footer>

</html>