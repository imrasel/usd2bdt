@include('layouts.header')



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
	<div class="thanks">
		<h1>Thank You {{Auth::user()->name}} </h1>
		<p>Your transaction is submitted. It will be processed in few minutes by an Operator. You will get further notification through your Profile Email.</p>
		<a href="{{ route('user.exchange', Auth::id())}}" class="btn btn-info">See Your Transaction history</a>
	</div>
			
</div>


<!-- Sliding Logo Area -->
<div class="container">
	
</div>

<div class="container">
	<div class="feedback_area">
		<h3>
			<img src="images/awesome.png" alt="">
			 Customer Feedback
		</h3>

		<div class="row">
			<div class="feedback">
				<div class="col-sm-3">
					<div class="feedback_item">
						<h4>POSITIVE</h4>
						<p>Nice site....got my paymment in 30 min. Love this site</p>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="feedback_item">
						<h4>POSITIVE</h4>
						<p>Excellent service. I think it's the most reliable, fast and transparent payment solution in Bangladesh. Hope all freelancers will be benefited from this site.</p>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="feedback_item">
						<h4>POSITIVE</h4>
						<p>Nice site....got my paymment in 30 min. Love this site</p>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="feedback_item">
						<h4>POSITIVE</h4>
						<p>Excellent service. I think it's the most reliable, fast and transparent payment solution in Bangladesh. Hope all freelancers will be benefited from this site.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of Feedback -->





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