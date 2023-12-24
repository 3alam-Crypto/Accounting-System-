<!DOCTYPE html>
<html>
<head>
    <title>Sales Reminder</title>
</head>
<body>
    <h1>Sales Reminder</h1>
    <p>The following sales need to be shipped soon:</p>

    <ul>
        @foreach ($salesToRemind as $sale)
            <li>
                | Ramo Trading Order ID: {{ $sale->ramo_trading_order_id }}
                | Due Date Shipping: {{ $sale->due_date_shipping }}
                | Platform Name: {{ $sale->platform->name }}
            </li>
        @endforeach
    </ul>
</body>
</html>
