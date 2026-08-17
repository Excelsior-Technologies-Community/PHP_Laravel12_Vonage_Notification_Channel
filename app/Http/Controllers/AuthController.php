<?php

namespace App\Http\Controllers;

use App\Models\SmsLog;
use App\Models\User;
use App\Notifications\OtpSmsNotification;
use App\Notifications\WelcomeSmsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => [
                'required',
                'string',
                'regex:/^[1-9][0-9]{10,14}$/',
            ],
            'password' => 'required|string|min:6',
        ], [
            'phone.regex' => 'Enter phone number with country code, e.g. 919876543210.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create User
        |--------------------------------------------------------------------------
        */

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        /*
        |--------------------------------------------------------------------------
        | Welcome SMS
        |--------------------------------------------------------------------------
        */

        $welcomeMessage =
            "Hello {$user->name}, Welcome to our Laravel 12 App 🚀";

        $welcomeLog = SmsLog::create([
            'user_id' => $user->id,
            'phone' => $user->phone,
            'type' => 'welcome',
            'message' => $welcomeMessage,
            'status' => 'queued',
        ]);

        try {
            $user->notify(
                new WelcomeSmsNotification($welcomeLog->id)
            );
        } catch (\Throwable $e) {
            $welcomeLog->update([
                'status' => 'failed',
                'error_message' => $e->getMessage(),
            ]);

            Log::error('Welcome SMS notification failed.', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Generate OTP
        |--------------------------------------------------------------------------
        */

        $otp = (string) random_int(100000, 999999);

        $user->update([
            'otp' => Hash::make($otp),
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        /*
        |--------------------------------------------------------------------------
        | OTP SMS
        |--------------------------------------------------------------------------
        */

        $otpMessage =
            "Your Laravel App verification OTP is {$otp}. "
            . "It will expire in 10 minutes.";

        $otpLog = SmsLog::create([
            'user_id' => $user->id,
            'phone' => $user->phone,
            'type' => 'otp',
            'message' => $otpMessage,
            'status' => 'queued',
        ]);

        try {
            $user->notify(
                new OtpSmsNotification(
                    $otpLog->id,
                    $otp
                )
            );
        } catch (\Throwable $e) {
            $otpLog->update([
                'status' => 'failed',
                'error_message' => $e->getMessage(),
            ]);

            Log::error('OTP SMS notification failed.', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
        }

        return redirect()
            ->route('otp.form', ['user' => $user->id])
            ->with(
                'success',
                'Registration successful. OTP has been sent to your phone.'
            );
    }

    public function showOtpForm(User $user)
    {
        if ($user->isPhoneVerified()) {
            return redirect('/')
                ->with('success', 'Phone number is already verified.');
        }

        return view('verify-otp', compact('user'));
    }

    public function verifyOtp(Request $request, User $user)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Check OTP Expiry
        |--------------------------------------------------------------------------
        */

        if (!$user->otp_expires_at || now()->greaterThan($user->otp_expires_at)) {
            return back()
                ->withErrors([
                    'otp' => 'OTP has expired. Please request a new OTP.',
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Check OTP
        |--------------------------------------------------------------------------
        */

        if (!$user->otp || !Hash::check($request->otp, $user->otp)) {
            return back()
                ->withErrors([
                    'otp' => 'Invalid OTP. Please try again.',
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Verify Phone
        |--------------------------------------------------------------------------
        */

        $user->update([
            'phone_verified_at' => now(),
            'otp' => null,
            'otp_expires_at' => null,
        ]);

        return redirect('/')
            ->with(
                'success',
                'Phone number verified successfully!'
            );
    }

    public function resendOtp(User $user)
    {
        if ($user->isPhoneVerified()) {
            return redirect('/')
                ->with('success', 'Phone number is already verified.');
        }

        /*
        |--------------------------------------------------------------------------
        | Generate New OTP
        |--------------------------------------------------------------------------
        */

        $otp = (string) random_int(100000, 999999);

        $user->update([
            'otp' => Hash::make($otp),
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create SMS Log
        |--------------------------------------------------------------------------
        */

        $message =
            "Your Laravel App verification OTP is {$otp}. "
            . "It will expire in 10 minutes.";

        $smsLog = SmsLog::create([
            'user_id' => $user->id,
            'phone' => $user->phone,
            'type' => 'otp',
            'message' => $message,
            'status' => 'queued',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Send OTP
        |--------------------------------------------------------------------------
        */

        try {
            $user->notify(
                new OtpSmsNotification(
                    $smsLog->id,
                    $otp
                )
            );
        } catch (\Throwable $e) {
            $smsLog->update([
                'status' => 'failed',
                'error_message' => $e->getMessage(),
            ]);

            Log::error('OTP resend failed.', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);

            return back()->withErrors([
                'otp' => 'Unable to send OTP. Please try again.',
            ]);
        }

        return back()->with(
            'success',
            'A new OTP has been sent to your phone.'
        );
    }

    public function smsLogs()
{
    $logs = SmsLog::with('user')
        ->latest()
        ->paginate(20);

    return view('sms-logs', compact('logs'));
}
}