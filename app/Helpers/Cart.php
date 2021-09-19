<?php

namespace App\Helpers;

class Cart
{
    public function __contruct()
    {
        if($this->get() === null) {
            $this->set();
        }
    }

    public function add(Product $product)
    {
        $car = $this->get();
        array_push($cart['products'], $product);
        $this->set($cart);
    }

    public function empty()
    {
        return [
            'products' =>[],
        ];
    }
    public function get()
    {
        return session()->get('cart');
    }

    public function set($cart)
    {
        session()->put('cart',$cart);
    }
}