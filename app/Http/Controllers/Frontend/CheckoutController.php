<?php

namespace App\Http\Controllers\Frontend;
use Auth;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Model\ShippingDetails;
use App\Http\Controllers\Controller;
Use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
    	return view('frontend.checkout.shippinginfo');
    }

    public function PaymentOption(Request $request)
    {
    	//insert shipping info to the database

    	$id = Auth::user()->id;
    	$user_address_count =ShippingDetails::where('user_id', '=',$id)->count();
    	if ($user_address_count == 0) {
    		ShippingDetails::create([
    			'user_id'=> Auth::user()->id,
    			'zone'=>$request->shipping_zone,
    			'district'=>$request->shipping_district,
    			'city'=>$request->shipping_city,
    			'street'=>$request->shipping_street,
    			'phone_number'=>$request->phone_number,
    		]);
    	} else {
    		ShippingDetails::where('user_id', '=',$id)->update([
    			'user_id'=> Auth::user()->id,
    			'zone'=>$request->shipping_zone,
    			'district'=>$request->shipping_district,
    			'city'=>$request->shipping_city,
    			'street'=>$request->shipping_street,
    			'phone_number'=>$request->phone_number,
    		]);    		
    	}

    	$amount = Cart::subtotal();
    	return view('frontend.checkout.payment',compact('amount'));
    	
    }

    public function CashOnDelivery()
    {
    	$user = Auth::user();
    	$order = $user->orders()->create([
    		'total'=>Cart::subtotal(),
    		'delivered'=>0,
    		'payment_type'=>1,
    	]);
    	$cart_items = Cart::content();
    	foreach ($cart_items as $cartitem) {
    		$order->orderItems()->attach($cartitem->id,[
    			'qty'=>$cartitem->qty,
                'color'=>$cartitem->options['color'],
                'size'=>$cartitem->options['size'],
    			'total'=>$cartitem->qty*$cartitem->price,
    		]);
            $product_id = $cartitem->id;
            Product::find($product_id)->decrement('in_stock', $cartitem->qty);
    	}

    	Cart::destroy();
    	return redirect('thanku');
    }
    // khalti payment  gateway
    public function khaltipayment()
    {
        $user = Auth::user();
        $order = $user->orders()->create([
            'total'=>Cart::subtotal(),
            'delivered'=>0,
            'payment_type'=>2,
        ]);

        $cart_items = Cart::content();
        foreach ($cart_items as $cartitem) {
            $order->orderItems()->attach($cartitem->id,[
                'qty'=>$cartitem->qty,
                'color'=>$cartitem->options['color'],
                'size'=>$cartitem->options['size'],
                'total'=>$cartitem->qty*$cartitem->price
            ]);

            $product_id = $cartitem->id;
            Product::find($product_id)->decrement('in_stock', $cartitem->qty);
        }

        Cart::destroy();
        return redirect('thanku');
    }
}
