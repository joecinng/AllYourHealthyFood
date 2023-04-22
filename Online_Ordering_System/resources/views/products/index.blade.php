<x-layout>  
    <h1>Welcome to our Online Ordering Website!</h1>
    <p>Here you can browse our products and place orders online.</p>

    <!-- Search bar -->
    @include('partials._search')

    <h2>{{$headings}}</h2>

    @if (count($products) == 0) 
        <p>No listing found.</p>
    @else 
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 my-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{asset('images/brand.png')}}" alt="Product Image">
                            <a href="/product/{{$product['id']}}"><h4 class="my-3" class="card-title">{{$product['name']}}</h4></a>
                            <p class="card-text price">${{$product['price']}} / {{$product['weight']}}</p>
                            <button class="btn btn-primary rounded">Add to Cart</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-layout>