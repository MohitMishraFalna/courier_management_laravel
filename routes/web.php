<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;
use App\Http\Controllers\Employees;
use App\Http\Controllers\Branchdetail;
use App\Http\Controllers\Imagecontroller;
use App\Http\Controllers\QuerierTableController;
use App\Http\Controllers\Sender_controller;
use App\Http\Controllers\Reciever_controller;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('workbanch', function() {
    /* When we are set the session in closer function so it must compulsory to use session helper method
    because here $request variable is not define and when we use $request variable here so we will got the
    error. that's resion we are using session() helper method. */
    if(!session()->get('logged_in')){
        return redirect()->to('');
    }
    return view('Workbanch');
});

// Route Define for Branch.
Route::get('add_branch', [Branchdetail::class, 'pageShow']);
Route::get('insert', [Branchdetail::class, 'insertDetails']);
Route::get('showbranchdetails', [Branchdetail::class, 'getBranchDetails']);
Route::get('edit', [Branchdetail::class, 'updatebranch']);
Route::get('update', [Branchdetail::class, 'saveUpdateBranchDetail']);
Route::get('address', [Branchdetail::class, 'addressFromAPI']);

// Route Define for Employee.
Route::get('new_employee', [Employees::class, 'pageView']);
Route::post('insert_data', [Employees::class, 'insertDetails']);
Route::get('edit_employee', [Employees::class, 'editDetails']);
Route::post('update_details', [Employees::class, 'updateDetails']);
Route::get('show_details', [Employees::class, 'showpage']);
Route::get('employee_details', [Employees::class, 'getDetails']);
Route::get('profile', [Employees::class, 'profileDetails']);
Route::get('picture', [Employees::class, 'profilePicture']);
Route::post('updatepicture', [Employees::class, 'updatePicture']);
Route::get('change', [Employees::class, 'passwordchange']);
Route::post('password_update', [Employees::class, 'passwordupdate']);

// Route For Login.
Route::get('/', [home::class, 'home']);
Route::post('login', [home::class, 'login']);
Route::get('logout', [home::class, 'logout']);

// Route For Image upload/remove.
Route::post('upload', [Imagecontroller::class, 'imageupload']);
Route::get('remove', [Imagecontroller::class, 'imagedelete']);

//Order
Route::get('order', [QuerierTableController::class, 'index']);
Route::get('ordercreate', [QuerierTableController::class, 'create']);
Route::get('printorder', [QuerierTableController::class, 'show']);
Route::get('printorder/{id}', [QuerierTableController::class, 'show']);
Route::get('order_list', [QuerierTableController::class, 'order_list']);

//Sender
Route::post('sender_add', [Sender_controller::class, 'create']);
Route::get('sender_show', [Sender_controller::class, 'index']);
Route::post('sender_edit', [Sender_controller::class, 'edit']);
Route::post('sender_update', [Sender_controller::class, 'update']);

//Reciever
Route::post('reciever_add', [Reciever_controller::class, 'create']);
Route::get('reciever_show', [Reciever_controller::class, 'index']);
Route::post('reciever_edit', [Reciever_controller::class, 'edit']);
Route::post('reciever_update', [Reciever_controller::class, 'update']);