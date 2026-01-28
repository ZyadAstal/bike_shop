<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display user's orders.
     */
    public function index()
    {
        $orders = auth()->user()->orders()->with('items.product')->latest()->paginate(10);

        return view('customer.orders.index', compact('orders'));
    }

    /**
     * Display single order.
     */
    public function show(Order $order)
    {
        // Make sure order belongs to current user
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.product');

        return view('customer.orders.show', compact('order'));
    }
}
