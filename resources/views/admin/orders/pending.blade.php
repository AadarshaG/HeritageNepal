@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Pending Orders
                </h3>
            </div>
            <div class="box-body">
                <table class="table table-hover" id="myTable">
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
                        @foreach($orders  as $order)
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
                                <a href="{{url('orders/view', $order->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                 <i class="fa fa-eye"></i>
                                </a>
                                
                                <a href="{{url('orders/delete', $order->id)}}" class="btn btn-danger btn-sm" title="Delete Order">
                                 <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
                  
                </table>
            </div>
        </div>
    </div>
@endsection