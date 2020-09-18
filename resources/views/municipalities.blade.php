<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>COVID 19 Register | Municipalities</title>
  <script src="/ajax/jquery.min.js"></script>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="svg/test.PNG" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    #done{
    background-color: green;
    color:white;
  }
  .table{
    color:white;
  }
  </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left d-flex">
      <a href="/home"><img src="/svg/test.png" alt="" class="img-fluid" style="height: 90px;width:100px;"></a>
      <h5 class="text-light mt-2"><a href="/home"><span style ="color:white;">COVID-19 Register</span></a></h5>
        <!-- Uncomment below if you prefer to use an image logo -->
         
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class=""><a href="/home">Dashboard</a></li>
          <li class=""><a href="/recoveries">Recoveries</a></li>
          <li class=""><a href="/cases">Cases</a></li>
          <li class=""><a href="/deaths">Deaths</a></li>
          <li><a href="#"> {{ Auth::user()->name }}</a></li>
          <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              <button class="btn btn-danger btn-md p-2">Log Out</button>
                    @csrf
            </form>
          </li>
          
        </ul>
        
      </nav><!-- .nav-menu -->

    </div>
  </header>



  <main id="main">

  <!----Dashboard Section------>
    <section class="counts section-bg">
      <div class="container">
      <div class="row">

      <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
  <div class="count-box">
  <div class="icon"><i class='bx bxs-folder-open' style="color: red;"></i></div>
    <span><a href="/limpopo"><p style="color: red;">Limpopo</p></a></span>
    
  </div>
</div>

<!---
<div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
  <div class="count-box">
  <div class="icon"><i class='bx bxs-folder-open' style="color: red;"></i></div>
    <span><a href="/gauteng"><p style="color: red;">Gauteng<p></a></span>
    
  </div>
</div>

<div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
  <div class="count-box">
    <i class='bx bxs-folder-open'  style="color: red;"></i>
    <span><a href="/mpumalanga"><p style="color: red;">Mpumalanga<p></a></span>
  </div>
</div>

<div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
  <div class="count-box">
    <i class='bx bxs-folder-open'  style="color: red;"></i>
    <span><a href="/kzn"><p style="color: red;">Kwa-Zulu Natal<p></a></span>
  </div>
</div>

<div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
  <div class="count-box">
    <i class='bx bxs-folder-open'  style="color:red;"></i>
    <span><a href="/nw"><p style="color: red;">North West</p></a></span>
    <p></p>
  </div>
</div>

<div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
  <div class="count-box">
    <i class='bx bxs-folder-open'  style="color:red;"></i>
    <span><a href="/nc"><p style="color: red;">Northern Cape</p></a></span>
    <p></p>
  </div>
</div>

<div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
  <div class="count-box">
    <i class='bx bxs-folder-open'  style="color:red;"></i>
    <span><a href="/ec"><p style="color: red;">Eastern Cape</p></a></span>
    <p></p>
  </div>
</div>

<div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
  <div class="count-box">
    <i class='bx bxs-folder-open'  style="color:red;"></i>
    <span><a href="/fs"><p style="color: red;">Free State</p></a></span>
    <p></p>
  </div>
</div>

---->
</div>
      </div>
    </section>

   <!---Modal--->
