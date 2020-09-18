@if(Auth::user()->type=="official")
@include('official')
@elseif(Auth::user()->type =="lab")
@include('lab')
@elseif(Auth::user()->type =="admin")
@include('admin.home')
@else
@include('quarantine.home')
@endif