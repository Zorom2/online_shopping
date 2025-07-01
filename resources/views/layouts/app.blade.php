<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Font Awesome -->

    <!-- Zoom Image -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('jquery.exzoom.css') }} ">
    <script src="{{ asset('jquery.exzoom.js') }}"></script>
    <!-- Zoom Image -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Onlineshop
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('/mtn') }}">Myo Tun Naung</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ url('/zwe') }}">Zwe Thura</a>
                         </li> -->

                         @if(Auth::check())
                            @if(Auth::user()->name == "Admin")

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/category/list') }}">   Category    </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/brand/list') }}">       Brand        </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/product/list') }}">    Product     </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/order/list') }}">    Order     </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/orderitem/list') }}">    Order Item     </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/payment/list') }}">    Payment     </a>
                            </li>

                            @endif
                        @endif
                    </ul>

                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                     <!-- Shopping Cart  -->
                      <a href="{{ url('/product/shoppingCart') }}" style="background-color: #f89224;" class="btn btn-outline-dark"   >

                            <i class="fas fa-shopping-cart"></i>
                            Shopping Cart
                            [ {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }} ] 
                          
                      </a>
                      <!-- End Shopping Cart -->
                       
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if(Auth::check())
                                    @if(Auth::user()->name == "User")

                                        <a class="dropdown-item" href="{{ url('/admin/myorder/list') }}">   My Order    </a>

                                        <a class="dropdown-item" href="{{ url('/admin/mypayment/list') }}">   My Payment   </a>
                                        
                                    @endif
                                @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content') 
        </main>

            @yield('scripts')
    </div>

    @if (Request::is('/'))
        <div class="video-container">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
        </video>
        </div>
    @endif

    <style>
        .video-container {
            position: fixed;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            top: 0; left: 0;
            z-index: -1;
        }

        #bg-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    
</body>
</html>
