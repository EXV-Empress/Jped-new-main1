<!DOCTYPE html>
<html>
<head>
    <title>Booking Management</title>
</head>
<body>

    <h1>Manage Bookings</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>

                <th>Name</th>
                <th>Email</th>
                <th>Service ID</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>

                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->email }}</td>
                    <td>{{ $booking->booking_time }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                    <td>
                        @if($booking->status == 'pending')
                            <form action="{{ route('bookings.approve', $booking->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit">Approve</button>
                            </form>
                            <form action="{{ route('bookings.reject', $booking->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit">Reject</button>
                            </form>
                        @else
                            {{ ucfirst($booking->status) }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
