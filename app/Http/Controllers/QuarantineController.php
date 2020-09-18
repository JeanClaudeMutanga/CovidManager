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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuarantineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('quarantine.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quarantine.create');
    }

    public function recoveries()
    {
        return view('quarantine.good');
    }

    public function publish()
    {
        return view('quarantine.recover');
    }

    public function deaths()
    {
        return view('quarantine.deaths');
    }

    public function sad()
    {
        return view('quarantine.died');
    }

    public function stock(Request $request)
    {

        return view('quarantine.stock');
    }

    public function ppes(Request $request)
    {
        
        return view('quarantine.ppes');
    }

    public function screened()
    {
        //$screened = Patients::latest()->get();
        return view('quarantine.screened');
    }

    public function filtered(Request $request)
    {
        $search = $request->get('search');
        $patients = DB::table('patients')->where('idnumber','like','%'.$search.'%')
        ->orWhere('name','like','%'.$search.'%')
        ->paginate(10);
        return view('quarantine.filtered')->with('patients',$patients);
    }

    public function confirm($id)
    {
        $patient = Patients::find($id);
        $record = $patient->idnumber;
        $status = "Quarantined";
        $facility = auth()->user()->facility->id;
        $patient->type = $status;
        $patient->save();
        $msg = "Patient added successfully";
        return redirect('/get/screened?search='.$record)->with('success',$msg);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facility = auth()->user()->facility->id;
        $district = auth()->user()->facility->district;
        $type = "Quarantined";
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
        $patients->type = $type;
        $patients->facility_id = $facility;
        $patients->district =$district;
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


        $msg="Saved Successfully";
        return redirect('/admissions/all')->with('success',$msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $patients = DB::table('patients')->where('idnumber','like','%'.$search.'%')
        ->orWhere('name','like','%'.$search.'%')
        ->paginate(10);
        return view('quarantine.results')->with('patients',$patients);
    }

     public function filter(Request $request)
    {
        $search = $request->get('search');
        $patients = DB::table('patients')->where('idnumber','like','%'.$search.'%')
        ->orWhere('name','like','%'.$search.'%')
        ->paginate(10);
        return view('quarantine.rizo')->with('patients',$patients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function mark($id)
    {
        $mark = Patients::find($id);

        $facility = auth()->user()->facility->id;
        $district = auth()->user()->facility->district;

        $province = auth()->user()->province;
        $user = auth()->user()->id;

        $patients = new Recoveries();
        $patients->idnumber =$mark->idnumber;
        $patients->name =$mark->name;
        $patients->user_id =$user;
        $patients->surname =$mark->surname;
        $patients->dob =$mark->dob;
        $patients->sex =$mark->sex;
        $patients->residency =$mark->residency;
        $patients->address =$mark->address;
        $patients->province = $mark->province;
        $patients->race =$mark->race;
        $patients->email =$mark->email;
        $patients->kids =$mark->kids;
        $patients->elderly = $mark->elderly;
        $patients->occupation = $mark->occupation;
        $patients->employer =$mark->employer;
        $patients->facility_id = $facility;
        $patients->district =$district;
        $patients->save();

        $msg = "Success";
        return redirect('/recoveries')->with('success',$msg);
    }

    public function kill($id)
    {
        $mark = Patients::find($id);

        $facility = auth()->user()->facility->id;
        $district = auth()->user()->facility->district;

        $province = auth()->user()->province;
        $user = auth()->user()->id;

        $patients = new Deaths();
        $patients->idnumber =$mark->idnumber;
        $patients->name =$mark->name;
        $patients->user_id =$user;
        $patients->surname =$mark->surname;
        $patients->dob =$mark->dob;
        $patients->sex =$mark->sex;
        $patients->residency =$mark->residency;
        $patients->address =$mark->address;
        $patients->province = $mark->province;
        $patients->race =$mark->race;
        $patients->email =$mark->email;
        $patients->kids =$mark->kids;
        $patients->elderly = $mark->elderly;
        $patients->occupation = $mark->occupation;
        $patients->employer =$mark->employer;
        $patients->facility_id = $facility;
        $patients->district =$district;
        $patients->save();

        $msg = "Success";
        return redirect('/deaths')->with('success',$msg);
    }

    public function clear(Request $request)
    {
        $facility = auth()->user()->facility->id;
        $district = auth()->user()->facility->district;

        $province = auth()->user()->province;
        $user = auth()->user()->id;
        $patients = new Recoveries();
        $patients->idnumber =$request->input('idnumber');
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
        $patients->facility_id = $facility;
        $patients->district =$district;
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


        $msg="Saved Successfully";
        return redirect('/recoveries')->with('success',$msg);
    }

    public function save(Request $request)
    {
        $facility = auth()->user()->facility->id;
        $district = auth()->user()->facility->district;

        $province = auth()->user()->province;
        $user = auth()->user()->id;
        $patients = new Deaths();
        $patients->idnumber =$request->input('idnumber');
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
        $patients->facility_id = $facility;
        $patients->district =$district;
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


        $msg="Saved Successfully";
        return redirect('/deaths')->with('success',$msg);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