<div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Patient Details</h4>
                </div>
                <div class="modal-body">
                    <form id="CustomerForm" name="CustomerForm" class="form-horizontal" action ="/addrecovery" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="100" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">ID NO</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter ID Number" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Street</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="street" name="street" placeholder="Enter Address" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Town</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="town" name="town" placeholder="Enter Town" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Province</label>

                            <div class="col-sm-12">
                                <select class="custom-select" id="inputGroupSelect02" name="province" required>
                                    <option value="">Choose...</option>
                                    <option value="Gauteng">Gauteng</option>
                                    <option value="Kwa-Zulu Natal">Kwa-Zulu Natal</option>
                                    <option value="Limpopo">Limpopo</option>
                                    <option value="Mpumalanga">Mpumalanga</option>
                                    <option value="North West">North West</option>
                                    <option value="Free State">Free State</option>
                                    <option value="Eastern Cape">Eastern Cape</option>
                                    <option value="Western Cape">Western Cape</option>
                                    <option value="Northern Cape">Northern Cape</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">D.O.B</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="dob" name="dob" placeholder="Date Of Birth" value="" maxlength="20" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="" maxlength="50">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Occupation</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation" value="" maxlength="50">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Date Tested</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="tested" name="tested" placeholder="Date Confirmed Positive" value="" maxlength="50">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Conditions</label>
                            <div class="col-sm-12">
                                <textarea id="detail" name="conditions"  placeholder="Existing Medical Conditions" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save Recovery
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <!---Modal--->

    
    <!-- ======= About Lists Section 
    <section class="about-lists">
      <div class="container">
      <h3 class="text-center pb-3">Red Heart Product List</h3>
        <div class="row no-gutters">
          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
          <span></span>
            <h4>Pocket Cash</h4>
            <p>A safer way for Learners to carry pocket money to school</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
            <span></span>
            <h4>Digital Red Heart MapTech E-Chip</h4>
            <p>Asset tracking and tracing device in real time</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
            <span></span>
            <h4>Digital Red Heart V Tech</h4>
            <p>Track and tracing device for the transportation industry, e.g Courier companies, Taxi Industry e.t.c </p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
            <span></span>
            <h4>Digital Red Heart Emergency Tool</h4>
            <ul>
            <li><p>Track and tracing of Human capital in real time</p></li>
            <li><p>Track and tracing Life stock track in real time</p></li>
            <li><p>Track and tracing of learners in real time</p></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="400">
            <span></span>
            <h4>Corporate Red Heart emergency access Card </h4>
            <ul>
            <li><p>Security Companies</p></li>
            <li><p>Construction Companies</p></li>
            <li><p>Public Servants</p></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="500">
            <span></span>
            <h4>Added Feature </h4>
            <p>Please note that our Red Heart Emergency tool can be customized per Industry</p>
          </div>
        </div>

      </div>
    </section>
    
    End About Lists Section -->

    <!-- ======= 
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
            <div class="icon"><i class="icofont-computer"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="icofont-chart-bar-graph"></i></div>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="icofont-earth"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="icofont-image"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="icofont-settings"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
            <div class="icon"><i class="icofont-tasks-alt"></i></div>
            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>
        </div>

      </div>
    </section>

    ======= -->

    <!--
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
          <h2>Product List Continued</h2>
          <p>Red Heart is delivered through these devices.</p>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/pocket.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Pocket Cash</h4>
                
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/back.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-eye"></i></a>
                  <a href="/pocketcash" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/added.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Digital Red Heart MapTech E-Chip</h4>
                
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/added.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-eye"></i></a>
                  <a href="/asset" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/vtech.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Digital Red Heart V-Tech</h4>
                
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/vtech.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="icofont-eye"></i></a>
                  <a href="vtech" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/pocket.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Digital Red Heart Emergency Tool</h4>
                
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/pocket.jpg" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="icofont-eye"></i></a>
                  <a href="emergency" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cooperateView.jpg" class="img-fluid" alt="" >
              <div class="portfolio-info">
                <h4>Corporate Red Heart emergency access Card </h4>
                
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/cooperate.jpg" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="icofont-eye"></i></a>
                  <a href="/cooperate" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/pocket.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Custom Red Heart</h4>
                
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/pocket.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="icofont-eye"></i></a>
                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    
     End Our Portfolio Section -->

    <!-- ======= Our Team Section ======= -->

    <!-- =======
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="row  d-flex align-items-stretch">

          <div class="col-lg-6 faq-item" data-aos="fade-up">
            <h4>Non consectetur a erat nam at lectus urna duis?</h4>
            <p>
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="100">
            <h4>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h4>
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="200">
            <h4>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?</h4>
            <p>
              Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="300">
            <h4>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h4>
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="400">
            <h4>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h4>
            <p>
              Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="500">
            <h4>Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor?</h4>
            <p>
              Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
            </p>
          </div>

        </div>

      </div>
    </section><  -->

   

    <!-- ======= ======= -->
   
   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
       
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>AfrigotelTech</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
        Red Heart by <a href="https://afrigoteltech.co.za/">AfrigotelTech</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>