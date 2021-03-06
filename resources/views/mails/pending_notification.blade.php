<div style="color: #333;font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">

	<div style="height: 68px; padding-top: 12px; width: 100%;background-color: #F5F8FA;margin-bottom: 25px;">

	<h3 style="text-align: center; margin-top: 8px; color:#5A5A5A">
		<a style="text-align: center; color: #415E9B; font-size: 29px; text-decoration: none;" href="https://usd2bdt.com">USD2BDT.COM</a>
	</h3>
</div>

<p style="text-align: center;font-size: 30px;">Hello <strong>{{ $user->name }} ,</strong></p>
<p style="text-align: center;">
	You made new request for exchange from <strong>{{ $transaction['send_wallet'] }}</strong>  to <strong>{{ $transaction['receive_wallet']}}</strong>  for <strong>{{ $transaction['receive_amount']}}</strong>
</p>
 
<p style="text-align: center;">You must make payment before passing 24 hours because when the time expires your request will be canceled.</p>

<p style="text-align: center;">
	You can complete payment on this link: 
	<a href="https://usd2bdt.com//user/exchange/update/{{ $transaction['id'] }}" target="blank" style="text-decoration: none;">
		<strong>https://usd2bdt.com/user/exchange/complete</strong>
	</a>
</p>
<p style="text-align: center;">Hope, It will be good to business with you</p>
 
<p style="text-align: center;">admin@usd2bdt.com</p>
<br/>
</div>



