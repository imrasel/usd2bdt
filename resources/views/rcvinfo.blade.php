@include('layouts.header')

<!-- Scrolling text -->
<div class="container">
	<div class="marquee">
		<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" id="MARQUEE1" style="text-align: left;" class="scrolling">  
			<span>Update: </span>
			{{$scroll->name}}
		</marquee>
	</div>
</div>

<!-- Menu Area -->
<div class="container">
	<div class="row">
		
		<div class="logo_slide animated infinite pulse">
			<ul>
				<li><img class="" src="images/1505799096_icon.png" alt=""></li>
				<li><img src="images/1501514964_icon.png" alt=""></li>
				<li><img src="images/Payeer.png" alt=""></li>
				<li><img src="images/1514142852_icon.png" alt=""></li>
				<li><img src="images/bkash.png" alt=""></li>
				<li><img src="images/rocket.png" alt=""></li>
				<li><img src="images/15015148801_icon.png" alt=""></li>
				<li><img src="images/1501515205_icon.png" alt=""></li>
				<li><img src="images/1501515014_icon.png" alt=""></li>
			</ul>
		</div>
			
	</div>
</div>
<!-- End of Menu Area -->


<!-- Exchange Ara -->
<div class="container">
	<div class="row">
		<div class="exchange_area">
			<div class="col-sm-8">
				<div class="exchange" >
					<div class="row">
						
						<div class="confirm">
							<form class="confirm_form" action="{{ route('exchange')}}" method="post">
								{{csrf_field()}}

								<div class="form-group">
									<label for="email">Enter Your Email Address:</label>
									<input type="email" class="form-control" name="receive_email" required="email">
								</div>

								<div class="form-group">
									<label for="receiveAccount"> Enter Your <span style="color: #415E9B">{{ $send_wallet_name }}</span> Number/Email:</label>
									<input type="text" class="form-control" name="receiveAccount" required>
								</div>

								<div class="form_hidden">
									<input  type="text" name="send_wallet" value="{{$send_wallet}}">
									<input  type="text" name="receive_wallet" value="{{$receive_wallet}}">
									<input  type="text" name="sendAmount" value="{{$sendAmount}} {{$sendCur}}">
									<input  type="text" name="receiveAmount" value="{{$receiveAmount}} {{$receiveCur}}">
									{{-- <input  type="text" name="receiveAccount" value="{{$receiveAccount}}">
									<input  type="text" name="email" value="{{$email}}">
									<input  type="text" name="user_id" value="{{$user_id}}"> --}}
									<input  type="text" name="user_name" value="{{Auth::user()->name}}">
									<input  type="text" name="usd2bdt_transaction" value="{{$usd2bdt_transaction}}">
								</div>
								<button type="submit" class="btn btn-warning btn-lg btn-prc" >Process Exchange</button>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Sliding Logo Area -->
<div class="container">
	
</div>






<!-- Verified Account Area -->
<div class="container">
	<div class="verified_account_area">
		<div class="row">
			<div class="verified_account">
				<div class="heading">
					<h4>
						<img src="{{asset('images/cart.png')}}" alt="">
						 Our Additional Services
					</h4>
				</div>
				<div class="col-sm-3">
					<div class="verified_account_item">
						<img src="{{asset('images/amazon.jpg')}}" alt="">
						<p class="available">Buy Products</p>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="verified_account_item">
						<img src="{{asset('images/vpn.png')}}" alt="">
						<p class="available">Buy VPN & BPS</p>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="verified_account_item">
						<img src="{{asset('images/domain.jpg')}}" alt="">
						<p class="available">Buy Domain & Hosting</p>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="verified_account_item">
						<img src="{{asset('images/facebook-marketing.jpg')}}" alt="">
						<p class="available">Facebook Promotion</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of Verified Account Area -->

<!-- Footer Area -->
@include('layouts.footer')