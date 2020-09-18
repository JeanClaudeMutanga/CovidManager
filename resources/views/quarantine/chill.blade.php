@foreach(auth()->user()->facility->beds as $patient )
                              <tr>
                              <td scope="row"><strong>{{$patient->number}}</strong></td>
                              <td>{{$patient->room}}</td>
                              <td>{{$patient->ward}}</td>
                              <td>{{$patient->available}}</td>
                              </tr>
                            @endforeach