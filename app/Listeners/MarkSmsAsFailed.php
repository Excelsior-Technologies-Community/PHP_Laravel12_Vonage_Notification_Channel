<?php

namespace App\Listeners;

use App\Models\SmsLog;
use Illuminate\Notifications\Events\NotificationFailed;

class MarkSmsAsFailed
{
    public function handle(NotificationFailed $event): void
    {
        $notification = $event->notification;

        if (!isset($notification->smsLogId)) {
            return;
        }

        $errorMessage = null;

        if ($event->data instanceof \Throwable) {
            $errorMessage = $event->data->getMessage();
        } elseif (is_array($event->data)) {
            $errorMessage = json_encode($event->data);
        } else {
            $errorMessage = (string) $event->data;
        }

        SmsLog::where('id', $notification->smsLogId)
            ->update([
                'status' => 'failed',
                'error_message' => $errorMessage,
            ]);
    }
}