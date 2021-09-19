<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products')->with('products', Product::all());
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
            'price' => 'required',
        ]);

        Product::create([
            'name' => request('name'),
            'description' => request('description'),
            'image' => request('image'),
            'price' => request('price')
        ]);

        return redirect('/products');
    }

    public function edit(Product $product)
    {
        return view('edit', ['product' => $product]);
    }

    public function update(Product $product)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
            'price' => 'required',
        ]);

        $product->update([
            'name' => request('name'),
            'description' => request('description'),
            'image' => request('image'),
            'price' => request('price')
        ]);

        return redirect('/products');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products');
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart(Product $product)
    {
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [$product->id => $this->sessionData($product)];
            return $this->setSessionAndReturnResponse($cart);
        }
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
            return $this->setSessionAndReturnResponse($cart);
        }
        $cart[$product->id] = $this->sessionData($product);
        return $this->setSessionAndReturnResponse($cart);

    }

    public function changeQty(Request $request, Product $product)
    {
        $cart = session()->get('cart');
        if ($request->change_to === 'down') {
            if (isset($cart[$product->id])) {
                if ($cart[$product->id]['quantity'] > 1) {
                    $cart[$product->id]['quantity']--;
                    return $this->setSessionAndReturnResponse($cart);
                } else {
                    return $this->removeFromCart($product->id);
                }
            }
        } else {
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity']++;
                return $this->setSessionAndReturnResponse($cart);
            }
        }

        return back();
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', "Removed from Cart");
    }

    protected function sessionData(Product $product)
    {
        return [
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->price,
            'image' => $product->image
        ];
    }

    protected function setSessionAndReturnResponse($cart)
    {
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', "Added to Cart");
    }
}
