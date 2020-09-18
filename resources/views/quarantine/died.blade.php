<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>COVID 19 Quarantine | Add Death</title>
  <script src="/ajax/jquery.min.js"></script>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  

  <!-- Favicons -->
  <link rel="icon" href="svg/test.PNG" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <script src="/ajax/jquery.min.js"></script>

  <style>
  #done{
    background-color: green;
    color:white;
  }
  .table{
    color:white;
  }

  #header,#footer{
        background-color:green;
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
      <h5 class="text-light mt-2"><a href="/home"><span style ="color:white;">COVID-19 </span></a>| {{auth()->user()->facility->name}}</h5>
        <!-- Uncomment below if you prefer to use an image logo -->
         
      </div>
      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class=""><a href="/home">Home</a></li>

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
          <div class="col-lg-12">
          <hr>
          <h5 style="color:white;">Patient Details</h5>
             <form method="POST" action="/deaths/record" validate>
                  @csrf

                  <div class="form-group row">
                      
                      <div class="col-md-12">
                      <input type="text" class="form-control" name="idnumber" placeholder="RSA I.D / Passport Number" aria-label="ID" aria-describedby="basic-addon1" required>
                   
                         @error('idnumber')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1" required>
                         @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="surname" placeholder="Surname" aria-label="Surname" aria-describedby="basic-addon1" required>
                       @error('surname')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <label for="dob" style="color:white;">Date Of Birth</label>
                      <input type="date" class="form-control" name ="dob" placeholder="Date Of Birth" aria-label="Date Of Birth" aria-describedby="basic-addon1" required>
                    @error('dob')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                                <select class="custom-select" id="inputGroupSelect02" name="residency" required>
                                    <option value="">Residency...</option>
                                    <option value="SA Resident">SA Resident</option>
                                    <option value="Non SA Resident">Non SA Resident</option>
                                </select>
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                                <select class="custom-select" id="inputGroupSelect02" name="sex" required>
                                    <option value="">Sex...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                      </div>
                  </div>

                
                   <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="address" placeholder="Current Physical Address" aria-label="Current Physical Address" aria-describedby="basic-addon1" required>
                       @error('address')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>


                  <div class="form-group row">
                      <div class="col-md-12">
                                <select class="custom-select" id="inputGroupSelect02" name="race" required>
                                    <option value="">Race...</option>
                                    <option value="Asian/Indian">Asian/Indian</option>
                                    <option value="Black">Black</option>
                                    <option value="White">White</option>
                                    <option value="Colored">Colored</option>
                                    <option value="Other">Other</option>
                                </select>
                      </div>
                  </div>



                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="email" class="form-control" name ="email" placeholder="Email Address" aria-label="Email Address" aria-describedby="basic-addon1" >
                    @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="number" class="form-control" name ="kids" placeholder="Number of children <18 in the household" aria-label="Number of children <18 in the household" aria-describedby="basic-addon1" required>
                      @error('kids')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="number" class="form-control" name ="elderly" placeholder="Number of elderly >60 in the household" aria-label="Number of  elderly >60 in the household" aria-describedby="basic-addon1" required>
                     @error('elderly')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="occupation" placeholder="Occupation" aria-label="Occupation" aria-describedby="basic-addon1" required>
                      @error('occupation')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="employer" placeholder="Employer Name/School/Facility" aria-label="Employer Name/School/Facility" aria-describedby="basic-addon1" required>
                     @error('employer')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <h5 style="color:white;">Doctor Details(Optional)</h5>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="docname" placeholder="First Name" aria-label="First Name" aria-describedby="basic-addon1">
                       @error('docname')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="docsurname" placeholder="Surname" aria-label="Surname" aria-describedby="basic-addon1">
                   @error('docsurname')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="facility" placeholder="Facility Name" aria-label="Facility" aria-describedby="basic-addon1">
                      @error('facility')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="phone" class="form-control" name ="docphone" placeholder="Contact Number(s)" aria-label="Contact Number(s)" aria-describedby="basic-addon1">
                      @error('docphone')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="email" class="form-control" name ="docemail" placeholder="Email Address" aria-label="Contact Number(s)" aria-describedby="basic-addon1">
                    @error('docemail')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <h5 style="color:white;"> Next Of Kin</h5>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="kinname" placeholder="First Name" aria-label="First Name" aria-describedby="basic-addon1" required>
                       @error('kinname')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="kinsurname" placeholder="Surname" aria-label="Surname" aria-describedby="basic-addon1" required>
                     @error('kinsurname')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="kinphone" placeholder="Contact Number" aria-label="Contact Numbers" aria-describedby="basic-addon1" required>
                      @error('kinphone')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="relationship" placeholder="Relationship" aria-label="Contact Numbers" aria-describedby="basic-addon1" required>
                      @error('relationship')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                  <h5 style="color:white;  background-color:blue;">Clinical Presentation</h5>
                  <!--one--->
                  <div class="form-group row">
                            <div class="col-md-12">
                                  <div class="d-flex">
                                      <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="fever" required>
                                              <option value="">Fever...</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>

                                      <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="cough" required>
                                              <option value="">Cough...</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>


                                      <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="chills" required>
                                              <option value="">Chills...</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>

                                      <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="bodypains" required>
                                              <option value="">BodyPains...</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>

                                      <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="weakness" required>
                                              <option value="">Weakness...</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>

                                      <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="confusion" required>
                                              <option value="">Confusion...</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                            </div>
                        </div>
                  </div>
                  <!--End One-->
                  <div class="form-group row">
                      <div class="col-md-12">

                            <div class="d-flex">
                                    
                                      <div class="col-lg-3">
                                            <select class="custom-select" id="inputGroupSelect02" name="asymptomatic" required>
                                              <option value="">None(Asymptomatic)</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>

                                      <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="throat" required>
                                              <option value="">Sore Throat ...</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                  
                                      <div class="col-lg-3">
                                            <select class="custom-select" id="inputGroupSelect02" name="breath" required>
                                              <option value="">Shortness of breath </option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>

                                      <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="vomiting" required>
                                              <option value="">Vomiting </option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>

                                      <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="diarrhoe" required>
                                              <option value="">Diarrhoea </option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                      </div>
                                    

                            </div>

                      </div>
                  </div>
                  <!---two---->

                  <div class="form-group row">
                      <div class="col-md-12">
                          <div class="d-flex">
                             

                                  <div class="form-check form-check-inline">
                                     <a href="#other" class="btn btn-success btn-sm" data-toggle="collapse" data-target="#other"><h5>Other Specify</h5></a>
                                  </div>

                          </div>
                      </div>
                  </div>

                  <div class="form-group row collapse" id="other">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="other" placeholder="Specify" aria-label="Contact Numbers" aria-describedby="basic-addon1">
                      @error('relationship')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <!----four----->
                  <h5 class="" style="color:white; background-color:blue;">Underlying Factors/CO-MORBID Conditions</h5>
                  <div class="form-group row">
                      <div class="col-md-12">
                          <div class="d-flex">


                                  <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="asthma" required>
                                              <option value="">Asthma </option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>

                                  <div class="col-lg-3">
                                            <select class="custom-select" id="inputGroupSelect02" name="neurological" required>
                                              <option value="">Chronic neurological Disease </option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>

                                  <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="hiv" required>
                                              <option value="">HIV </option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>

                                  <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="obesity" required>
                                              <option value="">Obesity </option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>

                                  <div class="col-lg-3">
                                            <select class="custom-select" id="inputGroupSelect02" name="cardiac" required>
                                              <option value="">Cardiac Disease</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>


                          </div>
                      </div>
                  </div>

                  <!----End Four------>

                  <div class="form-group row">
                      <div class="col-md-12">
                          <div class="d-flex">


                                  <div class="col-lg-3">
                                            <select class="custom-select" id="inputGroupSelect02" name="pulmonary" required>
                                              <option value="">Chronic Pulmonary Disease</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>

                                  <div class="col-lg-3">
                                            <select class="custom-select" id="inputGroupSelect02" name="viral" required>
                                              <option value="">Patient Virally Suppressed?</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>

                                  <div class="col-lg-3">
                                            <select class="custom-select" id="inputGroupSelect02" name="pregnant" required>
                                              <option value="">Pregnancy</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>

                                  <div class="col-lg-3">
                                            <select class="custom-select" id="inputGroupSelect02" name="kidney" required>
                                              <option value="">Chronic Kidney Disease </option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>


                          </div>
                      </div>
                  </div>

                  <!---Five------->

                  <div class="form-group row">
                      <div class="col-md-12">
                          <div class="d-flex">

                                  <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="diabetes" required>
                                              <option value="">Diabetes</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>

                                  <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="liver" required>
                                              <option value="">Chronic Liver</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>

                                  <div class="col-lg-3">
                                            <select class="custom-select" id="inputGroupSelect02" name="immuno" required>
                                              <option value="">Immuno Deficiency(Excluding HIV)</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>
                             
                                  <div class="col-lg-2">
                                            <select class="custom-select" id="inputGroupSelect02" name="arv" required>
                                              <option value="">ARV</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>

                                  <div class="col-lg-3">
                                            <select class="custom-select" id="inputGroupSelect02" name="tb" required>
                                              <option value="">Tuberculosis</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
                                          </select>
                                  </div>

                          </div>
                      </div>
                  </div>

                  <!---End Five--->

                  <!---Six------->

                  <div class="form-group row">
                      <div class="col-md-12">
                          <div class="d-flex">
                             
                                  

                          </div>
                      </div>
                  </div>
                  <!---End Six------->

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="specify" placeholder="Specify Other" aria-label="Contact Numbers" aria-describedby="basic-addon1">
                      @error('specify')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="viralload" placeholder="Recent Viral Load" aria-label="Contact Numbers" aria-describedby="basic-addon1">
                      @error('viralload')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-12">
                      <input type="text" class="form-control" name ="trimester" placeholder="Trimester" aria-label="trimester" aria-describedby="basic-addon1">
                      @error('trimester')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                 

                  <div class="form-group row mb-0 offset-2">
                      <div class="col-md-8 offset-md-4">
                          <button type="submit" class="btn btn-success">
                              {{ __('Submit') }}
                          </button>
                      </div>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </section>

    <script>
        $(document).ready(function(){

        $('#district').keyup(function(){ 
                var query = $(this).val();
                if(query != '')
                {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                url:"{{ route('autocomplete.fetch') }}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                $('#districtList').fadeIn();  
                            $('#districtList').html(data);
                }
                });
                }
            });

            $(document).on('click', 'li', function(){  
                $('#district').val($(this).text());  
                $('#districtList').fadeOut();  
            });  
        });
    </script>
   

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
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="/assets/vendor/venobox/venobox.min.js"></script>
  <script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="/assets/vendor/counterup/counterup.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>