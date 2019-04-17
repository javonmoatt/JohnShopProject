<?php
namespace App\Contracts\Repos;

interface IProductRepository{
    public function getProductLine($id);
}
