<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body class="antialiased">
    <h1>Creer produits</h1>
    <form method="POST" action="/product/create">
        @csrf
        <label for="name">Nom:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="price">Prix:</label><br>
        <input type="text" id="price" name="price"><br>
        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description"><br>
        <label for="keywords">Mots-clés:</label><br>
        <input type="text" id="keywords" name="keywords"><br>
        <label for="image">Url-Image:</label><br>
        <input type="text" id="image" name="image"><br>
        <button type="submit">Creer</button>
    </form>
</body>
</html>
