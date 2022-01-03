@extends('layouts.frontend')
@section('content')
    <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>My Orders Till Date</h2>
                        @include('flashMsg.flashmessages')
                        <div class="table-responsive">
                            <table class="cart_table">
                                <thead>
                                    <th>S.No</th>
                                    <th>Ordered By</th>
                                    <th>Total Price</th>
                                    <th>Is Delivered</th>
                                    <th>Payment type</th>
                                    <th>Ordered time</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php $i = 0;?>
                                    @foreach($orders as $order)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$order->orderedBy->name}}</td>
                                        <td>{{$order->total}}</td>
                                        <td>
                                            @if($order->delivered == 0)
                                                Pending
                                             @else
                                                Delivered
                                            @endif

                                        </td>
                                        <td>
                                            @if($order->payment_type == 1)
                                                On Delivery
                                            @else
                                                Khalti Payment
                                            @endif
                                        </td>
                                        <td>{{$order->created_at->diffForHUmans()}}</td>
                                        <td>
                                            <a href="{{url('cart/vieworder', $order->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                                View Details
                                            </a>
                                        </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>             
                </div>
            </div>
        </section>
@endsection
