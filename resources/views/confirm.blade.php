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
				<div class="exchange_confirm" >
						@if(count($errors) > 0)

					        <ul class="list-group">
					            @foreach($errors->all() as $error)
					                <li class="list-group-item text-danger">
					                    {{$error}}
					                </li>
					            @endforeach
					        </ul>

					    @endif
						<table class="table exctable table-striped">
							<tbody>
								<tr>
									<td><h4 class="text-center">{{$send_wallet}} to {{$receive_wallet}}</h4></td>
									<td></td>
								</tr>
								
								<tr>
									<td>Data about to transfer</td>
									<td> <strong>{{$usd2bdt_transaction}}</strong></td>
								</tr>
								<tr>
									<td>The Exchange will be done in manually by an operator!</td>
									<td></td>
								</tr>

								<tr>
								</tr>
								<tr>
									<td>Our {{$send_wallet}} account details</td>
									<td></td>
								</tr>
								<tr>
									@foreach($all_send_wallets as $all_send_wallet)

									 @if( $all_send_wallet->name == $send_wallet )

										<td style="font-weight: bold; color: #415E9B;"> {{$send_wallet}} Account No. </td>
										<td> {{$all_send_wallet->my_account}} </td>
									@endif
									@endforeach
								</tr>
								
								<tr>
									<td>Your Payment Amount</td>
									<td>{{$sendAmount}} {{$sendCur}}</td>
								</tr>

							</tbody>

						</table>
						<div class="confirm">
							<form class="confirm_transaction_form" action="{{route('confirm.transaction')}}" method="post">
								{{csrf_field()}}
								
								
								<label for="" class="text-danger">Enter your Transaction Number</label>
								<input type="text" name="user_transaction" class="form-control" required><br>
								<label for="" class="text-danger">Enter your Transaction Email/Account</label>
								<input type="text" name="user_transaction_email" class="form-control" >
								<input type="hidden" name="usd2bdt_transaction" value="{{$usd2bdt_transaction}}">
								<input type="hidden" name="status" value="Processing">
								<input type="hidden" name="user_email" value="{{Auth::user()->email}}">
								<input type="hidden" name="user_name" value="{{Auth::user()->name}}">

								<button onclick="" class="btn btn-success btn-lg" type="submit">Confirm Transaction</button>

							</form>

							
							
						</div>


					
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