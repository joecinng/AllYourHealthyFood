<x-layout>
    <p><a href="/">&lt;back</a></p>
    <div class="card">
        <div class="card-body">
            <img src="{{asset('images/brand.png')}}" alt="Product Image">
            <h4 class="card-title my-3">{{$product['name']}}</h4>
            <p class="card-text price my-4">${{$product['price']}} / {{$product['weight']}}</p>
            <h5>Product Details</h5>
            <p class="card-text">{{$product['description']}}</p>
            <h5>Ingredients</h5>
            <p class="card-text">{{$product['ingredients']}}</p>
            <button class="btn btn-primary col">Add to Cart</button>
        </div>
    </div>
</x-layout>