<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Model\Order;
use Illuminate\Http\Request;
use App\Model\ShippingDetails;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    Public function index()
    {
    	$orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    Public function pendingOrders()
    {
    	$orders = Order::where('delivered', '=', 0)->get();
        return view('admin.orders.pending', compact('orders'));
    }

    Public function deliveredOrders()
    {
    	 $orders = Order::where('delivered', '=', 1)->get();
        return view('admin.orders.delivered', compact('orders'));
    }

    Public function showDetails($id)
    {
        $order = Order::find($id);
        $user = $order->user_id;
        $address = ShippingDetails::where('user_id','=', $user)->first();
        return view('admin.orders.show', compact('order', 'address'));
    }

    Public function generatePDF($id)
    {
        $order = Order::find($id);
        $user = $order->user_id;
        $address = ShippingDetails::where('user_id','=', $user)->first();
        $pdf = PDF::loadview('admin.orders.pdf', compact('order', 'address'));
        return $pdf->stream('invoice.pdf');

    }

    Public function markDelivered($id)
    {
        $order = Order::find($id);
        $order->delivered = 1;
        $order->save();
        return redirect()->back()->with('success', 'Order Marked as Delivered');
    }

    Public function destroy($id)
    {
        $order = Order::find($id);
        $order->OrderItems()->detach();
        $order->delete();
        return redirect()->back()->with('error', 'Order Deleted Successfully');
    }
}
