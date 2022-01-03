<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table, th, td{
			border: 1px solid black;
			text-align: center;
		}
		.signatures
		{
			margin-top: 15px;
		}
		
	</style>
</head>
<body>
	<div class="pdf-header" style="text-align: center; ">
		<h2>Rohi International</h2>
		<h4>Kuleshwor, kathmandu</h4>
	</div>
	<div>
		<h4>Customer Name:&nbsp;{{$order->orderedBy->name}}</h4> 
		<h4>Customer's Address:</h4>
		<table align="center" width="100%">
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
        </table> 
        <div>
        	<h4>Product Details</h4>
        	<table align="center" width="100%">
                    <tr>
                        <th>Order Id</th>
                        <th>Product</th>
                        <th>Qunatity</th>
                        <th>price</th>
                    </tr>
                    @foreach($order->orderItems as $item)
                    <tr>
                    	<td>{{$item->pivot->order_id}}</td>
                    	<td>{{$item->product_name}}</td>
                    	<td>{{$item->pivot->qty}}</td>
                    	<td>{{$item->pivot->total}}</td>
                    </tr>
                    @endforeach
                    <tr>
                    	<td></td>
                    	<td></td>
                    	<td>Total Amount</td>
                    	<td>Rs. {{$order->total}}</td>
                    </tr>
            </table>
        </div>
	</div>
	<h4 style="text-align: center; text-decoration: underline;">Thanks For Your Business With Rohi Interntaionsl.</h4>
	<footer>
		<div class="signatures">
		Customer's Signature :_______________________	Owner's Signature:________________________
		</div>
	</footer>
</body>
</html>