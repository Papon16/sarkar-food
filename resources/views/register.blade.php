<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $settings->restaurant_name ?? 'Sarkar Eats' }} - Register
    </title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;

            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            background: #fff7f2;

            padding: 20px;
        }

        .register-container {
            width: 100%;
            max-width: 450px;
        }

        .register-box {
            background: white;

            padding: 35px;

            border-radius: 18px;

            box-shadow:
                0 10px 35px rgba(0, 0, 0, 0.10);
        }

        .logo {
            text-align: center;

            margin-bottom: 25px;
        }

        .logo-icon {
            font-size: 45px;
        }

        .logo h1 {
            margin-top: 8px;

            color: #ff5722;

            font-size: 28px;
        }

        .logo p {
            color: #777;

            margin-top: 6px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;

            margin-bottom: 7px;

            font-weight: bold;

            color: #333;
        }

        .form-group input {
            width: 100%;

            padding: 13px 14px;

            border: 1px solid #ddd;

            border-radius: 8px;

            font-size: 15px;

            outline: none;
        }

        .form-group input:focus {
            border-color: #ff5722;

            box-shadow:
                0 0 0 3px rgba(255, 87, 34, 0.10);
        }

        .error {
            color: #dc2626;

            font-size: 13px;

            margin-top: 5px;
        }

        .success {
            background: #dcfce7;

            color: #166534;

            padding: 12px;

            border-radius: 8px;

            margin-bottom: 18px;

            font-size: 14px;
        }

        .register-btn {
            width: 100%;

            border: none;

            padding: 14px;

            background: #ff5722;

            color: white;

            border-radius: 8px;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;
        }

        .register-btn:hover {
            background: #e64a19;
        }

        .login-link {
            text-align: center;

            margin-top: 22px;

            color: #666;
        }

        .login-link a {
            color: #ff5722;

            text-decoration: none;

            font-weight: bold;
        }

        .home-link {
            text-align: center;

            margin-top: 18px;
        }

        .home-link a {
            color: #555;

            text-decoration: none;

            font-size: 14px;
        }

    </style>

</head>


<body>


<div class="register-container">

    <div class="register-box">


        {{-- LOGO --}}

        <div class="logo">

            <div class="logo-icon">
                🍔
            </div>

            <h1>
                {{ $settings->restaurant_name ?? 'Sarkar Eats' }}
            </h1>

            <p>
                Create your account
            </p>

        </div>


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="success">
                {{ session('success') }}
            </div>

        @endif


        {{-- ERRORS --}}

        @if($errors->any())

            <div class="error" style="margin-bottom: 18px;">

                @foreach($errors->all() as $error)

                    <div>
                        {{ $error }}
                    </div>

                @endforeach

            </div>

        @endif


        {{-- REGISTER FORM --}}

        <form
            action="{{ route('register') }}"
            method="POST"
        >

            @csrf


            {{-- NAME --}}

            <div class="form-group">

                <label for="name">
                    Full Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter your name"
                    required
                    autofocus
                >

                @error('name')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- EMAIL --}}

            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
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


            {{-- PASSWORD --}}

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Minimum 6 characters"
                    required
                >

                @error('password')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- CONFIRM PASSWORD --}}

            <div class="form-group">

                <label for="password_confirmation">
                    Confirm Password
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Confirm your password"
                    required
                >

            </div>


            {{-- REGISTER BUTTON --}}

            <button
                type="submit"
                class="register-btn"
            >

                Create Account

            </button>

        </form>


        {{-- LOGIN --}}

        <div class="login-link">

            Already have an account?

            <a href="{{ route('login') }}">
                Login
            </a>

        </div>


        {{-- HOME --}}

        <div class="home-link">

            <a href="{{ route('home') }}">
                ← Back to Home
            </a>

        </div>


    </div>

</div>


</body>

</html>