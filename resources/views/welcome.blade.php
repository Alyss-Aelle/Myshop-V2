@extends('layouts.myshop')
@section('main')
    

<div class="masonry-loader masonry-loader-showing">
    <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">


        @forelse ($products as $itemProduct)
        <x-product.card :itemProduct='$itemProduct'/>
        
        @empty
            
        @endforelse
       
    </div>
</div>
 <!--affichage des produits-->
 




 


@endsection
