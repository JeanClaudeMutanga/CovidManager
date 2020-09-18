@extends('layouts.app')
@include('layouts.patientsnav')
@section('content')

<div class="col-lg-10 offset-1" id="dash">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 class="text-center"><strong>Cases</strong></h4>
            <form action="/search" method="get">
                <div class="input-group">
                    <input class="form-control" type="search" name="search" placeholder="ID Number" id="search">
                    <span class="input-group-prepend">
                    <button class="btn btn-primary">Search</button>
                    </span>
                </div>
            </form>
                <table class="table table-striped mt-5 text-muted responsive">
                    <thead>
                        <tr>
                        <th scope="col"><strong>ID</strong> </th>
                        <th scope="col"><strong>Name</strong></th>
                        <th scope="col"><strong>Street</strong></th>
                        <th scope="col"><strong>Town</strong></th>
                        <th scope="col"><strong>Province</strong></th>
                        <th scope="col"><strong>D.O.B</strong></th>
                        <th scope="col"><strong>Phone</strong></th>
                        <th scope="col"><strong>Email</strong></th>
                        <th scope="col"><strong>Occupation</strong></th>
                        <th scope="col"><strong>Results</strong></th>
                        </tr>
                    </thead>

                    <tbody class= "text-muted">
                        <tr>
                        @foreach($patients as $patient)
                        <td scope="row"><strong>{{$patient->idnumber}}</strong></td>
                        <td>{{$patient->name}}</td>
                        <td>{{$patient->street}}</td>
                        <td>{{$patient->town}}</td>
                        <td>{{$patient->province}}</td>
                        <td>{{$patient->dob}}</td>
                        <td>{{$patient->phone}}</td>
                        <td>{{$patient->email}}</td>
                        <td>{{$patient->occupation}}</td>
                        <td>@if($patient->result == "Positive")
                            <h5 class="text-danger">{{$patient->result}}</h5>
                            @else
                            <h5 class="text-success">{{$patient->result}}</h5>
                            @endif
                        </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                
                </table>
                <hr>
                {{$patients->links()}}
        </div>
    </div>
</div>

<!---Modal--->
<div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Patient Details</h4>
                </div>
                <div class="modal-body">
                    <form id="CustomerForm" name="CustomerForm" class="form-horizontal" action ="/addcase" method="POST">
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
                            <label for="type" class="col-sm-2 control-label">Test Results</label>

                            <div class="col-sm-12">
                                <select class="custom-select" id="inputGroupSelect02" name="result" required>
                                    <option value="">Choose...</option>
                                    <option value="Positive">Positive</option>
                                    <option value="Negative">Negative</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Conditions</label>
                            <div class="col-sm-12">
                                <textarea id="detail" name="conditions"  placeholder="Existing Medical Conditions" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save Case
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <!---Modal--->

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
        </div>

        <div class="col-md-6">
            
        </div>

    </div>
</div>
@endsection
