<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        {{ $settings->restaurant_name ?? 'SarkarFood' }}
    </title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Pacifico&display=swap"
        rel="stylesheet"
    >

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #fff;
            color: #151515;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            display: block;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {
            width: 100%;
            height: 84px;
            background: #ffffff;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 5%;

            box-shadow: 0 2px 15px rgba(0,0,0,.07);

            position: relative;
            z-index: 100;
        }


        /* LOGO */

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 58px;
            height: 58px;

            border-radius: 50%;

            background: #fff3eb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 34px;
        }

        .logo-text {
            line-height: 1;
        }

        .logo-name {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .logo-name span {
            color: #ff5a16;
        }

        .logo-tagline {
            font-size: 9px;
            color: #555;
            text-align: center;
            letter-spacing: .5px;
            margin-top: 4px;
        }


        /* NAV LINKS */

        .nav-links {
            display: flex;
            align-items: center;
            gap: 36px;
            margin-left: 30px;
        }

        .nav-links a {
            font-size: 15px;
            font-weight: 500;
            position: relative;
            padding: 30px 0;
            transition: .3s;
        }

        .nav-links a:hover {
            color: #ff5a16;
        }

        .nav-links a.active {
            color: #ff5a16;
        }

        .nav-links a.active::after {
            content: "";

            position: absolute;

            width: 42px;
            height: 3px;

            background: #ff5a16;

            bottom: 0;
            left: 50%;

            transform: translateX(-50%);

            border-radius: 5px;
        }


        /* RIGHT SIDE */

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }


        /* =====================================================
           SEARCH
        ===================================================== */

        .search-box {
            width: 280px;
            height: 42px;

            background: #f5f5f5;

            border-radius: 25px;

            display: flex;
            align-items: center;

            padding: 0 16px;

            color: #999;

            transition: .3s;
        }

        .search-box:focus-within {
            box-shadow: 0 0 0 2px rgba(255,90,22,.15);
        }

        .search-box > i {
            font-size: 15px;
            flex-shrink: 0;
        }

        .search-box input {
            width: 100%;

            border: none;
            outline: none;

            background: transparent;

            padding-left: 10px;

            font-family: inherit;
            font-size: 12px;

            color: #222;
        }

        .search-box input::placeholder {
            color: #999;
        }

        .search-submit {
            border: none;
            background: transparent;

            color: #999;

            cursor: pointer;

            padding: 5px;

            display: flex;
            align-items: center;
            justify-content: center;

            transition: .3s;
        }

        .search-submit:hover {
            color: #ff5a16;
        }


        /* SEARCH RESULT */

        .search-result {
            max-width: 1400px;

            margin: 25px auto 0;

            padding: 0 5%;

            text-align: center;

            font-size: 15px;

            color: #555;
        }

        .search-result strong {
            color: #ff5a16;
        }

        .clear-search {
            display: inline-block;

            margin-left: 8px;

            color: #ff5a16;

            font-weight: 600;
        }


        /* CART */

        .cart-btn {
            position: relative;
            font-size: 24px;
            color: #111;
        }

        .cart-count {
            position: absolute;

            top: -10px;
            right: -10px;

            width: 19px;
            height: 19px;

            border-radius: 50%;

            background: #ff5a16;
            color: white;

            font-size: 10px;
            font-weight: 700;

            display: flex;
            align-items: center;
            justify-content: center;
        }


        /* LOGIN */

        .login-btn {
            background: #ff5a16;
            color: white;

            padding: 12px 28px;

            border-radius: 8px;

            font-size: 14px;
            font-weight: 600;

            transition: .3s;
        }

        .login-btn:hover {
            background: #e84c0c;
            transform: translateY(-2px);
        }


        /* SIGN UP */

        .signup-btn {
            border: 1px solid #222;

            padding: 11px 22px;

            border-radius: 8px;

            font-size: 14px;
            font-weight: 600;

            transition: .3s;
        }

        .signup-btn:hover {
            background: #111;
            color: #fff;
        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            min-height: 425px;

            background:
                linear-gradient(
                    90deg,
                    rgba(0,0,0,.88) 0%,
                    rgba(0,0,0,.68) 40%,
                    rgba(0,0,0,.12) 75%
                ),
                url('{{ asset('images/contact-banner.png') }}');

            background-size: cover;
            background-position: center;

            display: flex;
            align-items: center;

            padding: 55px 5%;

            color: white;
        }

        .hero-content {
            max-width: 650px;
        }

        .hero-title {
            font-family: 'Pacifico', cursive;

            font-size: 54px;

            line-height: 1.15;

            font-weight: 400;

            margin-bottom: 18px;
        }

        .hero-title span {
            color: #ffad19;
        }

        .hero-description {
            font-size: 17px;
            color: #eee;

            margin-bottom: 27px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 35px;
        }

        .order-btn {
            background: #ff5a16;
            color: white;

            padding: 14px 30px;

            border-radius: 10px;

            font-size: 16px;
            font-weight: 600;

            transition: .3s;
        }

        .order-btn:hover {
            background: #ff6e2f;
            transform: translateY(-2px);
        }

        .explore-btn {
            border: 1.5px solid white;
            color: white;

            padding: 13px 28px;

            border-radius: 10px;

            font-size: 16px;
            font-weight: 500;

            transition: .3s;
        }

        .explore-btn:hover {
            background: white;
            color: #111;
        }


        /* FEATURES */

        .hero-features {
            display: flex;
            align-items: center;
            gap: 34px;

            flex-wrap: wrap;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 9px;

            font-size: 13px;
            font-weight: 500;
        }

        .feature i {
            font-size: 25px;
        }


        /* =====================================================
           CATEGORY SECTION
        ===================================================== */

        .categories-section {
            padding: 25px 5% 35px;

            background: #fffdf9;
        }

        .categories {
            display: grid;

            grid-template-columns:
                repeat(8, 1fr);

            gap: 20px;

            max-width: 1400px;

            margin: auto;
        }

        .category {
            text-align: center;
            cursor: pointer;
        }

        .category-image {
            width: 128px;
            height: 128px;

            margin: auto;

            border-radius: 50%;

            overflow: hidden;

            border: 6px solid #fff;

            box-shadow:
                0 5px 18px rgba(0,0,0,.12);

            transition: .3s;
        }

        .category-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: .4s;
        }

        .category:hover .category-image {
            transform: translateY(-7px);
        }

        .category:hover .category-image img {
            transform: scale(1.08);
        }

        .category-name {
            margin-top: 12px;

            font-size: 16px;
            font-weight: 600;
        }


        /* =====================================================
           OFFERS
        ===================================================== */

        .offers-section {
            padding: 0 5% 50px;
            background: #fffdf9;
        }

        .offers-container {
            max-width: 1450px;

            margin: auto;

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 25px;
        }

        .offer-card {
            min-height: 250px;

            border-radius: 18px;

            overflow: hidden;

            position: relative;

            background-size: cover;
            background-position: center;

            display: flex;
            align-items: center;

            padding: 35px;
        }

        /* PNG IMAGE - OFFER BURGER */

        .offer-burger {
            background-image:
                linear-gradient(
                    90deg,
                    rgba(0,0,0,.82),
                    rgba(0,0,0,.15)
                ),
                url('{{ asset('images/offer-burger.png') }}');
        }

        /* PNG IMAGE - HEALTHY FOOD */

        .offer-healthy {
            background-image:
                linear-gradient(
                    90deg,
                    rgba(246,246,229,.95),
                    rgba(246,246,229,.25)
                ),
                url('{{ asset('images/healthy-food.png') }}');
        }

        .offer-content {
            position: relative;
            z-index: 2;
        }

        .offer-small {
            font-size: 24px;

            font-family: 'Pacifico', cursive;

            color: #ff941a;

            margin-bottom: 3px;
        }

        .offer-burger .offer-content {
            color: white;
        }

        .offer-up {
            font-size: 17px;
        }

        .offer-discount {
            font-size: 43px;
            font-weight: 800;
            line-height: 1;
        }

        .offer-description {
            margin-top: 8px;
            font-size: 13px;
        }

        .offer-btn {
            display: inline-block;

            margin-top: 18px;

            background: #ff5a16;
            color: white;

            padding: 11px 25px;

            border-radius: 25px;

            font-size: 14px;
            font-weight: 600;
        }

        .healthy-title {
            font-family: 'Pacifico', cursive;

            font-size: 42px;

            line-height: 1.15;

            color: #367326;
        }

        .healthy-description {
            margin-top: 10px;

            font-size: 14px;

            color: #333;
        }

        .healthy-btn {
            display: inline-block;

            margin-top: 18px;

            background: #367326;
            color: white;

            padding: 11px 24px;

            border-radius: 25px;

            font-size: 14px;
            font-weight: 600;
        }


        /* =====================================================
           FOOD SECTION
        ===================================================== */

        .foods-section {
            padding: 70px 5%;

            background: white;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-heading h2 {
            font-size: 36px;
            font-weight: 700;
        }

        .section-heading p {
            color: #777;
            margin-top: 8px;
        }

        .foods-grid {
            max-width: 1400px;

            margin: auto;

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 25px;
        }

        .food-card {
            background: white;

            border-radius: 16px;

            overflow: hidden;

            box-shadow:
                0 5px 25px rgba(0,0,0,.08);

            transition: .3s;
        }

        .food-card:hover {
            transform: translateY(-6px);

            box-shadow:
                0 12px 35px rgba(0,0,0,.13);
        }

        .food-image {
            width: 100%;
            height: 220px;

            object-fit: cover;
        }

        .food-info {
            padding: 18px;
        }

        .food-info h3 {
            font-size: 18px;
            margin-bottom: 7px;
        }

        .food-info p {
            color: #777;
            font-size: 13px;

            min-height: 38px;
        }

        .food-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-top: 15px;
        }

        .food-price {
            color: #ff5a16;
            font-size: 19px;
            font-weight: 700;
        }

        .add-cart {
            width: 40px;
            height: 40px;

            border: none;

            background: #ff5a16;
            color: white;

            border-radius: 50%;

            cursor: pointer;

            font-size: 15px;
        }


        /* NO SEARCH RESULT */

        .no-results {
            grid-column: 1 / -1;

            text-align: center;

            padding: 60px 20px;
        }

        .no-results i {
            font-size: 55px;

            color: #ddd;

            margin-bottom: 15px;
        }

        .no-results h3 {
            font-size: 22px;

            margin-bottom: 8px;
        }

        .no-results p {
            color: #777;

            margin-bottom: 18px;
        }

        .clear-btn {
            display: inline-block;

            background: #ff5a16;

            color: white;

            padding: 10px 22px;

            border-radius: 8px;

            font-size: 14px;

            font-weight: 600;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        footer {
            background: #111;
            color: white;

            padding: 50px 5% 25px;
        }

        .footer-grid {
            max-width: 1400px;

            margin: auto;

            display: grid;

            grid-template-columns:
                2fr 1fr 1fr 1.5fr;

            gap: 40px;
        }

        .footer-logo {
            font-size: 27px;
            font-weight: 800;
        }

        .footer-logo span {
            color: #ff5a16;
        }

        .footer-description {
            color: #aaa;

            font-size: 13px;

            line-height: 1.8;

            margin-top: 15px;

            max-width: 400px;
        }

        .footer-title {
            font-size: 17px;
            margin-bottom: 18px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #aaa;
            font-size: 13px;
        }

        .footer-links a:hover {
            color: #ff5a16;
        }

        .copyright {
            text-align: center;

            color: #777;

            font-size: 12px;

            border-top: 1px solid #333;

            margin-top: 35px;

            padding-top: 20px;
        }


        /* =====================================================
           MOBILE MENU
        ===================================================== */

        .mobile-menu {
            display: none;

            font-size: 24px;

            cursor: pointer;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1200px) {

            .search-box {
                width: 200px;
            }

            .nav-links {
                gap: 22px;
            }

            .categories {
                grid-template-columns:
                    repeat(4, 1fr);
            }

            .foods-grid {
                grid-template-columns:
                    repeat(3, 1fr);
            }
        }


        @media (max-width: 900px) {

            .navbar {
                height: 70px;
            }

            .nav-links {
                display: none;
            }

            .nav-right {
                display: none;
            }

            .mobile-menu {
                display: block;
            }

            .hero {
                min-height: 500px;
            }

            .hero-title {
                font-size: 43px;
            }

            .offers-container {
                grid-template-columns: 1fr;
            }

            .foods-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }
        }


        @media (max-width: 600px) {

            .navbar {
                padding: 0 20px;
            }

            .logo-icon {
                width: 45px;
                height: 45px;
                font-size: 25px;
            }

            .logo-name {
                font-size: 21px;
            }

            .logo-tagline {
                font-size: 7px;
            }

            .hero {
                padding: 50px 25px;
            }

            .hero-title {
                font-size: 36px;
            }

            .hero-description {
                font-size: 14px;
            }

            .hero-buttons {
                flex-direction: column;

                align-items: flex-start;
            }

            .hero-features {
                gap: 15px;
            }

            .feature {
                font-size: 11px;
            }

            .categories {
                grid-template-columns:
                    repeat(2, 1fr);

                gap: 25px 10px;
            }

            .category-image {
                width: 110px;
                height: 110px;
            }

            .offers-section {
                padding-left: 20px;
                padding-right: 20px;
            }

            .offer-card {
                min-height: 280px;
                padding: 25px;
            }

            .offer-discount {
                font-size: 34px;
            }

            .healthy-title {
                font-size: 34px;
            }

            .foods-section {
                padding: 50px 20px;
            }

            .foods-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }

    </style>

