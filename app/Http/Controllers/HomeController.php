<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use App\Deaths;
use App\Recoveries;
use App\Colors;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $patients = Patients::latest()->get();
        $recoveries = Recoveries::latest()->get();
        $deaths = Deaths::latest()->get();
        $colors = DB::table('colors')->select('primary')->where('province',auth()->user()->province)->get();

        return view('home')->with([
            'patients'=>$patients,
            'deaths'=>$deaths,
            'colors'=>$colors,
            'recoveries' => $recoveries
        ]); 
    }
}
