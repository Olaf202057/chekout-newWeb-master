<?php

namespace App\Repositories\Vendors;

use Illuminate\Support\Collection;

interface VendorsRepositoryInterface{

    public function getVendors(): Collection;

    public function getVendorById($id);

    public function getVendorMenus($id);

    public function getVendorMenuSections($id);

    public function getVendorItemsBySectionId($id);

    public function getVendorProducts($id);

    public function getProductById($restaurantId, $menuId, $sectionId, $productId);

    public function getOptGroupByItemId($id);

    public function getOptionsByOptgroupId($id);

    public function getOptionById($id);

    public function getVendorReviews($id): Collection;

    public function getVendorCategories(): Collection;

    public function getVendorCategoryById($id);

    public function getVendorsWithCategory($id): Collection;
}