</head>


<body>


<!-- =========================================================
     NAVBAR
========================================================= -->

<header class="navbar">


    <!-- LOGO -->

    <a href="{{ route('home') }}" class="logo">

        <div class="logo-icon">
            🍴
        </div>

        <div class="logo-text">

            <div class="logo-name">
                Sarkar<span>Food</span>
            </div>

            <div class="logo-tagline">
                Good Food &nbsp; Better Mood
            </div>

        </div>

    </a>


    <!-- NAVIGATION -->

    <nav class="nav-links">

        <a
            href="{{ route('home') }}"
            class="active"
        >
            Home
        </a>

        <a href="#menu">
            Menu
        </a>

        <a href="{{ route('about') }}">
            About
        </a>

        <a href="#offers">
            Offers
        </a>

        <a href="{{ route('contact') }}">
            Contact
        </a>

    </nav>


    <!-- RIGHT -->

    <div class="nav-right">


        <!-- SEARCH FORM -->

        <form
            action="{{ route('home') }}"
            method="GET"
            class="search-box"
        >

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search for your favorite food..."
                autocomplete="off"
            >

            <button
                type="submit"
                class="search-submit"
                aria-label="Search"
            >

                <i class="fa-solid fa-magnifying-glass"></i>

            </button>

        </form>


        <!-- CART -->

        <a
            href="{{ route('cart') }}"
            class="cart-btn"
        >

            <i class="fa-solid fa-cart-shopping"></i>


            @php

                $cartCount = 0;

                foreach (
                    session()->get('cart', [])
                    as $item
                ) {

                    $cartCount += $item['quantity'];

                }

            @endphp


            @if($cartCount > 0)

                <span class="cart-count">
                    {{ $cartCount }}
                </span>

            @endif

        </a>


        <!-- AUTH -->

        @auth

            @if(auth()->user()->role === 'admin')

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="login-btn"
                >
                    Dashboard
                </a>

            @else

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    style="display:inline;"
                >

                    @csrf

                    <button
                        type="submit"
                        class="login-btn"
                        style="
                            border:none;
                            cursor:pointer;
                        "
                    >
                        Logout
                    </button>

                </form>

            @endif

        @else

            <a
                href="{{ route('login') }}"
                class="login-btn"
            >
                Login
            </a>

            <a
                href="{{ route('register') }}"
                class="signup-btn"
            >
                Sign Up
            </a>

        @endauth

    </div>


    <!-- MOBILE -->

    <div class="mobile-menu">

        <i class="fa-solid fa-bars"></i>

    </div>

