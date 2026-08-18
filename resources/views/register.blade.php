<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Create Account | Vonage SMS</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            min-height: 100vh;

            background:
                radial-gradient(circle at top left,
                    rgba(99, 102, 241, 0.25),
                    transparent 35%),
                radial-gradient(circle at bottom right,
                    rgba(16, 185, 129, 0.20),
                    transparent 35%),
                #f4f7fb;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px;
        }

        .page-wrapper {
            width: 100%;
            max-width: 1050px;

            display: grid;
            grid-template-columns: 1fr 1fr;

            background: rgba(255, 255, 255, 0.90);

            backdrop-filter: blur(20px);

            border: 1px solid rgba(255, 255, 255, 0.7);

            border-radius: 24px;

            overflow: hidden;

            box-shadow:
                0 25px 70px rgba(15, 23, 42, 0.12);
        }

        /* LEFT SIDE */

        .left-section {
            position: relative;

            padding: 55px;

            color: white;

            background:
                linear-gradient(145deg,
                    #4f46e5,
                    #6366f1 50%,
                    #7c3aed);

            overflow: hidden;
        }

        .left-section::before {
            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.08);

            top: -90px;
            right: -80px;
        }

        .left-section::after {
            content: "";

            position: absolute;

            width: 200px;
            height: 200px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.07);

            bottom: -80px;
            left: -60px;
        }

        .brand {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;

            gap: 12px;

            margin-bottom: 70px;
        }

        .brand-icon {
            width: 45px;
            height: 45px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(255, 255, 255, 0.18);

            border-radius: 12px;

            font-size: 22px;
        }

        .brand span {
            font-size: 19px;
            font-weight: 700;
        }

        .left-content {
            position: relative;
            z-index: 2;
        }

        .left-content h1 {
            font-size: 42px;

            line-height: 1.15;

            margin-bottom: 20px;

            letter-spacing: -1px;
        }

        .left-content p {
            font-size: 16px;

            line-height: 1.7;

            color: rgba(255, 255, 255, 0.85);

            max-width: 420px;
        }

        .features {
            margin-top: 40px;

            display: flex;
            flex-direction: column;

            gap: 18px;
        }

        .feature {
            display: flex;

            align-items: center;

            gap: 14px;

            font-size: 14px;

            color: rgba(255, 255, 255, 0.92);
        }

        .feature-icon {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: rgba(255, 255, 255, 0.14);

            font-size: 15px;
        }

        /* RIGHT SIDE */

        .right-section {
            padding: 55px;
            background: white;
        }

        .form-header {
            margin-bottom: 32px;
        }

        .form-header h2 {
            color: #111827;

            font-size: 30px;

            margin-bottom: 8px;
        }

        .form-header p {
            color: #6b7280;

            font-size: 14px;
        }

        /* ALERTS */

        .alert {
            padding: 13px 15px;

            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 14px;
        }

        .success {
            background: #ecfdf5;

            color: #047857;

            border: 1px solid #a7f3d0;
        }

        .error {
            background: #fef2f2;

            color: #b91c1c;

            border: 1px solid #fecaca;
        }

        .error ul {
            padding-left: 18px;
        }

        .error li {
            margin-bottom: 4px;
        }

        /* FORM */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;

            font-size: 13px;

            font-weight: 600;

            color: #374151;

            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;

            left: 14px;

            top: 50%;

            transform: translateY(-50%);

            color: #9ca3af;

            font-size: 15px;
        }

        input {
            width: 100%;

            height: 48px;

            padding: 0 15px 0 42px;

            border: 1px solid #e5e7eb;

            border-radius: 10px;

            background: #f9fafb;

            color: #111827;

            font-size: 14px;

            outline: none;

            transition: all 0.2s ease;
        }

        input:hover {
            border-color: #c7d2fe;
        }

        input:focus {
            background: white;

            border-color: #6366f1;

            box-shadow:
                0 0 0 4px rgba(99, 102, 241, 0.10);
        }

        .phone-help {
            display: block;

            margin-top: 7px;

            font-size: 12px;

            color: #9ca3af;
        }

        /* BUTTON */

        .register-button {
            width: 100%;

            height: 50px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(135deg,
                    #4f46e5,
                    #6366f1);

            color: white;

            font-size: 15px;

            font-weight: 600;

            cursor: pointer;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .register-button:hover {
            transform: translateY(-1px);

            box-shadow:
                0 10px 25px rgba(79, 70, 229, 0.25);
        }

        .register-button:active {
            transform: translateY(0);
        }

        /* SMS BUTTON */

        .sms-link {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            width: 100%;

            height: 48px;

            margin-top: 14px;

            border-radius: 10px;

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

            color: #374151;

            background: #f3f4f6;

            transition: all 0.2s ease;
        }

        .sms-link:hover {
            background: #e5e7eb;

            transform: translateY(-1px);
        }

        .divider {
            display: flex;

            align-items: center;

            gap: 12px;

            margin: 24px 0;

            color: #9ca3af;

            font-size: 12px;
        }

        .divider::before,
        .divider::after {
            content: "";

            height: 1px;

            flex: 1;

            background: #e5e7eb;
        }

        .footer-text {
            text-align: center;

            margin-top: 25px;

            font-size: 12px;

            color: #9ca3af;
        }

        /* RESPONSIVE */

        @media (max-width: 850px) {

            .page-wrapper {
                grid-template-columns: 1fr;

                max-width: 550px;
            }

            .left-section {
                padding: 40px;
            }

            .brand {
                margin-bottom: 35px;
            }

            .left-content h1 {
                font-size: 34px;
            }

            .features {
                margin-top: 25px;
            }

            .right-section {
                padding: 40px;
            }
        }

        @media (max-width: 500px) {

            body {
                padding: 15px;
            }

            .page-wrapper {
                border-radius: 18px;
            }

            .left-section,
            .right-section {
                padding: 30px 25px;
            }

            .left-content h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <div class="page-wrapper">

        {{-- LEFT SECTION --}}
        <section class="left-section">

            <div class="brand">

                <div class="brand-icon">
                    ✉
                </div>

                <span>
                    Vonage SMS
                </span>

            </div>


            <div class="left-content">

                <h1>
                    Stay connected
                    with your users.
                </h1>

                <p>
                    Create your account and experience
                    reliable SMS notifications powered by
                    Laravel and Vonage.
                </p>


                <div class="features">

                    <div class="feature">

                        <div class="feature-icon">
                            ✓
                        </div>

                        <span>
                            Fast SMS notifications
                        </span>

                    </div>


                    <div class="feature">

                        <div class="feature-icon">
                            ✓
                        </div>

                        <span>
                            Secure account registration
                        </span>

                    </div>


                    <div class="feature">

                        <div class="feature-icon">
                            ✓
                        </div>

                        <span>
                            Notification history tracking
                        </span>

                    </div>


                    <div class="feature">

                        <div class="feature-icon">
                            ✓
                        </div>

                        <span>
                            Reliable Vonage integration
                        </span>

                    </div>

                </div>

            </div>

        </section>


        {{-- RIGHT SECTION --}}
        <section class="right-section">

            <div class="form-header">

                <h2>
                    Create account
                </h2>

                <p>
                    Enter your details to get started.
                </p>

            </div>


            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))

            <div class="alert success">

                {{ session('success') }}

            </div>

            @endif


            {{-- VALIDATION ERRORS --}}
            @if($errors->any())

            <div class="alert error">

                <ul>

                    @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                    @endforeach

                </ul>

            </div>

            @endif


            <form
                method="POST"
                action="{{ route('register.store') }}">

                @csrf


                {{-- NAME --}}
                <div class="form-group">

                    <label for="name">
                        Full Name
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            👤
                        </span>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            placeholder="Enter your full name"
                            value="{{ old('name') }}"
                            autocomplete="name"
                            required>

                    </div>

                </div>


                {{-- EMAIL --}}
                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            ✉
                        </span>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            placeholder="you@example.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required>

                    </div>

                </div>


                {{-- PHONE --}}
                <div class="form-group">

                    <label for="phone">
                        Mobile Number
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            ☎
                        </span>

                        <input
                            id="phone"
                            type="text"
                            name="phone"
                            placeholder="919876543210"
                            value="{{ old('phone') }}"
                            autocomplete="tel"
                            required>

                    </div>

                    <span class="phone-help">
                        Include your country code.
                        Example: 919876543210
                    </span>

                </div>


                {{-- PASSWORD --}}
                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            🔒
                        </span>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Create a strong password"
                            autocomplete="new-password"
                            required>

                    </div>

                </div>


                {{-- REGISTER --}}
                <button
                    type="submit"
                    class="register-button">

                    Create Account

                </button>


                <div class="divider">
                    <span>
                        Management
                    </span>
                </div>


                {{-- SMS LOGS --}}
                <a
                    href="{{ route('sms.index') }}"
                    class="sms-link">

                    📊

                    <span>
                        View SMS Notification Logs
                    </span>

                </a>

            </form>


            <div class="footer-text">

                Laravel 12 &nbsp;•&nbsp; Vonage SMS Notification Channel

            </div>

        </section>

    </div>

</body>

</html>