<?php

namespace App\Http\Controllers\Customer\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()
            ->orders()
            ->when(request('type'), fn($q, $type) => $q->where('order_status', $type))
            ->orderByDesc('id')
            ->paginate(10)
            ->appends(request()->query());

        return view('customer.profile.orders', compact('orders'));
    }
}
