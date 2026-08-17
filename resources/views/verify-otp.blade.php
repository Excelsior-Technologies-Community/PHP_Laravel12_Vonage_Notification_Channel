<!DOCTYPE html>
<html>
<head>
    <title>Verify Phone</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            cursor: pointer;
            margin-right: 10px;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }

        .success {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<h2>Verify Your Phone Number</h2>

<p>
    We have sent a 6-digit OTP to:
</p>

<strong>
    {{ $user->phone }}
</strong>

<br><br>

@if(session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('otp.verify', $user) }}">

    @csrf

    <input
        type="text"
        name="otp"
        placeholder="Enter 6-digit OTP"
        maxlength="6"
        inputmode="numeric"
        required
    >

    <button type="submit">
        Verify OTP
    </button>

</form>

<br>

<form method="POST" action="{{ route('otp.resend', $user) }}">

    @csrf

    <button type="submit">
        Resend OTP
    </button>

</form>

</body>
</html>