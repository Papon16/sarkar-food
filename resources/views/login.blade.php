<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login | Foodie</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            font-family: Arial, sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #fff7f1,
                    #ffe8dc
                );

            padding: 20px;
        }


        .login-wrapper {

            width: 100%;

            max-width: 900px;

            min-height: 540px;

            display: flex;

            background: white;

            border-radius: 25px;

            overflow: hidden;

            box-shadow:
                0 20px 60px rgba(0,0,0,0.12);
        }


        /* =================================
           LEFT SIDE
        ================================= */

        .left-side {

            width: 50%;

            background:
                linear-gradient(
                    135deg,
                    #ff5722,
                    #ff7043
                );

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            text-align: center;

            padding: 50px;

            position: relative;

            overflow: hidden;
        }


        .left-side::before {

            content: "";

            position: absolute;

            width: 220px;

            height: 220px;

            background: rgba(255,255,255,0.10);

            border-radius: 50%;

            top: -80px;

            left: -80px;
        }


        .left-side::after {

            content: "";

            position: absolute;

            width: 260px;

            height: 260px;

            background: rgba(255,255,255,0.10);

            border-radius: 50%;

            bottom: -130px;

            right: -100px;
        }


        .brand-content {

            position: relative;

            z-index: 2;
        }


        .big-food {

            font-size: 75px;

            margin-bottom: 15px;
        }


        .brand-content h1 {

            font-size: 42px;

            margin-bottom: 15px;
        }


        .brand-content p {

            font-size: 16px;

            line-height: 1.7;

            opacity: 0.95;

            max-width: 330px;
        }


        .features {

            margin-top: 30px;

            display: flex;

            justify-content: center;

            gap: 10px;

            flex-wrap: wrap;
        }


        .feature {

            background: rgba(255,255,255,0.15);

            padding: 9px 15px;

            border-radius: 30px;

            font-size: 13px;
        }


        /* =================================
           RIGHT SIDE
        ================================= */

        .right-side {

            width: 50%;

            padding: 55px 48px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        .logo {

            color: #ff5722;

            font-size: 28px;

            font-weight: bold;

            margin-bottom: 8px;
        }


        .title {

            font-size: 30px;

            color: #171717;

            margin-bottom: 8px;
        }


        .subtitle {

            color: #777;

            font-size: 14px;

            margin-bottom: 28px;
        }


        /* =================================
           ERROR
        ================================= */

        .error-box {

            background: #fff1f1;

            color: #d93025;

            border: 1px solid #ffd0d0;

            padding: 12px;

            border-radius: 9px;

            font-size: 13px;

            margin-bottom: 18px;
        }


        .error {

            color: #d93025;

            font-size: 12px;

            margin-top: -12px;

            margin-bottom: 12px;
        }


        /* =================================
           FORM
        ================================= */

        .form-group {

            margin-bottom: 18px;
        }


        .form-group label {

            display: block;

            font-size: 14px;

            font-weight: bold;

            margin-bottom: 8px;

            color: #222;
        }


        .input-box {

            position: relative;
        }


        .input-icon {

            position: absolute;

            left: 14px;

            top: 50%;

            transform: translateY(-50%);

            font-size: 16px;
        }


        .form-group input,
        .form-group select {

            width: 100%;

            height: 48px;

            padding: 0 15px 0 42px;

            border: 1px solid #ddd;

            border-radius: 10px;

            outline: none;

            font-size: 14px;

            background: white;

            transition: 0.3s;
        }


        .form-group select {

            padding-left: 42px;

            cursor: pointer;
        }


        .form-group input:focus,
        .form-group select:focus {

            border-color: #ff5722;

            box-shadow:
                0 0 0 3px rgba(255,87,34,0.10);
        }


        /* =================================
           LOGIN BUTTON
        ================================= */

        .login-button {

            width: 100%;

            height: 50px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #ff5722,
                    #ff7043
                );

            color: white;

            font-size: 15px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;

            box-shadow:
                0 8px 20px rgba(255,87,34,0.25);
        }


        .login-button:hover {

            transform: translateY(-2px);

            box-shadow:
                0 12px 25px rgba(255,87,34,0.30);
        }


        /* =================================
           REGISTER
        ================================= */

        .register {

            text-align: center;

            margin-top: 23px;

            color: #777;

            font-size: 14px;
        }


        .register a {

            color: #ff5722;

            font-weight: bold;

            text-decoration: none;

            margin-left: 4px;
        }


        .register a:hover {

            text-decoration: underline;
        }


        .home-link {

            display: block;

            text-align: center;

            margin-top: 15px;

            color: #777;

            text-decoration: none;

            font-size: 13px;
        }


        .home-link:hover {

            color: #ff5722;
        }


        /* =================================
           MOBILE
        ================================= */

        @media(max-width: 750px) {

            .login-wrapper {

                max-width: 450px;

                min-height: auto;
            }


            .left-side {

                display: none;
            }


            .right-side {

                width: 100%;

                padding: 40px 30px;
            }
        }


    </style>

