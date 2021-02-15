<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Laravel") }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
            crossorigin="anonymous"
        />
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"
        ></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    </head>
    <style>
        .sidenav {
            height: 100%;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }
    </style>
    <body>
        <header
            class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow"
        >
            <a
                class="navbar-brand col-md-3 col-lg-2 me-0 px-3"
                href="{{ url('/') }}"
            >
                {{ config("app.name", "Laravel") }}</a
            >
            <button
                class="navbar-toggler position-absolute d-md-none collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav px-3">
                @guest @if (Route::has('login'))

                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('login') }}">
                        {{ __("Login") }}</a
                    >
                </li>

                @endif @if (Route::has('register'))
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('register') }}">{{
                        __("Register")
                    }}</a>
                </li>

                @endif @else
                <li class="nav-item dropdown">
                    <a
                        id="navbarDropdown"
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        v-pre
                    >
                        {{ Auth::user()->name }}
                    </a>

                    <div
                        class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="navbarDropdown"
                    >
                        <a
                            class="dropdown-item"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"
                        >
                            {{ __("Logout") }}
                        </a>

                        <form
                            id="logout-form"
                            action="{{ route('logout') }}"
                            method="POST"
                            class="d-none"
                        >
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </header>

        <div class="container-fluid">
            <div class="row" style="margin-top: 20px"></div>
            <div class="row">
                <div class="col-sm-3 sidenav my-4">
                    <ul>
                        @if(auth()->user()->hasRole('super-admin'))
                        <li>
                            <a href="{{ route('users.index') }}"
                                >User Role Management</a
                            >
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('posts.index') }}">News</a>
                        </li>
                        @if(auth()->user()->hasRole('super-admin')||auth()->user()->hasRole('author'))
                        <li>
                            <a href="{{ route('posts.create') }}"
                                >Creating News</a
                            >
                        </li>
                        <li>
                            <a href="{{ route('category.create') }}"
                                >Creating New Category</a
                            >
                        </li>

                        <li>
                            <a href="{{ route('category.index') }}"
                                >News Categories</a
                            >
                        </li>
                        @endif
                    </ul>
                </div>
                <main class="col-sm-9 py-4">@yield('content')</main>
            </div>
        </div>
    </body>
    @stack('js')
</html>
