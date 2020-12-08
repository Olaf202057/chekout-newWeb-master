<?php


namespace App\Models\Firebase;


use ArrayAccess;
use Countable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Cookie;
use JsonSerializable;

class Cart implements JsonSerializable
{
    private $attributes;

    public function __construct()
    {
        $this->hydrateFromSession();
    }

    public function save(){
        // Todo Implement a connection with the firebase repository
    }

    public function __toString()
    {
        return $this->attributes ? json_encode($this->attributes) : json_encode(new \stdClass());
    }

    public function __get($key)
    {
        return $this->getAttribute($key);
    }

    public function __set($key, $value){
        $this->attributes[$key] = $value;
    }

    private function getAttribute($key){
        if (! $key) {
            return;
        }
        return $this->getAttributeValue($key);
    }

    private function getAttributeValue($key)
    {
        if($key == 'items'){
            return isset($this->attributes[$key]) ? $this->attributes[$key] : [];
        }else{
            return isset($this->attributes[$key]) ? $this->attributes[$key] : null;
        }
    }

    private function hydrateFromSession()
    {
        if (session()->has('cart')) {
            $cart = session('cart');
            foreach($cart->attributes as $key => $value){
                $this->attributes[$key] = $value;
            }
        }
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        $array = [];

        foreach($this->attributes as $key => $value){
            $array[$key] = $this->attributes[$key];
        }

        return $array;
    }

}
