@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Order Details
                </h3>
            </div>
            <div class="box-body">
                <div>
                    <h3>Ordered By: {{$order->orderedBy->name}}</h3>
                    <h4>Shipping Address: </h4>
                    <table class='table table-hover'>
                        <tr>
                            <td><h5><span>Zone:</span> {{$address->zone}}</h5></td>
                            <td><h5><span>District:</span> {{$address->district}}</h5></td>
                        </tr>
                        <tr>
                            <td><h5><span>City:</span> {{$address->city}}</h5></td>
                            <td><h5><span>Street:</span> {{$address->street}}</h5></td>
                        </tr>
                        <tr>
                            <td><h5><span>Phone:</span> {{$address->phone_number}}</h5></td>
                            <td><h5><span>Payment Method:</span>

                                @if($order->payment_type == 1)
                                    Cash On Delivery
                                @else
                                    Khalti
                                @endif
                            </h5></td>
                        </tr>
                        <tr>
                            <td><h5><span>Delivery Status:</span> 
                                @if($order->delivered == 0)
                                    <span>Pending</span>  <a href="{{url('orders/markdelivered', $order->id)}}" class="btn btn-primary btn-xs"> Mark Delivered</a>

                                 @else
                                    Delivered
                                @endif

                                </h5>    
                            </td>
                            <td> <a href="{{url('orders/pdf', $order->id)}}" target="_blank" class="btn btn-primary btn-xs">Export To PDF</a></td>
                        </tr>
                    </table>                   
                </div>
                <hr>
                <div>
                    <h3>Product Lists</h3>
                </div>
                <table class="table table-hover">
                    <thead>
                        <th>Order Id</th>
                        <th>Product</th>
                        <th>Qunatity</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>price</th>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{$item->pivot->order_id}}</td>
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->pivot->qty}}</td>
                            <td>{{$item->pivot->color}}</td>
                            <td>{{$item->pivot->size}}</td>
                            <td>{{$item->pivot->total}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total Amount</td>
                            <td>Rs. {{$order->total}}</td>
                        </tr>
                    </tbody>
                    
                  
                </table>
            </div>
        </div>
    </div>
@endsection