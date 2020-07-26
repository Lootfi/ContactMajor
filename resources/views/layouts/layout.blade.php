<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{asset('icon.png')}}">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    {{-- Styles --}}

    <script src="{{ asset('js/app.js') }}"></script>
    @section('stylsheets')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" media="screen" href="{{ asset('css/homepage-guest-a64009b0469f4b10acc3.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/navigation-logged-out-d62e82ca93adb946e71d.css') }}" />
    <link rel="stylesheet" media="screen"
        href="{{ asset('css/rebrand_color-9798a1049b0d1bdaed8ea422a78f405f28d0b020ba0d492cd154abda574182e4.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    @show

    <script src="../../js/register.js"></script>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" name="viewport" />


</head>



<body class="navbar-v2 mc-page" id="">
    <script src="{{ asset('js/home.js') }}"></script>


    <div style="
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
          ">
    </div>
    <div class="hide-when-cart-active">

        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            @auth
            <a href="/home" class="navbar-brand logo"><img src="{{ asset('logo.png') }}" id="cm-logo" alt="cm-logo" />
            </a>
            @endauth
            @guest
            <a href="{{route('home')}}" class="navbar-brand logo"><img src="{{ asset('logo.png') }}" id="cm-logo"
                    alt="cm-logo" />
            </a>
            @endguest
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <span class="font-weight-bold mc-text-small mc-text--uppercase mc-mr-1 mc-ml-5"
                            style="cursor: pointer;">BROWSE</span>
                    </li>
                </ul>
                @if(Auth::guest())
                <div class="my-2 my-lg-0">
                    <span id="loginButton" class="font-weight-bold mc-text-small mc-text--uppercase mc-mr-1 mc-ml-5"
                        style="cursor: pointer;" data-toggle="modal" data-target="#loginModal">LOGIN</span>
                </div>
                @else
                <div class="">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Bonjour, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Mon Compte</a>
                            <a class="dropdown-item" href="#">Gérer Mon Abonnement</a>
                            <form class="dropdown-item form-inline" method="POST" action="{{ route('logout') }}">
                                @csrf<button type="submit">Logout</button></form>
                        </div>
                    </div>
                </div>
                @endif


            </div>
        </nav>

        <div class="mc-page__content">
            @yield('content')
        </div>
    </div>
    @stack('scripts')


</body>

</html>