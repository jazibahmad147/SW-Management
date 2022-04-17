@extends('layout')
<link rel="stylesheet" href="{{asset('css/order.css')}}">
    

@section('content')



<div class="row w-100 m-0" style="border-bottom: 1px solid black">
    <div class="P-0 col-md-11">
        <h3 class="myh1">NEW ORDER</h3>
    </div>
    <div class="col-md-1 py-2 px-1">
        <a href="/logout" class="btn btn-sm btn-danger"><i class="fa fa-sign-out-alt"> Logout</i></a>
    </div>
</div>

<div class="row pt-4">
    <div class="col-md-4">
        <div class="row" id="formTitle">
            <div class="col-md-2" id="titleIcon"><i class="fas fa-user"></i></div>
            <div class="col-md-10" id="titleText"><h4>Client</h4></div>
        </div>
        {{-- <h4 id="formTitle"><i class="fas fa-user-plus"></i> Add Clients</h4> --}}
        <div class="clientForm">
            <form id="clientAddForm" action="clientReg" method="POST">
            {{-- <form id="clientAddForm" method="POST"> --}}
            @csrf
                <select name="client" id="client" class="custom-select" onchange="viewClient()">
                    <option value="">Select Client</option>
                    @foreach ($clients as $client)
                        <option value="{{$client['id']}}">{{$client['name']}}</option>
                    @endforeach
                </select>
                <input type="email" id="email" placeholder="Email" class="form-control" readonly>
                <input type="text" id="phone" placeholder="Phone" class="form-control" readonly>
                <textarea id="address" cols="30" rows="7" placeholder="Address" class="form-control" readonly></textarea>
                {{-- <input type="text" name="address" id="address" placeholder="Address" class="form-control"> --}}
                {{-- <input type="submit" class="form-control btn-success"> --}}
            </form>
        </div>
    </div>
</div>

  
<script src="{{asset('js/order.js')}}"></script>


@stop
