@extends('layouts.frontend')
@section('content')
    <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                        <div class="map-contacts--2">
                            <h3 class="title__line--6">Payment Info</h3>
                            <p>You can pay the amount either with the Khalti payment gateway Or You can pay choose cash on delivery option.</p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="title__line--6">Choose a paymenet method</h2>
                        <p>
                          Your Total amount is Rs. {{Cart::subtotal()}}
                        </p>
                        <a href="{{url('cart/cashondelivery')}}" class="btn btn-success ">Cash On delivery</a>
                        <button id="payment-button" class="btn btn-primary">Pay with Khalti</button>
                        <!-- khalti payement code -->
                        <script>
                            var config = {
                              // replace the publicKey with yours
                              "publicKey": "test_public_key_f83779ccb1134d8e8330ede18aa43300",
                              "productIdentity": "1234567890",
                              "productName": "Dragon",
                              "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
                              "eventHandler": {
                                onSuccess (payload) {
                                    // hit merchant api for initiating verfication
                                    console.log(payload);
                                    var url = "{{ url('cart/payByKhalti') }}";
                                    window.location.href=url;
                                },
                                onError (error) {
                                    console.log(error);
                                },
                                onClose () {
                                   console.log('widget is closing');
                               }
                           }
                       };
                       var checkout = new KhaltiCheckout(config);
                       var amount = {!! json_encode($amount) !!};
                       var amt = amount*100;
                       var btn = document.getElementById("payment-button");
                       btn.onclick = function () {
                        checkout.show({amount: amt});
                    }
                    </script>
                    </div>
                </div>
            </div>
        </section>
@endsection
