<?php


namespace App\Repositories\Vendors;


use Illuminate\Support\Collection;

class VendorsFirebaseRepository implements VendorsRepositoryInterface
{
    public $database;

    public function __construct()
    {
        $firestore = app('firebase.firestore');
        $this->database = $firestore->database();
    }

    public function getVendors(): Collection
    {
        // $vendors = [];
        // $collection = $this->database->collection('Restaurants');
        // $snapshot = $collection->documents();
        // foreach ($snapshot as $item) {
        //     $itemWithId = $item->data();
        //     $itemUpdate['vendor_id'] = $item->id();
        //     foreach ($itemWithId as $key => $value) {
        //         $itemUpdate[$key] = $value;
        //     }
        //     array_push($vendors, $itemUpdate);
        // }

        $vendors = [];
        $collection = $this->database->collection('restaurants');
        $snapshot = $collection->documents();
        foreach ($snapshot as $item) {
            $itemWithId = $item->data();
            $itemUpdate['vendor_id'] = $item->id();
            foreach ($itemWithId as $key => $value) {
                $itemUpdate[$key] = $value;
            }
            array_push($vendors, $itemUpdate);
        }

        return collect($vendors);
    }

    public function getVendorById($id)
    {

        // TODO: Implement getVendorById() method.
        $vendor = null;
        $collection = $this->database->collection('restaurants');
        $document = $collection->document($id);
        $snapshot = $document->snapshot();
        if ($snapshot->exists()) {
            $vendor = $snapshot->data();
        }
        return json_decode(json_encode($vendor), FALSE);
    }

    public function getVendorMenus($id)
    {
        // $menus = [];
        // $collection = $this->database->collection('Restaurants_menus');
        // $query = $collection->where('restaurant_id', '=', $id);
        // foreach ($query->documents() as $document) {
        //     array_push($menus, $document->data());
        // }

        $menus = [];
        $collection = $this->database->collection('restaurants')->document($id)->collection('restaurant_menu');
        foreach ($collection->documents() as $document) {
            array_push($menus, $document->data());
        }

        return collect($menus);
    }

    public function getVendorMenuSections($id)
    {
        // $sections = [];
        // $collection = $this->database->collection('Restaurants_sections');
        // $query = $collection->where('menu_id', '=', $id);
        // foreach ($query->documents() as $document) {
        //     array_push($sections, $document->data());
        // }

        $sections = [];
        $collection = $this->database->collection('restaurants');
        // $query = $collection->where('menu_id', '=', $id);
        foreach ($collection->documents() as $document) {
            array_push($sections, $document->data());
        }

        return collect($sections);
    }

    public function getVendorItemsBySectionId($id)
    {
        $items = [];
        $collection = $this->database->collection('Restaurants_items');
        $query = $collection->where('section_id', '=', $id);
        foreach ($query->documents() as $document) {
            array_push($items, $document->data());
        }
        return collect($items);
    }

    public function getVendorProducts($id)
    {
        // TODO: Implement getVendorProducts() method.
        $products = [];
        $collection = $this->database->collection('Restaurant_menus');
        $query = $collection->where('restaurant_id', '=', $id);
        foreach ($query->documents() as $document) {
            array_push($products, $document->data());
        }

        return collect($products);
    }

    public function getProductById($restaurantId, $menuId, $sectionId, $productId) {
        $vendor = null;
        $document = $this->database->collection('restaurants')->document($restaurantId)
            ->collection('restaurant_menu')->document($menuId)
            ->collection('menu_section')->document($sectionId)
            ->collection('menu_item')->document($productId);

        $snapshot = $document->snapshot();
        if ($snapshot->exists()) {
            $vendor = $snapshot->data();
        }
        return json_decode(json_encode($vendor), FALSE);
    }

    public function getOptGroupByItemId($id)
    {
        $products = [];
        $collection = $this->database->collection('Restaurants_optiongroups');
        $query = $collection->where('item_id', '=', $id);
        foreach ($query->documents() as $document) {
            array_push($products, $document->data());
        }

        return collect($products);
    }

    public function getOptionsByOptgroupId($id)
    {
        $products = [];
        $collection = $this->database->collection('Restaurants_options');
        $query = $collection->where('group_id', '=', $id);
        foreach ($query->documents() as $document) {
            array_push($products, $document->data());
        }

        return collect($products);
    }

    public function getOptionById($id){
        $vendor = null;
        $collection = $this->database->collection('Restaurants_options');
        $document = $collection->document($id);
        $snapshot = $document->snapshot();
        if ($snapshot->exists()) {
            $vendor = $snapshot->data();
        }
        return json_decode(json_encode($vendor), FALSE);
    }

    public function getVendorReviews($id): Collection
    {
        $reviews = [];
        $collection = $this->database->collection('vendor_reviews');
        $query = $collection->where('entityID', 'in', [$id]);
        foreach ($query->documents() as $document) {
            array_push($reviews, $document->data());
        }

        return collect($reviews);
    }

    public function getVendorCategories(): Collection
    {
        $categories = [];
        $collection = $this->database->collection('Restaurant');
        $snapshot = $collection->documents();
        foreach ($snapshot as $item) {
            $itemWithId = $item->data();
            $itemUpdate['category_id'] = $item->id();
            foreach ($itemWithId as $key => $value) {
                $itemUpdate[$key] = $value;
            }
            array_push($categories, $itemUpdate);
        }

        return collect($categories);
    }

    public function getVendorCategoryById($id)
    {
        $vendor = null;
        $collection = $this->database->collection('vendor_categories');
        $document = $collection->document($id);
        $snapshot = $document->snapshot();
        if ($snapshot->exists()) {
            $vendor = $snapshot->data();
        }
        return json_decode(json_encode($vendor), FALSE);
    }

    public function getVendorsWithCategory($category): Collection
    {
        $vendors = [];
        $collection = $this->database->collection('Restaurants');
        $snapshot = $collection->where('cuisine_type.' . $category, '=', true)->documents();
        foreach ($snapshot as $item) {
            $itemWithId = $item->data();
            $itemUpdate['vendor_id'] = $item->id();
            foreach ($itemWithId as $key => $value) {
                $itemUpdate[$key] = $value;
            }
            array_push($vendors, $itemUpdate);
        }

//        $snapshot = $collection->where('categoryID', '=', $id)->documents();
//        foreach ($snapshot as $item) {
//            $itemWithId = $item->data();
//            $itemUpdate['vendor_id'] = $item->id();
//            foreach ($itemWithId as $key => $value) {
//                $itemUpdate[$key] = $value;
//            }
//            array_push($vendors, $itemUpdate);
//        }

        return collect($vendors);
    }
}
