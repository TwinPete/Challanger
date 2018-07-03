<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Challanger') }}</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>
<body id="body">
    <div id="header">
        {{-- <img src="#" alt="No Pic found"> --}}
        <div id="searchbar">
            <input type="text" placeholder="search">
            <div id="searchbutton">
                <img src="/storage/res/search_icon.png" alt="No Pic found">
            </div>
        </div>
        <ul class="header-ul">
            @if (Auth::guest())
                            <li>What is Challanger?</li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="/profile2">My Profile</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                
                          
                        @endif
        </ul>
    </div>

    @yield('content')
    
<script src="{{ asset('js/min.js') }}"></script>

</body>
</html>