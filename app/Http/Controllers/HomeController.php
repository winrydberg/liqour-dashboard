<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        //dashboard stats
        $cancelled = Order::where('status', 'cancelled')->count();
        $pending = Order::where('status', 'pending')->count();
        $delivered = Order::where('status', 'delivered')->whereBetween('created_at', [Carbon::now()->subDays(7)->toDateString(), Carbon::now()->toDateString()])->count();

        //latest pending orders
        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->take(15)->get();

        //highest ordering users
        $highOrders = Order::whereBetween('created_at', [Carbon::now()->subDays(7)->toDateString(), Carbon::now()->toDateString()])
                            ->where('status', 'delivered')
                            ->select(
                                    'username',
                                    'phoneno',
                                    // DB::raw("username as username"),
                                    DB::raw("(sum(amount)) as totalamount"),
                            )
                            // ->orderBy('totalamount')
                            ->groupBy('phoneno', 'username')
                            ->take(10)
                            ->get();
                                  
        return view('dashboard', compact('orders', 'pending', 'cancelled', 'delivered', 'highOrders'));
    }
}