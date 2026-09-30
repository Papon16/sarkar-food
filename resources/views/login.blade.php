<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Foodie</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #fff7f1, #ffe8dc);

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 30px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 900px;
            min-height: 540px;

            display: flex;

            background: white;

            border-radius: 25px;

            overflow: hidden;

            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
        }

        /* LEFT */

        .left-side {
            width: 50%;

            background: linear-gradient(
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

        .left-content {
            position: relative;
            z-index: 2;
        }

        .burger {
            font-size: 75px;
            margin-bottom: 15px;
        }

        .left-content h1 {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .left-content p {
            max-width: 330px;

            font-size: 16px;

            line-height: 1.7;

            margin: auto;
        }

        .features {
            margin-top: 30px;

            display: flex;

            justify-content: center;

            gap: 10px;

            flex-wrap: wrap;
        }

        .feature {
            padding: 9px 14px;

            border-radius: 25px;

            background: rgba(255, 255, 255, 0.18);

            font-size: 13px;
        }

        /* RIGHT */

        .right-side {
            width: 50%;

            padding: 50px;

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

            margin-bottom: 25px;
        }

        /* SUCCESS */

        .success {
            background: #effff3;

            color: #198754;

            border: 1px solid #bde5c8;

            padding: 12px;

            border-radius: 8px;

            margin-bottom: 18px;

            font-size: 14px;
        }

        /* ERROR */

        .errors {
            background: #fff1f1;

            color: #d93025;

            border: 1px solid #ffd0d0;

            padding: 12px;

            border-radius: 8px;

            margin-bottom: 18px;

            font-size: 14px;
        }

        .errors div {
            margin-bottom: 4px;
        }

        /* FORM */

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;

            font-size: 14px;

            font-weight: bold;

            color: #222;

            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select {
            width: 100%;

            height: 48px;

            border: 1px solid #ddd;

            border-radius: 10px;

            padding: 0 14px;

            font-size: 14px;

            outline: none;

            background: white;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #ff5722;

            box-shadow:
                0 0 0 3px rgba(255, 87, 34, 0.10);
        }

        /* BUTTON */

        .login-button {
            width: 100%;

            height: 50px;

            border: none;

            border-radius: 10px;

            background: linear-gradient(
                135deg,
                #ff5722,
                #ff7043
            );

            color: white;

            font-size: 15px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;
        }

        .login-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 8px 20px rgba(255, 87, 34, 0.25);
        }

        /* REGISTER */

        .register {
            text-align: center;

            margin-top: 22px;

            color: #777;

            font-size: 14px;
        }

        .register a {
            color: #ff5722;

            font-weight: bold;

            text-decoration: none;
        }

        /* HOME */

        .home-link {
            display: block;

            text-align: center;

            margin-top: 15px;

            color: #777;

            text-decoration: none;

            font-size: 13px;
        }

        .home-link:hover,
        .register a:hover {
            color: #ff5722;
        }

        /* MOBILE */

        @media (max-width: 750px) {

            .login-wrapper {
                max-width: 450px;
            }

            .left-side {
                display: none;
            }

            .right-side {
                width: 100%;

                padding: 35px 25px;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <!-- LEFT SIDE -->

    <div class="left-side">

        <div class="left-content">

            <div class="burger">
                🍔
            </div>

            <h1>
                Foodie
            </h1>

            <p>
                Delicious food delivered straight to your doorstep.
                Login and enjoy your favorite meals today!
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


    <!-- RIGHT SIDE -->

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


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="success">
                {{ session('success') }}
            </div>

        @endif


        {{-- ERROR MESSAGE --}}

        @if($errors->any())

            <div class="errors">

                @foreach($errors->all() as $error)

                    <div>
                        {{ $error }}
                    </div>

                @endforeach

            </div>

        @endif


        <!-- LOGIN FORM -->

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

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    required
                    autofocus
                >

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label>
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >

            </div>


            <!-- ROLE -->

            <div class="form-group">

                <label>
                    Login As
                </label>

                <select
                    name="role"
                    required
                >

                    <option value="">
                        Select your role
                    </option>

                    <option
                        value="user"
                        {{ old('role') == 'user' ? 'selected' : '' }}
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


            <!-- LOGIN BUTTON -->

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