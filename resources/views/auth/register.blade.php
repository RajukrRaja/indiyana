<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Register </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Custom Design Enhancements -->
  <style>
    /* Dynamic FraudXpert AI Background */
    body {
      background: rgba(10, 10, 40, 0.95);
      min-height: 100vh;
      position: relative;
      overflow: hidden;
    }

    .fraudxpert-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      background: linear-gradient(135deg, rgba(0, 204, 255, 0.2), rgba(204, 0, 102, 0.2));
      animation: bgShift 8s infinite ease-in-out;
    }

    @keyframes bgShift {
      0%, 100% { transform: scale(1); opacity: 0.85; }
      50% { transform: scale(1.05); opacity: 1; }
    }

    /* Enhanced Hex Grid */
    .hex-grid {
      position: absolute;
      width: 100%;
      height: 100%;
      background: repeating-conic-gradient(#00ccff 0deg 10deg, transparent 10deg 20deg);
      opacity: 0.2;
      animation: hexSpin 25s infinite linear;
    }

    @keyframes hexSpin {
      0% { transform: rotate(0deg); background-position: 0 0; }
      100% { transform: rotate(360deg); background-position: 40px 40px; }
    }

    /* Dynamic Scan Beams */
    .scan-beam {
      position: absolute;
      width: 120%;
      height: 6px;
      background: linear-gradient(90deg, transparent, #cc0066, transparent);
      box-shadow: 0 0 15px #cc0066;
      animation: beamSweep 4s infinite ease-in-out;
    }

    .beam-1 { top: 25%; animation-delay: 0s; }
    .beam-2 { top: 50%; animation-delay: 1s; }
    .beam-3 { top: 75%; animation-delay: 2s; }

    @keyframes beamSweep {
      0% { transform: translateX(-100%); opacity: 0; }
      50% { transform: translateX(0); opacity: 1; }
      100% { transform: translateX(100%); opacity: 0; }
    }

    /* Data Streams */
    .data-stream {
      position: absolute;
      width: 3px;
      height: 40%;
      background: #00ccff;
      box-shadow: 0 0 20px #00ccff;
      animation: streamFlow 3s infinite linear;
    }

    .stream-1 { left: 15%; top: 10%; animation-delay: 0s; }
    .stream-2 { left: 35%; top: 20%; animation-delay: 0.5s; }
    .stream-3 { left: 65%; top: 15%; animation-delay: 1s; }

    @keyframes streamFlow {
      0% { transform: translateY(-100%); opacity: 0; }
      50% { transform: translateY(0); opacity: 1; }
      100% { transform: translateY(100%); opacity: 0; }
    }

    /* Pulse Rings */
    .pulse-ring {
      position: absolute;
      width: 200px;
      height: 200px;
      border: 2px solid #cc0066;
      border-radius: 50%;
      animation: ringExpand 6s infinite ease-out;
    }

    .ring-1 { top: 10%; left: 10%; animation-delay: 0s; }
    .ring-2 { bottom: 10%; right: 10%; animation-delay: 2s; }

    @keyframes ringExpand {
      0% { transform: scale(0); opacity: 1; }
      100% { transform: scale(1.5); opacity: 0; }
    }

    /* Card Design */
    .card {
      background: rgba(255, 255, 255, 0.05);
      border: 2px solid rgba(0, 204, 255, 0.3);
      border-radius: 15px;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-8px);
    }

    /* Enhanced Title */
    .card-title {
      color: #00ccff;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 3px;
      text-shadow: 0 0 15px rgba(0, 204, 255, 0.8);
      animation: titleGlow 2s infinite alternate;
    }

    @keyframes titleGlow {
      0% { text-shadow: 0 0 15px rgba(0, 204, 255, 0.8); }
      100% { text-shadow: 0 0 25px rgba(0, 204, 255, 1); }
    }

    /* Logo Animation */
    .logo span {
      color: #00ccff;
      font-weight: 600;
      animation: bounce 2s infinite;
    }

    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
      40% { transform: translateY(-10px); }
      60% { transform: translateY(-5px); }
    }

    /* Enhanced Input Fields */
    .form-control {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid rgba(0, 204, 255, 0.4);
      border-radius: 12px;
      color: #fff;
      padding: 10px 15px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      background: rgba(255, 255, 255, 0.08);
      border-color: #cc0066;
      box-shadow: 0 0 12px rgba(204, 0, 102, 0.5);
      color: #fff;
    }

    .form-label {
      color: #00ccff;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .form-control:focus + .form-label,
    .form-control:not(:placeholder-shown) + .form-label {
      color: #cc0066;
    }

    /* Password Toggle with Perfect Monkey Icon */
    .password-wrapper {
      position: relative;
    }

    .password-toggle {
      position: absolute;
      right: 15px;
      top: 65%; /* Adjusted for better alignment with input */
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 20px;
      color: #00ccff;
      transition: color 0.3s ease;
    }

    .password-toggle:hover {
      color: #cc0066;
    }

    /* Button Design */
    .btn-primary {
      background: linear-gradient(90deg, #00ccff, #cc0066);
      border: none;
      border-radius: 25px;
      padding: 12px 0;
      font-weight: 600;
      text-transform: uppercase;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background: linear-gradient(90deg, #cc0066, #00ccff);
      transform: scale(1.05);
      box-shadow: 0 8px 20px rgba(204, 0, 102, 0.5);
    }

    /* Text Styling */
    .small, .form-check-label {
      color: #fff;
      text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
    }

    /* Back-to-Top Button */
    .back-to-top {
      background: rgba(0, 204, 255, 0.2);
      border-radius: 50%;
      width: 50px;
      height: 50px;
      transition: all 0.3s ease;
    }

    .back-to-top:hover {
      background: rgba(0, 204, 255, 0.5);
      transform: translateY(-5px);
    }
  </style>
</head>

<body>
  <!-- Enhanced FraudXpert AI Background -->
  <div class="fraudxpert-bg">
    <div class="hex-grid"></div>
    <div class="scan-beam beam-1"></div>
    <div class="scan-beam beam-2"></div>
    <div class="scan-beam beam-3"></div>
    <div class="data-stream stream-1"></div>
    <div class="data-stream stream-2"></div>
    <div class="data-stream stream-3"></div>
    <div class="pulse-ring ring-1"></div>
    <div class="pulse-ring ring-2"></div>
  </div>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">Register</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  @include('layouts._message')
                  <form class="row g-3 needs-validation" action="{{ route('create_user') }}" method="post" novalidate>
                    @csrf
                  
                    <!-- Name Field -->
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                      <div class="valid-feedback">Looks good!</div>
                    </div>
                  
                    <!-- Email Field -->
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid email address!</div>
                      <div class="valid-feedback">Looks good!</div>
                    </div>
                  
                    <!-- Password Field with Perfect Monkey Icon -->
                    <div class="col-12 password-wrapper">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" minlength="8" required>
                      <span class="password-toggle bi bi-emoji-smile" onclick="togglePassword()"></span>
                      <div class="invalid-feedback">Please enter your password (minimum 8 characters)!</div>
                      <div class="valid-feedback">Looks good!</div>
                    </div>
                  
                    <!-- Terms and Conditions -->
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">
                          I agree and accept the <a href="#">terms and conditions</a>
                        </label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                  
                    <!-- Submit Button -->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                  
                    <!-- Login Link -->
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="{{ url('login') }}">Log in</a></p>
                    </div>
                  </form>
                  
                  <script>
                    // JavaScript for Bootstrap Validation
                    (function () {
                      'use strict';
                      var forms = document.querySelectorAll('.needs-validation');
                      Array.prototype.slice.call(forms).forEach(function (form) {
                        form.addEventListener('submit', function (event) {
                          if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                          }
                          form.classList.add('was-validated');
                        }, false);
                      });
                    })();

                    // Show/Hide Password with Perfect Monkey Icon
                    function togglePassword() {
                      const passwordInput = document.getElementById('yourPassword');
                      const toggleIcon = document.querySelector('.password-toggle');
                      if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        toggleIcon.classList.remove('bi-emoji-smile');
                        toggleIcon.classList.add('bi-emoji-wink');
                      } else {
                        passwordInput.type = 'password';
                        toggleIcon.classList.remove('bi-emoji-wink');
                        toggleIcon.classList.add('bi-emoji-smile');
                      }
                    }
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>