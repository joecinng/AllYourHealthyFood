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
                            <p class="card-text price">${{$product['price']}} / {{$product['weight']}} KG</p>
                            @if ($cart->where('id', $product['id'])->count())
                                <p>In cart</p>
                            @else
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product['id']}}">
                                    <div class="row justify-content-start">
                                        <input type="number" value="1" name="quantity" class="col-3 mx-3" min="1" max="50">
                                        <button type="submit" class="btn btn-primary rounded" class="col-9">Add to Cart</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-layout>