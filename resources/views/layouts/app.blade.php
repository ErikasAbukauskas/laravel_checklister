<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Option 1: CoreUI for Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/css/coreui.min.css" rel="stylesheet"
        integrity="sha384-UkVD+zxJKGsZP3s/JuRzapi4dQrDDuEf/kHphzg8P3v8wuQ6m9RLjTkPGeFcglQU" crossorigin="anonymous">


    <!-- Option 2: CoreUI PRO for Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@4.4.3/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-DN37sKXjXaUfTUzPFe9B4+RwDGdqbWhLExfnr8IeOt7w92aTL9JVv33fauH+K9Ok" crossorigin="anonymous"> -->

    <title>{{ config('app.name', 'Laravel') }}</title>
    @livewireStyles
</head>
{{-- <body> --}}

<body class="c-app">
   @include('partials.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container">
                <button class="header-toggler px-md-0 me-md-3" type="button" onclick="if (!window.__cfRLUnblockHandlers) return false; coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-menu' )}}"></use>
                    </svg>
                </button>
                <ul class="header-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('consultation')}}">{{ __('Get Consultation')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome')}}">
                            <svg class="icon icon-lg">
                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-settings' )}}"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
                <ul class="header-nav ms-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link py-0" data-coreui-toggle="dropdown"
                            href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon icon-lg">
                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user' )}}"></use>
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Account</div>
                            </div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <svg class="icon me-2">
                                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout' )}}"></use>
                                </svg> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <div class="c-body">
            <main class="c-main">
                @yield('content')
            </main>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: CoreUI for Bootstrap Bundle with Popper -->
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/js/coreui.bundle.min.js"
            integrity="sha384-n0qOYeB4ohUPebL1M9qb/hfYkTp4lvnZM6U6phkRofqsMzK29IdkBJPegsyfj/r4" crossorigin="anonymous">
        </script>
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
        @yield('scripts')
</body>
</html>
