<?php

namespace App\Http\Controllers;

use App\OTP;
use Illuminate\Http\Request;

class OTPController extends Controller
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
        $opt = rand(1000,9999);
        $test =array([
            'created' => 201,
            'otp'=> $opt
        ]);
        return $test;
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
     * @param  \App\OTP  $oTP
     * @return \Illuminate\Http\Response
     */
    public function show(OTP $oTP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OTP  $oTP
     * @return \Illuminate\Http\Response
     */
    public function edit(OTP $oTP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OTP  $oTP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OTP $oTP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OTP  $oTP
     * @return \Illuminate\Http\Response
     */
    public function destroy(OTP $oTP)
    {
        //
    }
}
