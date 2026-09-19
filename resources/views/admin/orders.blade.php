<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    {{-- Dynamic Restaurant Name --}}
    <title>
        {{ $settings->restaurant_name ?? 'Foodie' }} - Orders
    </title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: Arial, sans-serif;

            background: #fff8f2;

            color: #222;

            padding: 30px;
        }


        /* ================= BACK BUTTON ================= */

        .back-btn {
            display: inline-block;

            background: #222;

            color: white;

            padding: 12px 20px;

            border-radius: 7px;

            text-decoration: none;

            margin-bottom: 20px;

            font-weight: bold;

            transition: 0.3s;
        }


        .back-btn:hover {
            background: #ff5722;
        }


        /* ================= TITLE ================= */

        h1 {
            text-align: center;

            margin-bottom: 30px;

            color: #ff5722;
        }


        /* ================= SUCCESS MESSAGE ================= */

        .success {
            background: #d4edda;

            color: #155724;

            padding: 15px;

            border-radius: 8px;

            margin-bottom: 20px;

            text-align: center;

            font-weight: bold;
        }


        /* ================= ORDER CARD ================= */

        .order-card {
            background: white;

            border-radius: 12px;

            padding: 25px;

            margin-bottom: 25px;

            box-shadow:
                0 3px 15px rgba(0, 0, 0, 0.08);
        }


        /* ================= ORDER HEADER ================= */

        .order-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;
        }


        .order-id {
            font-size: 22px;

            font-weight: bold;
        }


        /* ================= CUSTOMER INFO ================= */

        .customer-info {
            background: #fff8f2;

            padding: 15px;

            border-radius: 8px;

            margin-bottom: 20px;
        }


        .customer-info h3 {
            margin-bottom: 10px;
        }


        .customer-info p {
            margin: 7px 0;
        }


        /* ================= FOOD ITEMS ================= */

        .items {
            margin-bottom: 20px;
        }


        .items h3 {
            margin-bottom: 10px;
        }


        .item {
            display: flex;

            justify-content: space-between;

            padding: 10px 0;

            border-bottom: 1px solid #eee;
        }


        /* ================= TOTAL ================= */

        .total {
            font-size: 20px;

            font-weight: bold;

            color: #ff5722;

            margin-bottom: 20px;
        }


        /* ================= STATUS ================= */

        .status-form {
            display: flex;

            gap: 10px;

            align-items: center;

            flex-wrap: wrap;
        }


        select {
            padding: 10px;

            border: 1px solid #ddd;

            border-radius: 6px;

            background: white;

            cursor: pointer;

            font-size: 14px;
        }


        button {
            background: #ff5722;

            color: white;

            border: none;

            padding: 10px 18px;

            border-radius: 6px;

            cursor: pointer;

            font-weight: bold;

            transition: 0.3s;
        }


        button:hover {
            background: #e64a19;
        }


        /* ================= EMPTY ================= */

        .empty {
            text-align: center;

            background: white;

            padding: 50px;

            border-radius: 12px;

            font-size: 20px;

            box-shadow:
                0 3px 15px rgba(0, 0, 0, 0.08);
        }


        /* ================= STATUS BADGE ================= */

        .status-badge {
            display: inline-block;

            padding: 5px 10px;

            border-radius: 20px;

            font-size: 13px;

            font-weight: bold;

            background: #fff0e8;

            color: #ff5722;
        }


        /* ================= RESPONSIVE ================= */

        @media(max-width: 600px) {

            body {
                padding: 15px;
            }


            .order-header {
                flex-direction: column;

                align-items: flex-start;

                gap: 10px;
            }


            .item {
                flex-direction: column;

                gap: 5px;
            }


            .status-form {
                flex-direction: column;

                align-items: flex-start;
            }


            select,
            button {
                width: 100%;
            }


            .back-btn {
                width: 100%;

                text-align: center;
            }


            h1 {
                font-size: 24px;
            }


            .order-card {
                padding: 18px;
            }

        }

    </style>

</head>


<body>


    {{-- ================= BACK TO DASHBOARD ================= --}}

    <a
        href="{{ route('admin.dashboard') }}"
        class="back-btn"
    >
        ← Back to Dashboard
    </a>



    {{-- ================= PAGE TITLE ================= --}}

    <h1>

        🍔
        {{ $settings->restaurant_name ?? 'Foodie' }}

        - Order Management

    </h1>



    {{-- ================= SUCCESS MESSAGE ================= --}}

    @if(session('success'))

        <div class="success">

            {{ session('success') }}

        </div>

    @endif



    {{-- ================= ORDERS ================= --}}

    @forelse($orders as $order)


        <div class="order-card">


            {{-- ================= ORDER HEADER ================= --}}

            <div class="order-header">


                <div class="order-id">

                    Order #{{ $order->id }}

                </div>


                <strong>

                    {{ $order->created_at->format('d M Y, h:i A') }}

                </strong>


            </div>



            {{-- ================= CUSTOMER INFORMATION ================= --}}

            <div class="customer-info">


                <h3>
                    Customer Information
                </h3>


                <p>

                    <strong>
                        Name:
                    </strong>

                    {{ $order->name }}

                </p>


                <p>

                    <strong>
                        Phone:
                    </strong>

                    {{ $order->phone }}

                </p>


                <p>

                    <strong>
                        Address:
                    </strong>

                    {{ $order->address }}

                </p>


                <p>

                    <strong>
                        Payment:
                    </strong>

                    {{ $order->payment_method }}

                </p>


            </div>



            {{-- ================= FOOD ITEMS ================= --}}

            <div class="items">


                <h3>
                    Ordered Food
                </h3>


                @foreach($order->items as $item)


                    <div class="item">


                        <span>

                            {{ $item->food_name }}

                            × {{ $item->quantity }}

                        </span>


                        {{-- Dynamic Currency --}}

                        <strong>

                            {{ $settings->currency ?? '৳' }}

                            {{ number_format($item->subtotal, 2) }}

                        </strong>


                    </div>


                @endforeach


            </div>



            {{-- ================= TOTAL ================= --}}

            <div class="total">

                Total:

                {{ $settings->currency ?? '৳' }}

                {{ number_format($order->total, 2) }}

            </div>



            {{-- ================= STATUS FORM ================= --}}

            <form
                action="{{ route('admin.orders.status', $order->id) }}"
                method="POST"
                class="status-form"
            >

                @csrf


                <strong>
                    Status:
                </strong>


                <select name="status">


                    <option
                        value="Pending"
                        {{ $order->status == 'Pending' ? 'selected' : '' }}
                    >
                        Pending
                    </option>


                    <option
                        value="Confirmed"
                        {{ $order->status == 'Confirmed' ? 'selected' : '' }}
                    >
                        Confirmed
                    </option>


                    <option
                        value="Preparing"
                        {{ $order->status == 'Preparing' ? 'selected' : '' }}
                    >
                        Preparing
                    </option>


                    <option
                        value="Delivered"
                        {{ $order->status == 'Delivered' ? 'selected' : '' }}
                    >
                        Delivered
                    </option>


                    <option
                        value="Cancelled"
                        {{ $order->status == 'Cancelled' ? 'selected' : '' }}
                    >
                        Cancelled
                    </option>


                </select>


                <button type="submit">

                    Update Status

                </button>


            </form>


        </div>


    @empty


        {{-- ================= NO ORDERS ================= --}}

        <div class="empty">

            🛒

            No orders yet.

        </div>


    @endforelse



</body>

</html>