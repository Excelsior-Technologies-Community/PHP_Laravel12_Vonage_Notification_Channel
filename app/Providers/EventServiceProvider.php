<?php

namespace App\Providers;

use App\Listeners\MarkSmsAsFailed;
use App\Listeners\MarkSmsAsSent;
use Illuminate\Notifications\Events\NotificationFailed;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Event::listen(
            NotificationSent::class,
            MarkSmsAsSent::class
        );

        Event::listen(
            NotificationFailed::class,
            MarkSmsAsFailed::class
        );
    }
}