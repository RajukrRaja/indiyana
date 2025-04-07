<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FraudXpert AI - Sidebar</title>
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
      background: #0a0f24;
      font-family: 'Poppins', sans-serif;
      color: #ffffff;
      margin: 0;
      padding: 0;
    }

    /* Sidebar Container */
    .sidebar {
      position: fixed;
      top: 76px; /* 2cm ≈ 76px */
      left: 0;
      width: 260px; /* Slimmer design */
      height: calc(100vh - 76px); /* Adjust height to account for margin-top */
      background: linear-gradient(135deg, #0a0f24 0%, #1a2a44 50%, #0a0f24 100%);
      border-right: 2px solid rgba(0, 247, 255, 0.4);
      box-shadow: 0 0 30px rgba(0, 247, 255, 0.1), inset 0 0 10px rgba(0, 247, 255, 0.05);
      padding: 25px 15px;
      transition: all 0.4s ease-in-out;
      overflow-y: auto;
      z-index: 999;
    }

    .sidebar:hover {
      box-shadow: 0 0 40px rgba(0, 247, 255, 0.15), inset 0 0 15px rgba(0, 247, 255, 0.1);
      transform: translateX(5px);
    }

    /* Sidebar Navigation */
    .sidebar-nav {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .nav-item {
      margin-bottom: 12px;
    }

    .nav-link {
      display: flex;
      align-items: center;
      padding: 14px 20px;
      font-family: 'Exo 2', sans-serif;
      font-size: 18px;
      font-weight: 600;
      color: #ffffff;
      text-decoration: none;
      text-transform: uppercase;
      letter-spacing: 1.2px;
      background: linear-gradient(90deg, rgba(255, 255, 255, 0.05), rgba(0, 247, 255, 0.02));
      border-radius: 10px;
      position: relative;
      overflow: hidden;
      transition: all 0.4s ease-in-out;
      transform: perspective(500px) rotateX(0deg);
    }

    .nav-link i {
      margin-right: 15px;
      font-size: 22px;
      transition: transform 0.3s ease-in-out;
    }

    .nav-link span {
      flex-grow: 1;
    }

    .nav-link .bi-chevron-down {
      font-size: 14px;
      transition: transform 0.4s ease-in-out;
    }

    .nav-link:hover, .nav-link.active {
      color: #00f7ff;
      background: linear-gradient(90deg, rgba(0, 247, 255, 0.15), rgba(0, 247, 255, 0.05));
      box-shadow: 0 0 20px rgba(0, 247, 255, 0.4), inset 0 0 10px rgba(0, 247, 255, 0.2);
      transform: perspective(500px) rotateX(3deg);
    }

    .nav-link:hover i {
      transform: scale(1.1) translateX(5px);
    }

    .nav-link.collapsed .bi-chevron-down {
      transform: rotate(0deg);
    }

    .nav-link:not(.collapsed) .bi-chevron-down {
      transform: rotate(180deg);
    }

    /* Neon Glow Effect */
    .nav-link::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(120deg, transparent, rgba(0, 247, 255, 0.5), transparent);
      transition: left 0.6s ease-in-out;
    }

    .nav-link:hover::before {
      left: 100%;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 2px;
      background: #00f7ff;
      box-shadow: 0 0 10px #00f7ff;
      transition: width 0.4s ease-in-out, left 0.4s ease-in-out;
      transform: translateX(-50%);
    }

    .nav-link:hover::after, .nav-link.active::after {
      width: 80%;
    }

    /* Submenu */
    .nav-content {
      list-style: none;
      padding: 15px 0 0 35px;
      background: rgba(10, 15, 36, 0.95);
      border-radius: 0 0 10px 10px;
      box-shadow: inset 0 0 10px rgba(0, 247, 255, 0.1);
      transition: all 0.3s ease-in-out;
    }

    .nav-content li a {
      display: flex;
      align-items: center;
      padding: 12px 15px;
      font-family: 'Share Tech Mono', monospace;
      font-size: 15px;
      color: #b0eaff;
      text-decoration: none;
      border-radius: 6px;
      position: relative;
      transition: all 0.3s ease-in-out;
    }

    .nav-content li a i {
      margin-right: 12px;
      font-size: 14px;
      transition: transform 0.3s ease-in-out;
    }

    .nav-content li a:hover {
      color: #00f7ff;
      background: rgba(0, 247, 255, 0.2);
      transform: translateX(8px);
      box-shadow: 0 0 15px rgba(0, 247, 255, 0.3);
    }

    .nav-content li a:hover i {
      transform: scale(1.2);
    }

    /* Submenu Indicator */
    .nav-content li a::before {
      content: '>>';
      position: absolute;
      left: 0;
      opacity: 0;
      color: #00f7ff;
      font-size: 14px;
      transition: opacity 0.3s ease-in-out;
    }

    .nav-content li a:hover::before {
      opacity: 1;
    }

    /* Scrollbar Styling */
    .sidebar::-webkit-scrollbar {
      width: 6px;
    }

    .sidebar::-webkit-scrollbar-track {
      background: rgba(255, 255, 255, 0.03);
      border-radius: 3px;
    }

    .sidebar::-webkit-scrollbar-thumb {
      background: linear-gradient(180deg, #00f7ff, #00d4ff);
      border-radius: 3px;
      box-shadow: 0 0 10px rgba(0, 247, 255, 0.5);
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
      background: #00d4ff;
    }

    /* Responsive Adjustments */
    @media (max-width: 991px) {
      .sidebar {
        transform: translateX(-100%);
        width: 240px;
        top: 0; /* Reset top margin on mobile for full height */
        height: 100vh;
      }

      .sidebar.active {
        transform: translateX(0);
      }
    }
  </style>
</head>
<body>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <!-- Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('panel/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- User Management -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#user-management-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i>
          <span>User Management</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="user-management-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('/panel/user_admin_view') }}">
              <i class="bi bi-circle"></i>
              <span>Users</span>
            </a>
          </li>
          <li>
            <a href="components-roles.html">
              <i class="bi bi-circle"></i>
              <span>Roles</span>
            </a>
          </li>
          <li>
            <a href="components-permissions.html">
              <i class="bi bi-circle"></i>
              <span>Permissions</span>
            </a>
          </li>
          <li>
            <a href="components-logs.html">
              <i class="bi bi-circle"></i>
              <span>Activity Logs</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Company Pages -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#company-pages-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i>
          <span>Pages</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="company-pages-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('panel/pages/Navbar_page') }}">
              <i class="bi bi-circle"></i>
              <span>Navbar</span>
            </a>
          </li>
          <li>
            <a href="{{ url('panel/pages/Home_page') }}">
              <i class="bi bi-circle"></i>
              <span>Home</span>
            </a>
          </li>
          <li>
            <a href="{{ url('panel/pages/About_page') }}">
              <i class="bi bi-circle"></i>
              <span>About page</span>
            </a>
          </li>
          <li>
            <a href="{{ url('panel/pages/Contact_page') }}">
              <i class="bi bi-circle"></i>
              <span>Contact</span>
            </a>
          </li>
          <li>
            <a href="{{ url('panel/pages/Service_page') }}">
              <i class="bi bi-circle"></i>
              <span>Service page</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Payment -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#payment-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-credit-card"></i>
          <span>Payment</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="payment-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

        <li>
            <a href="payment-transactions.html">
              <i class="bi bi-circle"></i>
              <span> Creadit card fraud </span>
            </a>
          </li>
          <li>
          <li>
  <a href="{{ url('panel/dashboard/payments/transactions') }}">
    <i class="bi bi-circle"></i>
    <span>Transactions</span>
  </a>
</li>

            <a href="payment-methods.html">
              <i class="bi bi-circle"></i>
              <span>Payment Methods</span>
            </a>
          </li>
          <li>
            <a href="payment-invoices.html">
              <i class="bi bi-circle"></i>
              <span>Invoices</span>
            </a>
          </li>
          <li>
            <a href="payment-reports.html">
              <i class="bi bi-circle"></i>
              <span>Reports</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i>
          <span>Charts</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i>
              <span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i>
              <span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i>
              <span>ECharts</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Icon Management -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#company-icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-image"></i>
          <span>Icon Management</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="company-icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="company-logo.html">
              <i class="bi bi-image-alt"></i>
              <span>Company Logo</span>
            </a>
          </li>
          <li>
            <a href="company-branding.html">
              <i class="bi bi-palette"></i>
              <span>Branding & Theme</span>
            </a>
          </li>
          <li>
            <a href="company-icons.html">
              <i class="bi bi-gem"></i>
              <span>Custom Icons</span>
            </a>
          </li>
          <li>
            <a href="company-media.html">
              <i class="bi bi-file-earmark-image"></i>
              <span>Media & Graphics</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Company -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#company-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-building"></i>
          <span>Company</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="company-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="company-team.html">
              <i class="bi bi-circle"></i>
              <span>Our Team</span>
            </a>
          </li>
          <li>
            <a href="company-careers.html">
              <i class="bi bi-circle"></i>
              <span>Careers</span>
            </a>
          </li>
          <li>
            <a href="company-terms.html">
              <i class="bi bi-circle"></i>
              <span>Terms & Conditions</span>
            </a>
          </li>
          <li>
            <a href="company-privacy.html">
              <i class="bi bi-circle"></i>
              <span>Privacy Policy</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- F.A.Q -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li>
    </ul>
  </aside><!-- End Sidebar -->

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Sidebar Toggle Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const sidebar = document.getElementById('sidebar');
      const toggleBtn = document.querySelector('.toggle-sidebar-btn');
      
      if (toggleBtn) {
        toggleBtn.addEventListener('click', function () {
          sidebar.classList.toggle('active');
        });
      }
    });
  </script>
</body>
</html>