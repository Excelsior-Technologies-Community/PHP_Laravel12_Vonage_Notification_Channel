<?php

namespace App\Notifications;

use App\Models\SmsLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Vonage\VonageMessage;

class WelcomeSmsNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function via($notifiable): array
    {
        return [
            'vonage',
        ];
    }

    public function toVonage($notifiable): VonageMessage
    {
        $message = "Hello {$notifiable->name}, Welcome to our Laravel 12 App 🚀";

        SmsLog::create([
            'user_id' => $notifiable->id,
            'phone' => $notifiable->phone,
            'message' => $message,
            'status' => 'pending',
        ]);

        return (new VonageMessage)
            ->content($message);
    }
}
