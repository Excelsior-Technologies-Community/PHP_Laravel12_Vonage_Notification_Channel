<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE sms_logs
            MODIFY status ENUM('queued', 'pending', 'sent', 'failed')
            NOT NULL DEFAULT 'queued'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE sms_logs
            MODIFY status ENUM('pending', 'sent', 'failed')
            NOT NULL DEFAULT 'pending'
        ");
    }
};