</header>



<!-- =========================================================
     SEARCH RESULT MESSAGE
========================================================= -->

@if(request('search'))

    <div class="search-result">

        Search results for:

        <strong>
            "{{ request('search') }}"
        </strong>

        <a
            href="{{ route('home') }}"
            class="clear-search"
        >
            ✕ Clear Search
        </a>

    </div>

@endif



<!-- =========================================================
     HERO
========================================================= -->

<section class="hero">

    <div class="hero-content">

        <h1 class="hero-title">

            Delicious Food

            <br>

            for a

            <span>
                Happier You!
            </span>

        </h1>


        <p class="hero-description">

            Fresh ingredients.
            Great taste.
            Delivered to your doorstep.

        </p>


        <div class="hero-buttons">

            <a
                href="#menu"
                class="order-btn"
            >

                Order Now

                <i class="fa-solid fa-arrow-right"></i>

            </a>


            <a
                href="#menu"
                class="explore-btn"
            >

                Explore Menu

            </a>

        </div>


        <!-- FEATURES -->

        <div class="hero-features">

            <div class="feature">

                <i class="fa-solid fa-truck"></i>

                <span>
                    Fast Delivery
                </span>

            </div>


            <div class="feature">

                <i class="fa-solid fa-leaf"></i>

                <span>
                    Fresh Ingredients
                </span>

            </div>


            <div class="feature">

                <i class="fa-solid fa-award"></i>

                <span>
                    Best Quality
                </span>

            </div>


            <div class="feature">

                <i class="fa-regular fa-heart"></i>

                <span>
                    100% Satisfaction
                </span>

            </div>

        </div>

    </div>

