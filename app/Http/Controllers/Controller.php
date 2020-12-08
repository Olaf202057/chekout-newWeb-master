<?php

namespace App\Http\Controllers;

use App\Models\Firebase\Cart;
use App\Services\FirebaseAuthService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $categories = [];
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = null;
            $notifications = null;
            // $cart = new Cart;
            // $cart->subtotal = 0;
            // foreach ($cart->items as $item) {
            //     if(isset($item['price']) && is_numeric($item['price'])){
            //         $cart->subtotal = $cart->subtotal + (($item['price'] ?? 0) * $item['quantity']);
            //     }
            // }
            $this->categories = $categories = array(
                ['category_id' => 'Barfood', 'title' => 'Barfood', 'photo' => 'https://assets3.thrillist.com/v1/image/2817929/500x333.33333/flatten;crop;jpeg_quality=70'],
                ['category_id' => 'Breakfast', 'title' => 'Breakfast', 'photo' => 'https://simply-delicious-food.com/wp-content/uploads/2018/10/breakfast-board-500x500.jpg'],
                ['category_id' => 'Burgers', 'title' => 'Burgers', 'photo' => 'https://assets.bonappetit.com/photos/5d03bea59ffc67bff3c6f86e/master/pass/HLY_Lentil_Burger_Horizontal.jpg'],
                ['category_id' => 'Italian', 'title' => 'Italian', 'photo' => 'https://i1.wp.com/www.eatthis.com/wp-content/uploads/2019/09/spaghetti-meatballs.jpg?fit=1200%2C879&ssl=1'],
                ['category_id' => 'Japanese', 'title' => 'Japanese', 'photo' => 'https://cdn.tasteatlas.com/images/dishes/b6b9680a32c84a9381a1ea5f5e529698.jpg?w=375&h=280'],
                ['category_id' => 'Mediterranean', 'title' => 'Mediterranean', 'photo' => 'https://food.fnr.sndimg.com/content/dam/images/food/fullset/2009/8/13/0/FNM100109WE059_s4x3.jpg.rend.hgtvcom.966.725.suffix/1382539115451.jpeg'],
                ['category_id' => 'NewMexican', 'title' => 'New Mexican', 'photo' => 'https://cdn.vox-cdn.com/thumbor/tGMomWZZtevHTxvsFesNqKdyXoc=/0x0:4000x2666/1200x800/filters:focal(1680x1013:2320x1653)/cdn.vox-cdn.com/uploads/chorus_image/image/65871289/10_15_19_Team624_Condesa__158_Edit.0.jpg'],
//                 ['category_id' => 'Ramen', 'title' => 'Ramen', 'photo' => 'https://cooknourishbliss.com/wp-content/uploads/2019/08/Healthy_breakfast_tacos.jpg'],
                ['category_id' => 'Sandwiches', 'title' => 'Sandwiches', 'photo' => 'https://www.eggs.ca/assets/RecipePhotos/_resampled/FillWyIxMjgwIiwiNjIwIl0/triple-sandwich-032.jpg'],
                ['category_id' => 'Sushi', 'title' => 'Sushi', 'photo' => 'https://www.happyfoodstube.com/wp-content/uploads/2016/03/homemade-sushi-image.jpg'],
            );
            if (session()->has('firebase_id_token')) {
                $service = new FirebaseAuthService;
                // Todo; Later we need to actually verify the token before showing anything...
                // Todo: Actually set notifications up to work with this.
                $user = session('user');
                $notifications = new Collection;
            }
            
            View::share([
                'notifications' => $notifications,
                'cart' => session('cart'),
                'user' => $user,
                'categories' => $this->categories
            ]);
            return $next($request);
        });
    }
}
