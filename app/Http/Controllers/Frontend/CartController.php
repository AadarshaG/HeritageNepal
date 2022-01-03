<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Model\Order;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
    	$cartitems = Cart::content();
    	return view('frontend.cart.index', compact('cartitems'));
    }

    public function addtocart(Request $request, $id)
    {
    	$product = Product::find($id);

    	if (!empty($request->input('size') )) {
    		$size = $request->size;
    	} else {
    		$size = "Any";
    	}

    	if (!empty($request->input('color') )) {
    		$color = $request->color;
    	} else {
    		$color = "Any";
    	}

        if (Auth::user()->role_id=='2') {
            $price = $product->dealer_price;
        } else {
            $price = $product->retailer_price;
        }
        

    	Cart::add($id, $product->product_name, $request->qty, $price, ['size'=>$size, 'color'=>$color] );
    	return redirect()->back()->with('success', 'Product added to cart');
    }

    public function removeItem($rowId)
    {
    	Cart::remove($rowId);
    	return redirect()->back()->with('success', 'Item removed Successfully');
    }

    public function destroyCart()
    {
    	Cart::destroy();
    	return redirect()->back()->with('error', 'cart cleared Successfully');
    }

    public function myorders()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id', '=', $id)->get();
        return view('frontend.cart.myorders', compact('orders'));
    }

    public function viewOrder($id)
    {
        $order = Order::find($id);
        return view('frontend.cart.vieworders', compact('order'));
    }
}
