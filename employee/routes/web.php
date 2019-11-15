<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Department
Route::get('list-department','DepartmentController@GetListDepartment')->middleware('checklogin');

Route::get('add-department','DepartmentController@GetAddDepartment')->middleware('checklogin');
Route::post('add-department','DepartmentController@PostAddDepartment');

Route::get('edit-department/{id}','DepartmentController@GetEditDepartment')->middleware('checkrole');
Route::post('edit-department/{id}','DepartmentController@PostEditDepartment');

Route::get('add-employee-depart/{id_depart}','DepartmentController@GetAddEmployeeDepart')->middleware('checkrole');

Route::get('delete-employee-depart/{id_employ}','DepartmentController@GetDeleteEmployeeDepart')->middleware('checkrole');

Route::get('delete-department/{id}','DepartmentController@GetDeleteDepartment')->middleware('checkrole');

// Employee
Route::get('list-employee','EmployeeController@GetListEmployee')->middleware('checklogin');

Route::get('search-employee','EmployeeController@GetSearchEmployee')->middleware('checklogin');

Route::get('add-employee','EmployeeController@GetAddEmployee')->middleware('checklogin');
Route::post('add-employee','EmployeeController@PostAddEmployee');

Route::get('edit-employee/{id}','EmployeeController@GetEditEmployee')->middleware('checkrole');
Route::post('edit-employee/{id}','EmployeeController@PostEditEmployee');

Route::get('delete-employee/{id}','EmployeeController@GetDeleteEmployee')->middleware('checkrole');

// Login
Route::get('login', 'MyLoginController@GetLogin');
Route::post('login', 'MyLoginController@PostLogin');

Route::get('logout', 'MyLoginController@GetLogout')->middleware('checklogin');

// Mã hóa mật khẩu toàn bộ tài khoản
Route::get('/bcrypt', function(){
    echo bcrypt('123456');
    $users = App\User::all();
    foreach ($users as $user) {
    	$a = App\User::find($user->id);
    	$a->save();
    	$a->password = bcrypt('123456');
    }
});

// User
Route::get('list-user','UserController@GetListUser')->middleware('checklogin');

Route::get('add-user','UserController@GetAddUser')->middleware('checkrole');
Route::post('add-user','UserController@PostAddUser');

Route::get('edit-user/{id}','UserController@GetEditUser')->middleware('checkrole');
Route::post('edit-user/{id}','UserController@PostEditUser');

Route::get('delete-user/{id}','UserController@GetDeleteUser')->middleware('checkrole');

Route::get('edit-password/{id}','UserController@GetEditPassword')->middleware('checklogin');
Route::post('edit-password/{id}','UserController@PostEditPassword');

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
