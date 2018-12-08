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

<div class="container">
	<div class="user_area">


		<div class="row">
			<div class="transaction_area">
				<h4>Your Exchanges</h4>

					<div class="user_exchange">
						<table class="table table-hover table-bordered">
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
                                Send Tr. Email
                            </th>
                            <th>
                                Send Trans. ID
                            </th>
                            <th>
                                Status
                            </th>
                            </thead>

                            <tbody>
                            @foreach($transactions->sortByDesc('id') as $transaction)

                                <tr>
                                    <td>{{$transaction->usd2bdt_transaction}}</td>
                                    <td>{{$transaction->send_wallet}}</td>
                                    <td>{{$transaction->receive_wallet}}</td>
                                    <td>{{$transaction->sendAmount}}</td>
                                    <td>{{$transaction->receiveAmount}}</td>
                                    <td>{{$transaction->receiveAccount}}</td>
                                    <td>{{$transaction->user_transaction_email}}</td>
                                    <td>{{$transaction->user_transaction}}</td>
                                    
                                    
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">{{$transaction->status}}</a>
                                    </td>
                                    

                                
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
					</div>

			
				
				
			</div>
		</div>
	</div>
</div>


<!-- End of Menu Area -->


<!-- Exchange Ara -->



<!-- Sliding Logo Area -->

<!-- End of sliding logo -->

<!-- Report Area -->

<!-- Feedback area -->

<!-- End of Feedback -->





<!-- Verified Account Area -->

<!-- End of Verified Account Area -->

<!-- Footer Area -->
@include('layouts.footer')