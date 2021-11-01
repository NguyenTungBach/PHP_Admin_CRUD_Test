<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="orderID" content="{{$order->id}}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
    <h2>Order {{$order->id}}</h2>
    @if($order->check_out)
        <strong class="w3-green">Đã thanh toán</strong>
    @else
        <strong class="w3-red">Chưa thanh toán</strong>
    @endif
    <table class="w3-table w3-table-all">
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
        @php
            $total_price_in_usd = 0;
        @endphp
        @foreach($order->orderDetails as $orderDetail)
            @php
                if (isset($total_price_in_usd) && isset($orderDetail))
                $total_price_in_usd += \App\Helpers\Helper::convertVNDtoUSD($orderDetail->unit_price) * $orderDetail->quantity;
            @endphp
            <tr>
                <form action="/cart/update" method="post">
                    @csrf
                    <td>{{$orderDetail->product_id}}</td>
                    <td>{{$orderDetail->product->description}}</td>
                    <td>{{$orderDetail->unit_price}}</td>
                    <td>{{$orderDetail->quantity}}</td>
                    <td>{{\App\Helpers\Helper::convertVNDtoUSD($orderDetail->unit_price) * $orderDetail->quantity}}</td>
                    <td>
                    </td>
                </form>
            </tr>
        @endforeach
    </table>
    <div style="margin-top: 20px">
        <strong>Total price {{$order->total_price}} ~ $ {{$total_price_in_usd}}</strong>
        <span>($1 = 24000 VND)</span>
    </div>
    <div class="w3-row">
        <div class="w3-col w3-container m4 l6">
        </div>
        <div class="w3-col w3-container m8 l6">
                <div>Ship Name: {{$order->ship_name}}</div>
                <div>Ship phone: {{$order->ship_phone}}</div>
                <div>Ship Name: {{$order->ship_address}}</div>
                <div>Ship Name: {{$order->ship_email}}</div>
                <div>Note: {{$order->ship_note}}</div>
        </div>
    </div>
    <a href="/check-mail?orderID={{$order->id}}">CheckMail</a>
    <div class="w3-row">
        <div class="w3-col w3-container m4 l8">
        </div>
        <div class="w3-col w3-container m8 l3">
{{--            <button type="button" id="paypal-button">Chekout</button>--}}
            @if($order->check_out)
                <button type="button" class="w3-btn w3-blue">
                    <a href="/demo/list">Continue Shopping</a>
                </button>
            @else
                <div id="paypal-button"></div>
            @endif

        </div>
    </div>
</div>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>
    var orderID= document.querySelector('meta[name=orderID]').content;
    paypal.Button.render({
        env: 'sandbox', // Or 'production'
        locale: 'en_US',
        style: {
            size: 'medium',
            color: 'gold',
            shape: 'pill',
            label: 'checkout',
            tagline: 'true'
        },
        // Set up the payment:
        // 1. Add a payment callback
        payment: function(data, actions) {
            // 2. Make a request to your server
            return actions.request.post('/order/create-payment',{
                {{--orderID: {{$order->id}}--}}
                orderID: orderID
            })
                .then(function(res) {
                    // 3. Return res.id from the response
                    return res.id;
                });
        },
        // Execute the payment:
        // 1. Add an onAuthorize callback
        onAuthorize: function(data, actions) {
            // 2. Make a request to your server
            return actions.request.post('/order/execute-payment', {
                paymentID: data.paymentID,
                payerID:   data.payerID,
                orderID: orderID,
            })
                .then(function(res) {
                    // 3. Show the buyer a confirmation message.
                    alert('Payment success!');
                    window.location.reload(false); // load lại trang
                });
        }
    }, '#paypal-button');
</script>

</body>
</html>
