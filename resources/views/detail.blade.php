<h1>detail</h1>
<ul>
    <li>{{$product->name}}</li>
    <li>{{$product->description}}</li>
    <li>{{$product->price}}€</li>
  

</ul>
<a href="{{route('addtocart',$product)}}">ajouter au panier</a>
<h2>Produits Similaires</h2>

@foreach ($products as $product)
    <ul>
        <li>{{$product->name}}</li>
    </ul>
@endforeach