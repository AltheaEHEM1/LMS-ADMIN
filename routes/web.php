<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
//////////////////////////////////////////////////////////
//if you want to run the log in of employee
Route::get('/', function () {
    return view('login_employee');
});

Route::get('/DASHBORDandingpage_employee', function () {
    return view('DASHBORDandingpage_employee'); 
});

Route::get('/login_employee', function () {
    return view('login_employee'); 
});

Route::get('/EMPLOYEE', function () {
    return view('EMPLOYEE'); 
});

Route::get('/RESERVATION', function () {
    return view('RESERVATION'); 
});

Route::get('/LIBRARIAN', function () {
    return view('LIBRARIAN'); 
});

Route::get('/CATALOGER', function () {
    return view('CATALOGER'); 
});

Route::get('/MEMBERS', function () {
    return view('MEMBERS'); 
});

Route::get('/CIRCULATION', function () {
    return view('CIRCULATION'); 
});

Route::get('/CIRCULATION_REPORTS', function () {
    return view('CIRCULATION_REPORTS'); 
});

Route::get('/MEMBER_REPORTS', function () {
    return view('MEMBER_REPORTS'); 
});

Route::get('/OVERDUE_REPORTS', function () {
    return view('OVERDUE_REPORTS'); 
});

Route::get('/CATALOG', function () {
    return view('CATALOG'); 
});

Route::get('/CATALOG_REPORTS', function () {
    return view('CATALOG_REPORTS'); 
});

// Handle Login Submission
Route::post('/login_employee', [AuthController::class, 'login_employee'])->name('login_employee');

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');