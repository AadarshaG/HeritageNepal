@extends('layouts.frontend')
@section('content')
    <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>My cart lists</h2>
                        @include('flashMsg.flashmessages')
                        <div class="table-responsive">
                            <table class="cart_table">
                                <thead>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    <?php $i = 0;?>
                                    @foreach($cartitems as $cartitem)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$cartitem->name}}</td>
                                        <td>{{$cartitem->qty}}</td>
                                        <td>{{$cartitem->price}}</td>
                                        <td>{{$cartitem->options['size']}}</td>
                                        <td>{{$cartitem->options['color']}}</td>
                                        <td>
                                            <a href="{{url('cart/remove', $cartitem->rowId)}}" class="btn btn-danger btn-sm">Remove Item</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td>Total</td>
                                        <td>{{Cart::count()}}</td>
                                        <td>{{Cart::subtotal()}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><a href="{{url('cart/destroy')}}" class="btn btn-danger btn-sm">Clear Cart </a></td>
                                        <td><a href="{{url('cart/checkout')}}" class="btn btn-success btn-sm">Checkout</a></td>
                                        <td><a href="{{url('cart/myorders')}}" class="btn btn-success btn-sm">My Orders Till Date</a></td>
                                    </tr>
                                </tfoot>
                            </table>
                            
                        </div>
                    </div>
                          
                </div>
            </div>
        </section>
@endsection
