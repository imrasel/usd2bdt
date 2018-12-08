<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>USD2BDT</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        USD2BDT
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
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
                                    <li>
                                        <a href="/changePassword" class="btn btn-primary">Change your password</a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">

                @if(Auth::check())

                    <div class="col-lg-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>

                            {{-- <li class="list-group-item">
                                <a href="{{ route('user.create') }}">Create new User</a>
                            </li> --}}

                            <li class="list-group-item">
                                <a href="{{ route('admins') }}">Admins</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('users') }}">Users</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('send_wallet.create') }}">Create new Send Wallet</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('send_wallets') }}">Send Wallets</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('receive_wallet.create') }}">Create new Receive Wallet</a>
                            </li>

                            
                            <li class="list-group-item">
                                <a href="{{ route('receive_wallets') }}">Receive Wallets</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('trrate.create') }}">Add New Transaction Rates</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('trrate.index') }}">All Transaction Rates</a>
                            </li>

                            

                            <li class="list-group-item">
                                <a href="{{ route('reserve.create') }}">Create Reserve Accounts</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('reserves') }}">All Reserves</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('transactions') }}" target="blank">Transactions</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('rate.create') }}">Create New Rate</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('rates') }}">All Buy-Sell Rates</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('scroll') }}">Update Scroll Text</a>
                            </li>

                            {{-- <li class="list-group-item">
                                <a href="{{ route('rate.create') }}">Create New Rates</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('rates') }}">View All Rates</a>
                            </li> --}}

                            {{-- <li class="list-group-item">
                                <a href="{{ route('reserves') }}">Reserve Accounts</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('post.create') }}">Create new Post</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('categories') }}">Categories</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tag.create') }}">Create a new Tag</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tags') }}">Tags</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('posts') }}">All Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('posts.trashed') }}">All Trashed Posts</a>
                            </li> --}}


                        </ul>
                    </div>

                @endif

                <div class="col-lg-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>
</body>
</html>
