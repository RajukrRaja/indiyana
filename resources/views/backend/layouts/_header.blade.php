<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FraudXpert AI</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;600;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Base Styles */
    body {

      font-family: 'Poppins', sans-serif;
      color: #ffffff;
      margin-right: 2cm;
      margin-top:2cm;
    }

    .header {

      transition: all 0.3s ease-in-out;
    }

    .header:hover {
      box-shadow: 0 6px 25px rgba(0, 247, 255, 0.15);
    }

    /* Logo Styling */
    .logo {
      text-decoration: none;
    }

    .brand-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background: radial-gradient(circle, #00f7ff, #00d4ff);
      border-radius: 50%;
      margin-right: 10px;
      box-shadow: 0 0 15px #00f7ff;
      transition: transform 0.3s ease-in-out;
    }

    .logo:hover .brand-icon {
      transform: scale(1.1);
    }

    .brand-text {
      font-family: 'Exo 2', sans-serif;
      font-size: 24px;
      font-weight: 800;
      background: linear-gradient(45deg, #00f7ff, #00d4ff);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      text-shadow: 0 0 10px rgba(0, 247, 255, 0.5);
    }

    .toggle-sidebar-btn {
      font-size: 24px;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
    }

    .toggle-sidebar-btn:hover {
      text-shadow: 0 0 15px #00f7ff;
    }

    /* Search Bar */
    .search-bar {
      flex-grow: 1;
      margin: 0 20px;
    }

    .search-form {
      position: relative;
      max-width: 400px;
    }

    .search-input {
      width: 100%;
      padding: 10px 40px 10px 15px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid #00f7ff;
      border-radius: 20px;
      color: #ffffff;
      font-family: 'Share Tech Mono', monospace;
      transition: all 0.3s ease-in-out;
    }

    .search-input:focus {
      outline: none;
      box-shadow: 0 0 15px rgba(0, 247, 255, 0.5);
      background: rgba(255, 255, 255, 0.1);
    }

    .search-btn {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #00f7ff;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
    }

    .search-btn:hover {
      text-shadow: 0 0 10px #00f7ff;
    }

    /* Navigation Icons */
    .header-nav ul {
      list-style: none;
      gap: 15px;
    }

    .nav-link.nav-icon {
      color: #ffffff;
      font-size: 20px;
      padding: 10px;
      position: relative;
      transition: all 0.3s ease-in-out;
    }

    .nav-link.nav-icon:hover {
      color: #00f7ff;
      text-shadow: 0 0 10px #00f7ff;
    }

    .badge-number {
      position: absolute;
      top: 5px;
      right: 5px;
      font-size: 12px;
      padding: 2px 6px;
    }

    .btn-neon {
  position: relative;
  display: inline-block;
  padding: 12px 30px;
  color: #ff4d4d; /* bright red for text */
  background-color: rgba(0, 0, 0, 0.8); /* semi-transparent dark background */
  border: 2px solid red;
  border-radius: 5px;
  font-size: 16px;
  text-transform: uppercase;
  font-weight: bold;
  cursor: pointer;
  text-decoration: none;
  transition: 0.3s ease-in-out;
  box-shadow: 0 0 5px red,
              0 0 10px red,
              0 0 20px red,
              0 0 40px red;
  z-index: 10;
}

.btn-neon:hover {
  background-color: red;
  color: black; /* clearly visible on red background */
  box-shadow: 0 0 10px white,
              0 0 20px red,
              0 0 40px red,
              0 0 80px red;
}






    /* Dropdown Styling */
    .dropdown-menu {
      background: linear-gradient(135deg, rgba(10, 15, 36, 0.95), rgba(15, 52, 96, 0.8));
      border: 1px solid rgba(0, 247, 255, 0.3);
      border-radius: 8px;
      padding: 15px;
      box-shadow: 0 10px 30px rgba(0, 247, 255, 0.2);
      transform: translateY(10px);
      transition: all 0.3s ease-in-out;
    }

    .dropdown-menu.show {
      transform: translateY(0);
    }

    .glassmorphism {
      backdrop-filter: blur(10px);
    }
    

    .dropdown-item {
      color: #b0eaff;
      font-family: 'Share Tech Mono', monospace;
      padding: 10px 15px;
      border-radius: 4px;
      transition: all 0.3s ease-in-out;
    }

    .dropdown-item:hover {
      color: #00f7ff;
      background: rgba(0, 247, 255, 0.15);
      transform: translateX(5px);
    }

    .dropdown-header {
      color: #ffffff;
      font-family: 'Exo 2', sans-serif;
    }

    .notification-item, .message-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 0;
    }

    .notification-item i, .message-item img {
      font-size: 20px;
      width: 40px;
      height: 40px;
    }

    .dropdown-divider {
      border-color: rgba(0, 247, 255, 0.2);
    }

    /* Profile */
    .nav-profile img {
      width: 36px;
      height: 36px;
      border: 2px solid #00f7ff;
      box-shadow: 0 0 10px rgba(0, 247, 255, 0.5);
    }

    /* Neon Text */
    .text-neon {
      color: #00f7ff;
      text-shadow: 0 0 5px #00f7ff, 0 0 10px #00f7ff;
      transition: all 0.3s ease-in-out;
    }

    .text-neon:hover {
      text-shadow: 0 0 15px #00f7ff, 0 0 25px #00f7ff;
    }
    /* Message Icon Size Reduction */
