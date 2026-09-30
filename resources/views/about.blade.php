<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        About Us - {{ $settings->restaurant_name ?? 'SarkarFood' }}
    </title>


    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet"
    >


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family: 'DM Sans', sans-serif;

            background: #fff;

            color: #171717;

        }


        a {

            text-decoration: none;

            color: inherit;

        }


        /* ================= NAVBAR ================= */

        .navbar {

            width: 100%;

            height: 84px;

            background: #fff;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 5%;

            border-bottom: 1px solid #eee;

            position: sticky;

            top: 0;

            z-index: 1000;

        }


        /* ================= LOGO ================= */

        .logo {

            display: flex;

            align-items: center;

            gap: 10px;

        }


        .logo-icon {

            font-size: 42px;

        }


        .logo-text {

            font-size: 29px;

            font-weight: 700;

            letter-spacing: -1px;

        }


        .logo-text span {

            color: #ff5a1f;

        }


        .tagline {

            font-size: 10px;

            color: #777;

            margin-top: -5px;

            letter-spacing: 1px;

        }


        /* ================= NAV LINKS ================= */

        .nav-links {

            display: flex;

            align-items: center;

            gap: 38px;

        }


        .nav-links a {

            font-size: 16px;

            font-weight: 500;

            transition: 0.3s;

            position: relative;

        }


        .nav-links a:hover {

            color: #ff5a1f;

        }


        .nav-links a.active {

            color: #ff5a1f;

        }


        .nav-links a.active::after {

            content: "";

            position: absolute;

            left: 0;

            bottom: -28px;

            width: 100%;

            height: 3px;

            background: #ff5a1f;

            border-radius: 5px;

        }


        /* ================= NAV RIGHT ================= */

        .nav-right {

            display: flex;

            align-items: center;

            gap: 20px;

        }


        /* ================= CART ================= */

        .cart {

            font-size: 27px;

            position: relative;

            cursor: pointer;

        }


        .cart-count {

            position: absolute;

            top: -8px;

            right: -9px;

            width: 19px;

            height: 19px;

            background: #ff5a1f;

            color: white;

            border-radius: 50%;

            font-size: 11px;

            display: flex;

            justify-content: center;

            align-items: center;

        }


        /* ================= LOGIN ================= */

        .login-btn {

            background: #ff5a1f;

            color: white;

            padding: 12px 28px;

            border-radius: 8px;

            font-weight: 600;

        }


        .signup-btn {

            border: 1px solid #222;

            padding: 11px 24px;

            border-radius: 8px;

            font-weight: 600;

        }


        .login-btn:hover {

            background: #e94810;

        }


        /* ================= MOBILE MENU ================= */

        .mobile-menu {

            display: none;

            border: none;

            background: transparent;

            font-size: 26px;

            cursor: pointer;

            color: #171717;

        }


        /* ================= HERO ================= */

        .about-hero {

            min-height: 560px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 70px 7%;

            background: #fff8f3;

            gap: 50px;

        }


        .hero-content {

            width: 48%;

        }


        .small-title {

            color: #ff5a1f;

            font-size: 17px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 2px;

            margin-bottom: 18px;

        }


        .hero-content h1 {

            font-family: 'Playfair Display', serif;

            font-size: 62px;

            line-height: 1.1;

            margin-bottom: 25px;

        }


        .hero-content h1 span {

            color: #ff5a1f;

        }


        .hero-content p {

            font-size: 18px;

            color: #666;

            line-height: 1.8;

            max-width: 600px;

        }


        .hero-buttons {

            margin-top: 32px;

            display: flex;

            gap: 15px;

        }


        .primary-btn {

            background: #ff5a1f;

            color: #fff;

            padding: 14px 30px;

            border-radius: 8px;

            font-weight: 600;

        }


        .secondary-btn {

            border: 1px solid #222;

            padding: 13px 30px;

            border-radius: 8px;

            font-weight: 600;

        }


        /* ================= HERO IMAGE ================= */

        .hero-image {

            width: 48%;

            display: flex;

            justify-content: center;

        }


        .hero-image img {

            width: 100%;

            max-width: 650px;

            height: 430px;

            object-fit: cover;

            border-radius: 25px;

            box-shadow: 0 20px 50px rgba(0,0,0,0.15);

        }


        /* ================= STORY ================= */

        .story-section {

            padding: 90px 7%;

            display: flex;

            align-items: center;

            gap: 70px;

        }


        .story-image {

            width: 48%;

        }


        .story-image img {

            width: 100%;

            height: 450px;

            object-fit: cover;

            border-radius: 22px;

        }


        .story-content {

            width: 52%;

        }


        .story-content .title {

            color: #ff5a1f;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 2px;

            margin-bottom: 12px;

        }


        .story-content h2 {

            font-family: 'Playfair Display', serif;

            font-size: 46px;

            margin-bottom: 22px;

        }


        .story-content p {

            color: #666;

            line-height: 1.8;

            font-size: 17px;

            margin-bottom: 18px;

        }


        /* ================= FEATURES ================= */

        .features-section {

            background: #fff8f3;

            padding: 80px 7%;

            text-align: center;

        }


        .features-section h2 {

            font-family: 'Playfair Display', serif;

            font-size: 42px;

            margin-bottom: 12px;

        }


        .section-subtitle {

            color: #777;

            margin-bottom: 50px;

            font-size: 17px;

        }


        .feature-grid {

            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 25px;

        }


        .feature-card {

            background: #fff;

            padding: 35px 25px;

            border-radius: 18px;

            transition: 0.3s;

            box-shadow: 0 8px 25px rgba(0,0,0,0.05);

        }


        .feature-card:hover {

            transform: translateY(-7px);

            box-shadow: 0 15px 35px rgba(0,0,0,0.1);

        }


        .feature-icon {

            width: 65px;

            height: 65px;

            margin: 0 auto 20px;

            background: #fff0e9;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 30px;

        }


        .feature-card h3 {

            font-size: 20px;

            margin-bottom: 12px;

        }


        .feature-card p {

            color: #777;

            line-height: 1.6;

            font-size: 14px;

        }


        /* ================= MISSION ================= */

        .mission {

            padding: 90px 7%;

            text-align: center;

        }


        .mission h2 {

            font-family: 'Playfair Display', serif;

            font-size: 45px;

            margin-bottom: 20px;

        }


        .mission p {

            max-width: 850px;

            margin: auto;

            color: #666;

            line-height: 1.9;

            font-size: 17px;

        }


        .mission-highlight {

            margin-top: 35px;

            display: inline-block;

            color: #ff5a1f;

            font-size: 24px;

            font-weight: 700;

        }


        /* ================= FOOTER ================= */

        footer {

            background: #151515;

            color: white;

            padding: 60px 7% 25px;

        }


        .footer-grid {

            display: grid;

            grid-template-columns: 2fr 1fr 1fr 1.5fr;

            gap: 50px;

            padding-bottom: 45px;

        }


        .footer-logo {

            font-size: 28px;

            font-weight: 700;

            margin-bottom: 15px;

        }


        .footer-about {

            color: #aaa;

            line-height: 1.7;

            max-width: 350px;

        }


        footer h3 {

            margin-bottom: 18px;

            font-size: 18px;

        }


        footer ul {

            list-style: none;

        }


        footer li {

            margin-bottom: 12px;

            color: #aaa;

        }


        footer li a:hover {

            color: #ff5a1f;

        }


        .footer-bottom {

            border-top: 1px solid #333;

            padding-top: 22px;

            text-align: center;

            color: #888;

            font-size: 14px;

        }


        /* ================= RESPONSIVE ================= */

        @media (max-width: 1000px) {

            .nav-links {

                gap: 18px;

            }


            .about-hero {

                flex-direction: column;

                text-align: center;

            }


            .hero-content,
            .hero-image {

                width: 100%;

            }


            .hero-buttons {

                justify-content: center;

            }


            .story-section {

                flex-direction: column;

            }


            .story-image,
            .story-content {

                width: 100%;

            }


            .feature-grid {

                grid-template-columns: repeat(2, 1fr);

            }


            .footer-grid {

                grid-template-columns: repeat(2, 1fr);

            }

        }


        @media (max-width: 700px) {

            .navbar {

                height: 70px;

                padding: 0 5%;

                flex-wrap: nowrap;

            }


            /* Hide desktop nav */

            .nav-links {

                display: none;

                position: absolute;

                top: 70px;

                left: 0;

                width: 100%;

                background: white;

                flex-direction: column;

                align-items: stretch;

                gap: 0;

                padding: 10px 20px;

                box-shadow: 0 8px 20px rgba(0,0,0,0.12);

                z-index: 999;

            }


            /* Open mobile nav */

            .nav-links.mobile-open {

                display: flex;

            }


            .nav-links a {

                padding: 14px 10px;

                border-bottom: 1px solid #eee;

                font-size: 15px;

            }


            .nav-links a.active::after {

                display: none;

            }


            .nav-right {

                display: none;

            }


            /* Show hamburger */

            .mobile-menu {

                display: flex;

                align-items: center;

                justify-content: center;

                width: 42px;

                height: 42px;

                margin-left: auto;

            }


            .logo-text {

                font-size: 22px;

            }


            .logo-icon {

                font-size: 32px;

            }


            .hero-content h1 {

                font-size: 43px;

            }


            .hero-image img {

                height: 300px;

            }


            .story-content h2,
            .features-section h2,
            .mission h2 {

                font-size: 34px;

            }


            .feature-grid {

                grid-template-columns: 1fr;

            }


            .footer-grid {

                grid-template-columns: 1fr;

            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     NAVBAR
===================================================== -->

<header class="navbar">


    <!-- LOGO -->

    <a
        href="{{ route('home') }}"
        class="logo"
    >

        <div class="logo-icon">
            🍴
        </div>


        <div>

            <div class="logo-text">

                {{ $settings->restaurant_name ?? 'SarkarFood' }}<span>Food</span>

            </div>


            <div class="tagline">

                Good Food &nbsp; Better Mood

            </div>

        </div>

    </a>


    <!-- NAVIGATION -->

    <nav class="nav-links" id="navLinks">


        <a href="{{ route('home') }}">

            Home

        </a>


        <a href="{{ route('home') }}#menu">

            Menu

        </a>


        <a
            href="{{ route('about') }}"
            class="active"
        >

            About

        </a>


        <a href="{{ route('home') }}#offers">

            Offers

        </a>


        <a href="{{ route('contact') }}">

            Contact

        </a>


    </nav>


    <!-- RIGHT SIDE -->

    <div class="nav-right">


        <!-- CART -->

        <a
            href="{{ route('cart') }}"
            class="cart"
        >

            🛒


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

        @guest

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

        @else


            @if(auth()->user()->role === 'admin')

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="login-btn"
                >

                    Dashboard

                </a>

            @endif


            <form
                action="{{ route('logout') }}"
                method="POST"
                style="display:inline;"
            >

                @csrf


                <button
                    type="submit"
                    class="signup-btn"
                    style="
                        background:white;
                        cursor:pointer;
                    "
                >

                    Logout

                </button>

            </form>

        @endguest

    </div>


    <!-- MOBILE MENU BUTTON -->

    <button
        type="button"
        class="mobile-menu"
        id="mobileMenuBtn"
        aria-label="Open menu"
    >

        <i class="fa-solid fa-bars"></i>

    </button>


</header>



<!-- =====================================================
     HERO
===================================================== -->

<section class="about-hero">


    <div class="hero-content">


        <div class="small-title">

            About


        </div>


        <h1>

            Good Food,

            <span>
                Better Mood.
            </span>

        </h1>


        <p>

            Welcome to
            {{ $settings->restaurant_name ?? 'SarkarFood' }},
            your trusted destination for delicious food,
            fresh ingredients and fast delivery.
            We believe that great food can make every moment
            a little happier.

        </p>


        <div class="hero-buttons">


            <a
                href="{{ route('home') }}"
                class="primary-btn"
            >

                Explore Menu →

            </a>


            <a
                href="{{ route('contact') }}"
                class="secondary-btn"
            >

                Contact Us

            </a>


        </div>


    </div>


    <div class="hero-image">

        <img
            src="{{ asset('images/about-food.png') }}"
            alt="Delicious Food"
        >

    </div>


</section>



<!-- =====================================================
     OUR STORY
===================================================== -->

<section class="story-section">


    <div class="story-image">

        <img
            src="{{ asset('images/about-story.png') }}"
            alt="Our Food"
        >

    </div>


    <div class="story-content">


        <div class="title">

            Our Story

        </div>


        <h2>

            Made With Love,

            <br>

            Served With Care

        </h2>


        <p>

            {{ $settings->restaurant_name ?? 'SarkarFood' }}
            started with a simple idea —
            make delicious and quality food easily available
            to everyone.

        </p>


        <p>

            From carefully selected ingredients to hygienic
            preparation and reliable delivery, every step of
            our process is designed to give our customers
            the best possible experience.

        </p>


        <p>

            Whether you're enjoying a quick lunch, ordering
            dinner with family or celebrating a special moment,
            {{ $settings->restaurant_name ?? 'SarkarFood' }}
            is here to make your meal memorable.

        </p>


    </div>


</section>



<!-- =====================================================
     WHY CHOOSE US
===================================================== -->

<section class="features-section">


    <h2>

        Why Choose
        {{ $settings->restaurant_name ?? 'SarkarFood' }}?

    </h2>


    <p class="section-subtitle">

        Everything we do is focused on making your food experience better.

    </p>


    <div class="feature-grid">


        <!-- CARD 1 -->

        <div class="feature-card">

            <div class="feature-icon">
                🚚
            </div>


            <h3>

                Fast Delivery

            </h3>


            <p>

                Get your favorite meals delivered
                quickly and safely to your doorstep.

            </p>

        </div>


        <!-- CARD 2 -->

        <div class="feature-card">

            <div class="feature-icon">
                🥗
            </div>


            <h3>

                Fresh Ingredients

            </h3>


            <p>

                We care about quality and use fresh
                ingredients to prepare every meal.

            </p>

        </div>


        <!-- CARD 3 -->

        <div class="feature-card">

            <div class="feature-icon">
                ⭐
            </div>


            <h3>

                Best Quality

            </h3>


            <p>

                Delicious taste, proper hygiene and
                consistent quality in every order.

            </p>

        </div>


        <!-- CARD 4 -->

        <div class="feature-card">

            <div class="feature-icon">
                ❤️
            </div>


            <h3>

                Customer Love

            </h3>


            <p>

                Your satisfaction is our priority.
                We always try to serve you better.

            </p>

        </div>


    </div>


</section>



<!-- =====================================================
     MISSION
===================================================== -->

<section class="mission">


    <h2>

        Our Mission

    </h2>


    <p>

        Our mission is to bring restaurant-quality food
        closer to your home while making the ordering
        experience simple, fast and enjoyable.
        We want
        {{ $settings->restaurant_name ?? 'SarkarFood' }}
        to become a place where delicious food and happy
        moments come together.

    </p>


    <div class="mission-highlight">

        Good Food • Better Mood • Happier Life

    </div>


</section>



<!-- =====================================================
     FOOTER
===================================================== -->

<footer>


    <div class="footer-grid">


        <!-- ABOUT -->

        <div>


            <div class="footer-logo">

                                {{ $settings->restaurant_name ?? 'SarkarFood' }}<span>Food</span>


            </div>


            <p class="footer-about">

                Delicious food made with fresh ingredients,
                delivered with care.
                Good Food, Better Mood.

            </p>


        </div>



        <!-- QUICK LINKS -->

        <div>


            <h3>

                Quick Links

            </h3>


            <ul>


                <li>

                    <a href="{{ route('home') }}">

                        Home

                    </a>

                </li>


                <li>

                    <a href="{{ route('about') }}">

                        About

                    </a>

                </li>


                <li>

                    <a href="{{ route('cart') }}">

                        Cart

                    </a>

                </li>


                <li>

                    <a href="{{ route('contact') }}">

                        Contact

                    </a>

                </li>


            </ul>


        </div>



        <!-- SERVICES -->

        <div>


            <h3>

                Services

            </h3>


            <ul>


                <li>

                    Fast Delivery

                </li>


                <li>

                    Fresh Food

                </li>


                <li>

                    Online Ordering

                </li>


                <li>

                    Quality Service

                </li>


            </ul>


        </div>



        <!-- CONTACT -->

        <div>


            <h3>

                Contact

            </h3>


            <ul>


                <li>

                    📍
                    {{ $settings->restaurant_address ?? 'Dhaka, Bangladesh' }}

                </li>


                <li>

                    📞
                    {{ $settings->restaurant_phone ?? '+880 1331-574222' }}

                </li>


                <li>

                    ✉️
                    {{ $settings->restaurant_email ?? 'support@sarkarfood.com' }}

                </li>


            </ul>


        </div>


    </div>



    <!-- COPYRIGHT -->

    <div class="footer-bottom">

        © {{ date('Y') }}

        {{ $settings->restaurant_name ?? 'SarkarFood' }}.<span>Food</span>

        All Rights Reserved.

    </div>


</footer>



<!-- =====================================================
     MOBILE MENU JAVASCRIPT
===================================================== -->

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        const mobileMenuBtn =
            document.getElementById(
                'mobileMenuBtn'
            );


        const navLinks =
            document.getElementById(
                'navLinks'
            );


        if (
            mobileMenuBtn &&
            navLinks
        ) {


            mobileMenuBtn.addEventListener(
                'click',
                function () {


                    navLinks.classList.toggle(
                        'mobile-open'
                    );


                    const icon =
                        mobileMenuBtn.querySelector(
                            'i'
                        );


                    if (
                        navLinks.classList.contains(
                            'mobile-open'
                        )
                    ) {


                        icon.classList.remove(
                            'fa-bars'
                        );


                        icon.classList.add(
                            'fa-xmark'
                        );


                    } else {


                        icon.classList.remove(
                            'fa-xmark'
                        );


                        icon.classList.add(
                            'fa-bars'
                        );

                    }

                }
            );


            /* Menu click করলে mobile menu বন্ধ হবে */

            navLinks
                .querySelectorAll('a')
                .forEach(function (link) {


                    link.addEventListener(
                        'click',
                        function () {


                            navLinks.classList.remove(
                                'mobile-open'
                            );


                            const icon =
                                mobileMenuBtn.querySelector(
                                    'i'
                                );


                            icon.classList.remove(
                                'fa-xmark'
                            );


                            icon.classList.add(
                                'fa-bars'
                            );

                        }
                    );

                });

        }

    }

);

</script>


</body>

</html>