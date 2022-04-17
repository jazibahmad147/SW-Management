<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Order;

class ordersController extends Controller
{
    function clientsList(){
        $data = Client::all();
        return view('new_order',['clients'=>$data]);
    }

    function viewClientData($id){
        $record = array();
        $client = Client::all();
        $data = Client::find($id);
        $record = $data;
        return response()->json($record);
    }
}
