<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Products;
use Illuminate\Database\Console\Migrations\ResetCommand;
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
        return $this->read();
    }
/*transformation of the sentence containing the keywords into an arrays containing the keywords*/
    private function keywords_validators(string $phrase): array
    {

        /* characters that we will replace*/
        $aremplacer = array(",");

        /* will replace them with a space, so there will be no more in $phrase
      only words and spaces */
        $enremplacement = " ";

        /* make the replacement (as said above), then we remove the spaces from
        // start and end of string (trim) */
        $sansponctuation = trim(str_replace($aremplacer, $enremplacement, $phrase));

        /* cut the string according to a separator, and each element is a
        // value of an array */
        $separateur = "#[ ]+#"; // one or more
        $mots = preg_split($separateur, $sansponctuation);

        return $mots;
    }

    public function read()
    {
        $productTable=Products::with('images')->paginate( 10);
        foreach ($productTable as $products){
            $products->keywords=$this->keywords_validators($products->keywords);
        }
        return \view('read',compact('productTable'));
    }

    public function edit($id)
    {
        $product= Products::find($id);
        return \view('update', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => ['required'],
                'price'=> ['required', 'integer'],
                'description'=> ['required'],
                'keywords'=>['required'],
            ]);

        $product= Products::find($id);

        $product->name= $request->name;
        $product->description= $request->description;
        $product->price= $request->price;
        $product->keywords= $request->keywords;
        $product->update();
        return $this->read();
    }

    public function editImage($id)
    {
        $product_image=ProductImage::where('product_id',$id)->first();
        return \view('update-image', compact('product_image'));
    }

    public function updateImage(Request $request, $id)
    {
        $product_image=ProductImage::find($id);
        $this->validate($request,
            [
                'url'=>['required','URL'],
            ]);
        $product_image->url=$request->url;
        $product_image->update();
        return $this->read();

    }

    public function delete($id)
    {
        $product= Products::find($id);
        $product->delete();
        return $this->read();
    }

    public function view_product(Request $request, $id)
    {
        $product= Products::find($id);
        $product->keywords=$this->keywords_validators($product->keywords);
        return \view('view-product', compact('product','request'));
    }
}
