<x-layout>
    <p><a href="{{route('product.index')}}">&lt;back</a></p>
    <div class="card-body p-5">
        <div class="card-body row ">
            <div class="col-sm-6 p-5 ">
            <img src="{{ asset('/images/' . $product['image']) }}" alt="Product Image" style="width: 200px; height: 200px; display: block; margin-left: auto; margin-right: auto;">
            </div>
            <div class="col-sm-6 p-5">
            <h1 class="card-title my-3 text-muted">{{$product['name']}}</h1>
            <p class="card-text text-muted">${{$product['price']}} / {{$product['weight']}}</p>
            <h5>Ingredients</h5>
            <p class="card-text text-muted">{{$product['description']}}</p>
            <h5>Ingredients</h5>
            <p class="card-text text-muted">{{$product['ingredients']}}</p>
        </div>
        </div>
    </div>
</x-layout>