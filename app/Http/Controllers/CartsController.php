<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CartsController extends Controller
{
    public function addToCart(AddCartRequest $request, $id)
    {
        $product_id=$id;
        $product_quantity=$request->product_quantity;
        echo 'a';
        $responce=$cart=$request->session()->get('cart');
        if($request->session()->has('cart')){
            $cart=$request->session()->get('cart');
            echo 'a';
            foreach ($cart as $cart_product)
            {
                echo 'a';
                $cart_product_id=Arr::get($cart_product,'product_id');
                echo $cart_product_id;
                if($cart_product_id==$product_id)
                {
                    Arr::forget($cart_product,'product_quantity');
                    Arr::add($cart_product,'product_quantity');
                    $request->session()->flash('status', 'Le produit est déjà dans le panier');
                    $products=new ProductsController();
                    return $products->view_product($request,$id);
                }
            }
        }
        $product_to_cart=['product_id'=>$product_id, 'product_quantity'=>$product_quantity];
        $request->session()->push('cart', $product_to_cart);
        $request->session()->flash('status', 'Produit ajouté au panier');
        $products=new ProductsController();
        return $products->view_product($request,$id);
    }
}