</head>


<body>


<div class="login-wrapper">


    <!-- =================================
         LEFT SIDE
    ================================= -->

    <div class="left-side">

        <div class="brand-content">

            <div class="big-food">
                🍔
            </div>

            <h1>
                Foodie
            </h1>

            <p>
                Delicious food delivered
                straight to your doorstep.
                Login and enjoy your favorite
                meals today!
            </p>


            <div class="features">

                <span class="feature">
                    🍕 Fresh Food
                </span>

                <span class="feature">
                    ⚡ Fast Delivery
                </span>

                <span class="feature">
                    💗 Best Quality
                </span>

            </div>

        </div>

    </div>



    <!-- =================================
         RIGHT SIDE
    ================================= -->

    <div class="right-side">


        <div class="logo">
            🍔 Foodie
        </div>


        <h2 class="title">
            Welcome Back!
        </h2>


        <p class="subtitle">
            Login to continue to your account
        </p>



        <!-- =================================
             ERROR MESSAGE
        ================================= -->

        @if ($errors->any())

            <div class="error-box">

                @foreach ($errors->all() as $error)

                    <div>
                        {{ $error }}
                    </div>

                @endforeach

            </div>

        @endif



        <!-- =================================
             LOGIN FORM
        ================================= -->

        <form
            action="{{ route('login.submit') }}"
            method="POST"
        >

            @csrf


            <!-- EMAIL -->

            <div class="form-group">

                <label>
                    Email Address
                </label>

                <div class="input-box">

                    <span class="input-icon">
                        ✉️
                    </span>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
                        autofocus
                    >

                </div>

            </div>



            <!-- PASSWORD -->

            <div class="form-group">

                <label>
                    Password
                </label>

                <div class="input-box">

                    <span class="input-icon">
                        🔒
                    </span>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                </div>

            </div>



            <!-- ROLE -->

            <div class="form-group">

                <label>
                    Login As
                </label>

                <div class="input-box">

                    <span class="input-icon">
                        👤
                    </span>

                    <select
                        name="role"
                        required
                    >

                        <option value="">
                            Select your role
                        </option>

                        <option
                            value="customer"
                            {{ old('role') == 'customer' ? 'selected' : '' }}
                        >
                            Customer
                        </option>

                        <option
                            value="admin"
                            {{ old('role') == 'admin' ? 'selected' : '' }}
                        >
                            Admin
                        </option>

                    </select>

                </div>

            </div>



            <!-- LOGIN -->

            <button
                type="submit"
                class="login-button"
            >

                🔐 Login to Foodie

            </button>


        </form>



        <!-- REGISTER -->

        <div class="register">

            Don't have an account?

            <a href="{{ route('register') }}">
                Create Account
            </a>

        </div>



        <!-- HOME -->

        <a
            href="{{ route('home') }}"
            class="home-link"
        >

            ← Back to Home

        </a>


    </div>


</div>


</body>

</html>