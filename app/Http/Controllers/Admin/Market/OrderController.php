<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function newOrders()
    {
        $orders = Order::where('order_status', 0)->get();
        foreach ($orders as $order) {
            $order->order_status = 1;
            $result = $order->save();
        }
        return view('admin.market.order.index', compact('orders'));
    }
    public function sending()
    {
        $orders = Order::where('delivery_status', 1)->get();
        return view('admin.market.order.index', compact('orders'));
    }
    public function unpaid()
    {
        $orders = Order::where('payment_status', 0)->get();
        return view('admin.market.order.index', compact('orders'));
    }
    public function canceled()
    {
        $orders = Order::where('order_status', 4)->get();
        return view('admin.market.order.index', compact('orders'));
    }
    public function returned()
    {
        $orders = Order::where('order_status', 5)->get();
        return view('admin.market.order.index', compact('orders'));
    }
    public function all()
    {
        $orders = Order::all();
        return view('admin.market.order.index', compact('orders'));
    }
    public function show()
    {
        return view('admin.market.order.index');
    }
    public function changeSendStatus(Order $order)
    {
        switch ($order->delivery_status) {
            case 0:
                $order->delivery_status = 2;
                break;
            case 1:
                $order->delivery_status = 3;
                break;
            case 2:
                $order->delivery_status = 4;
                break;
            default:
                $order->delivery_status = 0;
        }
        $result = $order->save();

        return back();
    }
    public function changeOrderStatus(order $order)
    {
        switch ($order->order_status) {
            case 1:
                $order->order_status = 2;
                break;
            case 2:
                $order->order_status = 3;
                break;
            case 3:
                $order->order_status = 4;
                break;
            case 4:
                $order->order_status = 5;
                break;
            default:
                $order->order_status = 1;
        }
        $result = $order->save();

        return back();
    }
    public function cancelOrder(Order $order)
    {
        $order->order_status = 4;
        $result = $order->save();
        return back();
    }
}
