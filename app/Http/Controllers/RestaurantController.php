<?php

namespace App\Http\Controllers;

use App\Repositories\Vendors\VendorsRepositoryInterface;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(VendorsRepositoryInterface $vendorsRepository){
        $restaurants = $vendorsRepository->getVendors();
        return $restaurants;
        return view('app.restaurant.index');
    }

    public function showRestaurant(Request $request, VendorsRepositoryInterface $vendorsRepository, $id){
        // Todo: Frontend needs review dates...
        $firestore = app('firebase.firestore');
        $current = $firestore->database()->collection('restaurants')->document($id);
        $restaurantData = $vendorsRepository->getVendorById($id);
        // Todo: Need to just do a list of products for this menu?
        return view('app.restaurant.show', [
            'restaurant' => $restaurantData,
            'current' => $current,
        ]);
    }

    public function selectNew($restaurantId){
        session()->forget('cart');
        return redirect('/restaurant/' . $restaurantId );
    }

    public function goBack($restaurantId){
        return redirect('/restaurant/' . $restaurantId );
    }

    public function showMenuItem(){
        return view('app.restaurant.items.index');
    }
    
    public function showRegister(){
        return view('app.restaurant.register.index');
    }
}
