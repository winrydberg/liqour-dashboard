<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DeliveryCity;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function createNewOrder(Request $request){

        try{
            $order = new Order();
            $order->orderno = 'LQ'.mt_rand(10000, 99999);
            $order->amount = $this->computeAmount($request->products);
            $order->username = $request->username;
            $order->user_id = $request->userid;
            $order->phoneno = $request->phoneno;
            $order->landmark = $request->landmark;
            $order->city = $this->getCity($request->city)->name;
            $order->longitude=$request->longitude;
            $order->latitude = $request->latitude;
            $order->status = 'pending';
            $order->order_items = json_encode($request->products);
            $order->delivery_charge = $this->getCity($request->city)->delivery_charge;
            $order->save();

            return response()->json([
                'status' => 'success',
                'order' => $order,
                'message' => 'Your order has been successfully received. We will get back to you shortly.'
            ]);

        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to create order. ERR: '.$e->getMessage()
            ]);
        }
         
    }


    public function myOrders(Request $request){
        $orders = Order::where('user_id', $request->userid)->get();
        return $orders;
    }


    public function getCity($cityId){
        $city = DeliveryCity::where('id', $cityId)->first();
        return $city;
    }


    public function computeAmount($Ids){
        $items = Product::whereIn('id', $Ids)->get();
        $amount = 0.0;
        foreach($items as $item){
            $amount += $item->price;
        }
        return $amount;
    }
}