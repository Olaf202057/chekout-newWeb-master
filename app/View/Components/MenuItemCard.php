<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuItemCard extends Component
{
    public $product;

    public $restaurant;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product, $restaurant)
    {
        $this->product = $product;
        $this->restaurant = $restaurant;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.menu-item-card');
    }
}
