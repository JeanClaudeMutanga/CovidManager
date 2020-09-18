<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>COVID 19 Tracking | Profile</title>
  <script src="/ajax/jquery.min.js"></script>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
      <h5 class="text-light mt-2"><a href="/home"><span style ="color:white;">COVID-19 Tracking</span></a> | {{auth()->user()->facility->name}}</h5>
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
      <div class="container col-lg-10 justify-content-center">
        <div class="row">
          <div class="col-lg-12">
              <h5 class="text-center " style="color:white;">Patient Profile</h5>
              <div class="col-5">
              <h5 style="color:white;">Case Name: {{$patients->name}} </h5>
              <h5 style="color:white;">ID Number: {{$patients->idnumber}} </h5>
              <h5 style="color:white;">Address: {{$patients->address}} </h5>
              <h5 style="color:white;">Province: {{$patients->province}} </h5>
              <h5 style="color:white;">Test Results: {{$patients->result}} </h5>
              <h5 style="color:white;">Current Status : {{$patients->type}}</h5>
            </div>
            

           <br>

            @include('layouts.messages')

            <h5 class="btn-success text-center" style="color:white;">Bed Occupation</h5>
                  <div class="card">
                  <table class="table table-striped mt-5 responsive text-muted">
                          <thead>
                              <tr>
                              <th scope="col"><strong>Bed Number</strong> </th>
                              <th scope="col"><strong>Ward</strong> </th>
                              <th scope="col"><strong>Room</strong> </th>
                              <th scope="col"><strong>Date</strong></th>
                              <th scope="col"><strong>Cleared/Discharged</strong></th>
                              <th scope="col"><strong>Date Cleared/Discharged</strong></th>
                              <th scope="col"><strong>Allocate Bed</strong></th>
                              </tr>
                          </thead>
                          
                          <tbody class= "mt-2">
                              @foreach(auth()->user()->facility->admit->where('patients_id', $patients->id) as $admit)
                                <th>{{$admit->beds->number}}</th>         
                                <th>{{$admit->beds->ward}}</th>         
                                <th>{{$admit->beds->room}}</th>         
                                <th>{{$admit->created_at}}</th>         
                                <th>{{$admit->left_at}}</th>         
                                <th>{{$admit->notes}}</th> 
                              @endforeach    
                              <th><a href="#bed" data-target="#bed" data-toggle="modal" class="btn btn-success btn-sm">Allocate</a></th>       
                          </tbody>
                      
                      </table>
                  </div>

            <h5 class="btn-success text-center" style="color:white; margin-top:10px;">Personal Details</h5>
                 <div class="card">
                 <table class="table table-striped mt-5 responsive text-muted">
                          <thead>
                              <tr>
                              <th scope="col"><strong>Surname</strong> </th>
                              <th scope="col"><strong>Name</strong></th>
                              <th scope="col"><strong>sex</strong></th>
                              <th scope="col"><strong>Residency</strong></th>
                              <th scope="col"><strong>Address</strong></th>
                              <th scope="col"><strong>Result</strong></th>
                              </tr>
                          </thead>
                          
                          <tbody class= "">
                              
                              <tr>
                              <td scope="row"><strong>{{$patients->surname}}</strong></td>
                              <td>{{$patients->name}}</td>
                              <td>{{$patients->sex}}</td>
                              <td>{{$patients->residency}}</td>
                              <td>{{$patients->address}}</td>
                              <td>{{$patients->result}}</td>
                              </tr>
                                              
                          </tbody>
                      
                      </table>
                 </div>

                      <h5 class="btn-success text-center mt-2" style="color:white;">Facility Details</h5>
                      <div class="card">
                      <table class="table table-striped mt-5 responsive text-muted">
                          <thead>
                              <tr>
                              <th scope="col"><strong>Facility Name</strong> </th>
                              <th scope="col"><strong>Date Quarantined</strong></th>
                              <th scope="col"><strong>Cleared/Discharged</strong></th>
                              </tr>
                          </thead>
                         
                          <tbody class= "mt-2">
                          @foreach(auth()->user()->facility->admit->where('patients_id',$patients->id) as $admitted)
                                <th>{{auth()->user()->facility->name}}</th>         
                                <th>{{$admitted->created_at}}</th>         
                                <th>{{$admitted->left_at ?? "Not Discharged Yet"}}</th>   
                          @endforeach      
                          </tbody>
                      
                      </table>
                      </div>

                      <h5 class="btn-success text-center mt-2" style="color:white;">Patient Referrals</h5>
                      <div class="card">
                      <table class="table table-striped mt-5 responsive text-muted">
                          <thead>
                              <tr>
                              <th scope="col"><strong>Referred From</strong> </th>
                              <th scope="col"><strong>Date</strong></th>
                              <th scope="col"><strong>Destination</strong></th>
                              <th scope="col"><strong>Refer Patient*</strong></th>
                              </tr>
                          </thead>
                         
                          <tbody class= "mt-2">
                          <tr>
                          @foreach($patients->referrals as $referral)
                                <th>{{$referral->facility->name}}</th>         
                                <th>{{$referral->created_at}}</th>         
                                <th>{{$referral->	recipient_facility_name}}</th>   
                                
                          @endforeach  
                          <th><a href="#ReferPatient" data-target="#ReferPatient" data-toggle="modal" class="btn btn-success btn-sm">Refer Patient</a> </th>
                          </tr>
                          </tbody>
                    
                      </table>
                      </div>

                      <h5 class="btn-success text-center mt-2" style="color:white;">Discharge</h5>
                     <div class="card">
                     <table class="table table-striped mt-5 responsive text-muted">
                          <thead>
                              <tr>
                              <th scope="col"><strong>Discharged</strong> </th>
                              <th scope="col"><strong>Date</strong></th>
                              <th scope="col"><strong>Notes</strong></th>
                              <th scope="col"><strong>Discharge Patient*</strong></th>
                              </tr>
                          </thead>
                         
                          <tbody class= "mt-2">
                          <tr>
                          @foreach($patients->discharges as $discharge)
                                <th>@if($discharge->id == "")
                                <p>No</p>
                                @else
                                <p>No</p>
                                @endif
                                </th>         
                                <th>{{$discharge->created_at}}</th>         
                                <th>{{$discharge->notes}}</th>   
                                
                          @endforeach  
                          <th><a href="#DischargePatient" data-target="#DischargePatient" data-toggle="modal" class="btn btn-success btn-sm">Discharge Patient</a> </th>
                          </tr>
                          </tbody>
                    
                      </table>
                     </div>
          </div>
        </div>
      </div>
    </section>

    <!---Modal--->
    <div class="modal fade" id="DischargePatient" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Discharge Details Details</h4>
                </div>
                <div class="modal-body">
                    <form id="CustomerForm" name="CustomerForm" class="form-horizontal" action ="/discharge/patient/{{$patients->id}}" method="POST">
                    @csrf


                        <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Notes</label>

                            <div class="col-sm-12">
                                <textarea class="form-control" name="notes" id="" cols="30" rows="10" placeholder="Notes"></textarea>
                            </div>
                        </div>
                        
                      
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Discharge
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <!---Modal--->

    <!---Modal--->
    <div class="modal fade" id="ReferPatient" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Destination Facility Details</h4>
                </div>
                <div class="modal-body">
                    <form id="CustomerForm" name="CustomerForm" class="form-horizontal" action ="/refer/patient/{{$patients->id}}" method="POST">
                    @csrf


                        <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Facility</label>

                            <div class="col-sm-12">
                                <select class="custom-select" id="inputGroupSelect02" name="recipient_id" required>
                                    <option value="">Choose...</option>
                                    @foreach($facilities as $facility)
                                    <option value="{{$facility->id}}">{{$facility->name}} | :  {{$facility->province}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Notes</label>

                            <div class="col-sm-12">
                                <textarea class="form-control" name="notes" id="" cols="30" rows="10" placeholder="Notes"></textarea>
                            </div>
                        </div>
                        
                      
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Refer
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <!---Modal--->

   <!---Modal--->
      <div class="modal fade" id="bed" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Choose Bed</h4>
                </div>
                <div class="modal-body">
                    <form id="CustomerForm" name="CustomerForm" class="form-horizontal" action ="/patient/bed/{{$patients->id}}" method="POST">
                    @csrf

                        <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Bed</label>

                            <div class="col-sm-12">
                                <select class="custom-select" id="inputGroupSelect02" name="bed" required>
                                    <option value="">Choose...</option>
                                    @foreach(auth()->user()->facility->beds->where('available',"Yes") as $bed)
                                    <option value="{{$bed->id}}">Bed Number:{{$bed->number}} | Ward:{{$bed->ward}} | Room:{{$bed->room}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                      
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <!---Modal--->

        <script>
          $(document).ready(function () {
          const timeout = 900000;  // 900000 ms = 15 minutes
          var idleTimer = null;
          $('*').bind('mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick', function () {
              clearTimeout(idleTimer);

              idleTimer = setTimeout(function () {
                  document.getElementById('logout-form').submit();
              }, timeout);
          });
          $("body").trigger("mousemove");
        });
     </script>

    
  

   
   
   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>AfrigotelTech</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
   
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
  <script src="assets/js/main.js"></script>

</body>

</html>