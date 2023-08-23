<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body class="antialiased">
<a href="/product/read"><button>Liste des produits</button></a>
<h1>Produit</h1>
<h2>{{$product->name}}</h2>
<h3>{{$product->price}}</h3>
<form method="POST" action={{url('product/add-product/'.$product->id) }}>
    <input type="number" id="product_quantity" name="product_quantity" value="1" min="1" >
    <button type="submit">Ajouter au panier</button>
</form>
<h4>Description</h4>
<p>{{$product->description}}</p>
<h5>Mots-Clés</h5>
@foreach($product->keywords as $keyword)
    <i>{{$keyword}};</i>
@endforeach
</body>
</html>

