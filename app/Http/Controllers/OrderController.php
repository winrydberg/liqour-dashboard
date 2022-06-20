<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{
    public function getOrders(Request $request){
        $status = strtolower($request->query('status'));

        if($status == null || $status =='null'){
            $orders = Order::orderBy('id', 'DESC')->paginate(20);
        }else{
            $orders = Order::where('status', $status)->orderBy('id', 'DESC')->paginate(20);
        }
        return view('orders', compact('orders'));
    }

    public function orderProcessor(Request $request){
        $orderno = $request->query('orderno');
    
        $orderAction = $request->query('action');

        $order = Order::where('orderno', $orderno)->first();

        switch($orderAction){
            case 'approve':
                $order->update([
                    'status' => 'approved'
                ]);
                Session::flash('success', 'Order successfully approved');
                return back();
            case 'cancel':
                $order->update([
                    'status' => 'cancelled'
                ]);
                Session::flash('success', 'Order successfully cancelled');
                return back();

            case 'delivered':
                $order->update([
                    'status' => 'delivered'
                ]);
                Session::flash('success', 'Order successfully updated');
                return back();
            


        }
    }
}