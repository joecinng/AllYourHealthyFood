<x-layout>
    @php
        $cart = Gloudemans\Shoppingcart\Facades\Cart::content();
        $sum = 0;
        $dateTime = new DateTime($tracker->created_at);
    @endphp

    <div class="container">
        <h2 class="my-4 text-center bg-success py-3">Thank you for your ordering!</h2>
        <h5 class="text-center my-4">Track Your Order: <a href="{{$tracker->public_url}}">Link To EasyPost</a></h5>
        <div class="container card my-3">
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <div class="row invoice-info align-center">
                        <div class="col-sm-4 invoice-col">
                            From:
                            <address>
                                <i class="fa fa-globe"></i><strong> AllYourHealtyFoods, Inc.</strong><br>
                                Glenferrie Road<br>
                                Hawthorn, VIC 3122<br>
                                Phone: (04)72345678<br>
                                Email: info@allyourhealthyfoods.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To:
                            <address>
                                <strong>{{auth()->user()->name}}</strong><br>
                                {{$shipping->shipping_details->address->line1}}<br>
                                {{$shipping->shipping_details->address->city}}, {{$shipping->shipping_details->address->state}} {{$shipping->shipping_details->address->postal_code}}<br>
                                Phone: {{$shipping->customer_details->phone}}<br>
                                Email: {{auth()->user()->email}}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <br>
                            <b>Order ID:</b> 4F3S8J<br>
                            <b>Date:</b> {{$dateTime->format('Y-m-d')}}<br>
                        </div>
                    </div>

                    <!-- Table row --> 
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $index => $item)
                                        <tr>
                                            <th scope="row">{{$item->name}}</th>
                                            <td><span name="qty{{$index}}" id="qty{{$index}}">{{$item->qty}}</span></td>
                                            <td>A${{$item->price}}</td>
                                            <td>A$<span id="total{{$index}}">{{$item->price * $item->qty}}</span></td>
                                            @php 
                                                $sum = $sum + ($item->price * $item->qty);
                                            @endphp
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>

                    <div class="row justify-content-end">
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                <tbody><tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>A${{$sum}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping:</th>
                                    <td>A${{$shipping->total_details->amount_shipping / 100}}</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>A${{$shipping->amount_total / 100}}</td>
                                </tr>
                                </tbody></table>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row no-print">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" onclick="printReceipt()">
                                <i class="fa fa-download"></i> Generate PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @php
        Gloudemans\Shoppingcart\Facades\Cart::destroy();
    @endphp

    <script>
        function printReceipt() {
            window.print();
        }
    </script>
</x-layout>