<?php

namespace App\Contracts\Repos;

interface IDashboardRepository{
    public function getUser();

    public function getOrders($id);

    public function getDetails($id);
}