</section>



<!-- =========================================================
     CATEGORIES
========================================================= -->

<section
    class="categories-section"
    id="categories"
>

    <div class="categories">

        @forelse($categories as $category)

            @php

                $categoryImage = \App\Models\Food::where(
                    'category_id',
                    $category->id
                )->whereNotNull('image')->value('image');

            @endphp

            <a
                href="{{ route('home', ['category' => $category->name]) }}"
                class="category"
            >

                <div class="category-image">

                   @php
    $categoryImages = [
        'Burger' => 'burger.png',
        'Chicken' => 'chicken.png',
        'Dessert' => 'dessert.png',
        'Drinks' => 'drinks.png',
        'Pasta' => 'pasta.png',
        'Pizza' => 'pizza.png',
    ];

    $categoryImageFile = $categoryImages[$category->name] ?? 'burger.png';
@endphp

<img
    src="{{ asset('images/home/' . $categoryImageFile) }}"
    alt="{{ $category->name }}"
>

                </div>

                <div class="category-name">
                    {{ $category->name }}
                </div>

            </a>

        @empty

            <div style="
                grid-column: 1 / -1;
                text-align: center;
                padding: 20px;
                color: #777;
            ">
                No categories available.
            </div>

        @endforelse

    </div>

</section>



<!-- =========================================================
     OFFERS
