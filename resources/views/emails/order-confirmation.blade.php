<!DOCTYPE html>
<html>

<head>
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        h1, h2, h3 {
            color: #444;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f4f4f4;
        }

        table tfoot td {
            font-weight: bold;
        }

        p {
            margin: 10px 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thank you for your order!</h1>
        <p>Hi {{ $order->user->name }},</p>
        <p>We have received your order. Here are the details:</p>

        <h2>Order Summary</h2>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Tax</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>
                            {{ $item->name }} <br>
                            {{ $item->description }}
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->amount_tax }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                @if ($order->amount_shipping->isPositive())
                    <tr>
                        <td colspan="4" align="right">Shipping Cost:</td>
                        <td>{{ $order->amount_shipping }}</td>
                    </tr>
                @endif

                @if ($order->amount_discount->isPositive())
                    <tr>
                        <td colspan="4" align="right">Discount:</td>
                        <td>{{ $order->amount_discount }}</td>
                    </tr>
                @endif

                @if ($order->amount_tax->isPositive())
                    <tr>
                        <td colspan="4" align="right">Tax:</td>
                        <td>{{ $order->amount_tax }}</td>
                    </tr>
                @endif

                @if ($order->amount_subtotal->isPositive())
                    <tr>
                        <td colspan="4" align="right">Sub Total:</td>
                        <td>{{ $order->amount_subtotal }}</td>
                    </tr>
                @endif

                @if ($order->amount_total->isPositive())
                    <tr>
                        <td colspan="4" align="right">Total:</td>
                        <td>{{ $order->amount_total }}</td>
                    </tr>
                @endif
            </tfoot>
        </table>

        <h3>Total Amount: {{ $order->amount_total }}</h3>

        <p>If you have any questions, feel free to contact us.</p>
        <p class="footer">Thank you for shopping with us!</p>
    </div>
</body>

</html>
