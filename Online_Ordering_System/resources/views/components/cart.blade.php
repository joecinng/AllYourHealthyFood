<x-layout>
    <p><a href="/">&lt;back</a></p>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center mb-2">
                <h4 class="card-title col">Shopping Cart</h4>
                <span class="col">{{$cart->count()}} items</span>
            </div>
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
                            <td class="col-1 text-center"><input type="number" name="qty{{$index}}" id="qty{{$index}}" value="{{$item->qty}}" oninput="calculateSubTotal('{{$index}}')" min="1" max="50"></td>
                            <td class="col-1 text-center">{{$item->price}}</td>
                            <td class="col-1 text-center" id="total{{$index}}">{{$item->price * $item->qty}}</td>
                            @php 
                                $sum = $sum + ($item->price * $item->qty);
                            @endphp
                            <td class="col-1 text-center">
                                <form action="" class="col-1 mx-3" method="POST">
                                    <button type="submit" class="btn btn-warning rounded" class="col-9">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th class="col-6" scope="col"></th>
                        <td class="col-1 text-center"></td>
                        <th scope="row" class="col-1" scope="col">Total</th>
                        <td id="sum" class="col-1 text-center">{{$sum}}</td>
                    </tr>
                </tbody>
              </table>
        </div>
    </div>
    <div class="row justify-content-end m-3">
        <form action="" class="col-1 mx-3" method="POST">
            <button type="submit" class="btn btn-primary rounded">Checkout</button>
        </form>
    </div>

    <script>
        function calculateSubTotal(index) {
            var qty = document.getElementById("qty" + index).value;
            var price = {{$cart[$index]->price}};
            var total = qty * price;

            var sub = total - parseFloat(document.getElementById("total" + index).textContent);
            document.getElementById("total" + index).textContent = total;

            var sumElement = document.getElementById("sum");
            var sumText = sumElement.textContent;
            var sum = parseFloat(sumText) + sub;
            document.getElementById("sum").textContent = sum;
        }
      </script>
</x-layout>