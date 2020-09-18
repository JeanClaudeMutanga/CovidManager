@extends('layouts.app')
@include('layouts.homenav')
@section('content')
<div class="container" id="dash">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="jumbotron">
                    <h4 class="text-center">
                    <strong>Total Tests</strong>
                    </h4>
             </div>

             <div class="jumbotron">
             <h5 class="text-center text-success">{{$recoveries->count()}}</h5>
                    <h5 class="text-center">
                    <strong>Total Recoveries</strong>
                    </h5>
            </div>
            <div class="jumbotron">
            <h4 class="text-center text-danger"><strong>{{$patients->where('result','Positive')->count()}}</strong></h4>
                <h5 class="text-center">
                        <strong>Confirmed Cases</strong>
                        </h5>
                        
             </div>
             <div class="jumbotron">
                <h4 class="text-center">
                        <strong>Total Deaths</strong>
                        </h4>
                </div>

        </div>

        <div class="col-md-8">
            <div class="jumbotron">
            <h4 class="text-center"><strong>By Province</strong></h4>
            <br>
            <br>
            <br>
            <table class="table table-striped mt-5 text-muted responsive">
                <thead>
                    <tr>
                    <th scope="col"><strong>Province</strong> </th>
                    <th scope="col"><strong>Total</strong></th>
                    
                    </tr>
                </thead>
                <tbody class= "text-muted">
                    <tr>
                    <td scope="row"><strong>Gauteng</strong></td>
                    <td>{{$patients->where('province','Gauteng')->count()}}</td>
                    </tr>
                </tbody>

                <tbody class= "text-muted">
                    <tr>
                    <td scope="row"><strong>Limpopo</strong></td>
                    <td>{{$patients->where('province','Limpopo')->count()}}</td>
                    </tr>
                </tbody>
                <tbody class= "text-muted">
                    <tr>
                    <td scope="row"><strong>Kwa-Zulu Natal</strong></td>
                    <td>{{$patients->where('province','Kwa-Zulu Natal')->count()}}</td>
                    </tr>
                </tbody>
                <tbody class= "text-muted">
                    <tr>
                    <td scope="row"><strong>Mpumalanga</strong></td>
                    <td>{{$patients->where('province','Mpumalanga')->count()}}</td>
                    </tr>
                </tbody>
                <tbody class= "text-muted">
                    <tr>
                    <td scope="row"><strong>North West</strong></td>
                    <td>{{$patients->where('province','North West')->count()}}</td>
                    </tr>
                </tbody>
                <tbody class= "text-muted">
                    <tr>
                    <td scope="row"><strong>Northern Cape</strong></td>
                    <td>{{$patients->where('province','Northern Cape')->count()}}</td>
                    </tr>
                </tbody>
                <tbody class= "text-muted">
                    <tr>
                    <td scope="row"><strong>Western Cape</strong></td>
                    <td>{{$patients->where('province','Western Cape')->count()}}</td>
                    </tr>
                </tbody>
                <tbody class= "text-muted">
                    <tr>
                    <td scope="row"><strong>Free State</strong></td>
                    <td>{{$patients->where('province','Free State')->count()}}</td>
                    </tr>
                </tbody>
                <tbody class= "text-muted">
                    <tr>
                    <td scope="row"><strong>Eastern Cape</strong></td>
                    <td>{{$patients->where('province','Eastern Cape')->count()}}</td>
                    </tr>
                </tbody>
                

              
            </table>
             </div>
        </div>

    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
        </div>

        <div class="col-md-6">
            
        </div>

    </div>
</div>
@endsection
