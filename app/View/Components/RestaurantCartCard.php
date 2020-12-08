<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RestaurantCartCard extends Component
{
    public $cart;

    public $restaurant;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cart, $restaurant)
    {
        $this->cart = $cart;
        $this->restaurant = $restaurant;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.restaurant-cart-card');
    }
}
