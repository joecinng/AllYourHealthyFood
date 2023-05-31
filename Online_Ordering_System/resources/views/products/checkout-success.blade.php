<x-layout>
    <h1>Checkout Success!</h1>
    {{Gloudemans\Shoppingcart\Facades\Cart::destroy()}}
    <a href="{{$url}}">Link to view your delivery status</a>
</x-layout>