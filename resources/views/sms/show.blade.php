<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMS Details</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        rel="stylesheet">

    <style>
        body {
            background: #f4f7fb;
            font-family: Arial, sans-serif;
            color: #1f2937;
        }

        .page-wrapper {
            max-width: 1100px;
            margin: 0 auto;
        }

        .page-header {
            background: linear-gradient(135deg, #0d6efd, #4f46e5);
            color: white;
            border-radius: 18px;
            padding: 28px 30px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(13, 110, 253, .18);
        }

        .page-header h2 {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .page-header p {
            margin: 0;
            opacity: .85;
        }

        .back-btn {
            background: rgba(255, 255, 255, .15);
            color: white;
            border: 1px solid rgba(255, 255, 255, .35);
            padding: 9px 18px;
            border-radius: 9px;
            text-decoration: none;
            transition: .2s;
        }

        .back-btn:hover {
            background: white;
            color: #0d6efd;
        }

        .details-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .07);
            overflow: hidden;
        }

        .details-card-header {
            background: white;
            padding: 20px 25px;
            border-bottom: 1px solid #edf0f5;
        }

        .details-card-header h5 {
            font-weight: 700;
            margin: 0;
        }

        .details-body {
            padding: 30px;
        }

        .info-item {
            height: 100%;
            background: #f8fafc;
            border: 1px solid #edf0f5;
            border-radius: 12px;
            padding: 18px;
            transition: .2s;
        }

        .info-item:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, .05);
            transform: translateY(-1px);
        }

        .info-label {
            color: #6b7280;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .4px;
            margin-bottom: 7px;
        }

        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: #111827;
            word-break: break-word;
        }

        .info-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            background: #eaf2ff;
            color: #0d6efd;
        }

        .message-box {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px;
            font-size: 16px;
            line-height: 1.7;
            color: #374151;
            white-space: pre-wrap;
            word-break: break-word;
        }

        .error-box {
            background: #fff5f5;
            border: 1px solid #fecaca;
            border-left: 5px solid #dc3545;
            border-radius: 12px;
            padding: 18px 20px;
            color: #b42318;
        }

        .error-title {
            font-weight: 700;
            margin-bottom: 6px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 14px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
        }

        .status-sent {
            background: #dcfce7;
            color: #15803d;
        }

        .status-failed {
            background: #fee2e2;
            color: #b91c1c;
        }

        .status-pending,
        .status-queued {
            background: #fef3c7;
            color: #b45309;
        }

        .status-default {
            background: #e5e7eb;
            color: #374151;
        }

        .timeline {
            position: relative;
            padding-left: 25px;
        }

        .timeline::before {
            content: "";
            position: absolute;
            left: 6px;
            top: 5px;
            bottom: 5px;
            width: 2px;
            background: #e5e7eb;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 22px;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: -25px;
            top: 4px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #0d6efd;
            border: 3px solid #dbeafe;
        }

        .timeline-title {
            font-weight: 700;
            margin-bottom: 3px;
        }

        .timeline-date {
            font-size: 13px;
            color: #6b7280;
        }

        .footer-actions {
            border-top: 1px solid #edf0f5;
            padding: 20px 30px;
            background: #fafbfc;
        }

        @media (max-width: 768px) {

            .page-header {
                padding: 22px;
            }

            .page-header .header-content {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 15px;
            }

            .details-body {
                padding: 20px;
            }

            .footer-actions {
                padding: 18px 20px;
            }

        }
    </style>

</head>

