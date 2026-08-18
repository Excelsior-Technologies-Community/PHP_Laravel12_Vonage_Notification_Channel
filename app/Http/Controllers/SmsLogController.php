<?php

namespace App\Http\Controllers;

use App\Models\SmsLog;
use Illuminate\Http\Request;

class SmsLogController extends Controller
{
    public function index(Request $request)
    {
        $query = SmsLog::with('user')
            ->oldest('created_at');

        // Search
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('phone', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%")
                    ->orWhere('type', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery
                            ->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        /*
        |--------------------------------------------------------------------------
        | Date From
        |--------------------------------------------------------------------------
        | Filter using sent_at because this is the actual SMS sent date.
        |
        | Pending/failed SMS may have NULL sent_at, so they will not appear
        | when a sent-date filter is applied.
        |--------------------------------------------------------------------------
        */
        if ($request->filled('date_from')) {
            $query->whereDate(
                'sent_at',
                '>=',
                $request->date_from
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Date To
        |--------------------------------------------------------------------------
        */
        if ($request->filled('date_to')) {
            $query->whereDate(
                'sent_at',
                '<=',
                $request->date_to
            );
        }

        // Pagination
        $logs = $query
            ->paginate(5)
            ->withQueryString();

        // Statistics
        $statistics = [
            'total' => SmsLog::count(),

            'sent' => SmsLog::where('status', 'sent')
                ->count(),

            'failed' => SmsLog::where('status', 'failed')
                ->count(),

            'pending' => SmsLog::where('status', 'pending')
                ->count(),

            'today' => SmsLog::whereDate(
                'created_at',
                today()
            )->count(),

            'last_7_days' => SmsLog::where(
                'created_at',
                '>=',
                now()->subDays(7)
            )->count(),
        ];

        return view('sms.index', compact(
            'logs',
            'statistics'
        ));
    }

    public function show(SmsLog $smsLog)
    {
        $smsLog->load('user');

        return view('sms.show', compact('smsLog'));
    }

    public function retry(SmsLog $smsLog)
    {
        if ($smsLog->status !== 'failed') {
            return back()->with(
                'error',
                'Only failed SMS can be retried.'
            );
        }

        if (!$smsLog->user) {
            return back()->with(
                'error',
                'User associated with this SMS no longer exists.'
            );
        }

        $smsLog->update([
            'status' => 'pending',
            'error_message' => null,
        ]);

        $smsLog->user->notify(
            new \App\Notifications\WelcomeSmsNotification()
        );

        return back()->with(
            'success',
            'SMS retry has been queued successfully.'
        );
    }

    public function destroy(SmsLog $smsLog)
    {
        $smsLog->delete();

        return back()->with(
            'success',
            'SMS log deleted successfully.'
        );
    }
}
