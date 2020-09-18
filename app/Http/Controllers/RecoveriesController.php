<?php

namespace App\Http\Controllers;

use App\Recoveries;
use App\Http\Resources\RecoveriesResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecoveriesController extends Controller
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
        return RecoveriesResource::collection(Recoveries::latest()->get());
    }

    public function all()
    {
        $patients = Recoveries::latest()->paginate(10);
        return view('recoveries')->with('patients',$patients);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Recoveries::create($request->all());
        $patients = Recoveries::latest()->paginate(10);
        $msg= "Recovery Recorded Successfully";
        return redirect('/recoveries')->with([
            'patients' => $patients,
            'success' =>$msg
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $patients = DB::table('recoveries')->where('idnumber','like','%'.$search.'%')
        ->orWhere('name','like','%'.$search.'%')
        ->paginate(10);
        return view('recoveries')->with('patients',$patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Recoveries::create($request->all());
        return response('Created',201);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Recoveries  $recoveries
     * @return \Illuminate\Http\Response
     */
    public function show(Recoveries $recoveries)
    {
        return new RecoveriesResource($recoveries);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recoveries  $recoveries
     * @return \Illuminate\Http\Response
     */
    public function edit(Recoveries $recoveries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recoveries  $recoveries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recoveries $recoveries)
    {
        $recoveries->update($request->all());
        return response('Updated',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recoveries  $recoveries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recoveries $recoveries)
    {
        //
    }
}
