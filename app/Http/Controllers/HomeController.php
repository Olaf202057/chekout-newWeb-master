<?php

namespace App\Http\Controllers;

use App\Repositories\Vendors\VendorsRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(VendorsRepositoryInterface $vendorsRepository)
    {
        $nearbyRestaurants = $vendorsRepository->getVendors();
        $prevOrders = null;
        return view('app.home', [
            'nearby' => $nearbyRestaurants,
            'prevOrders' => $prevOrders,
        ]);
    }
}