<body>

    <div class="container py-4 py-md-5">

        <div class="page-wrapper">

            {{-- Header --}}
            <div class="page-header">

                <div class="d-flex justify-content-between align-items-center header-content">

                    <div>

                        <div class="d-flex align-items-center gap-2 mb-2">

                            <i class="fa-solid fa-comment-sms fa-lg"></i>

                            <h2>SMS Details</h2>

                        </div>

                        <p>
                            View complete details of this Vonage SMS notification.
                        </p>

                    </div>

                    <a
                        href="{{ route('sms.index') }}"
                        class="back-btn">

                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Back to Logs

                    </a>

                </div>

            </div>


            {{-- Main Card --}}
            <div class="card details-card">

                <div class="details-card-header">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h5>
                                <i class="fa-solid fa-circle-info text-primary me-2"></i>
                                Notification Information
                            </h5>

                        </div>

                        <span class="text-muted small">
                            SMS #{{ $smsLog->id }}
                        </span>

                    </div>

                </div>


                <div class="details-body">

                    {{-- Basic Information --}}
                    <div class="row g-3 mb-4">

                        {{-- ID --}}
                        <div class="col-md-4">

                            <div class="info-item">

                                <div class="info-icon">
                                    <i class="fa-solid fa-hashtag"></i>
                                </div>

                                <div class="info-label">
                                    SMS ID
                                </div>

                                <div class="info-value">
                                    #{{ $smsLog->id }}
                                </div>

                            </div>

                        </div>


                        {{-- Phone --}}
                        <div class="col-md-4">

                            <div class="info-item">

                                <div class="info-icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>

                                <div class="info-label">
                                    Phone Number
                                </div>

                                <div class="info-value">
                                    {{ $smsLog->phone }}
                                </div>

                            </div>

                        </div>


                        {{-- Type --}}
                        <div class="col-md-4">

                            <div class="info-item">

                                <div class="info-icon">
                                    <i class="fa-solid fa-tag"></i>
                                </div>

                                <div class="info-label">
                                    Notification Type
                                </div>

                                <div class="info-value">
                                    {{ ucfirst($smsLog->type ?? 'SMS') }}
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- User Information --}}
                    <div class="mb-4">

                        <h6 class="fw-bold mb-3">

                            <i class="fa-solid fa-user text-primary me-2"></i>

                            User Information

                        </h6>


                        @if($smsLog->user)

                        <div class="row g-3">

                            <div class="col-md-6">

                                <div class="info-item">

                                    <div class="info-label">
                                        Name
                                    </div>

                                    <div class="info-value">
                                        {{ $smsLog->user->name }}
                                    </div>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="info-item">

                                    <div class="info-label">
                                        Email
                                    </div>

                                    <div class="info-value">
                                        {{ $smsLog->user->email }}
                                    </div>

                                </div>

                            </div>

                        </div>

                        @else

                        <div class="alert alert-secondary mb-0">

                            <i class="fa-solid fa-user-slash me-2"></i>

                            This user has been deleted.

                        </div>

                        @endif

                    </div>


                    {{-- Status --}}
                    <div class="mb-4">

                        <h6 class="fw-bold mb-3">

                            <i class="fa-solid fa-signal text-primary me-2"></i>

                            Delivery Status

                        </h6>


                        @php

                        $statusClass = match ($smsLog->status) {

                        'sent' => 'status-sent',

                        'failed' => 'status-failed',

                        'pending' => 'status-pending',

                        'queued' => 'status-queued',

                        default => 'status-default',

                        };

                        $statusIcon = match ($smsLog->status) {

                        'sent' => 'fa-circle-check',

                        'failed' => 'fa-circle-xmark',

                        'pending' => 'fa-clock',

                        'queued' => 'fa-hourglass-half',

                        default => 'fa-circle-question',

                        };

                        @endphp


                        <span class="status-badge {{ $statusClass }}">

                            <i class="fa-solid {{ $statusIcon }}"></i>

                            {{ ucfirst($smsLog->status) }}

                        </span>

                    </div>

                    {{-- Timeline --}}
                    <div>

                        <h6 class="fw-bold mb-3">

                            <i class="fa-solid fa-clock-rotate-left text-primary me-2"></i>

                            SMS Timeline

                        </h6>


                        <div class="timeline">

                            {{-- Created --}}
                            <div class="timeline-item">

                                <div class="timeline-dot"></div>

                                <div class="timeline-title">
                                    SMS Log Created
                                </div>

                                <div class="timeline-date">

                                    <i class="fa-regular fa-calendar me-1"></i>

                                    {{ $smsLog->created_at->format('d M Y, H:i:s') }}

                                </div>

                            </div>


                            {{-- Sent --}}
                            @if($smsLog->sent_at)

                            <div class="timeline-item">

                                <div class="timeline-dot"></div>

                                <div class="timeline-title">
                                    SMS Sent
                                </div>

                                <div class="timeline-date">

                                    <i class="fa-regular fa-calendar-check me-1"></i>

                                    {{ $smsLog->sent_at->format('d M Y, H:i:s') }}

                                </div>

                            </div>

                            @endif


                            {{-- Failed --}}
                            @if($smsLog->status === 'failed')

                            <div class="timeline-item">

                                <div class="timeline-dot"></div>

                                <div class="timeline-title text-danger">
                                    SMS Delivery Failed
                                </div>

                                <div class="timeline-date">

                                    <i class="fa-solid fa-circle-xmark me-1"></i>

                                    Delivery attempt failed.

                                </div>

                            </div>

                            @endif

                        </div>

                    </div>

                </div>


                {{-- Message --}}
                <div class="mb-4">

                    <h6 class="fw-bold mb-3">

                        <i class="fa-solid fa-message text-primary me-2"></i>

                        SMS Message

                    </h6>


                    <div class="message-box">

                        {{ $smsLog->message }}

                    </div>

                </div>


                {{-- Error --}}
                @if($smsLog->error_message)

                <div class="mb-4">

                    <div class="error-box">

                        <div class="error-title">

                            <i class="fa-solid fa-triangle-exclamation me-2"></i>

                            Delivery Error

                        </div>

                        <div>
                            {{ $smsLog->error_message }}
                        </div>

                    </div>

                </div>

                @endif





                {{-- Footer --}}
                <div class="footer-actions">

                    <div class="d-flex justify-content-between align-items-center">

                        <small class="text-muted">

                            <i class="fa-solid fa-database me-1"></i>

                            SMS Log ID: #{{ $smsLog->id }}

                        </small>


                        <a
                            href="{{ route('sms.index') }}"
                            class="btn btn-primary">

                            <i class="fa-solid fa-list me-2"></i>

                            View All Logs

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>