@extends('layout')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@section('content')

<div class="row w-100 m-0" style="border-bottom: 1px solid black">
    <div class="P-0 col-md-11">
        <h3 class="myh1">DASHBOARD</h3>
    </div>
    <div class="col-md-1 py-2 px-1">
        <a href="/logout" class="btn btn-sm btn-danger"><i class="fa fa-sign-out-alt"> Logout</i></a>
    </div>
</div>
{{-- <hr> --}}
<h1>Hello {{session('fullName')}}</h1>


{{-- <div class="progress" style="height: 5px;">
    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div> --}}



@stop