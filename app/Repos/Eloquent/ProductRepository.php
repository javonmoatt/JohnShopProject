<?php
namespace App\Repos\Eloquent;
use App\Contracts\Repos\IProductRepository;

class ProductRepository implements IProductRepository{
    public function getProductLine($id){
        $products = \DB::table('products')->where('productLine_id',$id)->get();//make more efficient filter out the products
        return $products;
    }

}