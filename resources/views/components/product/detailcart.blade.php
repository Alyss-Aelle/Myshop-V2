<div>
    <div class="header-nav-features ps-0 ms-1">
        <div class="header-nav-feature header-nav-features-cart header-nav-features-cart-big d-inline-flex top-2 ms-2">
            <a href="#" class="header-nav-features-toggle" aria-label="">
                <img src="/img/icons/icon-cart-big.svg" height="30" alt="" class="header-nav-top-icon-img">
                
                    <!--Ajout +1 article au panier--
                <span class="cart-info">
                    <span class="cart-qty">1</span>
                </span>
                fin  Ajout +1 article au panier-->
            </a>
            <div class="header-nav-features-dropdown" id="headerTopCartDropdown">
                <ol class="mini-products-list">
                    <!--boucle cart-->
                    @foreach ( $carts as $itemCart )
                        
                    
                    <li class="item">

                        <a href="#" title="Camera X1000" class="product-image"><img src="/img/products/product-1.jpg" alt="Camera X1000"></a>
                        <div class="product-details">
                            <p class="product-name">
                                <a href="#">{{$itemCart->product->name}}</a>
                            </p>
                            <p class="qty-price">
                                {{$itemCart->quantity}}X<span class="price">{{$itemCart->price}}</span>
                            </p>
                            <a href="{{route('cart.destroy',$itemCart->id)}}" title="Remove This Item" class="btn-remove"><i class="fas fa-times"></i></a>
                        </div>
                    </li>
                    @endforeach
                    <!--boucle cart-->
                </ol>
            
                <!--<div class="totals">
                    <span class="label">Total:</span>
                    <span class="price-total"><span class="price"></span></span>
                </div>-->

                <div class="actions">
                    <a class="btn btn-dark" href="{{route('cart')}}">View Cart</a>
                    <a class="btn btn-primary" href="#">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>