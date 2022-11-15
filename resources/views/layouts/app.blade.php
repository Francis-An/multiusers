<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav
            class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top  navbar-inverser navbar-fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('storage/logo.svg') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto col-5 col-md-6 col-lg-4">

                        @guest
                            <li class="col">
                                <form action="{{ route('drugs.search') }}" method="GET" class="col">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" class="form-control rounded" placeholder="search drugs .... "
                                            name="search">
                                        <div class="input-group-btn">
                                            <input class="btn btn-danger ms-2 search-btn" type="submit" value="search">
                                        </div>
                                    </div>
                                </form>
                            </li>
                        @elseif (Auth::user()->role != 'admin')
                            <li class="col">
                                <form action="{{ route('drugs.search') }}" method="GET" class="col">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" class="form-control rounded" placeholder="search drugs .... "
                                            name="search">
                                        <div class="input-group-btn">
                                            <input class="btn btn-danger ms-2 search-btn" type="submit" value="search">
                                        </div>
                                    </div>
                                </form>
                            </li>

                        @endguest

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->


                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                    href="{{ url('/') }}">{{ __('Home') }}</a>
                            </li>

                            {{-- Pharmacies dropdown --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"
                                    class="nav-link dropdown-toggle {{ request()->is('products') ? 'active' : '' }} 
                                {{ request()->is('pharmacies') ? 'active' : '' }}"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    Stores
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('products') }}">
                                        {{ __('Drugs') }}
                                    </a>
                                    <a class="dropdown-item" href="/pharmacies">
                                        {{ __('Pharmacies') }}
                                    </a>

                                </div>
                            </li>
                            {{-- End of Pharmacies Drop down --}}


                            <li class="nav-item cart">
                                <a class="nav-link ms-2 cart-link {{ request()->is('carts') ? 'active' : '' }}"
                                    href="{{ url('login') }}">{{ __('Cart') }}
                                    <img class="cart-i" src="{{ asset('storage/scart.svg') }}" alt="">
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('') ? 'active' : '' }}"
                                    href="{{ url('') }}">{{ __('About us') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('') ? 'active' : '' }}"
                                    href="{{ url('') }}">{{ __('Contact us') }}</a>
                            </li>
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('login') ? 'active' : '' }}"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('register') ? 'active' : '' }}"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                    href="{{ url('/') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('home') ? 'active' : '' }}"
                                    href="{{ url('/home') }}">{{ __('Dashbord') }}</a>
                            </li>

                            {{-- Products link --}}
                            @if (Auth::user()->role == 'pharma')
                                <li class="nav-item cart">
                                    <a class="nav-link ms-2 cart-link {{ request()->is('medicines') ? 'active' : '' }}"
                                        href="/medicines">{{ __('Drugs') }}
                                    </a>
                                </li>
                                @if (Auth::user()->role == 'pharma')
            
                                    <li class="nav-item cart">
                                        <a class="nav-link ms-2 cart-link {{ request()->is('users') ? 'active' : '' }}"
                                            href="/pharmacy_users/{{ Auth::user()->id }}">{{ __('Customers') }}
                                        </a>
                                    </li>
                                @endif
                            @endif
                            {{-- <span class="material-icons cart-i">shopping_cart</span> --}}

                            @can('isUser')
                                <li class="nav-item cart">
                                    <a class="nav-link ms-2 cart-link {{ request()->is('/medicines/id') ? 'active' : '' }}"
                                        href="{{ url('/carts') }}">{{ __('Cart') }}
                                        <img class="cart-i" src="{{ asset('storage/scart.svg') }}" alt="">
                                        {{-- <span class="material-icons cart-i">shopping_cart</span> --}}
                                    </a>
                                </li>

                                {{-- Pharmacies dropdown --}}
                                <li class="nav-item cart">
                                    <a class="nav-link ms-2 cart-link {{ request()->is('pharmacies') ? 'active' : '' }}"
                                        href="{{ url('/pharmacies') }}">{{ __('Pharmacies') }}

                                    </a>
                                </li>
                                {{-- End of Pharmacies Drop down --}}
                            @endcan
                            @unless(Auth::user()->role == 'admin')
                                <li class="nav-item cart">
                                    <a class="nav-link ms-2 cart-link {{ request()->is('orders') ? 'active' : '' }}"
                                        href="{{ url('/orders') }}">{{ __('Orders') }}

                                    </a>
                                </li>
                            @endunless

                            {{-- Register Pharmacy link for admin --}}
                            @if (Auth::user()->role == 'admin')

                                <li class="nav-item cart">
                                        <a class="nav-link ms-2 cart-link {{ request()->is('users') ? 'active' : '' }}"
                                            href="/users">{{ __('Users') }}
                                        </a>
                                    </li>

                                <li class="nav-item dropdown me-4">
                                    <a id="navbarDropdown"
                                        class="nav-link dropdown-toggle {{ request()->is('pharmacies') ? 'active' : '' }} 
                                {{ request()->is('pharmacies/create') ? 'active' : '' }} {{ request()->is('pharmacy/') ? 'active' : '' }}"
                                        href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        Pharmacies
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/pharmacies/create">
                                            {{ __('Register Pharmacy') }}
                                        </a>
                                        <a class="dropdown-item" href="/pharmacies">
                                            {{ __('All Pharmacy') }}
                                        </a>


                                    </div>
                                </li>
                            @endif
                            {{-- End Register Pharmacy link for admin --}}

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->role == 'user')
                                        <a class="dropdown-item" href="/customers/{{ Auth::user()->id }}">
                                            {{ __('Profile Settings') }}
                                        </a>
                                    @elseif (Auth::user()->role == 'pharma')
                                        <a class="dropdown-item" href="/users/{{ Auth::user()->id }}">
                                            {{ __('Profile Settings') }}
                                        </a>
                                    @endif


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest



                    </ul>
                </div>
            </div>
        </nav>

        <main class="py2">
            @yield('content')
        </main>

        <footer>
            <div class="container py-5">
                <div class="row ">
                    <div class="col-lg-6">
                        <a href="" class="btn btn-lg">Contact Us</a>
                        <a href="" class="btn btn-lg">Store</a>
                    </div>
                    <div class="col-lg-6">
                        <ul class="">
                            <li class=" list-group-item">
                                <a href="#"><img src="{{ asset('storage/twitter-dark.svg') }}"
                                        alt=""></a>
                            </li>
                            <li class=" list-group-item">
                                <a href="#"><img src="{{ asset('storage/Utubedark.svg') }}"
                                        alt=""></a>
                            </li>
                            <li class=" list-group-item">
                                <a href="#"><img src="{{ asset('storage/facedark.svg') }}" alt=""></a>
                            </li>
                            <li class="row list-group-item">
                                <a href="#"><img src="{{ asset('storage/Igdark.svg') }}" alt=""></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Copyright -->
                    <div class="text-center text-lg">
                        © 2022 Pharma all Copyright Reserve
                    </div>
                    <!-- Copyright -->

                </div>
            </div>
        </footer>


    </div>
</body>

</html>
