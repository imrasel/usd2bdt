<div class="footer_area">
	<div class="container">
		<div class="row">
			<div class="footer">
				<div class="col-sm-3">
					<div class="footer_item">
						<img src="{{asset('images/logo.png')}}" alt="">
						<ul>
							<li>
								<a href="{!! url('/terms'); !!}">Terms & Conditions</a>
							</li>
							<li><a href="">Privacy Polecy</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>


<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
{{-- <script src="{{asset('js/exchange.js')}}"></script> --}}
<script src="{{asset('js/rate.js')}}"></script>

<script>
	$(document).ready(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a9bd53bd7591465c7083a9f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->



</body>
</html>