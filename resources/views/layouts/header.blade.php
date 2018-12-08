<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>USD2BDT Dollar Buy-Sell & Exchange Worldwide</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}"/>
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	
	<link rel="stylesheet" href="{{asset('css/ticker.css')}}">
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">

<style>
	.no-js #loader { display: none;  }
	.js #loader { display: block; position: absolute; left: 100px; top: 0; }
	.se-pre-con {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url({{asset('images/Preloader_2.gif')}}) center no-repeat #fff;
	}

</style>


	
</head>
<body>
<div class="se-pre-con"></div>
<!-- Header Area	 -->
<div class="header">
	<div class="container">
		<div class="col-sm-3">
			<a href="{{route('index')}}">
				<div class="logo">
					<img src="{{asset('images/logo.png')}}" alt="">
				</div>
			</a>
		</div>
		
		<div class="col-sm-6">
			<div class="menu">
				<ul>
					<li><a href="{{route('index')}}">buy-sell</a></li>
					<li><a href="{!! url('/testimonials'); !!}">testimonials</a></li>
					<li><a href="{!! url('/contact'); !!}">contact</a></li>
					<li class="operator">
						<p> 
							<?php 
								$selectedTime = date('h:i:s');
								$time = strtotime("+6 hours", strtotime($selectedTime));
								if ($time > strtotime("06:00:0") )
								{
									if ($time < strtotime("23:59:0") )
										echo "<span>ONLINE</span>";
								}
								else 
								{
									echo "<span>OFFLINE</span>";
								}
							?>
						</p>
					</li>
				</ul>
			</div>
		</div>
		
					
					
				

		<div class="col-sm-3">
			<div class="login">
				<ul>
					@guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
					@else
						<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <img src="{{asset('images/avatar.png')}}" alt=""> {{ Auth::user()->name }} <span class="caret"></span>
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
                                </ul>
                            </li>
                            @if(Auth::user()->admin)
                            	<li class="user_profile_link"><a href="{{route('home')}}">Admin Panel</a></li>

                            	@else 
                            	<li class="user_profile_link"><a href="{{route('user.profile', ['id'=>Auth::user()->id])}}">My Profile</a></li>
                            @endif
					@endguest

				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End of Header Area -->
<div class="clear_fix"></div>