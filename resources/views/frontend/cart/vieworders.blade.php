@extends('layouts.frontend')
@section('content')
<section class="htc__contact__area ptb--100 bg__white">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Order Details</h2>
            @include('flashMsg.flashmessages')
            <div class="table-responsive">
               <table class="cart_table">
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
   </div>
</section>
@endsection