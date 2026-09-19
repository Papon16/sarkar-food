<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $settings->restaurant_name ?? 'Foodie' }} - Checkout
    </title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8f8f8;
            color: #333;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            background: #ffffff;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            color: #ff5a00;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo-icon {
            font-size: 28px;
        }

        .nav-links {
            display: flex;
            gap: 28px;
            align-items: center;
        }

        .nav-links a {
            font-size: 15px;
            font-weight: 600;
            color: #333;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #ff5a00;
        }

        .cart-link {
            background: #ff5a00;
            color: white !important;
            padding: 10px 18px;
            border-radius: 25px;
        }

        .cart-link:hover {
            background: #e64d00;
            color: white !important;
        }

        /* ================= PAGE ================= */

        .checkout-container {
            width: 90%;
            max-width: 1200px;
            margin: 50px auto;
        }

        .page-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .page-title h1 {
            font-size: 38px;
            color: #222;
            margin-bottom: 10px;
        }

        .page-title p {
            color: #777;
            font-size: 16px;
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 30px;
            align-items: start;
        }

        /* ================= CARD ================= */

        .checkout-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.07);
        }

        .checkout-card h2 {
            margin-bottom: 25px;
            font-size: 23px;
            color: #222;
        }

        /* ================= FORM ================= */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 15px;
            font-weight: 600;
            color: #333;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
            background: white;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #ff5a00;
            box-shadow: 0 0 0 2px rgba(255,90,0,0.08);
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .required {
            color: red;
        }

        /* ================= ALERT ================= */

        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #dff6e5;
            color: #18743a;
        }

        .alert-error {
            background: #ffe1e1;
            color: #a30000;
        }

        .validation-errors {
            background: #ffe8e8;
            color: #a00000;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .validation-errors ul {
            padding-left: 20px;
        }

        /* ================= ORDER SUMMARY ================= */

        .order-item {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-weight: bold;
            color: #222;
            margin-bottom: 5px;
        }

        .item-price {
            color: #777;
            font-size: 14px;
        }

        .item-total {
            font-weight: bold;
            color: #222;
            white-space: nowrap;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 14px 0;
            font-size: 16px;
        }

        .summary-row.delivery {
            border-bottom: 1px solid #eee;
        }

        .summary-row.grand-total {
            font-size: 21px;
            font-weight: bold;
            color: #ff5a00;
            padding-top: 20px;
        }

        /* ================= MINIMUM ORDER ================= */

        .minimum-order-warning {
            background: #fff3cd;
            color: #856404;
            padding: 13px 15px;
            border-radius: 8px;
            margin: 15px 0;
            font-size: 14px;
            line-height: 1.5;
        }

        /* ================= BUTTON ================= */

        .place-order-btn {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            border: none;
            border-radius: 8px;
            background: #ff5a00;
            color: white;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .place-order-btn:hover {
            background: #e64d00;
        }

        .place-order-btn:disabled {
            background: #aaa;
            cursor: not-allowed;
        }

        .back-cart {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #ff5a00;
            font-weight: 600;
        }

        .back-cart:hover {
            text-decoration: underline;
        }

        /* ================= PAYMENT ================= */

        .payment-info {
            background: #f8f8f8;
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        /* ================= EMPTY CART ================= */

        .empty-cart {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-cart-icon {
            font-size: 70px;
            margin-bottom: 20px;
        }

        .empty-cart h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .empty-cart p {
            color: #777;
            margin-bottom: 25px;
        }

        .browse-btn {
            display: inline-block;
            background: #ff5a00;
            color: white;
            padding: 13px 25px;
            border-radius: 25px;
            font-weight: bold;
        }

        .browse-btn:hover {
            background: #e64d00;
        }

        /* ================= FOOTER ================= */

        footer {
            background: #222;
            color: #ddd;
            margin-top: 60px;
            padding: 45px 7% 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 35px;
        }

        .footer-column h3 {
            color: white;
            margin-bottom: 18px;
            font-size: 20px;
        }

        .footer-column p {
            line-height: 1.8;
            font-size: 14px;
            color: #bbb;
        }

        .footer-column a {
            display: block;
            margin-bottom: 10px;
            color: #bbb;
            font-size: 14px;
        }

        .footer-column a:hover {
            color: #ff5a00;
        }

        .footer-bottom {
            border-top: 1px solid #444;
            padding-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #999;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .checkout-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 650px) {

            .navbar {
                padding: 15px 5%;
            }

            .nav-links {
                gap: 12px;
            }

            .nav-links a:not(.cart-link) {
                display: none;
            }

            .checkout-container {
                width: 94%;
                margin: 30px auto;
            }

            .page-title h1 {
                font-size: 30px;
            }

            .checkout-card {
                padding: 20px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .order-item {
                flex-direction: column;
            }

            .item-total {
                align-self: flex-end;
            }
        }
    </style>
</head>

<body>

    {{-- ================= NAVBAR ================= --}}

    <nav class="navbar">

        <a href="{{ url('/') }}" class="logo">
            <span class="logo-icon">🍔</span>
            <span>
                {{ $settings->restaurant_name ?? 'Foodie' }}
            </span>
        </a>

        <div class="nav-links">

            <a href="{{ url('/') }}">
                Home
            </a>

            <a href="{{ url('/#categories') }}">
                Categories
            </a>

            <a href="{{ url('/#foods') }}">
                Foods
            </a>

            <a href="{{ route('cart') }}" class="cart-link">
                🛒 Cart
            </a>

        </div>

    </nav>


    {{-- ================= CHECKOUT ================= --}}

    <div class="checkout-container">

        <div class="page-title">

            <h1>
                Checkout
            </h1>

            <p>
                Complete your order from
                {{ $settings->restaurant_name ?? 'Foodie' }}
            </p>

        </div>


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        {{-- ERROR MESSAGE --}}

        @if(session('error'))

            <div class="alert alert-error">
                {{ session('error') }}
            </div>

        @endif


        {{-- VALIDATION ERRORS --}}

        @if($errors->any())

            <div class="validation-errors">

                <strong>
                    Please fix the following errors:
                </strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- ================= CART CHECK ================= --}}

        @if(empty($cart))

            <div class="checkout-card empty-cart">

                <div class="empty-cart-icon">
                    🛒
                </div>

                <h2>
                    Your cart is empty
                </h2>

                <p>
                    Please add some delicious food before checkout.
                </p>

                <a href="{{ url('/#foods') }}" class="browse-btn">
                    Browse Foods
                </a>

            </div>

        @else

            @php

                /*
                |--------------------------------------------------------------------------
                | Calculate subtotal
                |--------------------------------------------------------------------------
                */

                $subtotal = 0;

                foreach($cart as $item) {

                    $price = isset($item['price'])
                        ? (float) $item['price']
                        : 0;

                    $quantity = isset($item['quantity'])
                        ? (int) $item['quantity']
                        : 1;

                    $subtotal += $price * $quantity;
                }


                /*
                |--------------------------------------------------------------------------
                | Settings values
                |--------------------------------------------------------------------------
                */

                $currency = $settings->currency ?? '৳';

                $deliveryCharge = isset($settings->delivery_charge)
                    ? (float) $settings->delivery_charge
                    : 50;

                $minimumOrder = isset($settings->minimum_order)
                    ? (float) $settings->minimum_order
                    : 200;


                /*
                |--------------------------------------------------------------------------
                | Grand total
                |--------------------------------------------------------------------------
                */

                $grandTotal = $subtotal + $deliveryCharge;


                /*
                |--------------------------------------------------------------------------
                | Minimum order check
                |--------------------------------------------------------------------------
                */

                $minimumOrderNotReached = $subtotal < $minimumOrder;

            @endphp


            <div class="checkout-grid">


                {{-- ================= CUSTOMER INFORMATION ================= --}}

                <div class="checkout-card">

                    <h2>
                        Customer Information
                    </h2>

                    <form
                        action="{{ route('checkout.place') }}"
                        method="POST"
                    >

                        @csrf


                        {{-- NAME --}}

                        <div class="form-group">

                            <label for="name">
                                Full Name
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Enter your full name"
                                required
                            >

                        </div>


                        {{-- PHONE --}}

                        <div class="form-group">

                            <label for="phone">
                                Phone Number
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="01XXXXXXXXX"
                                required
                            >

                        </div>


                        {{-- ADDRESS --}}

                        <div class="form-group">

                            <label for="address">
                                Delivery Address
                                <span class="required">*</span>
                            </label>

                            <textarea
                                id="address"
                                name="address"
                                placeholder="Enter your complete delivery address"
                                required
                            >{{ old('address') }}</textarea>

                        </div>


                        {{-- PAYMENT METHOD --}}

                        <div class="form-group">

                            <label for="payment_method">
                                Payment Method
                                <span class="required">*</span>
                            </label>

                            <select
                                name="payment_method"
                                id="payment_method"
                                required
                            >

                                <option value="">
                                    Select Payment Method
                                </option>

                                <option
                                    value="cash_on_delivery"
                                    {{ old('payment_method') == 'cash_on_delivery' ? 'selected' : '' }}
                                >
                                    Cash on Delivery
                                </option>

                                <option
                                    value="bkash"
                                    {{ old('payment_method') == 'bkash' ? 'selected' : '' }}
                                >
                                    bKash
                                </option>

                                <option
                                    value="nagad"
                                    {{ old('payment_method') == 'nagad' ? 'selected' : '' }}
                                >
                                    Nagad
                                </option>

                            </select>

                        </div>


                        <div class="payment-info">

                            <strong>
                                Payment Information
                            </strong>

                            <br>

                            Currently available payment option:
                            <strong>Cash on Delivery</strong>.

                            Other payment methods can be configured
                            later according to your restaurant system.

                        </div>


                        {{-- MINIMUM ORDER WARNING --}}

                        @if($minimumOrderNotReached)

                            <div class="minimum-order-warning">

                                ⚠️

                                Minimum order amount is

                                <strong>
                                    {{ $currency }}{{ number_format($minimumOrder, 2) }}
                                </strong>.

                                Your current subtotal is

                                <strong>
                                    {{ $currency }}{{ number_format($subtotal, 2) }}
                                </strong>.

                                Please add more food to continue.

                            </div>

                        @endif


                        {{-- PLACE ORDER BUTTON --}}

                        <button
                            type="submit"
                            class="place-order-btn"
                            {{ $minimumOrderNotReached ? 'disabled' : '' }}
                        >

                            @if($minimumOrderNotReached)

                                Add More Food

                            @else

                                Place Order

                            @endif

                        </button>


                        <a
                            href="{{ route('cart') }}"
                            class="back-cart"
                        >
                            ← Back to Cart
                        </a>

                    </form>

                </div>


                {{-- ================= ORDER SUMMARY ================= --}}

                <div class="checkout-card">

                    <h2>
                        Order Summary
                    </h2>


                    {{-- CART ITEMS --}}

                    @foreach($cart as $id => $item)

                        @php

                            $itemPrice = isset($item['price'])
                                ? (float) $item['price']
                                : 0;

                            $itemQuantity = isset($item['quantity'])
                                ? (int) $item['quantity']
                                : 1;

                            $itemSubtotal = $itemPrice * $itemQuantity;

                        @endphp


                        <div class="order-item">

                            <div class="item-info">

                                <div class="item-name">
                                    {{ $item['name'] ?? 'Food Item' }}
                                </div>

                                <div class="item-price">

                                    {{ $currency }}
                                    {{ number_format($itemPrice, 2) }}

                                    ×

                                    {{ $itemQuantity }}

                                </div>

                            </div>


                            <div class="item-total">

                                {{ $currency }}
                                {{ number_format($itemSubtotal, 2) }}

                            </div>

                        </div>

                    @endforeach


                    {{-- SUBTOTAL --}}

                    <div class="summary-row">

                        <span>
                            Subtotal
                        </span>

                        <span>

                            {{ $currency }}
                            {{ number_format($subtotal, 2) }}

                        </span>

                    </div>


                    {{-- DELIVERY CHARGE --}}

                    <div class="summary-row delivery">

                        <span>
                            Delivery Charge
                        </span>

                        <span>

                            {{ $currency }}
                            {{ number_format($deliveryCharge, 2) }}

                        </span>

                    </div>


                    {{-- GRAND TOTAL --}}

                    <div class="summary-row grand-total">

                        <span>
                            Grand Total
                        </span>

                        <span>

                            {{ $currency }}
                            {{ number_format($grandTotal, 2) }}

                        </span>

                    </div>


                    {{-- RESTAURANT INFORMATION --}}

                    <div class="payment-info" style="margin-top: 25px;">

                        <strong>
                            {{ $settings->restaurant_name ?? 'Foodie' }}
                        </strong>

                        <br>

                        📍
                        {{ $settings->restaurant_address ?? 'Dhaka, Bangladesh' }}

                        <br>

                        📞
                        {{ $settings->restaurant_phone ?? '+880 1331-574222' }}

                        <br>

                        ✉️
                        {{ $settings->restaurant_email ?? 'support@foodie.com' }}

                    </div>

                </div>

            </div>

        @endif

    </div>


    {{-- ================= FOOTER ================= --}}

    <footer>

        <div class="footer-grid">


            {{-- ABOUT --}}

            <div class="footer-column">

                <h3>
                    {{ $settings->restaurant_name ?? 'Foodie' }}
                </h3>

                <p>

                    Delicious food delivered directly
                    to your doorstep.

                    Enjoy fresh and tasty meals from

                    {{ $settings->restaurant_name ?? 'Foodie' }}.

                </p>

            </div>


            {{-- QUICK LINKS --}}

            <div class="footer-column">

                <h3>
                    Quick Links
                </h3>

                <a href="{{ url('/') }}">
                    Home
                </a>

                <a href="{{ url('/#categories') }}">
                    Categories
                </a>

                <a href="{{ url('/#foods') }}">
                    Foods
                </a>

                <a href="{{ route('cart') }}">
                    Cart
                </a>

                <a href="{{ route('contact') }}">
                    Contact
                </a>

            </div>


            {{-- CONTACT --}}

            <div class="footer-column">

                <h3>
                    Contact Us
                </h3>

                <p>
                    📍
                    {{ $settings->restaurant_address ?? 'Dhaka, Bangladesh' }}
                </p>

                <p>
                    📞
                    {{ $settings->restaurant_phone ?? '+880 1331-574222' }}
                </p>

                <p>
                    ✉️
                    {{ $settings->restaurant_email ?? 'support@foodie.com' }}
                </p>

                <p>
                    🕒
                    {{ $settings->opening_hours ?? 'Every Day: 10:00 AM - 10:00 PM' }}
                </p>

            </div>

        </div>


        <div class="footer-bottom">

            © {{ date('Y') }}

            {{ $settings->restaurant_name ?? 'Foodie' }}.

            All Rights Reserved.

        </div>

    </footer>

</body>
</html>