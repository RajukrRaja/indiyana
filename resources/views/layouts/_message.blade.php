@if (!empty(session('success')))
    <div class="alert alert-success" role="alert">
        ✅ {{ session('success') }}
    </div>
@endif

@if (!empty(session('error')))
    <div class="alert alert-danger" role="alert">
        ❌ {{ session('error') }}
    </div>
@endif

@if (!empty(session('payment-error')))
    <div class="alert alert-danger" role="alert">
        💳 {{ session('payment-error') }}
    </div>
@endif

@if (!empty(session('warning')))
    <div class="alert alert-warning" role="alert">
        ⚠️ {{ session('warning') }}
    </div>
@endif

@if (!empty(session('info')))
    <div class="alert alert-info" role="alert">
        ℹ️ {{ session('info') }}
    </div>
@endif

@if (!empty(session('secondary')))
    <div class="alert alert-secondary" role="alert">
        🔔 {{ session('secondary') }}
    </div>
@endif

@if (!empty(session('notification')))
    <div class="alert alert-primary" role="alert">
        📢 {{ session('notification') }}
    </div>
@endif

@if (!empty(session('success-action')))
    <div class="alert alert-success" role="alert">
        🎉 {{ session('success-action') }}
    </div>
@endif

@if (!empty(session('failed-action')))
    <div class="alert alert-danger" role="alert">
        🚫 {{ session('failed-action') }}
    </div>
@endif

<script>
    // Auto-dismiss alerts after 5 seconds
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);
</script>
