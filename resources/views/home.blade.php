
@extends('layouts.app')


@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary px-0 px-md-5 mb-5"> 
    <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
            <h4 class="text-white mb-4 mt-5 mt-lg-0" data-aos="fade-right" data-aos-delay="200">
                Indiana Infotech Pvt. Ltd.
            </h4>
            <h1 class="display-3 font-weight-bold text-white" data-aos="fade-left" data-aos-delay="400">
                Transforming Ideas into Digital Solutions
            </h1>
            <p class="text-white mb-4" data-aos="fade-up" data-aos-delay="600">
                We provide custom software, mobile apps, ERP solutions, and digital marketing 
                services tailored for businesses. Our expert team delivers high-quality, scalable, 
                and user-friendly applications that enhance productivity and customer engagement.
            </p>
            <a href="#" class="btn btn-secondary mt-1 py-3 px-5" data-aos="zoom-in" data-aos-delay="800">
                Learn More
            </a>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <img class="img-fluid mt-5 animated-image" src="{{ asset('front/img/header.png') }}" 
                alt="Software Company Banner" data-aos="fade-left" data-aos-delay="1000" />
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Include AOS Animation Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,  // Animation duration (1 second)
        once: true,  // Runs only once when scrolling
    });
</script>

    <!-- Header End -->

    



 <!-- Facilities Start -->
<div class="container-fluid pt-5">
  <div class="container pb-3">
    <div class="text-center mb-5" data-aos="fade-up" data-aos-delay="200">
      <h2 class="text-primary font-weight-bold">Our Work Environment & Facilities</h2>
      <p class="text-muted">Providing a world-class workspace to empower innovation and collaboration.</p>
    </div>
    
    <div class="row">
      <!-- Facility Item 1 -->
      <div class="col-lg-4 col-md-6 pb-4" data-aos="flip-left" data-aos-delay="200">
        <div class="facility-box text-center p-4 shadow-sm rounded">
          <div class="facility-icon" data-aos="zoom-in" data-aos-delay="400">
            <i class="flaticon-050-fence text-primary"></i>
          </div>
          <h4 class="mt-3">Modern Workspace</h4>
          <p class="text-muted">
            Our office features ergonomic workstations and cutting-edge infrastructure to boost productivity.
          </p>
        </div>
      </div>

      <!-- Facility Item 2 -->
      <div class="col-lg-4 col-md-6 pb-4" data-aos="flip-right" data-aos-delay="400">
        <div class="facility-box text-center p-4 shadow-sm rounded">
          <div class="facility-icon" data-aos="zoom-in" data-aos-delay="600">
            <i class="flaticon-022-drum text-primary"></i>
          </div>
          <h4 class="mt-3">Innovation Hub</h4>
          <p class="text-muted">
            A dedicated R&D lab where AI, Machine Learning, and Cloud Computing bring ideas to life.
          </p>
        </div>
      </div>

      <!-- Facility Item 3 -->
      <div class="col-lg-4 col-md-6 pb-4" data-aos="flip-left" data-aos-delay="600">
        <div class="facility-box text-center p-4 shadow-sm rounded">
          <div class="facility-icon" data-aos="zoom-in" data-aos-delay="800">
            <i class="flaticon-030-crayons text-primary"></i>
          </div>
          <h4 class="mt-3">Training & Development</h4>
          <p class="text-muted">
            Continuous learning programs, workshops, and tech bootcamps keep our team updated.
          </p>
        </div>
      </div>

      <!-- Facility Item 4 -->
      <div class="col-lg-4 col-md-6 pb-4" data-aos="flip-right" data-aos-delay="800">
        <div class="facility-box text-center p-4 shadow-sm rounded">
          <div class="facility-icon" data-aos="zoom-in" data-aos-delay="1000">
            <i class="flaticon-017-toy-car text-primary"></i>
          </div>
          <h4 class="mt-3">Secure & Reliable IT</h4>
          <p class="text-muted">
            High-speed internet, cloud storage, and cybersecurity ensure a smooth workflow.
          </p>
        </div>
      </div>

      <!-- Facility Item 5 -->
      <div class="col-lg-4 col-md-6 pb-4" data-aos="flip-left" data-aos-delay="1000">
        <div class="facility-box text-center p-4 shadow-sm rounded">
          <div class="facility-icon" data-aos="zoom-in" data-aos-delay="1200">
            <i class="flaticon-025-sandwich text-primary"></i>
          </div>
          <h4 class="mt-3">Employee Wellness</h4>
          <p class="text-muted">
            Work-life balance with recreational areas, fitness programs, and mental health support.
          </p>
        </div>
      </div>

      <!-- Facility Item 6 -->
      <div class="col-lg-4 col-md-6 pb-4" data-aos="flip-right" data-aos-delay="1200">
        <div class="facility-box text-center p-4 shadow-sm rounded">
          <div class="facility-icon" data-aos="zoom-in" data-aos-delay="1400">
            <i class="flaticon-047-backpack text-primary"></i>
          </div>
          <h4 class="mt-3">Tech Meetups & Hackathons</h4>
          <p class="text-muted">
            Knowledge-sharing sessions, hackathons, and networking events to stay ahead in tech.
          </p>
        </div>
      </div>
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

