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
				<li><img class="" src="images/okpay.png" alt=""></li>
				<li><img src="images/1501514964_icon.png" alt=""></li>
				<li><img src="images/Payeer.png" alt=""></li>
				<li><img src="images/dbbl.png" alt=""></li>
				<li><img src="images/bkash.png" alt=""></li>
				<li><img src="images/rocket.png" alt=""></li>
				<li><img src="images/15015148801_icon.png" alt=""></li>
				<li><img src="images/1501515205_icon.png" alt=""></li>
				<li><img src="images/1501515014_icon.png" alt=""></li>
				<li><img src="images/paypal.png" alt=""></li>
				<li><img src="images/coin.png" alt=""></li>
				<li><img src="images/visa.png" alt=""></li>
			</ul>
		</div>
			
	</div>
</div>
<!-- End of Menu Area -->



<div class="container">
	<div class="row">
		<div class="contact">
			<table class="">
				<tbody>
					<tr>
						<td>
							<span class="label label-primary"> Facebook: </span>
						</td>
						<td>
							<a href="https://www.facebook.com/USDtoBDT/">Go to Our FB Page</a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="label label-primary"> Whatsapp: </span>
						</td>
						<td>
							<a href="">+917595963962</a>
						</td>
					</tr>
				</tbody>
		
			</table>
		</div>
	</div>
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