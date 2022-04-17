<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class clientsController extends Controller
{
    function clientRegister(Request $req){
        $valid['success'] = array('success' => false, 'messages' => array());

        $req->validate([
            'name'=>'required',
            'company'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);
        
        // check either client already exist or not  
        $email = $req->email;
        $check = DB::table('clients')->where(['email'=>$email])->get();
        if(count($check) > 0){
            $valid['success'] = false;
            $valid['messages'] = "Email already exist!";
            $valid['class'] = "warning";
            $valid['title'] = "Error";
        }else{
            $client = new Client;
            $client->name = $req->name;
            $client->company = $req->company;
            $client->email = $req->email;
            $client->phone = $req->phone;
            $client->address = $req->address;
            $client->save();
            
            $valid['success'] = true;
            $valid['messages'] = "Your record added successfully!";
            $valid['class'] = "success";
            $valid['title'] = "Congratulations";
        }
        return response()->json($valid);

    }

    function viewClientData($id){
        $record = array();
        $clients = Client::all();
        $data = Client::find($id);
        $record = $data;
        return response()->json($record);
    }

    function clientUpdate(Request $req){
        $valid['success'] = array('success' => false, 'messages' => array());

        $req->validate([
            'name'=>'required',
            'company'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);

        $client = Client::find($req->id);
        $client->name = $req->name;
        $client->company = $req->company;
        $client->email = $req->email;
        $client->phone = $req->phone;
        $client->address = $req->address;
        $client->save();

        $valid['success'] = true;
        $valid['messages'] = "Your record updated successfully!";
        $valid['class'] = "success";
        $valid['title'] = "Congratulations";

        return response()->json($valid);
    }

    function clientsList(){
        $clients = Client::all()->sortByDesc("id");
        return view('clients',['members'=>$clients]);
    }

    function deleteClient($id){
        $valid['success'] = array('success' => false, 'messages' => array());

        $clients = Client::all();
        $data = Client::find($id);
        $msg = 'del';
        $data->delete();
        
        $valid['success'] = true;
        $valid['messages'] = "Your record deleted successfully!";
        $valid['class'] = "success";
        $valid['title'] = "Congratulations";

        return response()->json($valid);
    }
    
}