<!-- Custom CSS -->
<style>
  .facility-box {
    background: #fff;
    border-top: 4px solid #007bff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .facility-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  }

  .facility-icon {
    width: 70px;
    height: 70px;
    background: rgba(0, 123, 255, 0.1);
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


<!-- Custom CSS -->
<style>
  .facility-box {
    background: #fff;
    border-top: 4px solid #007bff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .facility-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  }

  .facility-icon {
    width: 70px;
    height: 70px;
    background: rgba(0, 123, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    margin: 0 auto;
    font-size: 30px;
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
<div class="container-fluid pt-5 bg-light">
  <div class="container">
    <div class="text-center pb-4" data-aos="fade-up">
      <p class="section-title px-5">
        <span class="px-2">Our Core Services</span>
      </p>
      <h1 class="mb-4">What We Offer</h1>
    </div>
    <div class="row">
      
      <!-- Software Development -->
      <div class="col-lg-4 mb-5" data-aos="fade-right">
        <div class="card border-0 shadow-sm pb-2">
          <div class="text-center pt-4">
            <i class="fas fa-code fa-3x text-primary"></i>
          </div>
          <div class="card-body text-center">
            <h4 class="card-title">Software Development</h4>
            <p class="card-text">
              We specialize in developing ERP, HRM, Accounting, Payroll, and customized software solutions tailored to your needs.
            </p>
          </div>
          <div class="text-center">
            <a href="#" class="btn btn-primary px-4 mb-4">Learn More</a>
          </div>
        </div>
      </div>

      <!-- Mobile App Development -->
      <div class="col-lg-4 mb-5" data-aos="fade-up">
        <div class="card border-0 shadow-sm pb-2">
          <div class="text-center pt-4">
            <i class="fas fa-mobile-alt fa-3x text-primary"></i>
          </div>
          <div class="card-body text-center">
            <h4 class="card-title">Mobile App Development</h4>
            <p class="card-text">
              Build scalable, feature-rich mobile apps with our expert team skilled in Java, PHP, and .NET technologies.
            </p>
          </div>
          <div class="text-center">
            <a href="#" class="btn btn-primary px-4 mb-4">Learn More</a>
          </div>
        </div>
      </div>

      <!-- eCommerce Development -->
      <div class="col-lg-4 mb-5" data-aos="fade-left">
        <div class="card border-0 shadow-sm pb-2">
          <div class="text-center pt-4">
            <i class="fas fa-shopping-cart fa-3x text-primary"></i>
          </div>
          <div class="card-body text-center">
            <h4 class="card-title">eCommerce Development</h4>
            <p class="card-text">
              Turn your local shop into a high-performing eCommerce website with our customized, user-friendly solutions.
            </p>
          </div>
          <div class="text-center">
            <a href="#" class="btn btn-primary px-4 mb-4">Learn More</a>
          </div>
        </div>
      </div>

      <!-- Website Development -->
      <div class="col-lg-4 mb-5" data-aos="zoom-in">
        <div class="card border-0 shadow-sm pb-2">
          <div class="text-center pt-4">
            <i class="fas fa-globe fa-3x text-primary"></i>
          </div>
          <div class="card-body text-center">
            <h4 class="card-title">Website Development</h4>
            <p class="card-text">
              We create responsive, SEO-friendly websites and web applications with easy-to-use admin panels.
            </p>
          </div>
          <div class="text-center">
            <a href="#" class="btn btn-primary px-4 mb-4">Learn More</a>
          </div>
        </div>
      </div>

      <!-- Digital Marketing -->
      <div class="col-lg-4 mb-5" data-aos="flip-left">
        <div class="card border-0 shadow-sm pb-2">
          <div class="text-center pt-4">
            <i class="fas fa-chart-line fa-3x text-primary"></i>
          </div>
          <div class="card-body text-center">
            <h4 class="card-title">Digital Marketing</h4>
            <p class="card-text">
              Maximize your online presence with our expert SEO, PPC, and social media marketing strategies.
            </p>
          </div>
          <div class="text-center">
            <a href="#" class="btn btn-primary px-4 mb-4">Learn More</a>
          </div>
        </div>
      </div>

      <!-- Domain & Hosting -->
      <div class="col-lg-4 mb-5" data-aos="flip-right">
        <div class="card border-0 shadow-sm pb-2">
          <div class="text-center pt-4">
            <i class="fas fa-server fa-3x text-primary"></i>
          </div>
          <div class="card-body text-center">
            <h4 class="card-title">Domain & Hosting</h4>
            <p class="card-text">
              Secure and reliable domain registration & hosting services at competitive prices for all business needs.
            </p>
          </div>
          <div class="text-center">
            <a href="#" class="btn btn-primary px-4 mb-4">Learn More</a>
          </div>
        </div>
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
    duration: 1000, // Animation duration in milliseconds
    once: true, // Animation happens only once
  });
</script>



<!-- our ready Services start -->


    <style>
  /* Improved Software Section Styling */
.software-section {
    background-color: #f9fbfd;
    padding: 60px 0;
}

.software-box {
    background: #ffffff;
    border-radius: 12px;
    padding: 25px;
    display: flex;
    align-items: center;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.12);
    transition: all 0.3s ease-in-out;
    position: relative;
    overflow: hidden;
    border: 2px solid #e9ecef;
    margin: 10px;
}

.software-box:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    border-color: #007bff;
}

.software-icon {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    margin-right: 20px;
    border: 3px solid #007bff;
    padding: 5px;
    background: white;
}

.software-name {
    font-weight: 600;
    font-size: 1.3rem;
    color: #222;
}

.software-desc {
    font-size: 1rem;
    color: #555;
}

.software-link {
    text-decoration: none;
    color: #007bff;
    font-weight: 600;
    transition: all 0.3s ease-in-out;
}

.software-link:hover {
    text-decoration: underline;
    color: #0056b3;
}

    </style>

<!-- Include AOS Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<!-- Software Section -->
<section class="software-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1200">
            <h2 class="fw-bold">Our Ready Software</h2>
            <p class="text-muted">Powerful and user-friendly software solutions tailored to your business needs.</p>
        </div>

        <div class="row g-4">

            <!-- HRM Payroll Management Software -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                <div class="software-box">
                    <img src="https://static.thenounproject.com/png/4190214-200.png" class="software-icon" alt="HRM Software">
                    <div>
                        <h4 class="software-name">HRM Payroll Management</h4>
                        <p class="software-desc">Complete HR & Payroll solution with attendance, salary processing, and employee management.</p>
                        <a href="#" class="software-link">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Garments ERP Software -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="400">
                <div class="software-box">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjzLSvBWXW3jJPuA-mJF1DO2p2t0p1pJer6g&s" class="software-icon" alt="Garments ERP">
                    <div>
                        <h4 class="software-name">Garments ERP Software</h4>
                        <p class="software-desc">Manage merchandising, production, inventory, and payroll efficiently with our ERP solution.</p>
                        <a href="#" class="software-link">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Hospital Management System -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="600">
                <div class="software-box">
                    <img src="https://media.istockphoto.com/id/1300273646/vector/hospital-icon-design-vector-illustration-template.jpg?s=612x612&w=0&k=20&c=D3tyyURUrIL5b2jpNCEMcQNz57oF5mSlkLzPEfYagSo=" class="software-icon" alt="Hospital Management">
                    <div>
                        <h4 class="software-name">Hospital Management System</h4>
                        <p class="software-desc">Advanced hospital, clinic, and diagnostic center management for seamless operations.</p>
                        <a href="#" class="software-link">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Retail POS Software -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="800">
                <div class="software-box">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTO4MKuhKuzxGPFUlkXYJjiBKhejsvZLOTPzQ&s" class="software-icon" alt="Retail POS">
                    <div>
                        <h4 class="software-name">Retail POS Software</h4>
                        <p class="software-desc">Effortlessly manage sales, purchases, and inventory with our user-friendly POS software.</p>
                        <a href="#" class="software-link">Read More</a>
                    </div>
                </div>
            </div>

            <!-- School Management Software -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="1000">
                <div class="software-box">
                    <img src="https://www.shutterstock.com/image-vector/flat-school-building-icon-symbol-260nw-1425347555.jpg" class="software-icon" alt="School Management">
                    <div>
                        <h4 class="software-name">School Management System</h4>
                        <p class="software-desc">Manage students, teachers, attendance, exams, and payroll with ease.</p>
                        <a href="#" class="software-link">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Business ERP Software -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="1200">
                <div class="software-box">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9OpqU2s8HznmvxJVAfQbepX4mo-M3cGx2ZQ&s" class="software-icon" alt="Business ERP">
                    <div>
                        <h4 class="software-name">Business ERP Software</h4>
                        <p class="software-desc">Automate core business processes including production, inventory, and financial management.</p>
                        <a href="#" class="software-link">Read More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Initialize AOS -->
<script>
    AOS.init();
</script>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


   


<!-- our ready Services end-->

  <!-- Book A Seat Section Start -->
<div class="container-fluid py-5 book-seat-container">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Content -->
            <div class="col-lg-7 mb-5 mb-lg-0">
                <p class="section-title">
                    <span class="pr-2">Reserve Your Spot</span>
                </p>
                <h1 class="mb-4">Get Started with Indiana Infotech's Digital Solutions</h1>
                <p>
                    Looking for **top-notch software solutions**? Whether you need **custom software, website development, mobile apps, or digital marketing**, our experts are here to help. 
                    Book a consultation with us today and take your business to the next level.
                </p>
                <ul class="list-unstyled">
                    <li class="py-2">
                        <i class="fa fa-check text-success mr-3"></i> Expert Software & Web Development Services
                    </li>
                    <li class="py-2">
                        <i class="fa fa-check text-success mr-3"></i> Tailored Solutions for Your Business Needs
                    </li>
                    <li class="py-2">
                        <i class="fa fa-check text-success mr-3"></i> Quick Support & Customer Satisfaction Guaranteed
                    </li>
                </ul>
                <a href="#book-seat-form" class="btn btn-primary mt-3">Book A Free Consultation</a>
            </div>

            <!-- Right Side Booking Form -->
            <div class="col-lg-5">
                <div class="card shadow-lg p-4 book-seat-form">
                    <h3 class="text-center mb-4">Book A Seat</h3>
                    <form action="submit_form.php" method="POST">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required>
                        </div>

                        <div class="form-group">
                            <label for="service">Select Service</label>
                            <select id="service" name="service" class="form-control" required>
                                <option value="" disabled selected>Choose a service</option>
                                <option value="Website Development">Website Development</option>
                                <option value="Mobile App Development">Mobile App Development</option>
                                <option value="Software Development">Software Development</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="Business ERP Solutions">Business ERP Solutions</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Book A Seat Section End -->


    <!-- Team Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Our Team<span>
          </p>
          <h1 class="mb-4">Meet Our Developer </h>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div
              class="position-relative overflow-hidden mb-4"
              style="border-radius: 100%"
            >
              <img class="img-fluid w-100" src="{{ asset('front/img/team-1.jpg') }}" alt="" />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <h4>Julia Smith</h4>
            <i>Fontend Developer </i>
          </div>
          <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div
              class="position-relative overflow-hidden mb-4"
              style="border-radius: 100%"
            >
              <img class="img-fluid w-100" src="{{ asset('front/img/team-2.jpg') }}" alt="" />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <h4>Jhon Doe</h4>
            <i>Backend developer</i>
          </div>
          <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div
              class="position-relative overflow-hidden mb-4"
              style="border-radius: 100%"
            >
              <img class="img-fluid w-100" src="{{ asset('front/img/team-3.jpg') }}" alt="" />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <h4>Mollie Ross</h4>
            <i>DevOps Engineer</i>
          </div>
          <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div
              class="position-relative overflow-hidden mb-4"
              style="border-radius: 100%"
            >
              <img class="img-fluid w-100" src="{{ asset('front/img/team-4.jpg') }}" alt="" />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <h4>Donald John</h4>
            <i>Ai Engineer </i>
          </div>
        </div>
      </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
      <div class="container p-0">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Testimonial</span>
          </p>
          <h1 class="mb-4">What Parents Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
          <div class="testimonial-item px-3">
            <div class="bg-light shadow-sm rounded mb-4 p-4">
              <h3 class="fas fa-quote-left text-primary mr-3"></h3>
              Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
              eirmod clita lorem. Dolor tempor ipsum clita
            </div>
            <div class="d-flex align-items-center">
              <img
                class="rounded-circle"
             src="{{ asset('front/img/testimonial-1.jpg') }}"
                style="width: 70px; height: 70px"
                alt="Image"
              />
              <div class="pl-3">
                <h5>Parent Name</h5>
                <i>Profession</i>
              </div>
            </div>
          </div>
          <div class="testimonial-item px-3">
            <div class="bg-light shadow-sm rounded mb-4 p-4">
              <h3 class="fas fa-quote-left text-primary mr-3"></h3>
              Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
              eirmod clita lorem. Dolor tempor ipsum clita
            </div>
            <div class="d-flex align-items-center">
              <img
                class="rounded-circle"
                 src="{{ asset('front/img/testimonial-2.jpg') }}"
                style="width: 70px; height: 70px"
                alt="Image"
              />
              <div class="pl-3">
                <h5>Parent Name</h5>
                <i>Profession</i>
              </div>
            </div>
          </div>
          <div class="testimonial-item px-3">
            <div class="bg-light shadow-sm rounded mb-4 p-4">
              <h3 class="fas fa-quote-left text-primary mr-3"></h3>
              Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
              eirmod clita lorem. Dolor tempor ipsum clita
            </div>
            <div class="d-flex align-items-center">
              <img
                class="rounded-circle"
          src="{{ asset('front/img/testimonial-3.jpg') }}"
                style="width: 70px; height: 70px"
                alt="Image"
              />
              <div class="pl-3">
                <h5>Parent Name</h5>
                <i>Profession</i>
              </div>
            </div>
          </div>
          <div class="testimonial-item px-3">
            <div class="bg-light shadow-sm rounded mb-4 p-4">
              <h3 class="fas fa-quote-left text-primary mr-3"></h3>
              Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
              eirmod clita lorem. Dolor tempor ipsum clita
            </div>
            <div class="d-flex align-items-center">
              <img
                class="rounded-circle"
           src="{{ asset('front/img/testimonial-4.jpg') }}"
                style="width: 70px; height: 70px"
                alt="Image"
              />
              <div class="pl-3">
                <h5>Parent Name</h5>
                <i>Profession</i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonial End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Latest Blog</span>
          </p>
          <h1 class="mb-4">Latest Articles From Blog</h1>
        </div>
        <div class="row pb-3">
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="{{ asset('front/img/blog-1.jpg') }}" alt="" />
              <div class="card-body bg-light text-center p-4">
                <h4 class="">Diam amet eos at no eos</h4>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"
                    ><i class="fa fa-user text-primary"></i> Admin</small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-folder text-primary"></i> Web Design</small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-comments text-primary"></i> 15</small
                  >
                </div>
                <p>
                  Sed kasd sea sed at elitr sed ipsum justo, sit nonumy diam
                  eirmod, duo et sed sit eirmod kasd clita tempor dolor stet
                  lorem. Tempor ipsum justo amet stet...
                </p>
                <a href="" class="btn btn-primary px-4 mx-auto my-2"
                  >Read More</a
                >
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="{{ asset('front/img/blog-2.jpg') }}" alt="" />
              <div class="card-body bg-light text-center p-4">
                <h4 class="">Diam amet eos at no eos</h4>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"
                    ><i class="fa fa-user text-primary"></i> Admin</small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-folder text-primary"></i> Web Design</small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-comments text-primary"></i> 15</small
                  >
                </div>
                <p>
                  Sed kasd sea sed at elitr sed ipsum justo, sit nonumy diam
                  eirmod, duo et sed sit eirmod kasd clita tempor dolor stet
                  lorem. Tempor ipsum justo amet stet...
                </p>
                <a href="" class="btn btn-primary px-4 mx-auto my-2"
                  >Read More</a
                >
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="{{ asset('front/img/blog-3.jpg') }}" alt="" />
              <div class="card-body bg-light text-center p-4">
                <h4 class="">Diam amet eos at no eos</h4>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"
                    ><i class="fa fa-user text-primary"></i> Admin</small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-folder text-primary"></i> Web Design</small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-comments text-primary"></i> 15</small
                  >
                </div>
                <p>
                  Sed kasd sea sed at elitr sed ipsum justo, sit nonumy diam
                  eirmod, duo et sed sit eirmod kasd clita tempor dolor stet
                  lorem. Tempor ipsum justo amet stet...
                </p>
                <a href="" class="btn btn-primary px-4 mx-auto my-2"
                  >Read More</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Blog End -->
@endsection
 