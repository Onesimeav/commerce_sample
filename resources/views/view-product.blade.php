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
@if($request->session()->has('status'))
    {{$request->session()->get('status')}}
@endif
<h2>{{$product->name}}</h2>
<h3>{{$product->price}}XOF</h3>
<form method="POST" action={{url('product/add-cart/'.$product->id) }}>
    @csrf
    <label for="product_quantity">Quantité:</label>
    <input type="number" id="product_quantity" name="product_quantity" value="1" min="1" >
    @if(isset($errors))
        @foreach($errors as $error)
            {{$error}}
        @endforeach
    @endif
    <button type="submit">Ajouter au panier</button>
</form>
<h4>Description</h4>
<p>{{$product->description}}</p>
<h4>Mots-Clés</h4>
@foreach($product->keywords as $keyword)
    <i>{{$keyword}};</i>
@endforeach
{{dd($request->session())}}
</body>
</html>

