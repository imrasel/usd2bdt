@include('layouts.header')



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


<!-- Exchange Ara -->
<div class="container">
	<div class="row">
		<div class="exchange_area">
			<div class="col-sm-8">
				
				<div class="exchange">
					<div class="exchange_notice">
						<p>দয়া করে রিজার্ভ ফান্ড দেখে অর্ডার সাবমিট করুন!!</p>
					</div>
					<div class="row">
					@guest
						<form action="{{ route('login') }}">
						
					@else
						<form action="{{route('rcvinfo')}}" method="post">
							{{csrf_field()}}
							
							
							@endguest

							
							<div class="send">
								<img class="icon send_wallet_img" src="images/dollar.png" alt="">

								<div class="send_form">
									<h2 >
										<img  src="images/send.png" alt="">
										Send
									</h2>
									<select class="form-control" name="send_wallet_id" id="send"  required>
										<option value="">Select a Wallet</option>
										@foreach($send_wallets as $send_wallet)
				                            <option value="{{$send_wallet->id}}">{{$send_wallet->name}}</option>
				                        @endforeach
								</select> <br>
								<input type="text" id="sendAmount" name="sendAmount"  class="form-control" value="0" required>	

								<p class="send_text">
									<span id="sendText">0</span> 
									<span id="sendCur"></span> = <span id="receiveText">0</span> 
									<span id="receiveCur">	</span>
								</p>				

								</div>
								

							</div>
							<div class="receive">
								<div class="receive_form">
									<h2>
										<img src="images/receive.png" alt="">
										Receive
									</h2>
									<select class="form-control" name="receive_wallet_id" id="receive">
										@foreach($receive_wallets as $receive_wallet)
				                            <option value="{{$receive_wallet->id}}">{{$receive_wallet->name}}</option>
				                        @endforeach
									</select> <br>
								<input type="text" id="receiveAmount" name="receiveAmount"  class="form-control" value="0" readonly >

								<p class="reserve_text">
									<span id="">Reserve: </span> 
									<span id="reserveText">{{ $receive_wallets->first()->amount }}</span> 
									<span id="reserveCur">{{ $receive_wallets->first()->currency }}</span> 
								</p>	

								</div>
								<img class="icon receive_wallet_img" src="{{ $receive_wallets->first()->icon }}" alt="">

							</div>

							<div class="calculate">
								<br><br>
								<input type="hidden" id="sendCurr" name="sendCur" value="">
								<input type="hidden" id="receiveCurr" name="receiveCur" value="">

								
								<input type="hidden" name="usd2bdt_transaction" value="{{hexdec(uniqid())}}">
							</div>
							<div class="text-center">

								<button class="excbtn btn btn-danger btn-lg" id="exch" type="button" onclick="checkReserve()">
									<img src="images/reload.png" alt=""> Exchange
								</button>

								<button id="exchSubmit" style="display: none;" type="submit"> Exchange
								</button>
								
								<br><br>
								<div class="alert alert-danger" id="reserveAlert" style="display: none; width: 97%">
									
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="reserve_area">
					<div class="heading">
						<h4>
							<img src="images/stock.png" alt="">
							 reserve now
						</h4>
					</div>
					<div class="reserve">
						<div class="col-sm-6">
							<ul>
								@foreach($receive_wallets as $wallet)
								<li>
									<img src="{{asset($wallet->icon)}}" alt="">
									<p class="name">{{$wallet->name}}</p>
									<p class="amount"><span>{{$wallet->amount}} {{$wallet->currency}}</span> </p>
								</li>
									@if($loop->iteration == 7)
											</ul>
										</div>
										<div class="col-sm-6">
											<ul>
									@endif
									@if($loop->iteration == 14)
										@break
									@endif
								@endforeach

								@foreach($send_wallets as $wallet)
								
    								@if( $wallet->amount > 0)
        								<li>
        									<img src="{{asset($wallet->icon)}}" alt="">
        									<p class="name">{{$wallet->name}}</p>
        									<p class="amount"><span>{{$wallet->amount}} {{$wallet->currency}}</span> </p>
        								</li>
        							@endif
								
								@endforeach
								
							</ul>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Scrolling text -->
