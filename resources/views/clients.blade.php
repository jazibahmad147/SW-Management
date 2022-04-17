@extends('layout')
<link rel="stylesheet" href="{{asset('css/clients.css')}}">
    
  <!-- Modal -->
  <div class="modal fade" id="editClientFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Update Client Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="clientUpdateForm" action="clientUpdate" method="POST">
            @csrf
                <input type="hidden" name="id" id="edit_id">
                <input type="text" name="name" id="edit_name" placeholder="Name" class="form-control pt-4">
                <input type="text" name="company" id="edit_company" placeholder="Company" class="form-control">
                <input type="email" name="email" id="edit_email" placeholder="Email" class="form-control">
                <input type="text" name="phone" id="edit_phone" placeholder="Phone" class="form-control">
                <input type="text" name="address" id="edit_address" placeholder="Address" class="form-control">
                <input type="submit" class="form-control btn-success" value="Update">
            </form>
        </div>
      </div>
    </div>
  </div>

  
  <div class="modal fade" id="viewClientFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-eye"></i> Student Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="name"></td>
                        <td id="company"></td>
                        <td id="email"></td>
                        <td id="address"></td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

@section('content')



<div class="row w-100 m-0" style="border-bottom: 1px solid black">
    <div class="P-0 col-md-11">
        <h3 class="myh1">CLIENTS</h3>
    </div>
    <div class="col-md-1 py-2 px-1">
        <a href="/logout" class="btn btn-sm btn-danger"><i class="fa fa-sign-out-alt"> Logout</i></a>
    </div>
</div>

<div class="row pt-4">
    <div class="col-md-4">
        <div class="leftCol">
            <div class="row" id="formTitle">
                <div class="col-md-2" id="titleIcon"><i class="fas fa-user-plus"></i></div>
                <div class="col-md-10" id="titleText"><h4>Add</h4></div>
            </div>
            {{-- <h4 id="formTitle"><i class="fas fa-user-plus"></i> Add Clients</h4> --}}
            <div class="clientForm">
                <form id="orderAddForm" action="orderProcess" method="POST">
                @csrf
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                    <input type="text" name="company" id="company" placeholder="Company" class="form-control">
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                    <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control">
                    <input type="text" name="address" id="address" placeholder="Address" class="form-control">
                    <input type="submit" class="form-control btn-success">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="rightCol">
            <div class="row" id="formTitle">
                <div class="col-md-1" id="titleIcon"><i class="fas fa-user-edit"></i></div>
                <div class="col-md-11" id="titleText"><h4>Manage</h4></div>
            </div>
            <table id="table1" class="cell-border compact stripe clientTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        {{-- <th>Eamil</th> --}}
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $client)
                        <tr>
                            <td>{{$client['name']}}</td>
                            <td>{{$client['company']}}</td>
                            <td>{{$client['phone']}}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action 
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
                                      <a href="#" type="button" onclick="viewClient({{$client['id']}})" class="dropdown-item" data-toggle="modal" data-target="#viewClientFormModal"> <i class="fa fa-eye"></i> View Detail </a> 
                                      <a href="#" type="button" onclick="editClient({{$client['id']}})" class="dropdown-item" data-toggle="modal" data-target="#editClientFormModal"> <i class="fa fa-edit"></i> Edit Detail </a> 
                                      <a href="#" type="button" onclick="deleteClient({{$client['id']}})" class="dropdown-item"><i class="fa fa-trash"></i> Delete Record</a>
                                    </div>
                                  </div>
                            </td>
                            {{-- <td class="text-center"><a href="{{'deleteClientRecord/'.$client['id']}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a></td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
    </div>
</div>


  
<script src="{{asset('js/client.js')}}"></script>


@stop
