<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use App\Recoveries;
use App\Deaths;
use App\Doctor;
use App\NextOfKin;
use App\Contacts;
use App\Clinical;
use App\Conditions;
use App\Files;
use Illuminate\Support\Facades\DB;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patients::latest()->paginate(10);
        return view('refereed')->with('patients',$patients);
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
        $patients = DB::table('patients')->where('idnumber',$id)->get();
        $doctor = DB::table('doctors')->where('patients_id',$id)->get();
        $conditions = DB::table('conditions')->where('patients_id',$id)->get();
        $clinical = DB::table('clinicals')->where('patients_id',$id)->get();
        $nextofkin = DB::table('next_of_kin')->where('patients_id',$id)->get();
        return view('case')->with([
            'patients'=>$patients,
            'doctor'=>$doctor,
            'clinical'=>$clinical
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $patients = DB::table('patients')->where('idnumber','like','%'.$search.'%')
        ->orWhere('name','like','%'.$search.'%')
        ->paginate(10);
        return view('refereed')->with('patients',$patients);
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
        $patient = Patients::find($id);
        $back = $patient->idnumber;
        $patient->update($request->all());
        $document = $request->document->store('uploads','public');

        $files = new Files();
        $files->patients_id = $back;
        $files->document = $document;
        $files->save();
        $msg="Results Updated Successfully";
        return redirect('/refereed/open/'.$back)->with('success',$msg);
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
