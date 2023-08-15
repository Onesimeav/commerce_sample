<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductsController extends Controller
{
    public function create(): View{
        return \view('create');
    }


    public function store(Request $request){
        $this->validate($request,
            [
                'name' => ['required'],
                'price'=> ['required', 'integer'],
                'description'=> ['required'],
                'keywords'=>['required'],
                'image'=>['required','URL'],
            ]);
        $entity = new \App\Models\Products;
        $entity->name = $request->name;
        $entity->price=$request->price;
        $entity->description=$request->description;
        $entity->keywords=$request->keywords;
        $entity->save();

        $newEntity=new ProductImage();
        $newEntity->url=$request->image;
        $newEntity->product_id=$entity->id;
        $newEntity->save();
    }

    public function read()
    {
        $productTable=Products::with('images')->paginate( 10);
        return \view('read',compact('productTable'));
    }
}
