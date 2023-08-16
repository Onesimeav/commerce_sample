<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body class="antialiased">
<h1>Modifier image produit</h1>
<form action="{{ url('product/update-image/'.$product_image->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="url">Url-image</label><br>
    <input type="text" id="url" name="url" value="{{$product_image->url}}"><br>
    <button type="submit">Mettre à jour</button>
</form>
</body>
</html>
