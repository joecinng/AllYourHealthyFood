<x-layout>
    <h1 class="main-heading">Welcome to our Online Ordering Website!</h1>
    <p class="mt-3">Here you can browse our products and place orders online.</p>

    <!-- Search bar -->
    @include('partials._search')

    @php 
        Session::forget('order_created'); 
    @endphp

    <h2>{{$headings}}</h2>

    @if (count($products) == 0) 
        <p>No listing found.</p>
    @else 
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 my-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <img src="{{ asset('/images/' . $product['image']) }}" alt="Product Image" style="width:100%; height: 200px; display: block; margin-left: auto; margin-right: auto; object-fit:cover;"> 
                            <a class="text-muted " href="{{route('search.product', ['id' => $product['id']])}}"><h4 class="my-3 mt-5 heading-product" >{{$product['name']}}</h4></a>
                            <p class="card-text price">${{$product['price']}} / {{$product['weight']}} KG</p>
                            @if ($cart->where('id', $product['id'])->count())
                                <p>In cart</p>
                            @else
                                @if($product['stock'] == 0)
                                    <p class="text-danger"><b>Out of Stock</b></p> 
                                @else
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product['id']}}">
                                        <div class="row justify-content-start">
                                            <input type="number" value="1" name="quantity" class="col-3 mx-3 form-control" min="1" max="{{$product['stock']}}" required>
                                            <button type="submit" class="btn btn-primary rounded" class="col-9">Add to Cart</button>
                                        </div>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-layout>