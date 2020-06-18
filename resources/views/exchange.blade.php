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
				<div class="exchange" >
					<div class="row">
						
						<table class="table exctable table-striped">
							<tbody>
								<tr>
									<td><h4 class="text-center">{{$send_wallet}} to {{$receive_wallet}}</h4></td>
									<td></td>
								</tr>
								<tr>
									<td>The Exchange will be done in manually by an operator!</td>
									<td></td>
								</tr>
								<tr>
									<td>Your Transaction Number</td>
									<td><strong>{{$usd2bdt_transaction}}</strong></td>
								</tr>
								<tr>
									<td>Amount You Send</td>
									<td><strong>{{$sendAmount}} {{$sendCur}}</strong>
										
									</td>
								</tr>
								<tr>
									<td>Amount You will receive</td>
									<td>
										<strong>{{$receiveAmount}} {{$receiveCur}}</strong>
									</td>
									
								</tr>
								<tr>
									<td>Your {{$receive_wallet}} Account</td>
									<td>{{$receiveAccount}}</td>
								</tr>
								<tr>
									<td>Your Email Adress</td>
									<td>{{$email}}</td>
								</tr>
								<tr>
									<td>Total Amount for Payment</td>
									<td>
										<strong>{{$receiveAmount}} {{$receiveCur}}</strong>
									</td>
								</tr>

								
				

							</tbody>

						</table>
						<div class="confirm">
							<form class="confirm_form" action="{{ route('transaction.store')}}" method="post">
								{{csrf_field()}}
								<div class="form_hidden">
									<input  type="text" name="send_wallet" value="{{$send_wallet}}">
									<input  type="text" name="receive_wallet" value="{{$receive_wallet}}">
									<input  type="text" name="sendAmount" value="{{$sendAmount}} {{$sendCur}}">
									<input  type="text" name="receiveAmount" value="{{$receiveAmount}} {{$receiveCur}}">
									<input  type="text" name="receiveAccount" value="{{$receiveAccount}}">
									<input  type="text" name="receive_email" value="{{$email}}">
									<input  type="text" name="user_id" value="{{$user_id}}">
									<input  type="text" name="user_name" value="{{Auth::user()->name}}">
									<input  type="text" name="usd2bdt_transaction" value="{{$usd2bdt_transaction}}">
								</div>
								<button type="submit" class="btn btn-success">Confirm Order</button>
								<a href="{{route('index')}}" class="btn btn-danger">Cancel Order</a>
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