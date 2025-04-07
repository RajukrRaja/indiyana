@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Verify Your Mobile Number</h2>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form action="{{ route('mobile.send.otp') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="mobile_number">Mobile Number</label>
            <input type="text" name="mobile_number" class="form-control" required>
            @error('mobile_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-2">Send OTP</button>
    </form>

    <form action="{{ route('mobile.verify.otp') }}" method="POST" class="mt-3">
        @csrf
        <div class="form-group">
            <label for="otp_code">Enter OTP</label>
            <input type="text" name="otp_code" class="form-control" required>
            @error('otp_code')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-2">Verify OTP</button>
    </form>
</div>
@endsection