<div class="container">
	<div class="marquee">
		<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" id="MARQUEE1" style="text-align: left;" class="scrolling">  
			<span>Update: </span>
		</marquee>
	</div>
</div>


<!-- Report Area -->
<div class="container">
	<div class="report_area">
		
		<div class="row">
			<div class="col-sm-8">
				<div class="report_exchange">
					<h3>
						<img src="images/latest.png" alt="">
						 Latest Exchange
					</h3>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Send Ac.</th>
								<th>Receive Ac.</th>
								<th>Amount</th>
								<th>Name</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($transactions->sortByDesc('id') as $transaction)
							 @if($loop->iteration == 20)
								@break
							 @endif
							<tr>
								<td  class="name">
									
									
									@foreach($send_wallets as $send_wallet)

										@if($send_wallet->name == $transaction->send_wallet)
											<img src="{{asset($send_wallet->icon)}}" alt="">
										@endif
									@endforeach

									<p>{{ $transaction->send_wallet }}</p>
								</td>
								<td class="name">
									@foreach($receive_wallets as $receive_wallet)

										@if($receive_wallet->name == $transaction->receive_wallet)
											<img src="{{asset($receive_wallet->icon)}}" alt="">
										@endif
									@endforeach
									<p> {{$transaction->receive_wallet}} </p>
								</td>
								<td class="amount">
									<p> {{$transaction->sendAmount}} </p>
								</td>
								<td class="col-sm-3 user">
									<img src="images/member.gif" alt="">
									<p> {{$transaction->user->name}} </p>
								</td>
								<td>
									@if($transaction->status == 'Pending')
										<span class="label label-warning">
									@elseif($transaction->status == 'Processing')
										<span class="label label-primary">
									@elseif($transaction->status == 'Completed')
										<span class="label label-success">
									@elseif($transaction->status == 'Canceled')
										<span class="label label-danger">
									@endif
										{{$transaction->status}}
										</span>
								</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>

			
			<div class="col-sm-4">
				<div class="rates_area">
					<div class="rates">
						<div class="heading">
							<h4>Buy-Sell Rate</h4>
						</div>
						<table class="table">
							<thead>
								<th>We Accept</th>
								<th>Buy</th>
								<th>Sell</th>
							</thead>
							<tbody>
								@foreach($rates as $rate)
									<tr>
										<td>
											<img class="img-responsive" style="width:20px; border-radius:50%; float:left; margin-right:5px;" src="{{asset($rate->icon)}}" alt="">
											{{$rate->name}}
										</td>
										<td>
											{{$rate->buy}}
										</td>
										<td>
											{{$rate->sell}}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

				<div class="contact_area">
					<div class="contact_detais">
						<img class="main" src="images/contact.png" alt="">
						<div class="email">
							<img src="{{asset('images/whatsapp.jpg')}}" alt="">
							<p>Whatsapp Number: <br><a href="">+917595963962</a> </p>
						</div>
					</div>
				</div>

				<div class="about_area">
					<div class="about">
						<img class="main" src="images/about.png" alt="">
						<ul>
							<li>
								<a href="">
									<p>
										<span class="badge">1</span>
										We <span class="text-success">Provide Secure Exchange</span>
										<span class="badge">like</span>
									</p>

								</a>
							</li>
							<li>
								<a href="">
									<p>
										<span class="badge">2</span>
										Care <span class="text-success">To 99% Up coming client</span>
										<span class="badge">like</span>
									</p>

								</a>
							</li>
							<li>
								<a href="">
									<p>
										<span class="badge">3</span>
										Safely <span class="text-success">Handle All Of Exchange</span>
										<span class="badge">like</span>
									</p>

								</a>
							</li>
							<li>
								<a href="">
									<p>
										<span class="badge">4</span>
										Best Price <span class="text-success"> Of All Exchanger</span>
										<span class="badge">like</span>
									</p>

								</a>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- Feedback area -->
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
						<p>Excellent service. I think it's the most reliable,</p>
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
						<p>Excellent service. I think it's the most reliable,</p>
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