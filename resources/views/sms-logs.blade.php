<!DOCTYPE html>
<html>
<head>
    <title>SMS Logs</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f5f5f5;
        }

        .queued {
            color: orange;
        }

        .sent {
            color: green;
        }

        .failed {
            color: red;
        }
    </style>
</head>

<body>

<h2>SMS Notification Logs</h2>

<table>

    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Phone</th>
            <th>Type</th>
            <th>Message</th>
            <th>Status</th>
            <th>Error</th>
            <th>Sent At</th>
            <th>Created At</th>
        </tr>
    </thead>

    <tbody>

        @forelse($logs as $log)

            <tr>
                <td>{{ $log->id }}</td>

                <td>
                    {{ $log->user?->name ?? 'Deleted User' }}
                </td>

                <td>
                    {{ $log->phone }}
                </td>

                <td>
                    {{ strtoupper($log->type) }}
                </td>

                <td>
                    {{ $log->message }}
                </td>

                <td class="{{ $log->status }}">
                    {{ strtoupper($log->status) }}
                </td>

                <td>
                    {{ $log->error_message ?? '-' }}
                </td>

                <td>
                    {{ $log->sent_at?->format('Y-m-d H:i:s') ?? '-' }}
                </td>

                <td>
                    {{ $log->created_at->format('Y-m-d H:i:s') }}
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="9">
                    No SMS logs found.
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

<br>

{{ $logs->links() }}

</body>
</html>