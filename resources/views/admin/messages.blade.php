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
        {{ $settings->restaurant_name ?? 'Foodie' }} - Customer Messages
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

            margin-bottom: 25px;

            font-weight: bold;

            transition: 0.3s;
        }


        .back-btn:hover {
            background: #ff5722;
        }


        /* ================= TITLE ================= */

        h1 {
            text-align: center;

            color: #ff5722;

            margin-bottom: 30px;
        }


        /* ================= MESSAGE CARD ================= */

        .message-card {
            background: white;

            border-radius: 12px;

            padding: 25px;

            margin-bottom: 20px;

            box-shadow:
                0 3px 15px rgba(0, 0, 0, 0.08);
        }


        /* ================= MESSAGE HEADER ================= */

        .message-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;
        }


        .message-id {
            font-size: 20px;

            font-weight: bold;
        }


        .date {
            color: #666;

            font-size: 14px;
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
            margin: 8px 0;
        }


        /* ================= MESSAGE BOX ================= */

        .message-box {
            border-top: 1px solid #eee;

            padding-top: 15px;
        }


        .message-box h3 {
            margin-bottom: 10px;
        }


        .message-text {
            background: #f8f8f8;

            padding: 15px;

            border-radius: 8px;

            line-height: 1.6;

            word-break: break-word;
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


        /* ================= RESPONSIVE ================= */

        @media(max-width: 600px) {

            body {
                padding: 15px;
            }


            .back-btn {
                width: 100%;

                text-align: center;
            }


            h1 {
                font-size: 24px;
            }


            .message-card {
                padding: 18px;
            }


            .message-header {
                flex-direction: column;

                align-items: flex-start;

                gap: 8px;
            }


            .customer-info {
                padding: 12px;
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

        📩

        {{ $settings->restaurant_name ?? 'Foodie' }}

        - Customer Messages

    </h1>



    {{-- ================= MESSAGES ================= --}}

    @forelse($messages as $message)


        <div class="message-card">


            {{-- ================= MESSAGE HEADER ================= --}}

            <div class="message-header">


                <div class="message-id">

                    Message #{{ $message->id }}

                </div>


                <div class="date">

                    {{ $message->created_at->format('d M Y, h:i A') }}

                </div>


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

                    {{ $message->name }}

                </p>


                <p>

                    <strong>
                        Phone:
                    </strong>

                    {{ $message->phone }}

                </p>


                <p>

                    <strong>
                        Email:
                    </strong>

                    {{ $message->email }}

                </p>


            </div>



            {{-- ================= CUSTOMER MESSAGE ================= --}}

            <div class="message-box">


                <h3>
                    Message
                </h3>


                <div class="message-text">

                    {{ $message->message }}

                </div>


            </div>


        </div>


    @empty


        {{-- ================= NO MESSAGES ================= --}}

        <div class="empty">

            📭 No customer messages yet.

        </div>


    @endforelse



</body>

</html>