<?php

namespace App\Repos\Eloquent;

use App\Contracts\Repos\IDashboardRepository;

class DashboardRepository implements IDashboardRepository{
    public function getUser(){
        $user = Auth::user();
        return $user;
    }
    
    public function getOrders($id){
        $order = DB::table('orders')->select('*')->where('customer_id','=',$id)->get();
        return $order;
    }

    public function getDetailes($id){
        $detail = DB::table('orders')->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('orders.*','order_details.*','products.name')->where('customer_id','=',$id)->get();
        return $detail;
    }

}