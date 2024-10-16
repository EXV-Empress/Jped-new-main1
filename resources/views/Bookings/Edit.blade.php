<!DOCTYPE html>
<html>
<head>
    <title>Edit Booking Time</title>
</head>
<body>

    <h1>Edit Time for Booking</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        <label for="time_filled">Time Filled (YYYY-MM-DD HH:MM:SS):</label>
        <input type="text" id="time_filled" name="time_filled" value="{{ old('time_filled', $booking->time_filled) }}">
        @error('time_filled')
            <div>{{ $message }}</div>
        @enderror
        <button type="submit">Update Time</button>
    </form>

</body>
</html>
