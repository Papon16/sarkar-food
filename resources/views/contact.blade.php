<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Contact Us -
        {{ $settings->restaurant_name ?? 'SarkarFood' }}
    </title>

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

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #fafafa;
            color: #172238;
            line-height: 1.5;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* NAVBAR */

        .navbar {
            height: 72px;
            background: #fff;
            border-bottom: 1px solid #eee;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 8%;

            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 43px;
            height: 43px;

            border-radius: 50%;

            background: #fff0e8;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #ff5a1f;
            font-size: 22px;
        }

        .logo-text {
            font-size: 25px;
            font-weight: 800;
        }

        .tagline {
            display: block;
            color: #777;
            font-size: 9px;
            font-weight: 500;
            margin-top: -3px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 34px;

            font-size: 14px;
            font-weight: 600;
        }

        .nav-links a {
            padding: 25px 0 22px;
            position: relative;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #ff5a1f;
        }

        .nav-links a.active:after {
            content: "";

            position: absolute;

            bottom: 0;
            left: 0;
            right: 0;

            height: 2px;

            background: #ff5a1f;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .nav-icon {
            font-size: 18px;
            cursor: pointer;
        }

        .cart {
            position: relative;
        }

        .cart-count {
            position: absolute;

            top: -10px;
            right: -9px;

            width: 17px;
            height: 17px;

            border-radius: 50%;

            background: #ff5a1f;
            color: #fff;

            font-size: 9px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .order-btn {
            background: #ff5a1f;
            color: #fff;

            padding: 11px 20px;

            border-radius: 8px;

            font-size: 13px;
            font-weight: 700;
        }

        .mobile-menu {
            display: none;

            border: 0;
            background: transparent;

            font-size: 24px;
            cursor: pointer;
        }

        /* HERO */

        .hero {
            min-height: 245px;

            position: relative;
            overflow: hidden;

            display: flex;
            align-items: center;

            background:
                linear-gradient(
                    90deg,
                    rgba(0,0,0,.88),
                    rgba(0,0,0,.55),
                    rgba(0,0,0,.15)
                ),
                url('{{ asset('images/contact-hero.png') }}')
                center/cover;
        }

        .hero-content {
            width: 84%;
            max-width: 1250px;

            margin: auto;

            color: #fff;
        }

        .breadcrumb {
            font-size: 14px;
            margin-bottom: 15px;
            color: #eee;
        }

        .breadcrumb span {
            margin: 0 9px;
            color: #ccc;
        }

        .hero h1 {
            font-size: 48px;
            line-height: 1.1;
            margin-bottom: 10px;
        }

        .hero p {
            max-width: 650px;
            color: #eee;
            font-size: 16px;
        }

        /* CONTAINER */

        .container {
            width: 84%;
            max-width: 1250px;
            margin: auto;
        }

        /* INFO */

        .info-grid {
            display: grid;
            grid-template-columns: repeat(4,1fr);
            gap: 14px;
            margin-top: 18px;
        }

        .info-card {
            background: #fff;
            border: 1px solid #e7e7e7;
            border-radius: 9px;

            padding: 18px;

            display: flex;
            gap: 14px;

            align-items: flex-start;

            min-height: 112px;

            box-shadow:
                0 3px 12px rgba(0,0,0,.035);
        }

        .info-icon {
            width: 43px;
            height: 43px;
            min-width: 43px;

            border-radius: 8px;

            background: #ff5a1f;
            color: #fff;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 18px;
        }

        .info-card h3 {
            font-size: 15px;
            margin-bottom: 5px;
        }

        .info-card p {
            font-size: 14px;
            color: #26344a;
            word-break: break-word;
        }

        .info-card small {
            display: block;
            color: #7d8795;
            font-size: 11px;
            margin-top: 3px;
        }

        /* MAIN */

        .main-grid {
            display: grid;
            grid-template-columns: 1.08fr 1fr;
            gap: 18px;
            margin: 18px 0 25px;
        }

        .card {
            background: #fff;
            border: 1px solid #e5e8ed;
            border-radius: 9px;

            box-shadow:
                0 3px 12px rgba(0,0,0,.035);
        }

        .message-card {
            padding: 22px 25px;
        }

        .message-card h2 {
            font-size: 21px;
            margin-bottom: 2px;
        }

        .subtitle {
            color: #788393;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .field {
            margin-bottom: 13px;
        }

        .field label {
            display: block;

            font-size: 12px;
            font-weight: 700;

            margin-bottom: 6px;
        }

        .field input,
        .field textarea {
            width: 100%;

            border: 1px solid #d9dfe7;
            border-radius: 6px;

            padding: 11px 12px;

            font-size: 13px;
            outline: none;

            font-family: inherit;
        }

        .field textarea {
            min-height: 105px;
            resize: vertical;
        }

        .send-btn {
            width: 100%;

            border: 0;

            background: #ff5a1f;
            color: #fff;

            padding: 12px;

            border-radius: 6px;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;
        }

        .error {
            color: #dc2626;
            font-size: 11px;
            margin-top: 4px;
        }

        .success {
            background: #e9f8ef;
            border: 1px solid #bce9cc;

            color: #16733b;

            padding: 12px 14px;

            border-radius: 7px;

            margin-bottom: 15px;

            font-size: 13px;
        }

        /* MAP */

        .map-card {
            overflow: hidden;
            min-height: 390px;
        }

        .map {
            width: 100%;
            height: 245px;

            background: #e9edf0;

            overflow: hidden;
        }

        .map iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .map-info {
            padding: 16px;
        }

        .map-info h3 {
            font-size: 17px;
            margin-bottom: 4px;
        }

        .map-info p {
            color: #6d7785;
            font-size: 12px;
        }

        /* BOTTOM */

        .bottom-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 14px;

            margin-bottom: 25px;
        }

        .bottom-card {
            border-radius: 9px;

            padding: 18px 20px;

            border: 1px solid #f0d9d4;

            background: #fff3f0;
        }

        .bottom-card.green {
            background: #eefaf3;
            border-color: #d7efdf;
        }

        .bottom-card h3 {
            font-size: 16px;
            margin-bottom: 8px;
        }

        .bottom-card ul {
            list-style: none;
        }

        .bottom-card li {
            font-size: 12px;
            color: #536174;
            margin: 5px 0;
        }

        .bottom-card li i {
            color: #ff5a1f;
            margin-right: 7px;
        }

        .socials {
            display: flex;
            gap: 10px;
            margin-top: 12px;
        }

        .social {
            width: 36px;
            height: 36px;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            color: #fff;

            font-size: 15px;

            transition: .2s;
        }

        .social:hover {
            transform: translateY(-3px);
        }

        .facebook {
            background: #1877f2;
        }

        .instagram {
            background: #e4405f;
        }

        .youtube {
            background: #ff0000;
        }

        .tiktok {
            background: #111;
        }

        .whatsapp {
            background: #25d366;
        }

        /* FOOTER */

        footer {
            background: #0e1b27;
            color: #fff;

            padding: 38px 8% 18px;
        }

        .footer-grid {
            display: grid;

            grid-template-columns:
                1.35fr 1fr 1fr 1fr;

            gap: 45px;

            max-width: 1250px;

            margin: auto;
        }

        .footer-logo {
            font-size: 24px;
            font-weight: 800;
        }

        .footer p {
            color: #c1c8d0;

            font-size: 12px;

            margin-top: 8px;

            max-width: 290px;
        }

        .footer h4 {
            font-size: 14px;
            margin-bottom: 12px;
        }

        .footer a,
        .footer-info {
            display: block;

            color: #c1c8d0;

            font-size: 12px;

            margin: 6px 0;
        }

        .footer-info i {
            width: 20px;
            color: #ff5a1f;
        }

        .footer-socials {
            display: flex;
            gap: 9px;
            margin-top: 15px;
        }

        .footer-socials .social {
            width: 31px;
            height: 31px;
            font-size: 12px;
        }

        .footer-bottom {
            max-width: 1250px;

            margin: 25px auto 0;

            padding-top: 14px;

            border-top:
                1px solid rgba(255,255,255,.15);

            display: flex;

            justify-content: space-between;

            color: #aeb7c2;

            font-size: 11px;
        }

        /* MOBILE */

        @media(max-width:1000px) {

            .navbar {
                padding: 0 4%;
            }

            .container,
            .hero-content {
                width: 92%;
            }

            .info-grid {
                grid-template-columns: repeat(2,1fr);
            }

            .footer-grid {
                grid-template-columns: repeat(2,1fr);
            }
        }

        @media(max-width:700px) {

            .navbar {
                height: 70px;
                padding: 0 5%;
            }

            .nav-links {
                display: none;

                position: absolute;

                top: 70px;
                left: 0;

                width: 100%;

                background: #fff;

                flex-direction: column;

                gap: 0;

                padding: 10px 20px;

                box-shadow:
                    0 8px 20px rgba(0,0,0,.12);
            }

            .nav-links.mobile-open {
                display: flex;
            }

            .nav-links a {
                padding: 14px 10px;
                border-bottom: 1px solid #eee;
            }

            .nav-actions {
                display: none;
            }

            .mobile-menu {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .info-grid,
            .main-grid,
            .bottom-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 8px;
            }

            .hero h1 {
                font-size: 36px;
            }
        }

    </style>

