<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body class="antialiased">
    <h1>Liste des produits</h1>
    @foreach ($productTable as $product)
        <ol>
            <li>
                {{ $product-> name }}
                <ul>
                    <li>
                        {{ $product-> price }}XOF;
                    </li>
                    <li>
                        {{ $product-> description }};
                    </li>
                    <li>
                        {{ $product-> keywords }};
                    </li>
                    <ul>
                        @foreach($product-> images as $image)
                            {{ $image-> url}};
                        @endforeach
                    </ul>
                </ul>
            </li>
        </ol>
    @endforeach

    {{ $productTable->links() }}
</body>
</html>
