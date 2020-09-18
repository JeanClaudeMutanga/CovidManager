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
use App\Location;
use App\district;
use App\Facility;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Mail\AccountMail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function facilities()
    {
        $facilities = Facility::latest()->paginate(10);
        return view('admin.facility')->with('facilities',$facilities);
      
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
        Facility::create($request->all());
        $msg = "Facility Successfully Created";
        return redirect('/facilities/all')->with('success',$msg);
    }
    
    public function users(Request $request)
    {
        $users = User::latest()->paginate(10);
        return view('admin.users')->with('users',$users);
    }

    public function quarantine($id)
    {
        $facilities = Facility::find($id);
        return view('admin.profile')->with('facilities',$facilities);
    }

    public function people(Request $request,$id)
    {
        $account = $request->input('email');
        $idnumber = $request->input('username');
        $count = DB::table('users')->where('email', $account)
        ->orWhere('username', $idnumber)
        ->count();
         
        if($count == 0){
            $user = new User();
            $user->facility_id = $id;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $email = $request->input('email');
            $user->username = $request->input('username');
            $control = $request->input('username');
            $user->designation = $request->input('designation');
            $user->province = $request->input('province');
            $user->password = $request->input('password');
            $user->type = $request->input('type');
            $user->save();

            $request->session()->put('key', $control);
            Mail::to($email)->send(new AccountMail());
            $msg = "User Created";
            return redirect('/quarantine/'.$id)->with('success',$msg);
        } else{
            $msg = "Account Credentials Exist Already";
            return redirect('/quarantine/'.$id)->with('success',$msg);
        }


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
