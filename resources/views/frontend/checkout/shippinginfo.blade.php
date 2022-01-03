@extends('layouts.frontend')
@section('content')
    <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                        <div class="map-contacts--2">
                            <h3 class="title__line--6">Shipping Info</h3>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="title__line--6">Your Shipping Details</h2>
                        <form class="form-horizontal" method="post" action="{{url('cart/paymentmethod')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-4 control-label">Zone:</label>
                                <div class="col-md-6">
                                    <input  class="form-control" type="text" name="shipping_zone" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">District:</label>
                                <div class="col-md-6">
                                    <input  class="form-control" type="text" name="shipping_district" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">City/Town:</label>
                                <div class="col-md-6">
                                    <input  class="form-control" type="text" name="shipping_city" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Street:</label>
                                <div class="col-md-6">
                                    <input  class="form-control" type="text" name="shipping_street" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Contact Number:</label>
                                <div class="col-md-6">
                                    <input  class="form-control" type="number" name="phone_number" required>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success ">Complete Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