</head>


<body>


@php

    /*
    |--------------------------------------------------------------------------
    | WhatsApp
    |--------------------------------------------------------------------------
    */

    $whatsappNumber = preg_replace(
        '/[^0-9]/',
        '',
        $settings->whatsapp_number ?? ''
    );

    $whatsappUrl = $whatsappNumber
        ? 'https://wa.me/' . $whatsappNumber
        : '#';

@endphp


<!-- NAVBAR -->

<header class="navbar">

    <a
        href="{{ route('home') }}"
        class="logo"
    >

        <div class="logo-icon">
            <i class="fa-solid fa-utensils"></i>
        </div>

        <div>

            <div class="logo-text">
                {{ $settings->restaurant_name ?? 'SarkarFood' }}
            </div>

            <span class="tagline">
                Good Food&nbsp; Better Mood
            </span>

        </div>

    </a>


    <nav
        class="nav-links"
        id="navLinks"
    >

        <a href="{{ route('home') }}">
            Home
        </a>

        <a href="{{ route('home') }}#menu">
            Menu
        </a>

        <a href="{{ route('home') }}#categories">
            Categories
        </a>

        <a href="{{ route('about') }}">
            About
        </a>

        <a
            href="{{ route('contact') }}"
            class="active"
        >
            Contact
        </a>

    </nav>


    <div class="nav-actions">

        <a
            href="{{ route('home') }}"
            class="nav-icon"
        >
            <i class="fa-solid fa-magnifying-glass"></i>
        </a>


        <a
            href="{{ route('cart') }}"
            class="nav-icon cart"
        >

            <i class="fa-solid fa-cart-shopping"></i>

            @php
                $cartCount =
                    collect(
                        session('cart', [])
                    )->sum('quantity');
            @endphp

            @if($cartCount > 0)

                <span class="cart-count">
                    {{ $cartCount }}
                </span>

            @endif

        </a>


        <a
            href="{{ route('home') }}#menu"
            class="order-btn"
        >

            <i class="fa-solid fa-bag-shopping"></i>

            &nbsp; Order Now

        </a>

    </div>


    <button
        type="button"
        class="mobile-menu"
        id="mobileMenuBtn"
    >

        <i class="fa-solid fa-bars"></i>

    </button>

