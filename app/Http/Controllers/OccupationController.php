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
use App\Beds;
use App\Admit;
use App\Facility;
use App\Referrals;
use App\Discharges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OccupationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beds = Beds::latest()->get();
        $admits = Admit::latest()->get();
        $available = auth()->user()->facility->capacity - auth()->user()->facility->admit->count(); 
        $current = auth()->user()->facility->admit->count(); 
        $capacity = auth()->user()->facility->capacity;
         if($current>=$capacity)
         {
             $overflow = $current - $capacity;
         }else{
             $overflow = 0;
         }

        return view('quarantine.beds')->with([
            'beds' => $beds,
            'available' => $available,
            'overflow' => $overflow,
            'admits'=>$admits
        ]);
    }

    public function bedding()
    {
        $id = auth()->user()->facility->id;
        $beddings = Beds::latest()->get();
        $patients = Patients::latest()->get();
        $admits =  DB::table('admits')->where('facility_id',$id)->paginate(15);
        return view('quarantine.bedding')->with([
            'beddings'=>$beddings,
            'patients' => $patients,
            'admits' => $admits
        ]);
    }

    public function service()
    {
        return view('quarantine.filter');
    }

    public function profile(Request $request,$id)
    {
        $facilities = Facility::latest()->get();
        $patients = Patients::find($id);
        $request->session()->put('key', $id);
        $admits = DB::table('admits')->where('patients_id',$id)->get();
        return view('quarantine.profile')->with([
            'patients' =>$patients,
            'admits' =>$admits,
            'facilities' =>$facilities
        ]);
    }


    public function admit(Request $request,$id)
    {
        $facility = auth()->user()->facility_id;
        $user = auth()->user()->id;
        
        $available = "No";
        $bed_id = $request->bed;
        $bed = Beds::find($bed_id);
        $bed->available = $available;
        $bed->save();

        $admits = new Admit();
        $admits->facility_id = $facility;
        $admits->beds_id = $bed_id;
        $admits->patients_id = $id;
        $admits->user_id = $user;
        $admits->save();

        $admit = "True";
        $patient = Patients::find($id);
        $patient->beds_id = $bed_id;
        $patient->admit = $admit;
        $patient->save();

        $msg = "Bed Allocated Successfully";
        return redirect('/patient/'.$id)->with('success',$msg);

    }


    public function search(Request $request)
    {
        $search = $request->get('search');
        $patients = DB::table('patients')->where('idnumber','like','%'.$search.'%')
        ->orWhere('name','like','%'.$search.'%')
        ->paginate(10);
        return view('quarantine.filt')->with('patients',$patients);
    }

    public function filter(Request $request)
    {
        $search = $request->get('search');
        $patients = DB::table('patients')->where('idnumber','like','%'.$search.'%')
        ->orWhere('name','like','%'.$search.'%')
        ->paginate(10);
        return view('quarantine.output')->with('patients',$patients);
    }

    public function new_bed(Request $request)
    {
        $facility = auth()->user()->facility->id;
        $count = DB::table('beds')->where([
            'facility_id' =>$facility,
            'number' => $request->input('number'),
            'ward' => $request->input('ward'),
            'room' =>$request->input('room')
        ])->count();

        if($count >= 1)
        {
            $err= "Bed Already Exists";
            return redirect('/capacity/open')->with('errors',$err);
    
        }
        else{
            
            //Default Variables
            $availability = "Yes";

            $bed = new Beds();
            $bed->facility_id = $facility;
            $bed->available = $availability;
            $bed->number = $request->input('number');
            $bed->ward = $request->input('ward');
            $bed->room = $request->input('room');
            $bed->save();
            $msg = "Bed Added Successfully";
            return redirect('/capacity/open')->with('success',$msg);

        } 
        
        
    }

    public function capacity(Request $request)
    {
        $beds = Beds::latest()->paginate(10);
        return view('quarantine.capacity')->with('beds',$beds);
    }

    public function refer(Request $request,$id)
    {
        $facility_id = auth()->user()->facility->id;
        $facility_name = auth()->user()->facility->name;

        $recipient_id = $request->input('recipient_id');
        $facility = Facility::find($recipient_id);
        $recipient_name = $facility->name;

        $referral = new Referrals();
        $patients = Patients::find($id);

        $patient_name = $patients->name;
        $patient_id = $patients->idnumber;

        $referral->facility_id = $facility_id;
        $referral->sending_facility_name = $facility_name;

        $referral->patients_id = $id;
        $referral->patients_idnumber = $patient_id;
        $referral->patients_name = $patient_name;

        $referral->recipient_id = $recipient_id;
        $referral->recipient_facility_name = $recipient_name;

        $referral->notes = $request->input('notes');
        $referral->save();

        $msg = "Patient referred successfully";
        return redirect('/patient/'.$id)->with('success',$msg);

    }

    public function incoming()
    {
        $referrals = Referrals::all();
        return view('quarantine.incoming')->with('referrals',$referrals);
    }

    public function outgoing()
    {
        //$referrals = Referrals::all();
        return view('quarantine.outgoing');
    }

    public function discharge(Request $request,$id)
    {
        //Prefix
        $prefix = "Discharged";

        //Facility Details
        $facility_id = auth()->user()->facility->id;
        $facility_name = auth()->user()->facility->name;

        //Patient Details
        $patient = Patients::find($id);
        $patient_name = $patient->name;
        $patient_idnumber = $patient->idnumber;

        //Discharges
        $discharges = new Discharges();
        $discharges->patients_id = $id;
        $discharges->patients_name = $patient_name;
        $discharges->patients_idnumber = $patient_idnumber;

        $discharges->facility_id = $facility_id;
        $discharges->facility_name = $facility_name;
        $discharges->notes = $request->input('notes');
        $discharges->save();

        $patient->type = $prefix;
        $patient->save();

        $msg = "Patient Discharged Successfully";
        return redirect('/patient/'.$id)->with('success',$msg);
        
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
