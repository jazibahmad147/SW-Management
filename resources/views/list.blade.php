@extends('layout')

@section('content')

<h1>Users List</h1>
<table class="table">
    <tr>
        <th>ٰId</th>
        <th>ٰUsername</th>
        <th>ٰPassword</th>
        <th colspan='2'>Action</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['username']}}</td>
        <td>{{$user['password']}}</td>
        <td><a href="{{'deleteRecord/'.$user['id']}}">Delete</a></td>
        <td><a href="{{'editRecord/'.$user['id']}}">Edit</a></td>
    </tr>
    @endforeach
</table>

@stop