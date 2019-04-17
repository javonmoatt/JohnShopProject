<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use Auth;
use DB;

class DashboardsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if($user ->id == 1){
            $order = DB::table('orders')->select('*')->where('customer_id','=',$user->id)->get();
            $detail = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('orders.*','order_details.*','products.name')->where('customer_id','=',$user->id)
            ->get();
            return view('/dashboard',compact('user','order','detail'));
        }
        elseif($user ->id == 2){
            $order = DB::table('orders')->select('*')->get();
            return view('/dashboard',compact('user','order'));
        }
        elseif($user ->id == 3){

            return view('/dashboard')->with(user,$user);
        }
    }
}