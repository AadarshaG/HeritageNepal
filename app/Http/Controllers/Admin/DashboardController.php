<?php

namespace App\Http\Controllers\Admin;

use App\Model\Inquiry;
use App\User;
use App\Model\Order;
use App\Model\Product;
use App\Model\ContactUs;
use App\Model\JobApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
    	$pending_orders = Order::where('delivered', '=', 0)->get();
    	$total_products = Product::all();
    	$total_user = User::all();
    	$dealer_requests = User::where('role_id', '=', 2)->where('is_approved', '=', 0)->get();
    	$total_dealers = User::where('role_id', '=', 2)->where('is_approved', '=', 1)->get();
    	$total_orders = Order::all();
    	$contact_message = ContactUs::all();
    	$job_application = JobApplication::all();
    	$inquiry = Inquiry::all();
    	return view('admin.index', compact('pending_orders', 'total_products', 'total_user', 'dealer_requests', 'total_dealers', 'total_orders', 'contact_message', 'job_application','inquiry'));
    }
}
