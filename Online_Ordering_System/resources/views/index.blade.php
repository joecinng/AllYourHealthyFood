<x-layout>  
    <h1>Welcome to our Online Ordering Website!</h1>
    <p>Here you can browse our products and place orders online.</p>

    <!-- Search bar -->
    @include('partials._search')

    <h2>Featured Products</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Product 1</h3>
                    <p class="card-text">Description of Product 1</p>
                    <button class="btn btn-primary">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Product 2</h3>
                    <p class="card-text">Description of Product 2</p>
                    <button class="btn btn-primary">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Product 3</h3>
                    <p class="card-text">Description of Product 3</p>
                    <button class="btn btn-primary">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</x-layout>