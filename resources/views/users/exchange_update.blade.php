@include('layouts.header')

<!-- Scrolling text -->
<div class="container">
	<div class="marquee">
		<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" id="MARQUEE1" style="text-align: left;" class="scrolling">  
			<span>Update: </span>

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
						@if(count($errors) > 0)

					        <ul class="list-group">
					            @foreach($errors->all() as $error)
					                <li class="list-group-item text-danger">
					                    {{$error}}
					                </li>
					            @endforeach
					        </ul>

					    @endif

					    <div class="exchange_update">
							<h2>Transaction ID: {{ $usd2bdt_transaction }}</h2>
							<h4>Exchange from {{ $send_wallet }} to {{ $receive_wallet }}</h4>

							@if(!isset($user_transaction ))
								<form  action="{{ route('exchange_update_store', $transaction_id)}}" method="post">
									{{csrf_field()}}
									<div class="form-group">
										<label for="" class="text-danger">Enter your Transaction Number</label>
										<input type="text" name="user_transaction" class="form-control" required value="{{ $user_transaction }}"><br>		
									</div>
									<div class="form-group">
										<label for="" class="text-danger">Enter your Transaction Email/Account</label>
										<input type="text" name="user_transaction_email" class="form-control" value="{{ $user_transaction_email }}">
									</div>
									<button type="submit" class="btn btn-info btn-lg">Update Your Transaction Details</button>
								</form>
								@else
									<h4>Your Payment is Already submitted</h4>
							@endif
						</div>

			</div>
		</div>
	</div>
</div>


<!-- Sliding Logo Area -->
<div class="container">
	
</div>
<!-- End of sliding logo -->




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