</header>


<!-- HERO -->

<section class="hero">

    <div class="hero-content">

        <div class="breadcrumb">

            <a href="{{ route('home') }}">
                Home
            </a>

            <span>›</span>

            Contact

        </div>


        <h1>
            Contact Us
        </h1>


        <p>
            We'd love to hear from you!
            Whether you have a question,
            feedback, or a special request,
            our team is always here to help.
        </p>

    </div>

</section>


<main class="container">


    <!-- CONTACT INFORMATION -->

    <section class="info-grid">


        <div class="info-card">

            <div class="info-icon">
                <i class="fa-solid fa-phone"></i>
            </div>

            <div>

                <h3>
                    Call Us
                </h3>

                <p>
                    {{ $settings->restaurant_phone ?? '+880 1331-574222' }}
                </p>

                <small>
                    {{ $settings->opening_hours ?? 'Every day, 10:00 AM - 10:00 PM' }}
                </small>

            </div>

        </div>


        <div class="info-card">

            <div class="info-icon">
                <i class="fa-solid fa-envelope"></i>
            </div>

            <div>

                <h3>
                    Email Us
                </h3>

                <p>
                    {{ $settings->restaurant_email ?? 'support@foodie.com' }}
                </p>

                <small>
                    We reply within 24 hours
                </small>

            </div>

        </div>


        <div class="info-card">

            <div class="info-icon">
                <i class="fa-solid fa-location-dot"></i>
            </div>

            <div>

                <h3>
                    Visit Us
                </h3>

                <p>
                    {{ $settings->restaurant_address ?? 'Dhaka, Bangladesh' }}
                </p>

                <small>
                    Come and enjoy with us
                </small>

            </div>

        </div>


        <div class="info-card">

            <div class="info-icon">
                <i class="fa-solid fa-clock"></i>
            </div>

            <div>

                <h3>
                    Opening Hours
                </h3>

                <p>
                    {{ $settings->opening_hours ?? 'Every Day' }}
                </p>

                <small>
                    We are always open for you
                </small>

            </div>

        </div>


    </section>


    <!-- MESSAGE + MAP -->

    <section class="main-grid">


        <div class="card message-card">

            <h2>
                Send Us a Message
            </h2>

            <p class="subtitle">
                Fill out the form below and we'll get back
                to you as soon as possible.
            </p>


            @if(session('success'))

                <div class="success">
                    {{ session('success') }}
                </div>

            @endif


            <form
                action="{{ route('contact.send') }}"
                method="POST"
            >

                @csrf


                <div class="form-row">

                    <div class="field">

                        <label>
                            Your Name
                            <span style="color:#ff5a1f">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Enter your name"
                            required
                        >

                        @error('name')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="field">

                        <label>
                            Your Email
                            <span style="color:#ff5a1f">*</span>
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            required
                        >

                        @error('email')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                <div class="field">

                    <label>
                        Phone Number
                        <span style="color:#ff5a1f">*</span>
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="Enter your phone number"
                        required
                    >

                    @error('phone')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="field">

                    <label>
                        Subject
                    </label>

                    <input
                        type="text"
                        name="subject"
                        value="{{ old('subject') }}"
                        placeholder="What is this about?"
                    >

                </div>


                <div class="field">

                    <label>
                        Message
                        <span style="color:#ff5a1f">*</span>
                    </label>

                    <textarea
                        name="message"
                        placeholder="Type your message here..."
                        required
                    >{{ old('message') }}</textarea>

                    @error('message')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <button
                    type="submit"
                    class="send-btn"
                >

                    <i class="fa-solid fa-paper-plane"></i>

                    &nbsp; Send Message

                </button>

            </form>

        </div>


        <!-- MAP -->

        <div class="card map-card">

            <div class="map">

                <iframe
                    src="https://www.google.com/maps?q={{ urlencode($settings->restaurant_address ?? 'Gazipur, Bangladesh') }}&output=embed"
                    loading="lazy"
                    allowfullscreen>
                </iframe>

            </div>


            <div class="map-info">

                <h3>
                    {{ $settings->restaurant_name ?? 'SarkarFood' }}
                </h3>

                <p>

                    <i class="fa-solid fa-location-dot"></i>

                    {{ $settings->restaurant_address ?? 'Dhaka, Bangladesh' }}

                </p>

            </div>

        </div>


    </section>


    <!-- WHY CONTACT + SOCIAL -->

    <section class="bottom-grid">


        <div class="bottom-card">

            <h3>
                ❤️ Why Contact Us?
            </h3>

            <ul>

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    Get help with your orders
                </li>

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    Ask about our menu or special offers
                </li>

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    Give us feedback to improve
                </li>

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    Inquire about catering or bulk orders
                </li>

                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    Any other questions
                </li>

            </ul>

        </div>


        <!-- FOLLOW US -->

        <div class="bottom-card green">

            <h3>

                <i class="fa-solid fa-share-nodes"></i>

                Follow Us

            </h3>


            <p style="font-size:12px;color:#536174">

                Stay connected for updates,
                offers and menu items.

            </p>


            <div class="socials">


                @if($settings->facebook_url)

                    <a
                        href="{{ $settings->facebook_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social facebook"
                        title="Facebook"
                    >
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                @endif


                @if($settings->instagram_url)

                    <a
                        href="{{ $settings->instagram_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social instagram"
                        title="Instagram"
                    >
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                @endif


                @if($settings->youtube_url)

                    <a
                        href="{{ $settings->youtube_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social youtube"
                        title="YouTube"
                    >
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                @endif


                @if($settings->tiktok_url)

                    <a
                        href="{{ $settings->tiktok_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social tiktok"
                        title="TikTok"
                    >
                        <i class="fa-brands fa-tiktok"></i>
                    </a>

                @endif


                @if($whatsappNumber)

                    <a
                        href="{{ $whatsappUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social whatsapp"
                        title="WhatsApp"
                    >
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                @endif


            </div>

        </div>


    </section>


