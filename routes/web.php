<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;

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
    //return view('welcome');
    return view('login');
});

Route::controller(SampleController::class)->group(function(){

    Route::get('login', 'index')->name('login');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_login', 'validate_login')->name('sample.validate_login');

    Route::get('student-dashboard', 'student-dashboard')->name('student-dashboard');

    Route::get('lecturer-dashboard', 'lecturer-dashboard')->name('lecturer-dashboard');

    Route::get('supervisor-dashboard', 'supervisor-dashboard')->name('supervisor-dashboard');

    Route::get('coor-dashboard', 'coor-dashboard')->name('coor-dashboard');

});

Route::controller(ProfileController::class)->group(function(){

    Route::get('profile', 'index')->name('profile');

    Route::post('profile/edit_validation', 'edit_validation')->name('profile.edit_validation');    

});

Route::get('/userprofile', function () {
    return view('/userprofile');
});

Route::get('/student-dashboard', function () {
    return view('/student-dashboard');
});

Route::get('/lecturer-dashboard', function () {
    return view('/lecturer-dashboard');
});

Route::get('/supervisor-dashboard', function () {
    return view('/supervisor-dashboard');
});

Route::get('/coor-dashboard', function () {
    return view('/coor-dashboard');
});

Route::get('/change-password', [App\Http\Controllers\ProfileController::class, 'changePassword'])->name('change-password');

Route::post('/change-password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('update-password');

//Route::view('company', 'company');
Route::get('company', [CompanyController::class,'show']);

Route::controller(CompanyController::class)->group(function(){
    Route::get('company', 'index');
    Route::get('company-export', 'export')->name('company.export');
    //Route::post('/company/import', 'import')->name('company.import');
});

Route::get('/import_excel', [App\Http\Controllers\CompanyController::class,'index']);
Route::post('/import', [App\Http\Controllers\CompanyController::class,'import']);

//Route::resource('students', StudentController::class);

Route::controller(CompanyController::class)->group(function(){
    Route::get('company', 'index')->name('index');
    Route::get('addCompany', 'index')->name('index');
    Route::get('addCompany', 'addCompany')->name('addCompany');
    Route::post('saveCompany', 'saveCompany')->name('saveCompany');
    //Route::get('editCompany/{CompanyName}', 'editCompany')->name('editCompany');
    Route::post('updateCompany', 'updateCompany')->name('updateCompany');   
    Route::get('deleteCompany/{CompanyName}', 'deleteCompany')->name('deleteCompany');
});

Route::get('/addCompany', function () {
    return view('/addCompany');
});

Route::get('/editCompany', function () {
    return view('/editCompany');
});

Route::get('/deleteCompany', function () {
    return view('/deleteCompany');
});

Route::get('index',[App\Http\Controllers\CompanyController::class,'insertform']);
Route::post('insert',[App\Http\Controllers\CompanyController::class,'index']);

Route::get('editCompany/{CompanyName}',[App\Http\Controllers\CompanyController::class,'editCompany']);