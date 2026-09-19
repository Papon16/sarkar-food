<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Cart - {{ $settings->restaurant_name ?? 'Foodie' }}
    </title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            color: #222;
        }

        a {
            text-decoration: none;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            background: white;
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            box-shadow: 0 3px 15px rgba(0,0,0,0.06);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            color: #ff5722;
            text-decoration: none;
        }

        .logo span {
            font-size: 27px;
            margin-right: 7px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-links a {
            color: #333;
            font-weight: 600;
            padding: 10px 15px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .nav-links a:hover {
            background: #fff1eb;
            color: #ff5722;
        }

        .cart-btn {
            background: #ff5722 !important;
            color: white !important;
        }

        /* ================= PAGE ================= */

        .page {
            max-width: 1200px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .small-title {
            color: #ff5722;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .page-header h1 {
            font-size: 38px;
            margin-bottom: 10px;
        }

        .page-header p {
            color: #777;
        }

        /* ================= ALERT ================= */

        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
            text-align: center;
        }

        .success {
            background: #e8f8ee;
            color: #198754;
        }

        .error {
            background: #ffe8e8;
            color: #dc3545;
        }

        /* ================= EMPTY CART ================= */

        .empty-cart {
            background: white;
            padding: 75px 30px;
            text-align: center;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
        }

        .empty-icon {
            font-size: 75px;
            margin-bottom: 20px;
        }

        .empty-cart h2 {
            font-size: 26px;
            margin-bottom: 10px;
        }

        .empty-cart p {
            color: #777;
            margin-bottom: 25px;
        }

        .browse-btn {
            display: inline-block;
            background: #ff5722;
            color: white;
            padding: 13px 25px;
            border-radius: 9px;
            font-weight: bold;
        }

        .browse-btn:hover {
            background: #e64a19;
        }

        /* ================= CART LAYOUT ================= */

        .cart-layout {
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 25px;
            align-items: start;
        }

        /* ================= ITEMS ================= */

        .cart-items {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
        }

        .cart-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .cart-title h2 {
            font-size: 22px;
        }

        .item-count {
            color: #777;
            font-size: 14px;
        }

        /* ================= ITEM ================= */

        .cart-item {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 22px 0;
            border-bottom: 1px solid #eee;
            position: relative;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        /* ================= IMAGE ================= */

        .food-image {
            width: 105px;
            height: 105px;
            flex-shrink: 0;
            border-radius: 14px;
            overflow: hidden;
            background: #fff1eb;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .food-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .no-image {
            font-size: 40px;
        }

        /* ================= INFO ================= */

        .food-info {
            flex: 1;
        }

        .food-info h3 {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .food-price {
            color: #ff5722;
            font-size: 17px;
            font-weight: bold;
        }

        /* ================= QUANTITY ================= */

        .quantity-area {
            display: flex;
            align-items: center;
        }

        .quantity-form {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 9px;
            overflow: hidden;
            background: white;
        }

        .qty-btn {
            width: 35px;
            height: 35px;
            border: none;
            background: #f7f7f7;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }

        .qty-btn:hover {
            background: #ffe9df;
            color: #ff5722;
        }

        .qty-input {
            width: 45px;
            height: 35px;
            border: none;
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            outline: none;
        }

        /* ================= TOTAL ================= */

        .item-total {
            width: 100px;
            text-align: right;
        }

        .item-total strong {
            font-size: 17px;
        }

        /* ================= DELETE ================= */

        .remove-form {
            margin-left: 5px;
        }

        .remove-btn {
            border: none;
            background: #fff0f0;
            color: #e53935;
            width: 38px;
            height: 38px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.2s;
        }

        .remove-btn:hover {
            background: #e53935;
            color: white;
        }

        /* ================= UPDATE ================= */

        .update-cart {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
        }

        .update-btn {
            border: none;
            background: #222;
            color: white;
            padding: 11px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .update-btn:hover {
            background: #444;
        }

        /* ================= SUMMARY ================= */

        .summary {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
            position: sticky;
            top: 95px;
        }

        .summary h2 {
            font-size: 22px;
            margin-bottom: 25px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 16px;
            color: #555;
        }

        .summary-row.total {
            border-top: 1px solid #eee;
            padding-top: 18px;
            margin-top: 10px;
            color: #222;
            font-size: 20px;
            font-weight: bold;
        }

        .total-price {
            color: #ff5722;
        }

        /* ================= MINIMUM ORDER ================= */

        .minimum-order {
            background: #fff7ed;
            color: #9a3412;
            padding: 12px;
            border-radius: 9px;
            font-size: 13px;
            margin-top: 15px;
            line-height: 1.5;
        }

        /* ================= CHECKOUT ================= */

        .checkout-btn {
            display: block;
            width: 100%;
            margin-top: 20px;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: #ff5722;
            color: white;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
        }

        .checkout-btn:hover {
            background: #e64a19;
        }

        .checkout-disabled {
            background: #bbb !important;
            cursor: not-allowed;
        }

        .continue-shopping {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #ff5722;
            font-weight: bold;
        }

        /* ================= MOBILE ================= */

        @media(max-width: 900px) {

            .cart-layout {
                grid-template-columns: 1fr;
            }

            .summary {
                position: static;
            }

        }

        @media(max-width: 650px) {

            .navbar {
                padding: 0 15px;
            }

            .nav-links a:not(.cart-btn) {
                display: none;
            }

            .page {
                margin-top: 30px;
            }

            .page-header h1 {
                font-size: 30px;
            }

            .cart-item {
                display: grid;
                grid-template-columns: 80px 1fr;
                gap: 12px;
                padding-right: 45px;
            }

            .food-image {
                width: 80px;
                height: 80px;
                grid-row: span 2;
            }

            .food-info {
                min-width: 0;
            }

            .quantity-area {
                grid-column: 2;
            }

            .item-total {
                grid-column: 2;
                width: auto;
                text-align: left;
            }

            .remove-form {
                position: absolute;
                right: 0;
                top: 20px;
            }

            .update-cart {
                justify-content: center;
            }

        }

    </style>

</head>

<body>


    {{-- ================= NAVBAR ================= --}}

    <nav class="navbar">

        <a href="{{ route('home') }}" class="logo">

            <span>🍔</span>

            {{ $settings->restaurant_name ?? 'Foodie' }}

        </a>


        <div class="nav-links">

            <a href="{{ route('home') }}">
                Home
            </a>

            <a href="{{ route('about') }}">
                About
            </a>

            <a href="{{ route('contact') }}">
                Contact
            </a>

            <a href="{{ route('cart') }}" class="cart-btn">
                🛒 Cart
            </a>

        </div>

    </nav>


    {{-- ================= MAIN ================= --}}

    <div class="page">

        <div class="page-header">

            <div class="small-title">
                YOUR ORDER
            </div>

            <h1>
                Shopping Cart 🛒
            </h1>

            <p>
                Review your selected foods before checkout.
            </p>

        </div>


        {{-- ================= ALERT ================= --}}

        @if(session('success'))

            <div class="alert success">
                ✅ {{ session('success') }}
            </div>

        @endif


        @if(session('error'))

            <div class="alert error">
                ❌ {{ session('error') }}
            </div>

        @endif


        {{-- ================= EMPTY CART ================= --}}

        @if(empty($cart))

            <div class="empty-cart">

                <div class="empty-icon">
                    🛒
                </div>

                <h2>
                    Your Cart is Empty
                </h2>

                <p>
                    You haven't added any food to your cart yet.
                </p>

                <a
                    href="{{ route('home') }}"
                    class="browse-btn"
                >
                    🍔 Browse Foods
                </a>

            </div>

        @else


            {{-- ================= SETTINGS VALUES ================= --}}

            @php

                $subtotal = 0;

                $totalQuantity = 0;

                $deliveryCharge = (float) (
                    $settings->delivery_charge ?? 0
                );

                $minimumOrder = (float) (
                    $settings->minimum_order ?? 0
                );

                $currency = (
                    $settings->currency ?? '৳'
                );

            @endphp


            <div class="cart-layout">


                {{-- ================= CART ITEMS ================= --}}

                <div class="cart-items">

                    <div class="cart-title">

                        <h2>
                            Your Items
                        </h2>

                        <span class="item-count">

                            {{ count($cart) }} item(s)

                        </span>

                    </div>


                    {{-- ================= ITEMS LOOP ================= --}}

                    @foreach($cart as $id => $item)

                        @php

                            $price = (float) (
                                $item['price'] ?? 0
                            );

                            $quantity = (int) (
                                $item['quantity'] ?? 1
                            );

                            $itemTotal = $price * $quantity;

                            $subtotal += $itemTotal;

                            $totalQuantity += $quantity;

                        @endphp


                        <div class="cart-item">


                            {{-- IMAGE --}}

                            <div class="food-image">

                                @if(!empty($item['image']))

                                    <img
                                        src="{{ asset('storage/' . $item['image']) }}"
                                        alt="{{ $item['name'] ?? 'Food' }}"
                                        onerror="this.style.display='none'; this.parentElement.innerHTML='<div class=\'no-image\'>🍔</div>';"
                                    >

                                @else

                                    <div class="no-image">
                                        🍔
                                    </div>

                                @endif

                            </div>


                            {{-- FOOD INFO --}}

                            <div class="food-info">

                                <h3>
                                    {{ $item['name'] ?? 'Food Item' }}
                                </h3>

                                <div class="food-price">

                                    {{ $currency }}

                                    {{ number_format($price, 2) }}

                                </div>

                            </div>


                            {{-- QUANTITY --}}

                            <div class="quantity-area">

                                <form
                                    action="{{ route('cart.update', $id) }}"
                                    method="POST"
                                    class="quantity-form"
                                >

                                    @csrf

                                    {{-- IMPORTANT:
                                         তোমার route POST,
                                         তাই PUT লাগবে না।
                                    --}}

                                    <button
                                        type="button"
                                        class="qty-btn"
                                        onclick="changeQty(this, -1)"
                                    >
                                        −
                                    </button>


                                    <input
                                        type="number"
                                        name="quantity"
                                        value="{{ $quantity }}"
                                        min="1"
                                        class="qty-input"
                                        onchange="this.form.submit()"
                                    >


                                    <button
                                        type="button"
                                        class="qty-btn"
                                        onclick="changeQty(this, 1)"
                                    >
                                        +
                                    </button>

                                </form>

                            </div>


                            {{-- ITEM TOTAL --}}

                            <div class="item-total">

                                <strong>

                                    {{ $currency }}

                                    {{ number_format($itemTotal, 2) }}

                                </strong>

                            </div>


                            {{-- REMOVE --}}

                            <form
                                action="{{ route('cart.remove', $id) }}"
                                method="POST"
                                class="remove-form"
                                onsubmit="return confirm('Are you sure you want to remove this item from your cart?');"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="remove-btn"
                                    title="Remove item"
                                >
                                    🗑️
                                </button>

                            </form>


                        </div>

                    @endforeach


                    {{-- UPDATE CART --}}

                    <div class="update-cart">

                        <button
                            type="button"
                            class="update-btn"
                            onclick="updateAllCart()"
                        >
                            🔄 Update Cart
                        </button>

                    </div>


                </div>


                {{-- ================= SUMMARY ================= --}}

                <div class="summary">

                    <h2>
                        Order Summary
                    </h2>


                    {{-- SUBTOTAL --}}

                    <div class="summary-row">

                        <span>
                            Subtotal
                        </span>

                        <strong>

                            {{ $currency }}

                            {{ number_format($subtotal, 2) }}

                        </strong>

                    </div>


                    {{-- DELIVERY --}}

                    @if($minimumOrder > 0 && $subtotal < $minimumOrder)

                        <div class="summary-row">

                            <span>
                                Delivery
                            </span>

                            <strong>
                                —
                            </strong>

                        </div>

                        @php
                            $finalTotal = $subtotal;
                        @endphp

                    @else

                        <div class="summary-row">

                            <span>
                                Delivery
                            </span>

                            <strong>

                                {{ $currency }}

                                {{ number_format($deliveryCharge, 2) }}

                            </strong>

                        </div>

                        @php
                            $finalTotal = $subtotal + $deliveryCharge;
                        @endphp

                    @endif


                    {{-- DISCOUNT --}}

                    <div class="summary-row">

                        <span>
                            Discount
                        </span>

                        <strong>

                            {{ $currency }}0.00

                        </strong>

                    </div>


                    {{-- TOTAL --}}

                    <div class="summary-row total">

                        <span>
                            Total
                        </span>

                        <span class="total-price">

                            {{ $currency }}

                            {{ number_format($finalTotal, 2) }}

                        </span>

                    </div>


                    {{-- MINIMUM ORDER --}}

                    @if(
                        $minimumOrder > 0 &&
                        $subtotal < $minimumOrder
                    )

                        <div class="minimum-order">

                            Minimum order amount is

                            <strong>

                                {{ $currency }}

                                {{ number_format($minimumOrder, 2) }}

                            </strong>

                            <br>

                            Add

                            <strong>

                                {{ $currency }}

                                {{ number_format(
                                    $minimumOrder - $subtotal,
                                    2
                                ) }}

                            </strong>

                            more to place your order.

                        </div>


                        <div class="checkout-btn checkout-disabled">

                            🔒 Minimum Order Required

                        </div>

                    @else

                        <a
                            href="{{ route('checkout') }}"
                            class="checkout-btn"
                        >
                            Proceed to Checkout →
                        </a>

                    @endif


                    {{-- CONTINUE SHOPPING --}}

                    <a
                        href="{{ route('home') }}"
                        class="continue-shopping"
                    >
                        ← Continue Shopping
                    </a>


                </div>

            </div>

        @endif

    </div>


    {{-- ================= JAVASCRIPT ================= --}}

    <script>

        function changeQty(button, change) {

            const form =
                button.closest('.quantity-form');

            const input =
                form.querySelector('.qty-input');

            let quantity =
                parseInt(input.value) || 1;

            quantity += change;

            if (quantity < 1) {
                quantity = 1;
            }

            input.value = quantity;

            form.submit();

        }


        function updateAllCart() {

            const forms =
                document.querySelectorAll('.quantity-form');

            if (forms.length === 0) {
                return;
            }

          
            forms[0].submit();

        }

    </script>


</body>

</html>