.message-item img,
.message-item i {
  width: 30px !important;
  height: 30px !important;
  object-fit: cover;
  font-size: 16px !important;
}

/* Fix overflow for messages and notifications */
.dropdown-menu.messages,
.dropdown-menu.notifications {
  max-height: 300px;
  overflow-y: auto;
  overflow-x: hidden;
}

/* Scrollbar customization (optional) */
.dropdown-menu::-webkit-scrollbar {
  width: 6px;
}
.dropdown-menu::-webkit-scrollbar-thumb {
  background-color: rgba(0, 247, 255, 0.4);
  border-radius: 3px;
}
.dropdown-menu::-webkit-scrollbar-track {
  background: transparent;
}

/* Smooth transitions for dropdowns */
.dropdown-menu {
  transition: max-height 0.3s ease-in-out;
}

/* Minor padding fix inside dropdown items */
.notification-item div,
.message-item div {
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  max-width: 200px;
}

/* Prevent body from horizontal overflow */
body {
  overflow-x: hidden;
}

/* Reduce icon sizes in header nav */
.nav-link.nav-icon i {
  font-size: 18px !important;
}


    /* Responsive Adjustments */
    @media (max-width: 991px) {
      .search-bar {
        display: none;
      }
      .header-nav ul {
        flex-direction: column;
        align-items: flex-start;
        padding: 20px;
        background: rgba(10, 15, 36, 0.9);
      }
      .btn-neon {
        width: 100%;
        text-align: center;
      }
    }
  </style>
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background: linear-gradient(90deg, #0a0f24, #1a2a44); border-bottom: 2px solid #00f7ff;">
    
  <i class="bi bi-list toggle-sidebar-btn text-neon" ></i>
    <!-- Logo Section -->
    <div class="d-flex align-items-center justify-content-between" style = "margin-left:20px">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <span class="brand-icon">
 
          <i class="bi bi-shield-lock"></i>
        </span>
   
        <span class="d-none d-lg-block brand-text">FraudXpert AI</span>
      </a>
  
    </div><!-- End Logo -->

    <!-- Search Bar -->
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search Transactions" title="Enter search keyword" class="search-input">
        <button type="submit" title="Search" class="search-btn"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <!-- Navigation Icons -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- Mobile Search Toggle -->
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle text-neon" href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon -->

        <!-- Login Button with Right Margin -->
        <li class="nav-item me-3">
          <a href="{{ route('make_payment') }}" class="btn btn-neon">Make Payment</a>
        </li><!-- End Login Button -->

       

        <!-- Profile Dropdown -->
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ url('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-neon">{{ Auth::user()->name ?? 'Guest' }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile glassmorphism">
            <li class="dropdown-header text-neon">
              <h6>{{ Auth::user()->name ?? 'Kevin Anderson' }}</h6>
              <span>Fraud Analyst</span>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item d-flex align-items-center text-neon" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item d-flex align-items-center text-neon" href="{{ url('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul>
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>