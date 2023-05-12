 <!--affichage des categories-->
 @foreach ($categories as $itemCategory)
 <ul>
     <li>
         <a href="{{route('filtre.categorie',$itemCategory)}}">{{{$itemCategory->name}}}</a></li>
 </ul>

 @endforeach


 <!--affichage des produits-->
 

 <ul>
     @forelse ($products as $itemProduct)
     
     <li>{{{$itemProduct->name}}}</li>
     <li>{{{$itemProduct->description}}}</li>
     <li>{{{$itemProduct->price}}}€</li>
     
     <a href="{{route('accueil.detail',$itemProduct)}}">Detail</a>

     @empty
     
     @endforelse
 </ul>



 

