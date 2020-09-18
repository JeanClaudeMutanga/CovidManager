<?php

namespace App\Http\Controllers;

use App\Deaths;
use App\Http\Resources\DeathsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeathsController extends Controller
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
        return DeathsResource::collection(Deaths::latest()->get());
    }

    public function all()
    {
        $patients = Deaths::latest()->paginate(10);
        return view('deaths')->with('patients',$patients);
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
        Deaths::create($request->all());
        return response('Created',201);
    }

    public function save(Request $request)
    {
        Deaths::create($request->all());
        $patients = Deaths::latest()->paginate(10);
        $msg = "Death Recorded Successfully";
        return redirect('/deaths')->with([
        'success'=> $msg,
        'patients' => $patients

        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $patients = DB::table('deaths')->where('idnumber','like','%'.$search.'%')
        ->orWhere('name','like','%'.$search.'%')
        ->paginate(10);
        return view('deaths')->with('patients',$patients);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deaths  $deaths
     * @return \Illuminate\Http\Response
     */
    public function show(Deaths $deaths)
    {
        return new DeathsResource($deaths);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deaths  $deaths
     * @return \Illuminate\Http\Response
     */
    public function edit(Deaths $deaths)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deaths  $deaths
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deaths $deaths)
    {
        $deaths->update($request->all());
        return response('Updated',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deaths  $deaths
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deaths $deaths)
    {
        //
    }
}
