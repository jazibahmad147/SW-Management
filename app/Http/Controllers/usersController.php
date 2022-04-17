<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class usersController extends Controller
{
    function userLogin(Request $req){
        $req->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        // $data = $req->input();
        $username = $req->username;
        $password = $req->password;
        
        $check = DB::table('users')->where(['username'=>$username,'password'=>$password])->get();
        if(count($check) > 0){
            echo "Login Successfull!";
            $req->session()->put('user',$username);
            $req->session()->put('fullName',$check[0]->fullName);
            return redirect('dashboard');
        }else{
            return view('/signin',['msg'=>'0']);
        }
        
    }

    function userPasswordForget(Request $req){
        $req->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $email = $req->email;
        $password = $req->password;

        $check = DB::table('users')->where(['email'=>$email])->get();
        if(count($check) > 0){
            $update = DB::table('users')->where('email', $email)->update(['password' => $password]);
            return view('/forgot_password',['msg'=>'1']);
            
        }else{
            return view('/forgot_password',['msg'=>'0']);
        }
    }

    function userSignup(Request $req){
        $req->validate([
            'username'=>'required',
            'fullName'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        // $user k agy jo username likha he wo column name he sql table myn 
        $user = new User;
        $user->username = $req->username;
        $user->fullName = $req->fullName;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->save();
        return redirect('reg');
    }

    function userList(){
        $data = User::all();
        return view('list',['users'=>$data]);
    }

    function deleteUser($id){
        $data = User::find($id);
        $data->delete();
        return redirect('records');
    }

    function showUser($id){
        $data = User::find($id);
        return view('edit',['data'=>$data]);
    }

    function updateUser(Request $req){
        $data = User::find($req->id);
        $data->username = $req->username;
        $data->password = $req->userPassword;
        $data->save();
        return redirect('records');
    }
}