========================================================= -->

<section
    class="offers-section"
    id="offers"
>

    <div class="offers-container">


        <!-- SPECIAL OFFER -->

        <div class="offer-card offer-burger">

            <div class="offer-content">

                <div class="offer-small">
                    Special Offer
                </div>

                <div class="offer-up">
                    UP TO
                </div>

                <div class="offer-discount">
                    50% OFF
                </div>

                <div class="offer-description">
                    On Selected Items
                </div>

                <a
                    href="#menu"
                    class="offer-btn"
                >
                    Order Now
                </a>

            </div>

        </div>


        <!-- HEALTHY -->

        <div class="offer-card offer-healthy">

            <div class="offer-content">

                <div class="healthy-title">

                    Eat Healthy

                    <br>

                    Live Better

                </div>

                <div class="healthy-description">

                    Nutritious meals for a better you.

                </div>

                <a
                    href="#menu"
                    class="healthy-btn"
                >
                    Explore Healthy Menu
                </a>

            </div>

        </div>


    </div>

</section>



<!-- =========================================================
     FOOD MENU
========================================================= -->

<section
    class="foods-section"
    id="menu"
>

    <div class="section-heading">

        @if(request('search'))

            <h2>
                Search Results
            </h2>

            <p>

                Showing foods matching

                <strong>
                    "{{ request('search') }}"
                </strong>

            </p>

        @else

            <h2>
                Popular Foods
            </h2>

            <p>
                Delicious food made fresh for you
            </p>

        @endif

    </div>


    <div class="foods-grid">


        @forelse($foods as $food)

            <div class="food-card">


                @if($food->image)

                    <img
                        src="{{ asset('storage/' . $food->image) }}"
                        alt="{{ $food->name }}"
                        class="food-image"
                    >

                @else

                    <img
                        src="{{ asset('images/home/burger.jpg') }}"
                        alt="{{ $food->name }}"
                        class="food-image"
                    >

                @endif


                <div class="food-info">

                    <h3>
                        {{ $food->name }}
                    </h3>

                    <p>
                        {{ $food->description }}
                    </p>


                    <div class="food-bottom">

                        <div class="food-price">

                            {{ $settings->currency ?? '৳' }}

                            {{ number_format($food->price, 2) }}

                        </div>


                        <form
                            action="{{ route('cart.add', $food->id) }}"
                            method="POST"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="add-cart"
                                title="Add to cart"
                            >

                                <i class="fa-solid fa-cart-plus"></i>

                            </button>

                        </form>

                    </div>

                </div>

            </div>


        @empty


            <!-- NO RESULTS -->

            <div class="no-results">

                <i class="fa-solid fa-face-frown"></i>

                <h3>
                    No Food Found
                </h3>

                @if(request('search'))

                    <p>

                        Sorry, we couldn't find any food
                        matching

                        <strong>
                            "{{ request('search') }}"
                        </strong>

                    </p>

                    <a
                        href="{{ route('home') }}"
                        class="clear-btn"
                    >
                        View All Foods
                    </a>

                @else

                    <p>
                        No foods available right now.
                    </p>

                @endif

            </div>


        @endforelse


    </div>

