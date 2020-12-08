<?php

namespace App\Http\Controllers;

use App\Repositories\Vendors\VendorsRepositoryInterface;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function showCategory(VendorsRepositoryInterface $vendorsRepository, $category){
        $categoryName = $category;
        $vendors = $vendorsRepository->getVendorsWithCategory($category);
        //return $vendors;
        return view('app.categories.show', [
            'categoryName' => $categoryName,
            'vendors' => $vendors
        ]);
    }
}
