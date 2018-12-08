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

        <div class="container">


                    <div class="panel panel-default">

        <div class="panel-heading">
            All Transactions
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-hover table-bordered" style="font-size: 12px;">
                <thead>
                <th>
                    Exchange ID
                </th>
                <th>
                    Send
                </th>
                <th>
                    Receive
                </th>
                <th>
                    Send Amount
                </th>
                <th>
                    Receive Amount
                </th>
                <th>
                    Receive Wallet Ac
                </th>
                <th>
                    User Name
                </th>
                <th>
                    Send Wallet Ac
                </th>
                <th>
                    Send Trans. ID
                </th>
                <th>
                    Status
                </th>
                <th>
                    Action
                </th>
                </thead>

                <tbody>
                @foreach($transactions as $transaction)

                    <tr>
                        <td>{{$transaction->usd2bdt_transaction}}</td>
                        <td>{{$transaction->send_wallet}}</td>
                        <td>{{$transaction->receive_wallet}}</td>
                        <td>{{$transaction->sendAmount}}</td>
                        <td>{{$transaction->receiveAmount}}</td>
                        <td>{{$transaction->receiveAccount}}</td>
                        <td>{{$transaction->user_name}}</td>
                        <td>{{$transaction->user_transaction_email}}</td>
                        <td>{{$transaction->user_transaction}}</td>
                        
                        
                        <td>
                            <a href="{{route('transaction.status', ['id'=>$transaction->id])}}" class="btn btn-primary btn-sm">{{$transaction->status}}</a>
                        </td>
                        <td>
                            <a href="{{route('transaction.delete', ['id'=>$transaction->id])}}" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure, your want to Delete the Transaction')">Delete</a>
                        </td>

                    
                    </tr>
                @endforeach
                </tbody>
                {{ $transactions->links() }}
            </table>
                </div>
            </div>
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


























    