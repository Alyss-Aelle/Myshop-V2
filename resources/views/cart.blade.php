
<h1> Panier</h1>

<table>
    <thead>
        <tr>
            <td>Id </td>
            <td>Product_id</td>
            <td>User_id</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Name</td>
        </tr>
    </thead>


    <tbody>
        @forelse ($carts as $itemCart)
            <tr>
                <td>{{$itemCart->id}}</td>
                <td>{{$itemCart->product_id}}</td>
                <td>{{$itemCart->user_id}}</td>
                <td>{{$itemCart->quantity}}</td>
                <td>{{$itemCart->price}}</td>
                <td>{{$itemCart->product->name}}</td>
            </tr>

            @empty
    
            @endforelse
    </tbody>
</table>
