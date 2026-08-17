<?php

namespace App\Listeners;

use App\Models\SmsLog;
use Illuminate\Notifications\Events\NotificationSent;

class MarkSmsAsSent
{
    public function handle(NotificationSent $event): void
    {
        $notification = $event->notification;

        if (!isset($notification->smsLogId)) {
            return;
        }

        SmsLog::where('id', $notification->smsLogId)
            ->update([
                'status' => 'sent',
                'sent_at' => now(),
            ]);
    }
}