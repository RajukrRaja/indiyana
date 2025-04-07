<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>FraudXpert AI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />
    <link rel="icon" href="{{ asset('front/img/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="{{ asset('front/lib/flaticon/font/flaticon.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet" />
    <style>
      .loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(10, 10, 35, 0.98);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: opacity 1.2s ease-out;
        overflow: hidden;
      }
      .loader.hidden {
        opacity: 0;
        pointer-events: none;
      }
      .holo-core {
        position: relative;
        width: 90%;
        max-width: 1400px;
        height: 85vh;
        background: linear-gradient(145deg, rgba(0, 255, 204, 0.15), rgba(255, 0, 122, 0.15));
        border: 3px solid rgba(0, 255, 204, 0.4);
        border-radius: 25px;
        box-shadow: 0 0 60px rgba(0, 255, 204, 0.3);
        overflow: hidden;
        animation: corePulse 5s infinite ease-in-out;
      }
      .hex-grid {
        position: absolute;
        width: 100%;
        height: 100%;
        background: repeating-conic-gradient(#00ffcc 0deg 10deg, transparent 10deg 20deg);
        opacity: 0.2;
        animation: hexShift 15s infinite linear;
      }
      .scan-beam {
        position: absolute;
        width: 120%;
        height: 5px;
        background: linear-gradient(90deg, transparent, #ff007a, transparent);
        animation: beamSweep 4s infinite ease-in-out;
      }
      .beam-1 { top: 15%; animation-delay: 0s; }
      .beam-2 { top: 45%; animation-delay: 1s; }
      .beam-3 { top: 75%; animation-delay: 2s; }
      .data-stream {
        position: absolute;
        width: 2px;
        height: 50%;
        background: #00ffcc;
        box-shadow: 0 0 20px #00ffcc;
        animation: streamFlow 3s infinite linear;
      }
      .stream-1 { left: 10%; top: 20%; animation-delay: 0s; }
      .stream-2 { left: 30%; top: 30%; animation-delay: 0.5s; }
      .stream-3 { left: 50%; top: 25%; animation-delay: 1s; }
      .stream-4 { left: 70%; top: 35%; animation-delay: 1.5s; }
      .pulse-ring {
        position: absolute;
        width: 300px;
        height: 300px;
        border: 3px solid #ff007a;
        border-radius: 50%;
        animation: ringExpand 5s infinite ease-out;
      }
      .ring-1 { top: 10%; left: 10%; animation-delay: 0s; }
      .ring-2 { bottom: 10%; right: 10%; animation-delay: 1s; }
      .node-cluster {
        position: absolute;
        width: 15px;
        height: 15px;
        background: #00ffcc;
        border-radius: 50%;
        box-shadow: 0 0 25px #00ffcc;
        animation: nodeBlink 2s infinite;
      }
      .node-1 { top: 20%; left: 15%; animation-delay: 0s; }
      .node-2 { top: 30%; right: 20%; animation-delay: 0.3s; }
      .node-3 { bottom: 25%; left: 25%; animation-delay: 0.6s; }
      .node-4 { bottom: 15%; right: 15%; animation-delay: 0.9s; }
      .node-5 { top: 50%; left: 50%; animation-delay: 1.2s; }
      .matrix-bg {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
      }
      .matrix-code {
        position: absolute;
        font-family: 'Nunito', sans-serif;
        font-size: 1.1rem;
        color: rgba(0, 255, 204, 0.4);
        white-space: nowrap;
        animation: codeDrop 6s infinite linear;
      }
      .code-1 { left: 5%; animation-duration: 5s; }
      .code-2 { left: 15%; animation-duration: 6s; animation-delay: 0.5s; }
      .code-3 { left: 25%; animation-duration: 4s; animation-delay: 1s; }
      .code-4 { left: 35%; animation-duration: 7s; animation-delay: 1.5s; }
      .code-5 { left: 45%; animation-duration: 5.5s; }
      .code-6 { left: 55%; animation-duration: 6.5s; animation-delay: 0.5s; }
      .code-7 { left: 65%; animation-duration: 4.5s; animation-delay: 1s; }
      .code-8 { left: 75%; animation-duration: 5s; animation-delay: 1.5s; }
      .code-9 { left: 85%; animation-duration: 6s; }
      .code-10 { left: 95%; animation-duration: 7s; animation-delay: 0.5s; }
      .holo-title {
        position: absolute;
        top: 35%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: 'Nunito', sans-serif;
        font-size: 4rem;
        color: #00ffcc;
        text-transform: uppercase;
        letter-spacing: 8px;
        text-shadow: 0 0 25px #00ffcc, 0 0 50px #ff007a;
        animation: titleShimmer 4s infinite ease-in-out;
      }
      .status-panel {
        position: absolute;
        bottom: 20%;
        left: 50%;
        transform: translateX(-50%);
        font-family: 'Nunito', sans-serif;
        font-size: 1.5rem;
        color: #ff007a;
        text-transform: uppercase;
        letter-spacing: 3px;
        animation: statusCycle 9s infinite;
      }
      .alert-box {
        position: absolute;
        top: 10%;
        right: 10%;
        width: 200px;
        padding: 10px;
        background: rgba(255, 0, 122, 0.2);
        border: 2px solid #ff007a;
        border-radius: 10px;
        color: #fff;
        font-size: 1rem;
        animation: alertFlash 3s infinite;
      }
      .progress-bar {
        position: absolute;
        bottom: 10%;
        left: 50%;
        transform: translateX(-50%);
        width: 300px;
        height: 10px;
        background: rgba(0, 255, 204, 0.2);
        border: 1px solid #00ffcc;
        border-radius: 5px;
        overflow: hidden;
      }
      .progress-fill {
        width: 0%;
        height: 100%;
        background: #00ffcc;
        box-shadow: 0 0 20px #00ffcc;
        animation: progressLoad 4s infinite ease-in-out;
      }
      .geo-shape {
        position: absolute;
        border: 2px dashed #ff007a;
        animation: shapeRotate 12s infinite linear;
      }
      .shape-1 { width: 400px; height: 400px; top: -100px; left: -100px; border-radius: 50%; }
      .shape-2 { width: 300px; height: 300px; bottom: -80px; right: -80px; transform: rotate(45deg); }
      .shape-3 { width: 350px; height: 350px; top: 50%; left: 50%; transform: translate(-50%, -50%); }
      .wave-effect {
        position: absolute;
        width: 200px;
        height: 200px;
        border: 2px solid #00ffcc;
        border-radius: 50%;
        animation: wavePulse 6s infinite ease-out;
      }
      .wave-1 { top: 20%; left: 20%; animation-delay: 0s; }
      .wave-2 { bottom: 20%; right: 20%; animation-delay: 2s; }
      .particle-swarm {
        position: absolute;
        width: 8px;
        height: 8px;
        background: #ff007a;
        border-radius: 50%;
        box-shadow: 0 0 15px #ff007a;
        animation: particleDrift 5s infinite linear;
      }
      .particle-1 { top: 10%; left: 10%; --x: 1; --y: 1; }
      .particle-2 { top: 15%; right: 15%; --x: -1; --y: 1; }
      .particle-3 { bottom: 10%; left: 20%; --x: 1; --y: -1; }
      .particle-4 { bottom: 15%; right: 10%; --x: -1; --y: -1; }
      .glow-orb {
        position: absolute;
        width: 50px;
        height: 50px;
        background: radial-gradient(circle, #00ffcc, transparent);
        border-radius: 50%;
        animation: orbFloat 7s infinite ease-in-out;
      }
      .orb-1 { top: 25%; left: 30%; animation-delay: 0s; }
      .orb-2 { bottom: 25%; right: 30%; animation-delay: 3s; }
      /* Overlay Styles */
      .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(10, 10, 35, 0.8);
        z-index: 9998;
        display: none;
        transition: opacity 0.5s ease;
      }
      .overlay.active {
        display: block;
      }
      /* Modern Authentication Banner Styles */
      .auth-banner {
        position: fixed;
        top: 20%;
        left: 50%;
        transform: translateX(-50%);
        width: %;
        max-width: 900px;
        max-height:800px;
        background: linear-gradient(135deg, #0a0a23, #1a1a3d);
        border: 1px solid #00ffcc;
        border-radius: 10px;
        padding: 20px 30px;
        z-index: 9999;
        box-shadow: 0 10px 30px rgba(0, 255, 204, 0.2), 0 0 20px rgba(255, 0, 122, 0.2);
        display: none;
        animation: bannerSlide 0.6s ease-out forwards;
      }
      .auth-banner-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
      }
      .auth-banner-text {
        flex: 1;
        color: #fff;
        font-family: 'Nunito', sans-serif;
      }
      .auth-banner-text i {
        color: #00ffcc;
        font-size: 1.5rem;
        margin-right: 10px;
      }
      .auth-banner-text p {
        margin: 0;
        font-size: 1.3rem;
        line-height: 1.4;
        text-shadow: 0 0 5px rgba(0, 255, 204, 0.5);
      }
      .auth-banner-actions {
        display: flex;
        gap: 15px;
      }
      .btn-modern {
        padding: 10px 25px;
        font-size: 1rem;
        text-transform: uppercase;
        font-family: 'Nunito', sans-serif;
        border-radius: 30px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
      }
      .btn-register {
        background: linear-gradient(45deg, #00ffcc, #00b3b3);
        color: #0a0a23;
        border: none;
      }
      .btn-login {
        background: transparent;
        color: #00ffcc;
        border: 2px solid #00ffcc;
      }
      .btn-modern:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 255, 204, 0.5);
      }
      /* Animations */
      @keyframes corePulse {
        0%, 100% { transform: scale(1); opacity: 0.9; }
        50% { transform: scale(1.03); opacity: 1; }
      }
      @keyframes hexShift {
        0% { background-position: 0 0; }
        100% { background-position: 20px 20px; }
      }
      @keyframes beamSweep {
        0% { transform: translateX(-100%); opacity: 0; }
        50% { transform: translateX(0); opacity: 1; }
        100% { transform: translateX(100%); opacity: 0; }
      }
      @keyframes streamFlow {
        0% { transform: translateY(-100%); opacity: 0; }
        50% { transform: translateY(0); opacity: 1; }
        100% { transform: translateY(100%); opacity: 0; }
      }
      @keyframes ringExpand {
        0% { transform: scale(0); opacity: 1; }
        100% { transform: scale(1.5); opacity: 0; }
      }
      @keyframes nodeBlink {
        0%, 100% { opacity: 0.5; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.4); }
      }
      @keyframes codeDrop {
        0% { transform: translateY(-100%); opacity: 1; }
        100% { transform: translateY(100vh); opacity: 0; }
      }
      @keyframes titleShimmer {
        0%, 100% { text-shadow: 0 0 25px #00ffcc, 0 0 50px #ff007a; }
        50% { text-shadow: 0 0 35px #00ffcc, 0 0 70px #ff007a; }
      }
      @keyframes statusCycle {
        0% { opacity: 0; content: "Initializing..."; }
        20% { opacity: 1; content: "Scanning Threats..."; }
        40% { opacity: 1; content: "Analyzing Data..."; }
        60% { opacity: 1; content: "System Online..."; }
        80% { opacity: 1; }
        100% { opacity: 0; }
      }
      @keyframes alertFlash {
        0%, 100% { opacity: 0.7; }
        50% { opacity: 1; }
      }
      @keyframes progressLoad {
        0% { width: 0%; }
        50% { width: 80%; }
        100% { width: 100%; }
      }
      @keyframes shapeRotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
      @keyframes wavePulse {
        0% { transform: scale(0); opacity: 1; }
        100% { transform: scale(2); opacity: 0; }
      }
      @keyframes particleDrift {
        0% { transform: translate(0, 0); opacity: 1; }
        100% { transform: translate(calc(150px * var(--x)), calc(150px * var(--y))); opacity: 0; }
      }
      @keyframes orbFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
      }
      @keyframes bannerSlide {
        0% { transform: translateX(-50%) translateY(-50px); opacity: 0; }
        100% { transform: translateX(-50%) translateY(0); opacity: 1; }
      }
    </style>
  </head>
  <body>
    <div class="loader" id="loader">
      <div class="holo-core">
        <div class="hex-grid"></div>
        <div class="scan-beam beam-1"></div>
        <div class="scan-beam beam-2"></div>
        <div class="scan-beam beam-3"></div>
        <div class="data-stream stream-1"></div>
        <div class="data-stream stream-2"></div>
        <div class="data-stream stream-3"></div>
        <div class="data-stream stream-4"></div>
        <div class="pulse-ring ring-1"></div>
        <div class="pulse-ring ring-2"></div>
        <div class="node-cluster node-1"></div>
        <div class="node-cluster node-2"></div>
        <div class="node-cluster node-3"></div>
        <div class="node-cluster node-4"></div>
        <div class="node-cluster node-5"></div>
        <div class="matrix-bg">
          <div class="matrix-code code-1">FRAUD DETECTION AI</div>
          <div class="matrix-code code-2">SYSTEM INITIALIZATION</div>
          <div class="matrix-code code-3">DATA ANALYSIS CORE</div>
          <div class="matrix-code code-4">THREAT DETECTION</div>
          <div class="matrix-code code-5">SECURITY PROTOCOLS</div>
          <div class="matrix-code code-6">NETWORK SCANNING</div>
          <div class="matrix-code code-7">AI PROCESSING</div>
          <div class="matrix-code code-8">REAL-TIME ALERTS</div>
          <div class="matrix-code code-9">PATTERN RECOGNITION</div>
          <div class="matrix-code code-10">SYSTEM ONLINE</div>
        </div>
        <div class="holo-title">FraudXpert AI</div>
        <div class="status-panel">Initializing...</div>
        <div class="alert-box">System Check: Active</div>
        <div class="progress-bar"><div class="progress-fill"></div></div>
        <div class="geo-shape shape-1"></div>
        <div class="geo-shape shape-2"></div>
        <div class="geo-shape shape-3"></div>
        <div class="wave-effect wave-1"></div>
        <div class="wave-effect wave-2"></div>
        <div class="particle-swarm particle-1"></div>
        <div class="particle-swarm particle-2"></div>
        <div class="particle-swarm particle-3"></div>
        <div class="particle-swarm particle-4"></div>
        <div class="glow-orb orb-1"></div>
        <div class="glow-orb orb-2"></div>
      </div>
    </div>

    <!-- Overlay and Modern Authentication Banner -->
    @guest
    <div class="overlay" id="overlay"></div>
    <div class="auth-banner" id="authBanner">
      <div class="auth-banner-content">
        <div class="auth-banner-text">
          <i class="fas fa-exclamation-triangle"></i>
          <p>Unlock FraudXpert AI: Register or Log In Now!</p>
        </div>
        <div class="auth-banner-actions">
          <a href="{{ route('register') }}" class="btn-modern btn-register">Register</a>
          <a href="{{ route('login') }}" class="btn-modern btn-login">Login</a>
        </div>
      </div>
    </div>
    @endguest

    @include('layouts._header')
    @yield('content')
    @include('layouts._footer')
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('front/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('front/mail/contact.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script>
      window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        const overlay = document.getElementById('overlay');
        const authBanner = document.getElementById('authBanner');

        // Hide loader after 5 seconds
        setTimeout(() => {
          loader.classList.add('hidden');
          
          // Show overlay and banner after loader is hidden (if they exist)
          if (overlay && authBanner) {
            setTimeout(() => {
              overlay.classList.add('active');
              authBanner.style.display = 'block';
            }, 1200); // Delay matches loader transition duration
          }
        }, 5000);
      });
    </script>
  </body>
</html>