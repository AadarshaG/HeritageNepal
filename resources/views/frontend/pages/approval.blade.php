@extends('layouts.frontend')
@section('content')
<section class="htc__contact__area ptb--100 bg__white">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="map-contacts--2">
					<div id="left-side-image">
						<img src="images/others/access-denied.jpg">
					</div>
				</div>
			</div>
			<div >
				<div class="right-side-text">
					<h2>Access Denied</h2>
					<p>
						Your account is not activated as dealer. Please contact the admin of Rohi International to activate your account. Sorry For the inconvenience. 
					</p>
				</div>
				<div class="button_custom">
				<a class="button_center" href="{{url('/')}}">Home</a>	
				</div>
			</div>
		</div>
	</div>
</section>   
@endsection