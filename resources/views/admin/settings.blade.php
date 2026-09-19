<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Settings - {{ $settings->restaurant_name ?? 'SarkarFood' }}
    </title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fa;
            color: #142235;
        }

        /* ================= TOP BAR ================= */

        .topbar {
            height: 72px;
            background: #fff;
            border-bottom: 1px solid #e5e9ef;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 5%;
        }

        .brand {
            font-size: 22px;
            font-weight: 800;
        }

        .brand span {
            color: #ff5a1f;
        }

        .tagline {
            font-size: 10px;
            color: #7d8795;
            margin-top: 3px;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .notification {
            font-size: 20px;
        }

        .admin {
            display: flex;
            align-items: center;
            gap: 9px;
            font-weight: 700;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;

            background: #142235;
            color: #fff;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ================= MAIN ================= */

        .container {
            width: 90%;
            max-width: 1400px;

            margin: auto;

            padding: 30px 0 50px;
        }

        /* ================= PAGE HEADER ================= */

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 25px;
        }

        .title-area {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .title-icon {
            width: 48px;
            height: 48px;

            background: #ff5a1f;
            color: white;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 23px;
        }

        .page-header h1 {
            font-size: 27px;
            margin-bottom: 5px;
        }

        .subtitle {
            color: #788496;
            font-size: 14px;
        }

        .header-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ================= BACK BUTTON ================= */

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            text-decoration: none;

            background: #142235;
            color: #fff;

            padding: 13px 20px;

            border-radius: 8px;

            font-size: 14px;
            font-weight: 700;

            transition: .2s;
        }

        .back-btn:hover {
            background: #26384e;
            transform: translateY(-1px);
        }

        /* ================= SAVE BUTTON ================= */

        .save-btn {
            border: none;

            background: #ff5a1f;
            color: white;

            padding: 14px 22px;

            border-radius: 8px;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;

            transition: .2s;
        }

        .save-btn:hover {
            background: #e94d15;
            transform: translateY(-1px);
        }

        /* ================= ALERT ================= */

        .success {
            background: #e9f8ef;
            color: #168448;

            border: 1px solid #c9ead6;

            padding: 13px 16px;

            border-radius: 8px;

            margin-bottom: 20px;
        }

        .errors {
            background: #fff0f0;
            color: #c62828;

            border: 1px solid #ffd1d1;

            padding: 13px 16px;

            border-radius: 8px;

            margin-bottom: 20px;
        }

        .errors ul {
            margin-left: 20px;
        }

        /* ================= GRID ================= */

        .settings-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 20px;

            align-items: start;
        }

        /* ================= CARD ================= */

        .card {
            background: white;

            border: 1px solid #e5e9ef;

            border-radius: 12px;

            padding: 24px;

            margin-bottom: 20px;

            box-shadow: 0 2px 8px rgba(0,0,0,.03);
        }

        .card-title {
            display: flex;
            align-items: center;

            gap: 11px;

            font-size: 18px;
            font-weight: 700;

            margin-bottom: 22px;
        }

        .card-title-icon {
            font-size: 20px;
        }

        /* ================= FORM ================= */

        .form-group {
            margin-bottom: 17px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        label {
            display: block;

            font-size: 13px;
            font-weight: 700;

            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;

            border: 1px solid #d9dfe7;

            border-radius: 7px;

            padding: 12px 13px;

            font-size: 14px;

            outline: none;

            color: #263248;

            background: #fff;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #ff5a1f;

            box-shadow:
                0 0 0 3px rgba(255,90,31,.08);
        }

        textarea {
            min-height: 100px;

            resize: vertical;
        }

        .two-column {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 15px;
        }

        /* ================= STATUS ================= */

        .status-item {
            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 15px 0;

            border-bottom: 1px solid #edf0f4;
        }

        .status-item:last-child {
            border-bottom: none;

            padding-bottom: 0;
        }

        .status-title {
            font-size: 14px;

            font-weight: 700;
        }

        .status-description {
            color: #7d8795;

            font-size: 12px;

            margin-top: 4px;
        }

        /* ================= SWITCH ================= */

        .switch {
            position: relative;

            width: 48px;
            height: 26px;

            display: inline-block;
        }

        .switch input {
            opacity: 0;

            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;

            inset: 0;

            background: #cbd3df;

            border-radius: 30px;

            cursor: pointer;

            transition: .2s;
        }

        .slider:before {
            content: "";

            position: absolute;

            width: 20px;
            height: 20px;

            left: 3px;
            top: 3px;

            background: white;

            border-radius: 50%;

            box-shadow:
                0 1px 4px rgba(0,0,0,.2);

            transition: .2s;
        }

        .switch input:checked + .slider {
            background: #22bd5b;
        }

        .switch input:checked + .slider:before {
            transform: translateX(22px);
        }

        /* ================= NOTE ================= */

        .note {
            background: #eef6ff;

            border-radius: 8px;

            padding: 15px;

            color: #49627f;

            font-size: 13px;

            line-height: 1.6;
        }

        /* ================= LOGOUT ================= */

        .logout {
            text-align: right;

            margin-top: 5px;
        }

        .logout button {
            background: transparent;

            border: 1px solid #d9dfe7;

            padding: 10px 18px;

            border-radius: 7px;

            cursor: pointer;

            font-weight: 600;
        }

        .logout button:hover {
            border-color: #ff5a1f;

            color: #ff5a1f;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width: 900px) {

            .settings-grid {
                grid-template-columns: 1fr;
            }

        }

        @media(max-width: 650px) {

            .topbar {
                padding: 0 20px;
            }

            .container {
                width: 94%;
            }

            .page-header {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .header-buttons {
                width: 100%;
            }

            .back-btn,
            .save-btn {
                flex: 1;

                text-align: center;

                justify-content: center;
            }

            .two-column {
                grid-template-columns: 1fr;
            }

            .notification {
                display: none;
            }

        }
    </style>

</head>

<body>


<!-- ================================================= -->
<!-- TOP BAR -->
<!-- ================================================= -->

<header class="topbar">

    <div>

        <div class="brand">

            {{ $settings->restaurant_name ?? 'Sarkar' }}<span>Food</span>

        </div>

        <div class="tagline">
            Good Food &nbsp; Better Mood
        </div>

    </div>


    <div class="top-right">

        <div class="notification">
            🔔
        </div>


        <div class="admin">

            <div class="avatar">

                {{ strtoupper(
                    substr(
                        auth()->user()->name ?? 'A',
                        0,
                        1
                    )
                ) }}

            </div>

            {{ auth()->user()->name ?? 'Admin' }}

            <span>▼</span>

        </div>

    </div>

</header>



<!-- ================================================= -->
<!-- MAIN -->
<!-- ================================================= -->

<main class="container">


    <!-- ================= ALERT ================= -->

    @if(session('success'))

        <div class="success">

            ✓ {{ session('success') }}

        </div>

    @endif


    @if($errors->any())

        <div class="errors">

            <strong>
                Please fix the following:
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



    <!-- ================================================= -->
    <!-- PAGE HEADER -->
    <!-- ================================================= -->

    <div class="page-header">


        <div class="title-area">


            <div class="title-icon">
                ⚙
            </div>


            <div>

                <h1>
                    Website Settings
                </h1>

                <div class="subtitle">

                    Manage your restaurant information
                    and website configuration.

                </div>

            </div>


        </div>



        <!-- BUTTONS -->

        <div class="header-buttons">


            <!-- BACK TO DASHBOARD -->

            <a
                href="{{ route('admin.dashboard') }}"
                class="back-btn"
            >

                ← Back to Dashboard

            </a>


            <!-- SAVE -->

            <button
                type="submit"
                form="settingsForm"
                class="save-btn"
            >

                💾 Save Changes

            </button>


        </div>


    </div>



    <!-- ================================================= -->
    <!-- SETTINGS FORM -->
    <!-- ================================================= -->

    <form
        id="settingsForm"
        action="{{ route('admin.settings.update') }}"
        method="POST"
    >

        @csrf

        @method('PUT')


        <div class="settings-grid">


            <!-- ================================================= -->
            <!-- LEFT COLUMN -->
            <!-- ================================================= -->

            <div>


                <!-- ================= BASIC INFORMATION ================= -->

                <div class="card">


                    <div class="card-title">

                        <span class="card-title-icon">
                            🏪
                        </span>

                        Basic Information

                    </div>



                    <!-- RESTAURANT NAME -->

                    <div class="form-group">

                        <label>
                            Restaurant Name
                        </label>

                        <input
                            type="text"
                            name="restaurant_name"

                            value="{{ old(
                                'restaurant_name',
                                $settings->restaurant_name ?? 'SarkarFood'
                            ) }}"

                            required
                        >

                    </div>



                    <!-- TAGLINE -->

                    <div class="form-group">

                        <label>
                            Restaurant Tagline
                        </label>

                        <input
                            type="text"

                            value="Good Food Better Mood"

                            disabled
                        >

                    </div>



                    <div class="note">

                        Restaurant name is connected with
                        your website.

                        <br><br>

                        When you change the restaurant name
                        and click <strong>Save Changes</strong>,
                        all pages using
                        <strong>$settings->restaurant_name</strong>
                        will show the new name.

                    </div>


                </div>



                <!-- ================= WEBSITE STATUS ================= -->

                <div class="card">


                    <div class="card-title">

                        <span class="card-title-icon">
                            🌐
                        </span>

                        Website Status

                    </div>



                    <!-- RESTAURANT STATUS -->

                    <div class="status-item">


                        <div>

                            <div class="status-title">
                                Restaurant Status
                            </div>

                            <div class="status-description">

                                Turn this off when the restaurant
                                is temporarily closed.

                            </div>

                        </div>



                        <label class="switch">

                            <input
                                type="checkbox"

                                name="restaurant_open"

                                value="1"

                                {{ old(
                                    'restaurant_open',
                                    $settings->restaurant_open ?? true
                                ) ? 'checked' : '' }}
                            >

                            <span class="slider"></span>

                        </label>


                    </div>



                    <!-- MAINTENANCE -->

                    <div class="status-item">


                        <div>

                            <div class="status-title">
                                Maintenance Mode
                            </div>

                            <div class="status-description">

                                Temporarily disable the public
                                website for maintenance.

                            </div>

                        </div>



                        <label class="switch">

                            <input
                                type="checkbox"

                                name="maintenance_mode"

                                value="1"

                                {{ old(
                                    'maintenance_mode',
                                    $settings->maintenance_mode ?? false
                                ) ? 'checked' : '' }}
                            >

                            <span class="slider"></span>

                        </label>


                    </div>


                </div>


            </div>



            <!-- ================================================= -->
            <!-- RIGHT COLUMN -->
            <!-- ================================================= -->

            <div>


                <!-- ================= CONTACT ================= -->

                <div class="card">


                    <div class="card-title">

                        <span class="card-title-icon">
                            ☎
                        </span>

                        Contact Information

                    </div>



                    <!-- PHONE -->

                    <div class="form-group">

                        <label>
                            Phone Number
                        </label>

                        <input
                            type="text"

                            name="restaurant_phone"

                            value="{{ old(
                                'restaurant_phone',
                                $settings->restaurant_phone ?? ''
                            ) }}"

                            placeholder="+880 1XXXXXXXXX"
                        >

                    </div>



                    <!-- EMAIL -->

                    <div class="form-group">

                        <label>
                            Email Address
                        </label>

                        <input
                            type="email"

                            name="restaurant_email"

                            value="{{ old(
                                'restaurant_email',
                                $settings->restaurant_email ?? ''
                            ) }}"

                            placeholder="restaurant@example.com"
                        >

                    </div>



                    <!-- ADDRESS -->

                    <div class="form-group">

                        <label>
                            Address
                        </label>

                        <textarea
                            name="restaurant_address"

                            placeholder="Restaurant address"
                        >{{ old(
                            'restaurant_address',
                            $settings->restaurant_address ?? ''
                        ) }}</textarea>

                    </div>



                    <!-- OPENING HOURS -->

                    <div class="form-group">

                        <label>
                            Opening Hours
                        </label>

                        <input
                            type="text"

                            name="opening_hours"

                            value="{{ old(
                                'opening_hours',
                                $settings->opening_hours ?? ''
                            ) }}"

                            placeholder="Every Day: 10:00 AM - 10:00 PM"
                        >

                    </div>


                </div>



                <!-- ================= BUSINESS SETTINGS ================= -->

                <div class="card">


                    <div class="card-title">

                        <span class="card-title-icon">
                            🛒
                        </span>

                        Business Settings

                    </div>



                    <div class="two-column">


                        <!-- CURRENCY -->

                        <div class="form-group">

                            <label>
                                Currency Symbol
                            </label>

                            <input
                                type="text"

                                name="currency"

                                maxlength="5"

                                value="{{ old(
                                    'currency',
                                    $settings->currency ?? '৳'
                                ) }}"

                                required
                            >

                        </div>



                        <!-- DELIVERY -->

                        <div class="form-group">

                            <label>
                                Delivery Charge
                            </label>

                            <input
                                type="number"

                                name="delivery_charge"

                                min="0"

                                step="0.01"

                                value="{{ old(
                                    'delivery_charge',
                                    $settings->delivery_charge ?? 50
                                ) }}"

                                required
                            >

                        </div>


                    </div>



                    <!-- MINIMUM ORDER -->

                    <div class="form-group">

                        <label>
                            Minimum Order Amount
                        </label>

                        <input
                            type="number"

                            name="minimum_order"

                            min="0"

                            step="0.01"

                            value="{{ old(
                                'minimum_order',
                                $settings->minimum_order ?? 200
                            ) }}"

                            required
                        >

                    </div>



                    <div class="note">

                        Currency, delivery charge and minimum
                        order amount can be used throughout
                        your website through the
                        <strong>$settings</strong> variable.

                    </div>


                </div>



                <!-- ================= INFORMATION ================= -->

                <div class="card">


                    <div class="card-title">

                        <span class="card-title-icon">
                            ℹ️
                        </span>

                        Important

                    </div>


                    <div class="note">

                        Changes will be saved in your
                        <strong>settings</strong> database table.

                        <br><br>

                        Example:

                        <br><br>

                        Restaurant Name →
                        <strong>Sarkar Food House</strong>

                        <br>

                        Currency →
                        <strong>৳</strong>

                        <br>

                        Delivery Charge →
                        <strong>80</strong>

                        <br>

                        Minimum Order →
                        <strong>300</strong>

                        <br><br>

                        After saving, the pages that use these
                        settings will display the updated values.

                    </div>


                </div>


            </div>


        </div>


    </form>



    <!-- ================= LOGOUT ================= -->

    <div class="logout">

        <form
            action="{{ route('logout') }}"
            method="POST"
        >

            @csrf

            <button type="submit">
                Logout
            </button>

        </form>

    </div>


</main>

</body>
</html>