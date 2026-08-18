<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>SMS Notification Logs</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f7fb;
            color: #1f2937;
            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Arial,
                sans-serif;
        }

        /* =========================
           PAGE
        ========================= */

        .page-wrapper {
            min-height: 100vh;
            padding: 32px;
        }

        .dashboard-container {
            max-width: 1600px;
            margin: auto;
        }

        /* =========================
           HEADER
        ========================= */

        .page-header {
            background: #ffffff;
            border-radius: 18px;
            padding: 24px 28px;
            margin-bottom: 24px;
            border: 1px solid #e8edf5;
            box-shadow: 0 8px 30px rgba(15, 23, 42, .05);
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            color: #111827;
        }

        .page-subtitle {
            color: #6b7280;
            margin: 6px 0 0;
            font-size: 14px;
        }

        .home-btn {
            border-radius: 10px;
            padding: 9px 16px;
            font-weight: 500;
        }

        /* =========================
           STATISTICS
        ========================= */

        .stat-card {
            position: relative;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e8edf5;
            border-radius: 16px;
            padding: 20px;
            height: 100%;
            box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
            transition: all .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, .09);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            font-size: 18px;
        }

        .icon-blue {
            background: #e8f0ff;
            color: #2563eb;
        }

        .icon-green {
            background: #e9f9ef;
            color: #16a34a;
        }

        .icon-red {
            background: #fff0f0;
            color: #dc2626;
        }

        .icon-yellow {
            background: #fff8e6;
            color: #d97706;
        }

        .icon-purple {
            background: #f3eefe;
            color: #7c3aed;
        }

        .icon-cyan {
            background: #e8f9fc;
            color: #0891b2;
        }

        .stat-label {
            color: #6b7280;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
            line-height: 1;
        }

        /* =========================
           FILTER CARD
        ========================= */

        .section-card {
            background: #ffffff;
            border: 1px solid #e8edf5;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(15, 23, 42, .05);
        }

        .filter-card {
            padding: 24px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 4px;
            color: #111827;
        }

        .section-description {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            min-height: 43px;
            border-radius: 10px;
            border: 1px solid #dbe1ea;
            font-size: 14px;
            box-shadow: none;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .10);
        }

        .search-wrapper {
            position: relative;
        }

        .search-wrapper i {
            position: absolute;
            left: 14px;
            top: 14px;
            color: #9ca3af;
        }

        .search-wrapper input {
            padding-left: 40px;
        }

        .btn-search {
            background: #4f46e5;
            border: none;
            min-height: 43px;
            border-radius: 10px;
            padding: 0 18px;
            font-weight: 600;
        }

        .btn-search:hover {
            background: #4338ca;
        }

        .btn-reset {
            min-height: 43px;
            border-radius: 10px;
            font-weight: 600;
        }

        /* =========================
           TABLE
        ========================= */

        .table-section {
            margin-top: 24px;
            overflow: hidden;
        }

        .table-header {
            padding: 22px 24px;
            border-bottom: 1px solid #edf0f5;
        }

        .table-title {
            font-size: 17px;
            font-weight: 700;
            margin: 0;
        }

        .table-subtitle {
            font-size: 13px;
            color: #6b7280;
            margin-top: 4px;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8fafc;
            color: #6b7280;
            border-bottom: 1px solid #e5e7eb;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .04em;
            padding: 14px 16px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 17px 16px;
            border-bottom: 1px solid #f0f2f6;
            color: #374151;
            font-size: 14px;
            vertical-align: middle;
        }

        .table tbody tr {
            transition: background .15s ease;
        }

        .table tbody tr:hover {
            background: #f8faff;
        }

        .id-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            height: 30px;
            padding: 0 8px;
            background: #f1f5f9;
            border-radius: 8px;
            font-weight: 700;
            font-size: 12px;
            color: #475569;
        }

        .user-name {
            font-weight: 600;
            color: #111827;
        }

        .user-email {
            color: #9ca3af;
            font-size: 12px;
            margin-top: 3px;
        }

        .phone-number {
            font-weight: 500;
            white-space: nowrap;
        }

        .message-cell {
            max-width: 280px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #4b5563;
        }

        /* =========================
           STATUS
        ========================= */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border-radius: 999px;
            padding: 6px 11px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
        }

        .status-sent {
            background: #eaf8ef;
            color: #15803d;
        }

        .status-sent .status-dot {
            background: #22c55e;
        }

        .status-failed {
            background: #fff0f0;
            color: #dc2626;
        }

        .status-failed .status-dot {
            background: #ef4444;
        }

        .status-pending {
            background: #fff7e6;
            color: #b45309;
        }

        .status-pending .status-dot {
            background: #f59e0b;
        }

        .sent-time {
            white-space: nowrap;
            font-size: 13px;
            color: #6b7280;
        }

        /* =========================
           ACTION BUTTONS
        ========================= */

        .action-buttons {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .action-btn {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            text-decoration: none;
            transition: all .15s ease;
        }

        .view-btn {
            background: #e8f0ff;
            color: #2563eb;
        }

        .view-btn:hover {
            background: #dbe7ff;
            color: #1d4ed8;
        }

        .retry-btn {
            background: #fff5db;
            color: #d97706;
        }

        .retry-btn:hover {
            background: #ffedbd;
            color: #b45309;
        }

        .delete-btn {
            background: #fff0f0;
            color: #dc2626;
        }

        .delete-btn:hover {
            background: #ffe0e0;
            color: #b91c1c;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {
            padding: 65px 20px !important;
            text-align: center;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            color: #94a3b8;
            font-size: 25px;
        }

        .empty-title {
            font-size: 16px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 5px;
        }

        .empty-text {
            color: #9ca3af;
            font-size: 13px;
        }

        /* =========================
           PAGINATION
        ========================= */

        .pagination-wrapper {
            padding: 20px 24px;
            border-top: 1px solid #edf0f5;
        }

        .pagination {
            margin-bottom: 0;
        }

        .page-link {
            border-radius: 8px !important;
            margin: 0 2px;
            border: 1px solid #e2e8f0;
            color: #475569;
        }

        .page-item.active .page-link {
            background: #4f46e5;
            border-color: #4f46e5;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .page-wrapper {
                padding: 16px;
            }

            .page-header {
                padding: 20px;
            }

            .page-title {
                font-size: 22px;
            }

            .home-btn {
                padding: 8px 12px;
            }

            .table-header {
                padding: 18px;
            }

            .filter-card {
                padding: 18px;
            }

            .message-cell {
                max-width: 180px;
            }
        }
    </style>
