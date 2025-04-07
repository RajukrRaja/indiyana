@extends('layouts.app')

@section('content')


<!-- Header Start -->
<div class="container-fluid px-0 px-md-5 mb-5 header-bg">
    <div class="fraudxpert-dynamic-bg">
        <div class="matrix-layer layer-1"></div>
        <div class="matrix-layer layer-2"></div>
        <div class="energy-beam beam-1"></div>
        <div class="energy-beam beam-2"></div>
        <canvas id="particle-canvas" class="particle-canvas"></canvas>
    </div>
    <div class="row align-items-center px-3" style="perspective: 1200px;">
        <div class="col-lg-6 text-center text-lg-left content-3d">
            <h4 class="text-neon mb-4 mt-5 mt-lg-0" data-aos="fade-right" data-aos-delay="200">
                FraudXpert AI - Your Cybersecurity Shield
            </h4>
            <h1 class="display-4 font-weight-bold text-white title-3d" data-aos="fade-left" data-aos-delay="400">
                AI-Driven Fraud Detection & Prevention
            </h1>
            <p class="text-white mb-4 text-3d" data-aos="fade-up" data-aos-delay="600" id="dynamic-text">
                Leverage cutting-edge artificial intelligence to <strong>analyze, detect, and prevent</strong> 
                <span id="dynamic-keywords">fraudulent activities</span> in real-time.  
                FraudXpert AI safeguards businesses from <strong id="dynamic-threats">financial fraud</strong>  
                with precision and speed.
            </p>
            <a href="" class="btn btn-neon mt-1 py-3 px-5 btn-glow" data-aos="zoom-in" data-aos-delay="800" id="dynamic-button">
                Learn More
            </a>
        </div>
        <div class="col-lg-6 text-center text-lg-right image-3d" id="dynamic-image-container">
            <img class="img-fluid mt-5 animated-image" src="{{ asset('front/img/header.png') }}" 
                alt="AI Fraud Detection" data-aos="fade-left" data-aos-delay="1000" id="dynamic-image" />
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Custom CSS -->
<style>
    /* Dynamic 3D Header Background */
    .header-bg {
        background: linear-gradient(135deg, #0d1b2a, #1b263b);
        padding: 50px 0;
        position: relative;
        overflow: hidden;
        perspective: 1200px;
    }

    .fraudxpert-dynamic-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        transform-style: preserve-3d;
    }

    /* Matrix Layers */
    .matrix-layer {
        position: absolute;
        width: 100%;
        height: 100%;
        background: repeating-linear-gradient(90deg, rgba(0, 255, 170, 0.05) 0px, rgba(0, 255, 170, 0.05) 1px, transparent 1px, transparent 15px),
                    repeating-linear-gradient(0deg, rgba(0, 255, 170, 0.05) 0px, rgba(0, 255, 170, 0.05) 1px, transparent 1px, transparent 15px);
        animation: matrixFlow 25s infinite linear;
    }

    .layer-1 { transform: translateZ(-80px); opacity: 0.7; }
    .layer-2 { transform: translateZ(-150px); opacity: 0.4; animation-delay: 10s; }

    @keyframes matrixFlow {
        0% { background-position: 0 0; }
        100% { background-position: 30px 30px; }
    }

    /* Energy Beams */
    .energy-beam {
        position: absolute;
        width: 100%;
        height: 12px;
        background: linear-gradient(90deg, transparent, #00ffaa, transparent);
        box-shadow: 0 0 25px #00ffaa;
        animation: beamPulse 4s infinite ease-in-out;
        transform-style: preserve-3d;
    }

    .beam-1 { top: 20%; transform: translateZ(-40px); animation-delay: 0s; }
    .beam-2 { top: 60%; transform: translateZ(-100px); animation-delay: 1.5s; }

    @keyframes beamPulse {
        0% { transform: translateZ(-40px) translateX(-130%) scaleX(0.8); opacity: 0; }
        50% { transform: translateZ(-40px) translateX(0) scaleX(1); opacity: 1; }
        100% { transform: translateZ(-40px) translateX(130%) scaleX(0.8); opacity: 0; }
    }

    /* Particle Canvas */
    .particle-canvas {
        position: absolute;
        width: 100%;
        height: 100%;
        transform: translateZ(-20px);
    }

    /* Neon Text */
    .text-neon {
        color: #00ffaa;
        text-shadow: 0 0 5px #00ffaa, 0 0 15px #00ffaa, 0 0 25px #00ffaa, 0 5px 10px rgba(0, 0, 0, 0.4);
        transform: translateZ(30px);
    }

    /* 3D Content */
    .content-3d {
        transform-style: preserve-3d;
        transition: transform 0.5s ease;
    }

    .content-3d:hover {
        transform: translateZ(50px) rotateX(8deg) rotateY(-8deg);
    }

    .title-3d {
        transform: translateZ(40px);
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.8), 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .text-3d {
        transform: translateZ(20px);
    }

    #dynamic-keywords, #dynamic-threats {
        color: #00ccff;
        transition: opacity 0.5s ease;
    }

    /* Neon Button */
    .btn-neon {
        border-radius: 30px;
        background: linear-gradient(90deg, #00ffaa, #00ccff);
        border: 2px solid #00ffaa;
        color: #0d1b2a;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 0 15px #00ffaa, 0 5px 20px rgba(0, 0, 0, 0.4);
        transform: translateZ(15px);
    }

    .btn-neon:hover {
        background: linear-gradient(90deg, #00ccff, #00ffaa);
        box-shadow: 0 0 25px #00ffaa, 0 10px 30px rgba(0, 0, 0, 0.5);
        transform: translateZ(25px) scale(1.1);
    }

    /* 3D Image */
    .image-3d {
        transform-style: preserve-3d;
        transition: transform 0.1s ease; /* Faster for mouse tracking */
    }

    .animated-image {
        filter: drop-shadow(0 0 20px rgba(0, 255, 170, 0.6));
        transform: translateZ(30px);
        transition: transform 0.3s ease-in-out;
    }

    .animated-image:hover {
        transform: translateZ(40px) scale(1.15);
    }
</style>

<!-- JavaScript for Full Dynamism -->
<script>
    // Particle System with Connections and Mouse Interaction
    const canvas = document.getElementById('particle-canvas');
    const ctx = canvas.getContext('2d');
    let mouse = { x: null, y: null };

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.z = Math.random() * 100;
            this.size = Math.random() * 2 + 1;
            this.speedX = (Math.random() - 0.5) * 0.5;
            this.speedY = (Math.random() - 0.5) * 0.5;
            this.speedZ = (Math.random() - 0.5) * 0.2;
            this.color = `rgba(0, 255, 170, ${Math.random() * 0.5 + 0.5})`;
        }

        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            this.z += this.speedZ;

            // Mouse interaction
            const dx = mouse.x - this.x;
            const dy = mouse.y - this.y;
            const distance = Math.sqrt(dx * dx + dy * dy);
            if (distance < 100) {
                this.speedX += dx * 0.005;
                this.speedY += dy * 0.005;
            }

            // Bounce off edges
            if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
            if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
            if (this.z < 0 || this.z > 100) this.speedZ *= -1;
        }

        draw() {
            const perspective = 100 / (100 - this.z);
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size * perspective, 0, Math.PI * 2);
            ctx.fillStyle = this.color;
            ctx.fill();
            ctx.closePath();
        }
    }

    const particles = [];
    for (let i = 0; i < 150; i++) {
        particles.push(new Particle());
    }

    function connectParticles() {
        for (let a = 0; a < particles.length; a++) {
            for (let b = a + 1; b < particles.length; b++) {
                const dx = particles[a].x - particles[b].x;
                const dy = particles[a].y - particles[b].y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                if (distance < 100) {
                    ctx.beginPath();
                    ctx.strokeStyle = `rgba(0, 255, 170, ${1 - distance / 100})`;
                    ctx.lineWidth = 1;
                    ctx.moveTo(particles[a].x, particles[a].y);
                    ctx.lineTo(particles[b].x, particles[b].y);
                    ctx.stroke();
                    ctx.closePath();
                }
            }
        }
    }

    function animateParticles() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(particle => {
            particle.update();
            particle.draw();
        });
        connectParticles();
        requestAnimationFrame(animateParticles);
    }

    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });

    window.addEventListener('mousemove', (e) => {
        mouse.x = e.clientX;
        mouse.y = e.clientY;
    });

    animateParticles();

    // Dynamic Text
    const keywords = ['fraudulent activities', 'cyber threats', 'data breaches', 'scams'];
    const threats = ['financial fraud', 'identity theft', 'crypto scams', 'phishing attacks'];
    let keywordIndex = 0;
    let threatIndex = 0;

    function updateText() {
        const keywordSpan = document.getElementById('dynamic-keywords');
        const threatSpan = document.getElementById('dynamic-threats');
        keywordSpan.style.opacity = 0;
        threatSpan.style.opacity = 0;

        setTimeout(() => {
            keywordSpan.textContent = keywords[keywordIndex];
            threatSpan.textContent = threats[threatIndex];
            keywordSpan.style.opacity = 1;
            threatSpan.style.opacity = 1;

            keywordIndex = (keywordIndex + 1) % keywords.length;
            threatIndex = (threatIndex + 1) % threats.length;
        }, 500);
    }

    setInterval(updateText, 3000);

    // Dynamic Button
    const button = document.getElementById('dynamic-button');
    const buttonTexts = ['Learn More', 'Get Started', 'Explore Now'];
    let buttonIndex = 0;

    function updateButton() {
        button.style.transform = 'translateZ(15px) scale(0.95)';
        setTimeout(() => {
            button.textContent = buttonTexts[buttonIndex];
            button.style.transform = 'translateZ(15px) scale(1)';
            buttonIndex = (buttonIndex + 1) % buttonTexts.length;
        }, 300);
    }

    setInterval(updateButton, 5000);

    // Dynamic Image with Mouse Interaction
    const imageContainer = document.getElementById('dynamic-image-container');
    const image = document.getElementById('dynamic-image');

    window.addEventListener('mousemove', (e) => {
        const rect = imageContainer.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;
        const mouseX = e.clientX - centerX;
        const mouseY = e.clientY - centerY;

        const rotateX = mouseY / rect.height * 20; // Max 20deg tilt
        const rotateY = mouseX / rect.width * 20;

        imageContainer.style.transform = `translateZ(60px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
    });
</script>

<!-- AOS Animation Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true,
    });
</script>



 <!-- Facilities Start -->
<div class="container-fluid pt-5">
  <div class="container pb-3">
    <div class="text-center mb-5" data-aos="fade-up" data-aos-delay="200">
      <h2 class="text-warning font-weight-bold">Why Choose FraudXpert AI?</h2>
      <p class="text-light">
        **FraudXpert AI** offers an **advanced, AI-powered environment** designed to detect and prevent cyber frauds efficiently.
      </p>
    </div>
    
    <div class="row">
      @php
        $facilities = [
          ['icon' => 'flaticon-050-fence', 'title' => 'AI-Powered Security', 'desc' => 'Leveraging deep learning to identify fraud patterns and prevent cyber attacks.', 'delay' => 200],
          ['icon' => 'flaticon-022-drum', 'title' => 'Real-Time Monitoring', 'desc' => 'Instant fraud detection and prevention with automated alerts.', 'delay' => 400],
          ['icon' => 'flaticon-030-crayons', 'title' => 'Data Encryption', 'desc' => 'State-of-the-art encryption ensures secure transactions and privacy.', 'delay' => 600],
          ['icon' => 'flaticon-017-toy-car', 'title' => 'Scalable Cloud AI', 'desc' => 'Cloud-based fraud detection system for businesses of any size.', 'delay' => 800],
          ['icon' => 'flaticon-025-sandwich', 'title' => 'Fraud Analytics', 'desc' => 'Advanced analytics to track and analyze fraud trends effectively.', 'delay' => 1000],
          ['icon' => 'flaticon-047-backpack', 'title' => 'Blockchain Integration', 'desc' => 'Tamper-proof digital ledger technology to enhance security.', 'delay' => 1200],
        ];
      @endphp

      @foreach ($facilities as $facility)
        <div class="col-lg-4 col-md-6 pb-4" data-aos="flip-left" data-aos-delay="{{ $facility['delay'] }}">
          <div class="facility-box text-center p-4 shadow-sm rounded">
            <div class="facility-icon" data-aos="zoom-in" data-aos-delay="{{ $facility['delay'] + 200 }}">
              <i class="{{ $facility['icon'] }} text-warning"></i>
            </div>
            <h4 class="mt-3 text-white">{{ $facility['title'] }}</h4>
            <p class="text-muted">
              {{ $facility['desc'] }}
            </p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
<!-- Facilities End -->

<!-- Include AOS Animation Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,  // Animation duration (1 second)
        once: true,  // Runs only once when scrolling
    });
</script>

<!-- Custom CSS for FraudXpert AI -->
<style>
  .facility-box {
    background: rgba(255, 255, 255, 0.05);
    border-top: 4px solid #ffc107;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .facility-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(255, 193, 7, 0.3);
  }

  .facility-icon {
    width: 70px;
    height: 70px;
    background: rgba(255, 193, 7, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    margin: 0 auto;
    font-size: 30px;
    transition: transform 0.3s ease;
  }

  .facility-box:hover .facility-icon {
    transform: rotate(360deg);
  }

  .facility-box h4 {
    font-size: 20px;
    font-weight: bold;
  }

  .facility-box p {
    font-size: 14px;
  }

</style>
<!-- Core Services Start -->
<div class="container-fluid pt-5 bg-green">
  <div class="container">
    <div class="text-center pb-4" data-aos="fade-up">
      <p class="section-title px-5">
        <span class="px-2">Our Core Services</span>
      </p>
      <h1 class="mb-4" style="color: #003366;">How FraudXpert Protects You</h1>
    </div>
    
    <div class="services-grid">
      
      <!-- AI-Powered Fraud Detection -->
      <div class="service-card" data-aos="fade-right">
        <div class="icon">
          <i class="fas fa-shield-alt"></i>
        </div>
        <h4>AI-Powered Fraud Detection</h4>
        <p>Detect suspicious transactions in real-time using advanced machine learning models.</p>
        <a href="#" class="btn-service">Learn More</a>
      </div>

      <!-- Transaction Monitoring -->
      <div class="service-card" data-aos="fade-up">
        <div class="icon">
          <i class="fas fa-search-dollar"></i>
        </div>
        <h4>Transaction Monitoring</h4>
        <p>Real-time transaction tracking with alerts for any unusual financial activity.</p>
        <a href="#" class="btn-service">Learn More</a>
      </div>

      <!-- Identity Verification -->
      <div class="service-card" data-aos="fade-left">
        <div class="icon">
          <i class="fas fa-id-card"></i>
        </div>
        <h4>Identity Verification</h4>
        <p>Prevent identity fraud with biometric authentication and AI-driven KYC.</p>
        <a href="#" class="btn-service">Learn More</a>
      </div>

      <!-- Risk Scoring & Analytics -->
      <div class="service-card" data-aos="zoom-in">
        <div class="icon">
          <i class="fas fa-chart-bar"></i>
        </div>
        <h4>Risk Scoring & Analytics</h4>
        <p>Fraud risk scoring for users and transactions using AI-driven analytics.</p>
        <a href="#" class="btn-service">Learn More</a>
      </div>

      <!-- Chargeback & Compliance Management -->
      <div class="service-card" data-aos="flip-left">
        <div class="icon">
          <i class="fas fa-balance-scale"></i>
        </div>
        <h4>Chargeback & Compliance</h4>
        <p>Reduce chargebacks and ensure compliance with AML & KYC regulations.</p>
        <a href="#" class="btn-service">Learn More</a>
      </div>

      <!-- Secure API Integration -->
      <div class="service-card" data-aos="flip-right">
        <div class="icon">
          <i class="fas fa-code"></i>
        </div>
        <h4>Secure API Integration</h4>
        <p>Integrate FraudXpert seamlessly with your systems using secure APIs.</p>
        <a href="#" class="btn-service">Learn More</a>
      </div>

    </div>
  </div>
</div>
<!-- Core Services End -->

<!-- Include AOS Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init({
    duration: 1000, 
    once: true, 
  });
</script>

<!-- FraudXpert Themed Advanced CSS -->
<style>
  /* Core Services Styling */
  .services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
  }

  .service-card {
    background: #ffffff;
    padding: 25px;
    text-align: center;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 51, 102, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
    overflow: hidden;
    border-top: 5px solid #0099cc;
  }

  .service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0, 51, 102, 0.25);
    border-top: 5px solid #ff6600;
  }

  .icon {
    font-size: 45px;
    color: #0099cc;
    margin-bottom: 15px;
    transition: color 0.3s ease;
  }

  .service-card:hover .icon {
    color: #ff6600;
  }

  .service-card h4 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #003366;
  }

  .service-card p {
    font-size: 14px;
    color: #666;
    margin-bottom: 15px;
  }

  .btn-service {
    display: inline-block;
    padding: 8px 20px;
    font-size: 14px;
    color: #fff;
    background: #0099cc;
    border-radius: 5px;
    text-decoration: none;
    transition: background 0.3s ease;
  }

  .btn-service:hover {
    background: #ff6600;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .services-grid {
      grid-template-columns: 1fr;
    }
  }
</style>



<!-- our ready Services end-->

<!-- Book A Consultation Section Start -->
<div class="container" style="margin-top: 2cm;">

    <div class="container">
        <div class="row align-items-center">
            <!-- Left Content -->
            <div class="col-lg-7 mb-5 mb-lg-0">
                <p class="section-title">
                    <span class="pr-2">Secure Your Business</span>
                </p>
                <h1 class="mb-4" style="color: #ffcc00;">Stay Ahead with FraudXpert's AI-Powered Fraud Detection</h1>


                <p>
                    Protect your business with **cutting-edge fraud prevention solutions**. Our AI-driven tools help detect fraudulent activities, analyze risk factors, and ensure secure transactions.  
                    Book a free consultation and safeguard your business today.
                </p>
                <ul class="list-unstyled">
                    <li class="py-2">
                        <i class="fa fa-shield-alt text-warning mr-3"></i> AI-Powered Fraud Detection & Prevention
                    </li>
                    <li class="py-2">
                        <i class="fa fa-lock text-warning mr-3"></i> Real-Time Risk Analysis & Secure Transactions
                    </li>
                    <li class="py-2">
                        <i class="fa fa-user-shield text-warning mr-3"></i> Custom Security Solutions for Businesses
                    </li>
                </ul>
                <a href="#fraudxpert-form" class="btn btn-warning mt-3">Book A Free Consultation</a>
            </div>

            <!-- Right Side Booking Form -->
            <div class="col-lg-5">
                <div class="card shadow-lg p-4 fraudxpert-form">
                    <h3 class="text-center mb-4">Request a Consultation</h3>
                    <form action="submit_fraudxpert_form.php" method="POST">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>

                        <div class="form-group">
                            <label for="company">Company Name</label>
                            <input type="text" id="company" name="company" class="form-control" placeholder="Your company name (optional)">
                        </div>

                        <div class="form-group">
                            <label for="service">Select FraudXpert Service</label>
                            <select id="service" name="service" class="form-control" required>
                                <option value="" disabled selected>Choose a service</option>
                                <option value="Fraud Detection">Fraud Detection & Prevention</option>
                                <option value="Risk Assessment">AI-Based Risk Assessment</option>
                                <option value="Transaction Monitoring">Real-Time Transaction Monitoring</option>
                                <option value="AML Compliance">Anti-Money Laundering (AML) Solutions</option>
                                <option value="Cybersecurity">Advanced Cybersecurity Solutions</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-warning btn-block">Get Started</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Book A Consultation Section End -->


<!-- Team Start -->
<div class="container-fluid pt-5">
  <div class="container">
    <div class="text-center pb-2">
      <p class="section-title px-5" data-aos="fade-up">
        <span class="px-2">Our Team</span>
      </p>
      <h1 class="mb-4" data-aos="zoom-in">Meet Our Developers</h1>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-3 text-center team mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="position-relative overflow-hidden mb-4 rounded-circle">
          <img class="img-fluid w-100" src="{{ asset('front/img/team-1.jpg') }}" alt="" />
          <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px" href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
        <h4>Julia Smith</h4>
        <i>Frontend Developer</i>
      </div>
      <div class="col-md-6 col-lg-3 text-center team mb-5" data-aos="fade-down" data-aos-delay="200">
        <div class="position-relative overflow-hidden mb-4 rounded-circle">
          <img class="img-fluid w-100" src="{{ asset('front/img/team-2.jpg') }}" alt="" />
          <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px" href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
        <h4>John Doe</h4>
        <i>Backend Developer</i>
      </div>
      <div class="col-md-6 col-lg-3 text-center team mb-5" data-aos="zoom-in" data-aos-delay="300">
        <div class="position-relative overflow-hidden mb-4 rounded-circle">
          <img class="img-fluid w-100" src="{{ asset('front/img/team-3.jpg') }}" alt="" />
          <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px" href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
        <h4>Mollie Ross</h4>
        <i>DevOps Engineer</i>
      </div>
      <div class="col-md-6 col-lg-3 text-center team mb-5" data-aos="flip-left" data-aos-delay="400">
        <div class="position-relative overflow-hidden mb-4 rounded-circle">
          <img class="img-fluid w-100" src="{{ asset('front/img/team-4.jpg') }}" alt="" />
          <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px" href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
        <h4>Donald John</h4>
        <i>AI Engineer</i>
      </div>
    </div>
  </div>
</div>
<!-- Team End -->

<!-- Testimonial Start -->
<div class="container-fluid py-5">
  <div class="container">
    <div class="text-center pb-5">
      <p class="section-title px-5">
        <span class="px-2">Testimonials</span>
      </p>
      <h1 class="mb-4">What Our Clients Say</h1>
    </div>
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="testimonial-box shadow p-4 text-center" data-aos="fade-up" data-aos-duration="1000">
          <img
            class="rounded-circle mb-3"
            src="{{ asset('front/img/testimonial-1.jpg') }}"
            alt=""
            width="80"
          />
          <p class="text-muted">
            "Great service! The team was very professional and delivered beyond expectations."
          </p>
          <h5 class="mt-3">John Doe</h5>
          <i class="text-primary">CEO, XYZ Ltd.</i>
        </div>
      </div>

      <div class="col-lg-4 mb-4">
        <div class="testimonial-box shadow p-4 text-center" data-aos="zoom-in" data-aos-duration="1000">
          <img
            class="rounded-circle mb-3"
            src="{{ asset('front/img/testimonial-2.jpg') }}"
            alt=""
            width="80"
          />
          <p class="text-muted">
            "Outstanding experience! Their expertise in web development is top-notch."
          </p>
          <h5 class="mt-3">Emily Smith</h5>
          <i class="text-primary">Marketing Head, ABC Corp.</i>
        </div>
      </div>

      <div class="col-lg-4 mb-4">
        <div class="testimonial-box shadow p-4 text-center" data-aos="flip-left" data-aos-duration="1000">
          <img
            class="rounded-circle mb-3"
            src="{{ asset('front/img/testimonial-3.jpg') }}"
            alt=""
            width="80"
          />
          <p class="text-muted">
            "Highly recommend! They transformed our ideas into reality with their amazing skills."
          </p>
          <h5 class="mt-3">Michael Brown</h5>
          <i class="text-primary">CTO, Tech Innovators</i>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Testimonial End -->

<script>
  AOS.init();
</script>


<!-- Include Owl Carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
  $(document).ready(function () {
    $(".testimonial-carousel").owlCarousel({
      loop: true,
      margin: 20,
      nav: false,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      responsive: {
        0: { items: 1 },
        768: { items: 2 },
        1024: { items: 3 }
      }
    });
  });
</script>

<!-- Blog Start -->
<div class="container-fluid pt-5">
  <div class="container">
    <div class="text-center pb-2" 
         data-aos="fade-up" 
         data-aos-duration="1200" 
         data-aos-easing="ease-in-out" 
         data-aos-anchor-placement="top-bottom">
      <p class="section-title px-5">
        <span class="px-2" style="color: #0056b3; font-weight: bold;">Latest Blog</span>
      </p>
      <h1 class="mb-4" style="color: #333;">Latest Articles From Blog</h1>
    </div>
    <div class="row pb-3">
      <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm mb-2" 
             data-aos="fade-left" 
             data-aos-duration="1000" 
             data-aos-easing="ease-in-out"
             data-aos-delay="200"
             data-aos-anchor-placement="top-bottom">
          <img class="card-img-top mb-2" src="{{ asset('front/img/blog-1.jpg') }}" alt="" />
          <div class="card-body bg-light text-center p-4">
            <h4 style="color: #0056b3;">The Future of Web Security</h4>
            <div class="d-flex justify-content-center mb-3">
              <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
              <small class="mr-3"><i class="fa fa-folder text-primary"></i> Cybersecurity</small>
              <small class="mr-3"><i class="fa fa-comments text-primary"></i> 25</small>
            </div>
            <p style="color: #333;">
              Cyber threats are evolving rapidly, and staying ahead is crucial. Learn about the latest trends in web security and how to protect your online assets...
            </p>
            <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm mb-2" 
             data-aos="fade-up" 
             data-aos-duration="1000" 
             data-aos-easing="ease-in-out"
             data-aos-delay="400"
             data-aos-anchor-placement="top-bottom">
          <img class="card-img-top mb-2" src="{{ asset('front/img/blog-2.jpg') }}" alt="" />
          <div class="card-body bg-light text-center p-4">
            <h4 style="color: #0056b3;">AI in Fraud Detection</h4>
            <div class="d-flex justify-content-center mb-3">
              <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
              <small class="mr-3"><i class="fa fa-folder text-primary"></i> Artificial Intelligence</small>
              <small class="mr-3"><i class="fa fa-comments text-primary"></i> 18</small>
            </div>
            <p style="color: #333;">
              Discover how AI-powered fraud detection systems are helping businesses prevent fraudulent activities and secure financial transactions...
            </p>
            <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm mb-2" 
             data-aos="fade-right" 
             data-aos-duration="1000" 
             data-aos-easing="ease-in-out"
             data-aos-delay="600"
             data-aos-anchor-placement="top-bottom">
          <img class="card-img-top mb-2" src="{{ asset('front/img/blog-3.jpg') }}" alt="" />
          <div class="card-body bg-light text-center p-4">
            <h4 style="color: #0056b3;">Best Practices for Secure Web Development</h4>
            <div class="d-flex justify-content-center mb-3">
              <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
              <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web Development</small>
              <small class="mr-3"><i class="fa fa-comments text-primary"></i> 30</small>
            </div>
            <p style="color: #333;">
              Learn essential security practices that every web developer should follow to build safer and more secure applications...
            </p>
            <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Blog End -->

<!-- Include AOS Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init({
    duration: 600,   // Default duration for all elements
    easing: "ease-in-out", // Smooth animation
    once: false,  // Allows animations to repeat on scroll
    anchorPlacement: "top-bottom", // Animation triggers when element is entering the viewport
  });
</script>



@endsection
 