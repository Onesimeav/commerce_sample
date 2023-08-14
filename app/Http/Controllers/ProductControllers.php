<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductControllers extends Controller
{
    /*transformation of the sentence containing the keywords into an arrays containing the keywords*/
   private function keywords_validators(string $phrase): array
    {

        /* characters that we will replace*/
        $aremplacer = array(",");

        /* ... we will replace them with a space, so there will be no more in $phrase
      only words and spaces */
        $enremplacement = " ";

        /* we make the replacement (as said above), then we remove the spaces from
        // start and end of string (trim) */
        $sansponctuation = trim(str_replace($aremplacer, $enremplacement, $phrase));

        /* we cut the string according to a separator, and each element is a
        // value of an array */
        $separateur = "#[ ]+#"; // one or more
        $mots = preg_split($separateur, $sansponctuation);

        return $mots;
    }

    public function validator(Request $request )
    {
       $entity=$request->validate(
           [
               'name' => ['required'],
               'price'=> ['required', 'integer'],
               'description'=> ['required'],
               'keywords'=>['required'],
               'image'=>['required','URL'],
           ]);
       $this->create($entity);

    }
    public function create(array $entity):void
    {

        /*Retrieving form information
       $entity['name']=$_POST['name'];
       $entity['price']=$_POST['price'];
       $entity['description']=$_POST['description'];
       $entity['keywords']=$_POST['keywords'];
       $entity['image']=$_POST['image_url'];*/

       DB::insert('insert into products(name,description,price,keywords)values (?,?,?,?)',[$entity['name'],$entity['description'],$entity['price'],$entity['keywords']]);
        $results = DB::select('select * from products where name = :name', ['name' => $entity['name']]);
        var_dump($results);
       DB::insert('insert into images(url,product_id) values (?,?)',[$entity['image'],$results]);
    }
}