</section>



<!-- =========================================================
     FOOTER
========================================================= -->

<footer>

    <div class="footer-grid">


        <!-- ABOUT -->

        <div>

            <div class="footer-logo">

                Sarkar<span>Food</span>

            </div>

            <p class="footer-description">

                Delicious food made with fresh ingredients
                and delivered straight to your doorstep.

            </p>

        </div>


        <!-- QUICK LINKS -->

        <div>

            <h3 class="footer-title">
                Quick Links
            </h3>

            <ul class="footer-links">

                <li>

                    <a href="{{ route('home') }}">
                        Home
                    </a>

                </li>

                <li>

                    <a href="#menu">
                        Menu
                    </a>

                </li>

                <li>

                    <a href="{{ route('about') }}">
                        About
                    </a>

                </li>

                <li>

                    <a href="#offers">
                        Offers
                    </a>

                </li>

            </ul>

        </div>


        <!-- HELP -->

        <div>

            <h3 class="footer-title">
                Help
            </h3>

            <ul class="footer-links">

                <li>

                    <a href="{{ route('contact') }}">
                        Contact
                    </a>

                </li>

                <li>

                    <a href="{{ route('cart') }}">
                        Cart
                    </a>

                </li>

                <li>

                    <a href="{{ route('login') }}">
                        Login
                    </a>

                </li>

                <li>

                    <a href="{{ route('register') }}">
                        Sign Up
                    </a>

                </li>

            </ul>

        </div>


        <!-- CONTACT -->

        <div>

            <h3 class="footer-title">
                Contact Us
            </h3>

            <ul class="footer-links">

                <li>

                    <i class="fa-solid fa-phone"></i>

                    {{ $settings->restaurant_phone ?? '+880 1331-574222' }}

                </li>

                <li>

                    <i class="fa-solid fa-envelope"></i>

                    {{ $settings->restaurant_email ?? 'support@sarkarfood.com' }}

                </li>

                <li>

                    <i class="fa-solid fa-location-dot"></i>

                    {{ $settings->restaurant_address ?? 'Dhaka, Bangladesh' }}

                </li>

            </ul>

        </div>


    </div>


    <div class="copyright">

        © {{ date('Y') }}

        {{ $settings->restaurant_name ?? 'SarkarFood' }}.

        All Rights Reserved.

    </div>

</footer>


</body>

</html>