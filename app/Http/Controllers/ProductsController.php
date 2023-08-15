<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
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

    }
}
