<?php

namespace App\Http\Controllers;

use App\district;
use App\Recoveries;
use App\Deaths;
use App\Doctor;
use App\NextOfKin;
use App\Contacts;
use App\Clinical;
use App\Conditions;
use App\Location;
use App\Patients;
use App\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $district = district::find($id);
        $facilities = Facility::latest()->get();
        $name =  $district->name;
        $patients= DB::table('patients')->where('district',$name)->get();
        //return $patients;
        return view('district')->with([
            'district' => $district,
            'facilities' => $facilities,
            'patients' => $patients
        ]);
    }

    public function screened($id)
    {
        $district = district::find($id);
        $name =  $district->name;
        $patients= DB::table('patients')->where('district',$name)->paginate(20);
        //return $patients;
        return view('districtscreened')->with([
            'district' => $district,
            'patients' => $patients
        ]);
    }

    public function refereed($id)
    {
        $district = district::find($id);
        $name =  $district->name;
        $patients= DB::table('patients')->where('district',$name)->paginate(20);
        //return $patients;
        return view('districtrefereed')->with([
            'district' => $district,
            'patients' => $patients
        ]);
    }

    public function pending($id)
    {
        $district = district::find($id);
        $name =  $district->name;
        $patients= DB::table('patients')->where('district',$name)->paginate(20);
        //return $patients;
        return view('districtpending')->with([
            'district' => $district,
            'patients' => $patients
        ]);
    }

    public function positive($id)
    {
        $district = district::find($id);
        $name =  $district->name;
        $patients= DB::table('patients')->where('district',$name)->paginate(20);
        //return $patients;
        return view('districtpositive')->with([
            'district' => $district,
            'patients' => $patients
        ]);
    }

    public function negative($id)
    {
        $district = district::find($id);
        $name =  $district->name;
        $patients= DB::table('patients')->where('district',$name)->paginate(20);
        //return $patients;
        return view('districtnegative')->with([
            'district' => $district,
            'patients' => $patients
        ]);
    }


    function fetch(Request $request)
    {
        if($request->get('query'))
        {
        $query = $request->get('query');
        $data = DB::table('districts')
            ->where('name', 'LIKE', "%{$query}%")
            ->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($data as $row)
        {
        $output .= '
        <li><a href="#district">'.$row->name.'</a></li>
        ';
        }
        $output .= '</ul>';
        echo $output;
        }
    }

    function super(Request $request)
    {
        if($request->get('query'))
        {
        $query = $request->get('query');
        $data = DB::table('districts')
            ->where('name', 'LIKE', "%{$query}%")
            ->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($data as $row)
        {
        $output .= '
        <li><a href="#district">'.$row->name.'</a></li>
        ';
        }
        $output .= '</ul>';
        echo $output;
        }
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
     * @param  \App\district  $district
     * @return \Illuminate\Http\Response
     */
    public function show(district $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\district  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(district $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\district  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, district $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\district  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(district $district)
    {
        //
    }
}
