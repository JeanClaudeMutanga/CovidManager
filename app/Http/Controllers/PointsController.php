<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collisions;
use App\Ctusers;
use App\OTP;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;

class PointsController extends Controller
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

    public function upload(Request $request,$id)
    {
        $ct_users = DB::table('ctusers')->where('mac_address',$id)->get();

        if($ct_users->count() == 1)
        {
            return 1;
        }
        else{
            return 0;
        } 
    }

    public function collisions(Request $request)
    {
        $infected = $request->infected;
        if($infected =="0"){
            $infected="Pending";
        }
        elseif($infected =="1"){
            $infected="Positive";
        }
        elseif($infected =="2"){
            $infected="Negative";
        }
        elseif($infected =="4"){
            $infected="Recovered";
        }

        $collision =new Collisions();
        $collision->name = $request->name;
        $collision->date = $request->date;
        $collision->mac_adresse = $request->mac_adresse;
        $collision->infected = $infected;
        //$collision->collision_with = $request->collision_with;
        $collision->save();

        //Collisions::create($request->all());
        return response('Created',201);
    }

    public function ctusers(Request $request)
    {
        //Ctusers::create($request->all());
        //return response('Created',201);

        if($request->infected == 0){
            $status = "Negative";
        }elseif($request->infected == 1){
            $status = "Pending Results";
        }
        else{
            $status = "Positive";
        }

        $ct_users = new ctusers();
        $ct_users->cin = $request->cin;
        $ct_users->phone  = '+'.$request->phone;
        $ct_users->mac_address = $request->mac_address;
        $ct_users->infected = $status;
        $ct_users->save();

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

    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
    }
}
