<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\VonageMessage;

class OtpSmsNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public int $smsLogId,
        public string $otp
    ) {
    }

    public function via($notifiable)
    {
        return ['vonage'];
    }

    public function toVonage($notifiable)
    {
        return (new VonageMessage)
            ->content(
                "Your Laravel App verification OTP is {$this->otp}. "
                . "It will expire in 10 minutes."
            );
    }
}