 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#user-management-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="user-management-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('/panel/user_admin_view')}}">
              <i class="bi bi-circle"></i><span>Users</span>
            </a>
          </li>
          <li>
            <a href="components-roles.html">
              <i class="bi bi-circle"></i><span>Roles</span>
            </a>
          </li>
          <li>
            <a href="components-permissions.html">
              <i class="bi bi-circle"></i><span>Permissions</span>
            </a>
          </li>
          <li>
            <a href="components-logs.html">
              <i class="bi bi-circle"></i><span>Activity Logs</span>
            </a>
          </li>
        </ul>
      </li><!-- End User Management Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#company-pages-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Pages</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="company-pages-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('panel/pages/Navbar_page')}}">
              <i class="bi bi-circle"></i><span>Navbar</span>
            </a>
          </li>
          <li>
            <a href="{{url('panel/pages/About_page')}}">
              <i class="bi bi-circle"></i><span>About page</span>
            </a>
          </li>

          <a href="{{url('panel/pages/Contact_page')}}">
            <i class="bi bi-circle"></i><span>Contact</span>
          </a>
        </li>

        <a href="{{url('panel/pages/Service_page')}}">
          <i class="bi bi-circle"></i><span>Service page</span>
        </a>
      </li>
          
         
            
        </ul>
      </li><!-- End Company Pages Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#payment-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-credit-card"></i><span>Payment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="payment-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="payment-transactions.html">
              <i class="bi bi-circle"></i><span>Transactions</span>
            </a>
          </li>
          <li>
            <a href="payment-methods.html">
              <i class="bi bi-circle"></i><span>Payment Methods</span>
            </a>
          </li>
          <li>
            <a href="payment-invoices.html">
              <i class="bi bi-circle"></i><span>Invoices</span>
            </a>
          </li>
          <li>
            <a href="payment-reports.html">
              <i class="bi bi-circle"></i><span>Reports</span>
            </a>
          </li>
        </ul>
      </li><!-- End Payment Nav -->
      

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#company-icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-image"></i><span>Icon Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="company-icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="company-logo.html">
              <i class="bi bi-image-alt"></i><span>Company Logo</span>
            </a>
          </li>
          <li>
            <a href="company-branding.html">
              <i class="bi bi-palette"></i><span>Branding & Theme</span>
            </a>
          </li>
          <li>
            <a href="company-icons.html">
              <i class="bi bi-gem"></i><span>Custom Icons</span>
            </a>
          </li>
          <li>
            <a href="company-media.html">
              <i class="bi bi-file-earmark-image"></i><span>Media & Graphics</span>
            </a>
          </li>
        </ul>
      </li><!-- End Company Icon Management Nav -->
      
 
    
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#company-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-building"></i><span>Company</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="company-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="company-team.html">
              <i class="bi bi-circle"></i><span>Our Team</span>
            </a>
          </li>
          <li>
            <a href="company-careers.html">
              <i class="bi bi-circle"></i><span>Careers</span>
            </a>
          </li>
          <li>
            <a href="company-terms.html">
              <i class="bi bi-circle"></i><span>Terms & Conditions</span>
            </a>
          </li>
          <li>
            <a href="company-privacy.html">
              <i class="bi bi-circle"></i><span>Privacy Policy</span>
            </a>
          </li>
        </ul>
      </li><!-- End Company Page Nav -->
      
    
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-faq.html">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->

  </aside><!-- End Sidebar-->