</main>


<!-- FOOTER -->

<footer>

    <div class="footer-grid">


        <!-- BRAND + SOCIAL -->

        <div>

            <div class="footer-logo">

                {{ $settings->restaurant_name ?? 'SarkarFood' }}<span>Food</span>

            </div>


            <p>

                Delicious food for a happier you.

                Fresh ingredients,
                great taste, fast delivery!

            </p>


            <!-- SAME SOCIAL LINKS -->

            <div class="footer-socials">


                @if($settings->facebook_url)

                    <a
                        href="{{ $settings->facebook_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social facebook"
                        title="Facebook"
                    >
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                @endif


                @if($settings->instagram_url)

                    <a
                        href="{{ $settings->instagram_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social instagram"
                        title="Instagram"
                    >
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                @endif


                @if($settings->youtube_url)

                    <a
                        href="{{ $settings->youtube_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social youtube"
                        title="YouTube"
                    >
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                @endif


                @if($settings->tiktok_url)

                    <a
                        href="{{ $settings->tiktok_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social tiktok"
                        title="TikTok"
                    >
                        <i class="fa-brands fa-tiktok"></i>
                    </a>

                @endif


                @if($whatsappNumber)

                    <a
                        href="{{ $whatsappUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social whatsapp"
                        title="WhatsApp"
                    >
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                @endif


            </div>

        </div>


        <!-- QUICK LINKS -->

        <div>

            <h4>
                Quick Links
            </h4>

            <a href="{{ route('home') }}">
                Home
            </a>

            <a href="{{ route('home') }}#menu">
                Menu
            </a>

            <a href="{{ route('about') }}">
                About Us
            </a>

            <a href="{{ route('contact') }}">
                Contact
            </a>

            <a href="{{ route('contact') }}">
                FAQs
            </a>

        </div>


        <!-- CUSTOMER CARE -->

        <div>

            <h4>
                Customer Care
            </h4>

            <a href="{{ route('cart') }}">
                My Orders
            </a>

            <a href="{{ route('contact') }}">
                Delivery Information
            </a>

            <a href="{{ route('contact') }}">
                Return & Refund
            </a>

            <a href="{{ route('contact') }}">
                Terms & Conditions
            </a>

            <a href="{{ route('contact') }}">
                Privacy Policy
            </a>

        </div>


        <!-- CONTACT INFO -->

        <div>

            <h4>
                Contact Info
            </h4>


            <div class="footer-info">

                <i class="fa-solid fa-phone"></i>

                {{ $settings->restaurant_phone ?? '+880 1331-574222' }}

            </div>


            <div class="footer-info">

                <i class="fa-solid fa-envelope"></i>

                {{ $settings->restaurant_email ?? 'support@foodie.com' }}

            </div>


            <div class="footer-info">

                <i class="fa-solid fa-location-dot"></i>

                {{ $settings->restaurant_address ?? 'Dhaka, Bangladesh' }}

            </div>


            <div class="footer-info">

                <i class="fa-solid fa-clock"></i>

                {{ $settings->opening_hours ?? 'Every Day: 10:00 AM - 10:00 PM' }}

            </div>

        </div>


    </div>


    <div class="footer-bottom">

        <span>

            © {{ date('Y') }}

            {{ $settings->restaurant_name ?? 'SarkarFood' }}.<span>Food</span>

            All rights reserved.

        </span>


        <span>
            Made with ❤️ for food lovers
        </span>

    </div>

</footer>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const button =
            document.getElementById(
                'mobileMenuBtn'
            );

        const nav =
            document.getElementById(
                'navLinks'
            );


        if (button && nav) {

            button.addEventListener(
                'click',
                function () {

                    nav.classList.toggle(
                        'mobile-open'
                    );

                    const icon =
                        button.querySelector(
                            'i'
                        );


                    if (
                        nav.classList.contains(
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

        }

    }
);

</script>


</body>

</html>