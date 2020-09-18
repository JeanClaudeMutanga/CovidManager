<?php

namespace App\Http\Controllers;

use App\Patients;
use App\Recoveries;
use App\Deaths;
use App\Doctor;
use App\NextOfKin;
use App\Contacts;
use App\Clinical;
use App\Conditions;
use App\Location;
use App\district;
use App\Http\Resources\PatientsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    

    public function index()
    {
        return PatientsResource::collection(Patients::latest()->get());
    }

    public function all()
    {
        $patients = Patients::latest()->paginate(10);
        return view('patients')->with('patients',$patients);
    }

    public function main()
    {
        $patients = Patients::latest()->get();
        $districts = district::latest()->paginate(20);
        $recoveries = Recoveries::latest()->get();
        //$location = Location::latest()->get();
        $locations = DB::table('locations')->select('district', DB::raw('count(*) as total'))->groupBy('district')->get();
        $deaths = Deaths::latest()->get();
       return view('dashboard')->with([
            'patients'=>$patients,
            'deaths'=>$deaths,
            'districts'=>$districts,
            'locations'=>$locations,
            'recoveries' => $recoveries
            ]); 
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    public function test(Request $request)
    {
        $patients = Patients::latest()->paginate(10);
        return view('screening')->with('patients',$patients);
    }

    public function tested(Request $request)
    {
        $patients = Patients::latest()->paginate(10);
        return view('tested')->with('patients',$patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Patients::create($request->all());
        return response('Created',201);
    }

    public function save(Request $request){
        Patients::create($request->all());
        $patients = Patients::latest()->paginate(10);
        $msg = "Case Recorded Successfully";
        return redirect('/cases')->with([
            'patients'=> $patients,
            'success' =>$msg
        ]);
    }

    public function screen(Request $request){

        $request->validate([
            'idnumber' => ['required'],
            'sex' => ['required'],
            'race' => ['required'],
            'name' =>['required']
        ]);
        
        $result ="Pending";
        $province = auth()->user()->province;
        $user = auth()->user()->id;
        $patients = new Patients();
        $patients->idnumber =$request->input('idnumber');
        $patients->result =$result;
        $key = $patients->idnumber;
        $patients->name =$request->input('name');
        $patients->user_id =$user;
        $patients->surname =$request->input('surname');
        $patients->dob =$request->input('dob');
        $patients->sex =$request->input('sex');
        $patients->residency =$request->input('residency');
        $patients->address =$request->input('address');
        $patients->province = $province;
        $patients->race =$request->input('race');
        $patients->email =$request->input('email');
        $patients->kids =$request->input('kids');
        $patients->elderly =$request->input('elderly');
        $patients->occupation =$request->input('occupation');
        $patients->employer =$request->input('employer');
        $patients->type =$request->input('type');
        $patients->district =$request->input('district');
        $patients->save();

        $doctor = new Doctor();
        $doctor->patients_id = $key;
        $doctor->name = $request->input('docname');
        $doctor->surname = $request->input('docsurname');
        $doctor->facility = $request->input('facility');
        $doctor->phone = $request->input('docphone');
        $doctor->email = $request->input('docemail');
        $doctor->save();

        $kin = new NextOfKin();
        $kin->patients_id = $key;
        $kin->name = $request->input('kinname');
        $kin->surname = $request->input('kinsurname');
        $kin->phone = $request->input('kinphone');
        $kin->relationship = $request->input('relationship');
        $kin->save(); 

        $clinical = new Clinical();
        $clinical->patients_id = $key;
        $clinical->fever = $request->input('fever');
        $clinical->cough = $request->input('cough');
        $clinical->chills = $request->input('chills');
        $clinical->throat = $request->input('throat');
        $clinical->breath = $request->input('breath');
        $clinical->vomiting = $request->input('vomiting');
        $clinical->diarrhoea = $request->input('diarrhoe');
        $clinical->bodypains = $request->input('bodypains');
        $clinical->weakness = $request->input('weakness');
        $clinical->confusion = $request->input('confusion');
        $clinical->asymptomatic = $request->input('asymptomatic');
        $clinical->other = $request->input('other');
        $clinical->save();

        $conditions = new Conditions();
        $conditions->patients_id = $key;
        $conditions->asthma = $request->input('asthma');
        $conditions->neurological = $request->input('neurological');
        $conditions->hiv = $request->input('hiv');
        $conditions->obesity = $request->input('obesity');
        $conditions->other = $request->input('specify');
        $conditions->cardiac = $request->input('cardiac');
        $conditions->pulmonary = $request->input('pulmonary');
        $conditions->viral = $request->input('viral');
        $conditions->pregnant = $request->input('pregnant');
        $conditions->kidney = $request->input('kidney');
        $conditions->diabetes = $request->input('diabetes');
        $conditions->viralload = $request->input('viralload');
        $conditions->trimester = $request->input('trimester');
        $conditions->immuno = $request->input('immuno');
        $conditions->liver = $request->input('liver');
        $conditions->arv = $request->input('arv');
        $conditions->tb = $request->input('tb');
        $conditions->save();

        $location = new Location();
        $location->town = $request->input('town');       
        $location->district = $request->input('district');
        $location->patients_id = $request->input('idnumber');
        $location->user_id = $user;
        $location->province = $province;
        $location->save();


        $msg="Saved Successfully, Record People In close contact with screened Individual";
        return redirect('/contact/'.$key)->with('success',$msg);

    }

    public function negative($id)
    {
        $case = Patients::find($id);
        $result ="Negative";
        $case->result = $result;
        $case->save();
        $identity = $case->idnumber;
        $msg="Case Marked As Negative";
        return redirect('/search?search='.$identity)->with('success',$msg);


    }

    public function positive($id)
    {
        $case = Patients::find($id);
        $result ="Positive";
        $case->result = $result;
        $case->save();
        $identity = $case->idnumber;
        $msg="Case Marked As Positive";
        return redirect('/search?search='.$identity)->with('success',$msg);
    }

    public function track()
    {
        $patients = Patients::latest()->paginate(10);
        return view('tracking')->with('patients',$patients);
    }

    public function trace(Request $request)
    {
        $search = $request->get('search');
        $patients = DB::table('patients')->where('idnumber','like','%'.$search.'%')
        ->orWhere('name','like','%'.$search.'%')
        ->paginate(10);
        return view('tracking')->with('patients',$patients);
    }

    public function well($id)
    {
        $patient = Patients::find($id);
        $recovery = new Recoveries();
        $recovery->idnumber= $patient->idnumber;
        $recovery->name= $patient->name;
        $recovery->street= $patient->street;
        $recovery->town= $patient->town;
        $recovery->province= $patient->province;
        $recovery->dob= $patient->dob;
        $recovery->phone= $patient->phone;
        $recovery->email= $patient->email;
        $recovery->occupation= $patient->occupation;
        $recovery->conditions= $patient->conditions;
        $recovery->save();
        $status= "Recovered";
        $patient->result = $status;
        $patient->save();
        $patients = Patients::latest()->paginate(10);
        $msg = "Case Removed From Tracking With Recovered Status";
        return redirect('/tracking')->with([
            'success'=>$msg,
            'patients'=>$patients
        ]);
    }

    public function not($id)
    {
        $patient = Patients::find($id);
        $deaths = new Deaths();
        $deaths->idnumber= $patient->idnumber;
        $deaths->name= $patient->name;
        $deaths->street= $patient->street;
        $deaths->town= $patient->town;
        $deaths->province= $patient->province;
        $deaths->dob= $patient->dob;
        $deaths->phone= $patient->phone;
        $deaths->email= $patient->email;
        $deaths->occupation= $patient->occupation;
        $deaths->conditions= $patient->conditions;
        $deaths->save();

        $status= "Deceased";
        $patient->result = $status;
        $patient->save();

        $patients = Patients::latest()->paginate(10);
        $msg = "Case Removed From Tracking With A Death Status";
        return redirect('/tracking')->with([
            'success'=>$msg,
            'patients'=>$patients
        ]);
    }

    public function monitoring()
    {
        return view('monitoring');
    }

    public function contact($id){
        
        $contacts = DB::table('contacts')->where('patients_id',$id)->get();
        $patients = DB::table('patients')->where('idnumber',$id)->get();
        return view('contact')->with([
            'patients' => $patients,
            'contacts' => $contacts
        ]);
    }

    public function single($id){
        
        $contacts = DB::table('contacts')->where('patients_id',$id)->get();
        $clinical = DB::table('clinicals')->where('patients_id',$id)->get();
        $conditions = DB::table('conditions')->where('patients_id',$id)->get();
        $patients = DB::table('patients')->where('idnumber',$id)->get();
        return view('profile')->with([
            'patients' => $patients,
            'clinical' => $clinical,
            'conditions' => $conditions,
            'contacts' => $contacts
        ]);
    }

    public function insert(Request $request)
    {
        contacts::create($request->all());
        $patients = Patients::latest()->paginate(10);
        $msg = "Contacts Recorded Successfully";
        return redirect('/cases')->with([
            'patients'=>$patients,
            'success' =>$msg
        ]);
    }


    public function search(Request $request)
    {
        $search = $request->get('search');
        $patients = DB::table('patients')->where('idnumber','like','%'.$search.'%')
        ->orWhere('name','like','%'.$search.'%')
        ->paginate(10);
        return view('patients')->with('patients',$patients);
    }

    public function filter(Request $request)
    {
        $search = $request->get('search');
        $patients = DB::table('patients')->where('idnumber','like','%'.$search.'%')
        ->orWhere('name','like','%'.$search.'%')
        ->paginate(10);
        return view('quarantine.filtered')->with('patients',$patients);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function show(Patients $patients)
    {
        return new PatientsResource($patients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function edit(Patients $patients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patients $patients)
    {
        $patients->update($request->all());
        return response('Updated',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patients $patients)
    {
        //
    }
}
