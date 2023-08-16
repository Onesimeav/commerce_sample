<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body class="antialiased">
    <h1>Modifier les produits</h1>
    <form action="{{ url('product/update/'.$product->id) }}" method="POST">
    @csrf
    @method('PUT')
        <label for="name">Nom:</label><br>
        <input type="text" id="name" name="name" value="{{$product->name}}"><br>
        <label for="price">Prix:</label><br>
        <input type="text" id="price" name="price" value="{{$product->price}}"><br>
        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" value="{{$product->description}}"><br>
        <label for="keywords">Mots-clés:</label><br>
        <input type="text" id="keywords" name="keywords" value="{{$product->keywords}}"><br>
        <button type="submit">Mettre à jour</button>
</form>
</body>
</html>
