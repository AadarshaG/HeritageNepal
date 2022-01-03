@extends('layouts.frontend')
@section('content')
<div class="row">
	<div class="container">
		<div class="faq-title">
			<h2>Frequently Asked Questions</h2>
			<p>Click on the Questons  to toggle between showing and hiding answers.</p>
		</div>
		<div class="faq-content">
			<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#question1">How do i register my account?</button>
			<div id="question1" class="collapse">
				Click on  login link then, a login form will appear, right then  you can click on  register and fill up the form.
			</div>
			<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#question2">what is the procedure to be a dealer?</button>
			<div id="question2" class="collapse">
				When you are on register page, you get to see a link "Register as Dealer". click on the link  and a dealer form will appear. Fill up the form and click submit, but you cannot place the  your order unless the admin approves your account as dealer.
			</div>
			<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#question3">I signup as a dealer, but i cannot place my order, why?</button>
			<div id="question3" class="collapse">
				Registering as dealer will not allow a user to place his/her order. The account should be verified and approved by the admin of Rohi. Please don't forget to enter valid pan number of your company.
			</div>
			<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#question4">What are the payments methods available?</button>
			<div id="question4" class="collapse">
				For now we have only two options i.e. Payment on Delivery and Khalti payment gateway. We plan to add more payments  methods in near future.
			</div>
			<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#question5">How can i cancel my order?</button>
			<div id="question5" class="collapse">
				As per Our system right now, the option to cancel the order is not available but you can cancel that manually by making the phone call to the admin of Rohi.
			</div>
		</div>	
	</div>	
</div>
@endsection