<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('assets/img/favicon.png')}}" rel="icon">
  <link href="{{url('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  
  <div class="verification-overlay" id="mobileVerification">
    <div class="verification-modal">
        <div class="verification-content">
            <div class="warning-icon">⚠️</div>
            <h5>Mobile Number Not Verified</h5>
            <p>Please verify your mobile number to complete your profile and enable secure transactions.</p>
            <a href="{{ route('mobile.verify') }}" class="verify-btn">Verify Now</a>

        </div>
    </div>
</div>

<style>
.verification-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(5px);
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.4s ease-in-out;
    z-index: 1000;
}

.verification-overlay.active {
    opacity: 1;
    visibility: visible;
}

.verification-modal {
    background: linear-gradient(135deg, #fff9e6, #fff0c2);
    border: 2px solid #ffc107;
    border-radius: 16px;
    padding: 2rem;
    width: 380px;
    max-width: 90%;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    transform: scale(0.7);
    transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
}

.verification-overlay.active .verification-modal {
    transform: scale(1);
}

.verification-content {
    text-align: center;
    position: relative;
    z-index: 2;
}

.warning-icon {
    font-size: 2.5rem;
    color: #ffc107;
    margin-bottom: 1rem;
    animation: pulse 2s infinite;
}

h5 {
    color: #856404;
    margin-bottom: 1.2rem;
    font-size: 1.5rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

p {
    color: #856404;
    margin-bottom: 1.5rem;
    line-height: 1.6;
    font-size: 1.1rem;
}

.verify-btn {
    background: #ffc107;
    color: #000;
    padding: 12px 32px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 700;
    display: inline-block;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.verify-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
    background: #ffca2c;
}

.verify-btn::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.6s ease, height 0.6s ease;
}

.verify-btn:hover::after {
    width: 200px;
    height: 200px;
}

/* Animations */
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

/* Background pattern */
.verification-modal::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(255, 193, 7, 0.1) 10%, transparent 11%);
    background-size: 2em 2em;
    opacity: 0.5;
    z-index: 1;
}

/* Additional Features */
.verification-modal {
    /* 1 */ animation: float 6s ease-in-out infinite;
    /* 2 */ border-left: 6px solid #ffc107;
    /* 3 */ background-blend-mode: overlay;
    /* 4 */ will-change: transform;
    /* 5 */ transform-style: preserve-3d;
    /* 6 */ transition-property: transform, opacity, box-shadow;
    /* 7 */ overscroll-behavior: contain;
    /* 8 */ contain: paint;
    /* 9 */ perspective: 1000px;
    /* 10 */ backface-visibility: hidden;
}

.verify-btn {
    /* 11 */ text-transform: uppercase;
    /* 12 */ letter-spacing: 1.5px;
    /* 13 */ user-select: none;
    /* 14 */ touch-action: manipulation;
    /* 15 */ cursor: pointer;
    /* 16 */ outline: none;
    /* 17 */ border: 1px solid rgba(255, 255, 255, 0.2);
    /* 18 */ font-size: 1rem;
    /* 19 */ line-height: 1;
    /* 20 */ white-space: nowrap;
}

@keyframes float {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-10px) scale(1.02); }
}

/* Responsive Design */
@media (max-width: 480px) {
    .verification-modal {
        width: 90%;
        padding: 1.5rem;
    }
    
    h5 { font-size: 1.2rem; }
    p { font-size: 0.95rem; }
    .verify-btn { padding: 10px 24px; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Assuming this is within a PHP auth context
    // For demo, we'll show it automatically
    const overlay = document.getElementById('mobileVerification');
    overlay.classList.add('active');
    
    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) {
            overlay.classList.remove('active');
        }
    });
});
</script>

  <!-- Template Main CSS File -->
  <link href="{{url('assets/css/style.css')}}" rel="stylesheet">

</head>

<body>


    @include('backend.layouts._header');
    @include('backend.layouts._sidebar');
  

    <main id="main" class="main">

        @yield('content')

    </main>

    @include('backend.layouts._footer');


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ url('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ url('assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ url('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ url('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>
  

  <!-- Template Main JS File -->
  <script src="{{url('assets/js/main.js')}}"></script>

</body>

</html>