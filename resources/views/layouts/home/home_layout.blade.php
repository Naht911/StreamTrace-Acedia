<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- boostrap 5 --}}
    <link rel="shortcut icon" href={{ asset('img/acedia.png') }} type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
     <title>@yield('title') | Acedia</title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- Link Swiper's CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/style.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/responsive.css') }}">


     {{-- <script src="/assets/home/js/js-popular.js"></script> --}}
     @stack('css')

</head>

<body>
     @include('layouts.home.partials.header')

     @yield('content')

     @include('layouts.home.partials.footer')


     <!-- Swiper JS -->
     <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

     <!-- JQuery -->
     <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

     <script>
          var swiper = new Swiper('.titles .card-sliders-1', {
               slidesPerView: 1.2,
               spaceBetween: 10,
               navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
               },
               breakpoints: {
                    640: {
                         slidesPerView: 2,
                         spaceBetween: 10,
                    },
                    768: {
                         slidesPerView: 4,
                         spaceBetween: 10,
                    },
                    1024: {
                         slidesPerView: 6.5,
                         spaceBetween: 20,
                    },
               },
          });

          var swiper = new Swiper('.card-sliders-2', {
               slidesPerView: 1.3,
               spaceBetween: 10,
               navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
               },
               breakpoints: {
                    640: {
                         slidesPerView: 3,
                         spaceBetween: 10,
                    },
                    768: {
                         slidesPerView: 3,
                         spaceBetween: 10,
                    },
                    1024: {
                         slidesPerView: 4.8,
                         spaceBetween: 10,
                    },
               },
          });

          var swiper = new Swiper('.card-sliders-3', {
               slidesPerView: 1,
               spaceBetween: 10,
               navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
               },
               breakpoints: {
                    640: {
                         slidesPerView: 3,
                         spaceBetween: 10,
                    },
                    768: {
                         slidesPerView: 3,
                         spaceBetween: 10,
                    },
                    1024: {
                         slidesPerView: 5,
                         spaceBetween: 10,
                    },
               },
          });
     </script>

     <script src="/assets/home/js/javascript.js"></script>
     {{-- <script src="/assets/home/js/javascript_profile.js"></script> --}}
     @stack('scripts')
</body>

</html>
