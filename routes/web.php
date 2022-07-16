<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\StaffsController;
use Illuminate\Support\Facades\Route;

//register / login / logout
Route::match(['post','get'],'/register',[AuthController::class,'register'])->name('register')->middleware('login');
Route::match(['post','get'],'/',[AuthController::class,'login'])->name('login')->middleware('login');
Route::get('/logout',[AuthController::class,'adminlogout'])->name('admin.logout');
Route::get('/staff/logout',[AuthController::class,'stafflogout'])->name('staff.logout');
Route::get('/doctor/logout',[AuthController::class,'doctorlogout'])->name('doctor.logout');

//admin side page
Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/home',[AdminController::class,'home'])->name('admin.home');
    //branch
    Route::get('/branch',[AdminController::class,'branch'])->name('admin.branch');
    Route::match(['post','get'],'/insert/branch',[AdminController::class,'insertbranch'])->name('admin.insertbranch');
    Route::get('/deletebranch/{id}',[AdminController::class,'deletebranch'])->name('admin.deletebranch');
    //doctor
    Route::get('/doctor',[AdminController::class,'doctor'])->name('admin.doctor');
    Route::match(['post','get'],'/insert/doctor',[AdminController::class,'insertdoctor'])->name('admin.insertdoctor');
    Route::get('/deletedoctor/{id}',[AdminController::class,'deletedoctor'])->name('admin.deletedoctor');
    //staff
    Route::get('/staff',[AdminController::class,'staff'])->name('admin.staff');
    Route::match(['post','get'],'/insert/staff',[AdminController::class,'insertstaff'])->name('admin.insertstaff');
    Route::get('/deletestaff/{id}',[AdminController::class,'deletestaff'])->name('admin.deletestaff');
    //admin
    Route::get('/newadmin',[AdminController::class,'newadmin'])->name('admin.newadmin');
    Route::match(['post','get'],'/insert/newadmin',[AdminController::class,'insertnewadmin'])->name('admin.insertnewadmin');
    Route::get('/deletenewadmin/{id}',[AdminController::class,'deletenewadmin'])->name('admin.deletenewadmin');
});

//staff 
   Route::get('/staff/patient',[StaffsController::class,'patient'])->middleware('staff')->name('staff.patient');
   Route::resource('staff',StaffsController::class)->middleware('staff');

//doctor
Route::prefix('doctor')->middleware('doctor')->group(function (){
    Route::get('/home',[DoctorsController::class,'home'])->name('doctor.home');
    Route::get('/nav',[DoctorsController::class,'nav']);
    Route::get('/graph/{id}',[DoctorsController::class,'graph'])->name('doctor.graph');

});
