<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\usersController;
use App\Http\Controllers\clientsController;
use App\Http\Controllers\studentsController;
use App\Http\Controllers\ordersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view("/","signin",['msg'=>'']);
// Route::view("about","about");
// Route::view("dashboard","dashboard");

Route::post('userLogin',[usersController::class,'userLogin']);
Route::post('userReg',[usersController::class,'userSignup']);
// Route::get('records',[usersController::class,'userList']);
Route::get('deleteRecord/{id}',[usersController::class,'deleteUser']);
Route::get('editRecord/{id}',[usersController::class,'showUser']);
Route::post('updateRecord',[usersController::class,'updateUser']);
Route::post('userPasswordRecover',[usersController::class,'userPasswordForget']);
// Route::view("signin","signin");
Route::view("reg","register");

// clients 
Route::get('clients',[clientsController::class,'clientsList']);
Route::post('clientReg',[clientsController::class,'clientRegister']);
Route::get('clientEditForm/{id}',[clientsController::class,'viewClientData']);
Route::post('clientUpdate',[clientsController::class,'clientUpdate']);
Route::get('deleteClientRecord/{id}',[clientsController::class,'deleteClient']);

// students
Route::get('students',[studentsController::class,'studentsList']);
Route::post('studentReg',[studentsController::class,'studentRegister']);
Route::get('studentEditForm/{id}',[studentsController::class,'viewStudentData']);
Route::post('studentUpdate',[studentsController::class,'studentUpdate']);
Route::get('deleteStudentRecord/{id}',[studentsController::class,'deleteStudent']);

// sales
Route::get('new_order',[ordersController::class,'clientsList']);
Route::get('viewClientData/{id}',[ordersController::class,'viewClientData']);



Route::get('/dashboard', function () {
    if(session()->has('user')){
        return view('dashboard');
    }
    else{
        return redirect('/');
    }
});


Route::get('/manage_clients', function () {
    if(session()->has('user')){
        return redirect('clients');
    }
    else{
        return redirect('/');
    }
});


Route::get('/manage_students', function () {
    if(session()->has('user')){
        return redirect('students');
    }
    else{
        return redirect('/');
    }
});

// Route::get('/new_order', function () {
//     if(session()->has('user')){
//         return view('new_order');
//     }
//     else{
//         return redirect('/');
//     }
// });


Route::get('/', function () {
    if(session()->has('user')){
        return redirect('dashboard');
    }
    else{
        return view('/signin',['msg'=>'']);
    }
});

Route::get('/forget', function () {
    if(session()->has('user')){
        return redirect('dashboard');
    }
    else{
        return view('/forgot_password',['msg'=>'']);
    }
});

Route::get('/logout', function () {
    if(session()->has('user')){
        session()->pull('user');
    }
    return redirect('/');
});

// url se data get krny ka tarika page myn 
// Route::get('/{name}', function ($name) {
//     return view('welcome',['name'=>$name]);
// });

// simple method 
// Route::view("url","pageName");
