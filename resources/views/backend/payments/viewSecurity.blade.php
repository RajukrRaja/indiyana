@extends('layouts.app')

@section('title', 'Verify Security - FraudXpert AI')

@section('content')
<div class="container py-5">
    <!-- Title -->
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h2 class="display-5 fw-bold text-primary">⚠️ Additional Verification Required</h2>
            <p class="text-muted">Suspicious activity detected. Please answer the security challenge to continue.</p>
        </div>
    </div>

    <!-- Display session error or success -->
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Security Verification Card -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">🔐 Verify Transaction</h4>
                </div>
                <div class="card-body">

                    <!-- Transaction Preview -->
                    @if($transaction)
                    <div class="mb-4">
                        <h5>Transaction Details:</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Transaction ID:</strong> {{ $transaction->transaction_id }}</li>
                            <li class="list-group-item"><strong>Amount:</strong> ${{ number_format($transaction->amount, 2) }}</li>
                            <li class="list-group-item"><strong>Location:</strong> {{ $transaction->location }}</li>
                            <li class="list-group-item"><strong>Risk Score:</strong> {{ $transaction->risk_score ?? 'N/A' }}</li>
                        </ul>
                    </div>
                    @endif

                    <!-- Security Question Form -->
                    <form method="POST" action="{{ route('verify.security') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="answer" class="form-label">⚠️ What is your mother’s maiden name?</label>
                            <input type="text" name="answer" id="answer" class="form-control" required>
                            <div class="form-text">We use this to verify your identity.</div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-shield-alt me-1"></i> Verify Now
                        </button>
                    </form>

                    <!-- Fraud Tips -->
                    <div class="mt-5">
                        <h6>🔎 Fraud Prevention Tips:</h6>
                        <ul class="text-muted small">
                            <li>Never share OTPs or passwords.</li>
                            <li>Check transaction history frequently.</li>
                            <li>Use strong, unique passwords for financial accounts.</li>
                            <li>Be cautious with unexpected emails or messages asking for money.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Simulated AI Analysis Output -->
            <div class="card mt-4 border-info">
                <div class="card-body">
                    <h5 class="card-title text-info">🧠 AI-Based Risk Analysis</h5>
                    @if($transaction)
                        <p class="mb-1"><strong>Detected Fraud:</strong> {{ $transaction->is_fraud ? 'Yes' : 'No' }}</p>
                        <p class="mb-1"><strong>Risk Score:</strong> {{ $transaction->risk_score ?? 'Not Available' }}</p>
                        <p class="mb-0 text-muted"><em>Based on previous patterns and time between last transaction.</em></p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Include any custom styles -->
@push('styles')
<style>
    .form-control:focus {
        box-shadow: 0 0 5px #0d6efd;
        border-color: #0d6efd;
    }
    .card {
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-2px);
    }
</style>
@endpush

<!-- Include custom scripts -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log("Security verification page loaded.");
    });
</script>
@endpush
@endsection
