@extends('layouts.frontend')
@section('content')
<section class="htc__contact__area ptb--100 bg__white">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text_center">
            <h2>
            Your Career At Rohi International</h3>
         </div>
         <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
            <div>
               <img src="/images/others/job.jpg">
            </div>
         </div>
         <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 pull-right">
            <div class="text_center">
               <h2 class="text_center">Apply For the JOb </h2>
               @include('flashMsg.flashmessages')
               <form class="form-horizontal" method="post" action="{{url('frontend/applyjob')}}" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group">
                     <label class="col-md-4 control-label">Your Name:</label>
                     <div class="col-md-6">
                        <input  class="form-control" type="text" name="applicants_name">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label">Email:</label>
                     <div class="col-md-6">
                        <input  class="form-control" type="email" name="applicants_email">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label">Address:</label>
                     <div class="col-md-6">
                        <input  class="form-control" type="text" name="applicants_address">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label">Gender:</label>
                     <div class="col-md-6">
                        <input type="radio" name="gender" value="male"> Male
                        <input type="radio" name="gender" value="female"> Female
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label">Contact Number:</label>
                     <div class="col-md-6">
                        <input  class="form-control" type="text" name="phone_number">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label">Post you Are Applying:</label>
                     <div class="col-md-6">
                        <input  class="form-control" type="text" name="applied_post">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label">Experience:</label>
                     <div class="col-md-6">
                        <input  class="form-control" type="text" name="experience">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label">Message If Any:</label>
                     <div class="col-md-6">
                        <textarea class="form-control" type="text" name="message"></textarea>
                     </div>
                  </div>
                  <div class="col-md-offset-2">
                     <button class="btn btn-primary">Apply For Job</button>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
            <div class="text-only career_text">
               <h5>Want to Work and build your career with us?</h5>
               <p><strong>Then,</strong>  Influence your profession with Rohi International. Disclose to us what you are master in. Fill the beneath frame with your aptitude. We will interface with you to shape your profession with us. Contact Us Feel free to connect with us!</p>
               <br>
               <br>
               <h2>Available JOb Positions</h2>
               <ol>
                  <li>Sales</li>
                  <li>Delivery Boy</li>
                  <li>Driver</li>
                  <li>Sales</li>
                  <li>Accountant</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
