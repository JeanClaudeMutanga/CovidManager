@extends('layouts.app')

@component('mail::message')
Red Heart COVID-19 Tracker

You have been registered as a user for the COVID-19 Tracking system. Your log-In details are below

ID Number : {{$user->username}}

Password  : covid19_tracker_2020


Thanks,<br>
Red Heart COVID-19 Tracker
@endcomponent
