<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body class="antialiased">
<a href="/product/create"><button>Creer</button></a><br>
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
                        @foreach($product->keywords as $keyword)
                            {{ $keyword }},
                        @endforeach;
                    </li>
                        @foreach($product-> images as $image)
                        <li>

                            {{ $image-> url}};
                        </li>
                        @endforeach
                </ul>
            </li>
            <a href="{{url('product/update/'.$product->id)}}"><button>Modifier</button></a><br>
            <a href="{{url('product/delete/'.$product->id)}}"><button>Supprimer</button></a><br>
            <a href="{{url('product/update-image/'.$product->id)}}"><button>Modifeir Image</button></a><br>
            <a href="{{url('product/view/'.$product->id)}}"><button>Voir</button></a><br>
        </ol>
    @endforeach

    {{ $productTable->links() }}
</body>
</html>
