@include('layouts.header')

<!-- Scrolling text -->
<div class="container">
	<div class="marquee">
		<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" id="MARQUEE1" style="text-align: left;" class="scrolling">  
			<span>Update: </span>
		</marquee>
	</div>
</div>

<div class="container">
	<div class="user_area">
		<div class="row">
			<div class="col-sm-7">
				<h3>Welcome: {{Auth::user()->name}} 
					
				</h3><br>
				<h4>Your email: <strong>{{Auth::user()->email}}</strong></h4><br>
				<h4><a href="{{route('user.exchange', ['id'=>Auth::user()->id])}}" class="btn btn-success">Your Transaction record</a></h4><br>
				<h4><a href="/changePassword" class="btn btn-primary">Change your password</a></h4>
				
			</div>
	
		</div>

		<div class="row">
				
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