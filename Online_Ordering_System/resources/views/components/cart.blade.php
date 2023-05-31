<x-layout>
    <p><a href="/">&lt;back</a></p>
    <div class="card">
        <div class="card-body">
            <div class="row mb-2 mx-2">
                <h4 class="card-title">Shopping Cart</h4>
                <span class="mt-1 mx-3">({{$cart->count()}} items)</span>
            </div>
            @if ($cart->count() < 1)
                <p>No product is in the cart.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-6" scope="col">PRODUCT DETAILS</th>
                            <th class="col-1 text-center" scope="col">QUANTITY</th>
                            <th class="col-1 text-center" scope="col">PRICE</th>
                            <th class="col-1 text-center" scope="col">TOTAL</th>
                            <th class="col-1 text-center" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sum = 0;
                        @endphp
                        @foreach($cart as $index => $item)
                            <tr>
                                <th scope="row" class="col-6" scope="col">{{$item->name}}</th>
                                <td class="col-1 text-center"><span name="qty{{$index}}" id="qty{{$index}}">{{$item->qty}}</span></td>
                                <td class="col-1 text-center">A${{$item->price}}</td>
                                <td class="col-1 text-center">A$<span id="total{{$index}}">{{$item->price * $item->qty}}</span></td>
                                @php 
                                    $sum = $sum + ($item->price * $item->qty);
                                @endphp
                                <td class="col-1 text-center">
                                    <form action="{{ route('cart.destroy') }}" method="POST" class="col-1 mx-3">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $index }}">
                                        <button type="submit" class="btn btn-warning rounded" class="col-9">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <th class="col-6" scope="col"></th>
                            <td class="col-1 text-center"></td>
                            <th scope="row" class="col-2" scope="col">TOTAL COST</th>
                            <td class="col-1 text-center font-weight-bold">A$<span id="sum">{{$sum}}</span></td>
                        </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    @if ($cart->count() > 0)
        <div class="row justify-content-end m-3">
            <form action="{{ route('checkout') }}" class="col-1 mx-3" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary rounded">Checkout</button>
            </form>
        </div>
    @endif
</x-layout>