</head>

<body>

    <div class="page-wrapper">

        <div class="dashboard-container">

            {{-- =========================================
             HEADER
        ========================================== --}}

            <div class="page-header">

                <div class="d-flex justify-content-between align-items-center gap-3">

                    <div>

                        <h1 class="page-title">
                            <i class="fa-solid fa-message me-2 text-primary"></i>
                            SMS Notification Logs
                        </h1>

                        <p class="page-subtitle">
                            Monitor and manage your Vonage SMS notifications
                        </p>

                    </div>

                    <a href="{{ url('/') }}"
                        class="btn btn-outline-secondary home-btn">

                        <i class="fa-solid fa-house me-1"></i>
                        Home

                    </a>

                </div>

            </div>


            {{-- =========================================
             ALERTS
        ========================================== --}}

            @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show"
                role="alert">

                <i class="fa-solid fa-circle-check me-2"></i>

                {{ session('success') }}

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

            @endif


            @if(session('error'))

            <div class="alert alert-danger alert-dismissible fade show"
                role="alert">

                <i class="fa-solid fa-circle-exclamation me-2"></i>

                {{ session('error') }}

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

            @endif


            {{-- =========================================
             STATISTICS
        ========================================== --}}

            <div class="row g-3 mb-4">

                {{-- Total --}}

                <div class="col-6 col-md-4 col-xl-2">

                    <div class="stat-card">

                        <div class="stat-icon icon-blue">
                            <i class="fa-solid fa-message"></i>
                        </div>

                        <div class="stat-label">
                            Total SMS
                        </div>

                        <div class="stat-number">
                            {{ $statistics['total'] }}
                        </div>

                    </div>

                </div>


                {{-- Sent --}}

                <div class="col-6 col-md-4 col-xl-2">

                    <div class="stat-card">

                        <div class="stat-icon icon-green">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>

                        <div class="stat-label">
                            Sent
                        </div>

                        <div class="stat-number text-success">
                            {{ $statistics['sent'] }}
                        </div>

                    </div>

                </div>


                {{-- Failed --}}

                <div class="col-6 col-md-4 col-xl-2">

                    <div class="stat-card">

                        <div class="stat-icon icon-red">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </div>

                        <div class="stat-label">
                            Failed
                        </div>

                        <div class="stat-number text-danger">
                            {{ $statistics['failed'] }}
                        </div>

                    </div>

                </div>


                {{-- Pending --}}

                <div class="col-6 col-md-4 col-xl-2">

                    <div class="stat-card">

                        <div class="stat-icon icon-yellow">
                            <i class="fa-solid fa-clock"></i>
                        </div>

                        <div class="stat-label">
                            Pending
                        </div>

                        <div class="stat-number text-warning">
                            {{ $statistics['pending'] }}
                        </div>

                    </div>

                </div>


                {{-- Today --}}

                <div class="col-6 col-md-4 col-xl-2">

                    <div class="stat-card">

                        <div class="stat-icon icon-purple">
                            <i class="fa-solid fa-calendar-day"></i>
                        </div>

                        <div class="stat-label">
                            Today
                        </div>

                        <div class="stat-number">
                            {{ $statistics['today'] }}
                        </div>

                    </div>

                </div>


                {{-- Last 7 Days --}}

                <div class="col-6 col-md-4 col-xl-2">

                    <div class="stat-card">

                        <div class="stat-icon icon-cyan">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>

                        <div class="stat-label">
                            Last 7 Days
                        </div>

                        <div class="stat-number">
                            {{ $statistics['last_7_days'] }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================================
             FILTERS
        ========================================== --}}

            <div class="section-card filter-card">

                <div class="section-title">

                    <i class="fa-solid fa-filter text-primary me-2"></i>

                    Search & Filters

                </div>

                <div class="section-description">

                    Search SMS logs by user, phone number, message or status.

                </div>


                <form method="GET"
                    action="{{ route('sms.index') }}">

                    <div class="row g-3">


                        {{-- Search --}}

                        <div class="col-lg-4 col-md-6">

                            <label class="form-label">
                                Search
                            </label>

                            <div class="search-wrapper">

                                <i class="fa-solid fa-magnifying-glass"></i>

                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    value="{{ request('search') }}"
                                    placeholder="Name, email, phone or message">

                            </div>

                        </div>


                        {{-- Status --}}

                        <div class="col-lg-2 col-md-6">

                            <label class="form-label">
                                Status
                            </label>

                            <select
                                name="status"
                                class="form-select">

                                <option value="">
                                    All Status
                                </option>

                                <option value="pending"
                                    @selected(request('status')==='pending' )>

                                    Pending

                                </option>

                                <option value="sent"
                                    @selected(request('status')==='sent' )>

                                    Sent

                                </option>

                                <option value="failed"
                                    @selected(request('status')==='failed' )>

                                    Failed

                                </option>

                            </select>

                        </div>


                        {{-- Date From --}}

                        <div class="col-lg-2 col-md-6">

                            <label class="form-label">
                                Date From
                            </label>

                            <input
                                type="date"
                                name="date_from"
                                class="form-control"
                                value="{{ request('date_from') }}">

                        </div>


                        {{-- Date To --}}

                        <div class="col-lg-2 col-md-6">

                            <label class="form-label">
                                Date To
                            </label>

                            <input
                                type="date"
                                name="date_to"
                                class="form-control"
                                value="{{ request('date_to') }}">

                        </div>


                        {{-- Buttons --}}

                        <div class="col-lg-2 col-md-6 d-flex align-items-end">

                            <div class="d-flex gap-2 w-100">

                                <button
                                    type="submit"
                                    class="btn btn-primary btn-search flex-grow-1">

                                    <i class="fa-solid fa-magnifying-glass me-1"></i>

                                    Search

                                </button>

                                <a
                                    href="{{ route('sms.index') }}"
                                    class="btn btn-outline-secondary btn-reset"
                                    title="Reset Filters">

                                    <i class="fa-solid fa-rotate-left"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </form>

            </div>


            {{-- =========================================
             SMS TABLE
        ========================================== --}}

            <div class="section-card table-section">

                <div class="table-header">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5 class="table-title">

                                <i class="fa-solid fa-list text-primary me-2"></i>

                                SMS Logs

                            </h5>

                            <div class="table-subtitle">

                                View all SMS notification activity

                            </div>

                        </div>

                        <span class="badge bg-light text-dark border">

                            {{ $logs->total() }} Records

                        </span>

                    </div>

                </div>


                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>

                                <th>ID</th>

                                <th>User</th>

                                <th>Phone</th>

                                <th>Message</th>

                                <th>Status</th>

                                <th>Sent At</th>

                                <th class="text-center">Actions</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($logs as $log)

                            <tr>

                                {{-- ID --}}

                                <td>

                                    <span class="id-badge">

                                        #{{ $log->id }}

                                    </span>

                                </td>


                                {{-- User --}}

                                <td>

                                    @if($log->user)

                                    <div class="user-name">

                                        {{ $log->user->name }}

                                    </div>

                                    <div class="user-email">

                                        {{ $log->user->email }}

                                    </div>

                                    @else

                                    <span class="text-muted">

                                        <i class="fa-solid fa-user-slash me-1"></i>

                                        Deleted User

                                    </span>

                                    @endif

                                </td>


                                {{-- Phone --}}

                                <td>

                                    <span class="phone-number">

                                        <i class="fa-solid fa-phone text-muted me-1"></i>

                                        {{ $log->phone }}

                                    </span>

                                </td>


                                {{-- Message --}}

                                <td>

                                    <div
                                        class="message-cell"
                                        title="{{ $log->message }}">

                                        {{ $log->message }}

                                    </div>

                                </td>


                                {{-- Status --}}

                                <td>

                                    @if($log->status === 'sent')

                                    <span class="status-badge status-sent">

                                        <span class="status-dot"></span>

                                        Sent

                                    </span>

                                    @elseif($log->status === 'failed')

                                    <span class="status-badge status-failed">

                                        <span class="status-dot"></span>

                                        Failed

                                    </span>

                                    @elseif($log->status === 'pending')

                                    <span class="status-badge status-pending">

                                        <span class="status-dot"></span>

                                        Pending

                                    </span>

                                    @else

                                    <span class="status-badge bg-secondary text-white">

                                        {{ ucfirst($log->status) }}

                                    </span>

                                    @endif

                                </td>


                                {{-- Sent At --}}

                                <td>

                                    @if($log->sent_at)

                                    <div class="sent-time">

                                        <i class="fa-regular fa-clock me-1"></i>

                                        {{ $log->sent_at->format('d M Y') }}

                                        <br>

                                        <small>

                                            {{ $log->sent_at->format('H:i') }}

                                        </small>

                                    </div>

                                    @else

                                    <span class="text-muted">

                                        —

                                    </span>

                                    @endif

                                </td>


                                {{-- Actions --}}

                                <td>

                                    <div class="action-buttons justify-content-center">


                                        {{-- View --}}

                                        <a
                                            href="{{ route('sms.show', $log) }}"
                                            class="action-btn view-btn"
                                            title="View SMS">

                                            <i class="fa-solid fa-eye"></i>

                                        </a>


                                        {{-- Retry --}}

                                        @if($log->status === 'failed' && $log->user)

                                        <form
                                            action="{{ route('sms.retry', $log) }}"
                                            method="POST"
                                            class="d-inline">

                                            @csrf

                                            <button
                                                type="submit"
                                                class="action-btn retry-btn"
                                                title="Retry SMS">

                                                <i class="fa-solid fa-rotate-right"></i>

                                            </button>

                                        </form>

                                        @endif


                                        {{-- Delete --}}

                                        <form
                                            action="{{ route('sms.destroy', $log) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this SMS log?')">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-btn delete-btn"
                                                title="Delete SMS">

                                                <i class="fa-solid fa-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="7"
                                    class="empty-state">

                                    <div class="empty-icon">

                                        <i class="fa-regular fa-message"></i>

                                    </div>

                                    <div class="empty-title">

                                        No SMS Logs Found

                                    </div>

                                    <div class="empty-text">

                                        Try changing your search or filter criteria.

                                    </div>

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- Pagination --}}

                @if($logs->hasPages())

                <div class="pagination-wrapper">

                    {{ $logs->links() }}

                </div>

                @endif

            </div>

        </div>

    </div>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>