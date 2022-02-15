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
    return view('auth.login');
});

Auth::routes();

Route::get('/home','DashboardController@dashboard')->name('dashboard');


//Category  
Route::get('/admin-company','CompanyController@index')->name('admin.company');
Route::post('/add_company', 'CompanyController@Add')->name('add_company');
Route::post('/company.all', 'CompanyController@GetAll')->name('company.all');
Route::post('/company.getDetails', 'CompanyController@Getone')->name('company.getDetails');
Route::post('/company_update', 'CompanyController@Update')->name('company.update');
Route::post('/company_delete', 'CompanyController@Delete')->name('company.delete');

//Employee
Route::get('/admin-emp','EmployeeController@index')->name('admin.emp');
Route::post('/add_emp', 'EmployeeController@Add')->name('add_emp');
Route::post('/emp.all', 'EmployeeController@GetAll')->name('emp.all');
Route::post('/emp.getDetails', 'EmployeeController@Getone')->name('emp.getDetails');
Route::post('/emp_update', 'EmployeeController@Update')->name('emp.update');
Route::post('/emp_delete', 'EmployeeController@Delete')->name('emp.delete');
