var domain = "http://usd2bdt.raselahmed.net/api";
// var domain = "http://localhost/usd2bdt/public/api";
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#send').change(function(){

	var send_id = $('#send :selected').val();
	var receive_id = $('#receive :selected').val();
    

    $.ajax({ 
        type: 'POST', 
        url: domain + '/ajaxCall', 
        data: {send_id: send_id, receive_id: receive_id}, 
        dataType: 'json',
        success: function (result) {        	
            // alert(result.send_rate + result.send_currency +" "+ result.receive_rate);
            // console.log(result);
            $('.send_wallet_img').attr("src", result.send_icon);
            $('#sendText').html(result.send_rate);
            $('#sendCur').html(result.send_currency);

            $('#receiveText').html(result.receive_rate);
            $('#receiveCur').html(result.receive_currency);

            $('#sendAmount').val(result.send_rate);
            $('#receiveAmount').val(result.receive_rate);

        }
    });
});

$('#receive').change(function(){

	var send_id = $('#send :selected').val();
	var receive_id = $('#receive :selected').val();

    $.ajax({ 
        type: 'POST', 
        url: domain + '/ajaxCall',
        data: {send_id: send_id, receive_id: receive_id}, 
        dataType: 'json',
        success: function (result) {        	
            // alert(result.send_rate + result.send_currency +" "+ result.receive_rate);
            // console.log(result);
            $('.receive_wallet_img').attr("src", result.receive_icon);
            $('#sendText').html(result.send_rate);
            $('#sendCur').html(result.send_currency);

            $('#receiveText').html(result.receive_rate);
            $('#receiveCur').html(result.receive_currency);

            $('#sendAmount').val(result.send_rate);
            $('#receiveAmount').val(result.receive_rate);

            $('#reserveText').html(result.reserve);
            $('#reserveCur').html(result.receive_currency);
        }
    });
});

$('#sendAmount').keyup(function() {
	if($('#receiveText').html() != 1){
		var receive_rate = $('#receiveText').html();
		var send_amount = $('#sendAmount').val();
		
		var receive_amount = send_amount * receive_rate;

		$('#receiveAmount').val(receive_amount.toFixed(2));
	}else {
		var send_rate = $('#sendText').html();
		var send_amount = $('#sendAmount').val();
		
		var receive_amount = send_amount / send_rate;

		$('#receiveAmount').val(receive_amount.toFixed(2));
	}
});

function checkReserve(){
   var sendAmount = $('#sendAmount').val();
   var receiveAmount = $('#receiveAmount').val();
   var reserveAmount = $('#reserveText').html();
   var sendCurrency = $('#sendCur').html();
   var minBDT = 1000;
   var minUSD = 10;

   if(sendCurrency == "BDT")
   {
        if(sendAmount >= minBDT)
        {
            if(receiveAmount <= parseFloat(reserveAmount))
            {
                $('#exchSubmit').click();
            }else{
                $('#reserveAlert').css('display','block');
                $('#reserveAlert').html('<strong>Error! </strong>Your Requested Amount is exceeding our Reserve Amount!');
            }
            
        }else{
            $('#reserveAlert').css('display','block');
            $('#reserveAlert').html('<strong>Error! </strong>Minimum Transaction Amount is 1000 BDT!');
        }
   }else{
        if(sendAmount >= minUSD)
        {
            if(receiveAmount <= parseFloat(reserveAmount))
            {
                $('#exchSubmit').click();
            }else{
                $('#reserveAlert').css('display','block');
                $('#reserveAlert').html('<strong>Error! </strong>Your Requested Amount is exceeding our Reserve Amount!');
            }
            
        }else{
            $('#reserveAlert').css('display','block');
            $('#reserveAlert').html('<strong>Error! </strong>Minimum Transaction Amount is 10 USD!');
        }
   }
    
}



