<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
        $searchTerm = $request->searchTerm;
        $products = $this->getProductsBySearchTerm();
        $restaurants = $this->getRestaurantsBySearchTerm();
        $items = array(
            ['name' => 'Asian Cuisine', 'type' => 'restaurant', 'type_id' => '7GCapMWOAApBs6PS4FYD']
        );
        return response()->json($items);
    }

    private function getProductsBySearchTerm(){

    }

    private function getRestaurantsBySearchTerm(){

    }
}
