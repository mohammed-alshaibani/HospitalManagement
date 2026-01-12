<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Models\DoctorPatients;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginIndex'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'registerIndex'])->name('register');

// doctore register
Route::get('/doctor-register', [AuthController::class, 'doctorRegisterIndex'])->name('doctor.register');
Route::post('/doctor-register', [AuthController::class, 'doctorRegister'])->name('doctor.register');

// patient register
Route::get('/patient-register', [AuthController::class, 'patientRegisterIndex'])->name('patient.register');
Route::post('/patient-register', [AuthController::class, 'patientRegister'])->name('patient.register');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('patient/test/{id?}', [DashboardController::class, 'patientTestsIndex'])->name('patient.tests');
    Route::get('patient/ray/{id?}', [DashboardController::class, 'patientRaysIndex'])->name('patient.rays');
    Route::get('patient/inspection/{id?}', [DashboardController::class, 'patientInspectionsIndex'])->name('patient.inspections');
    Route::get('patient/medicine/{id?}', [DashboardController::class, 'patientMedicinesIndex'])->name('patient.medicines');

    Route::get('/doctor-active', [DashboardController::class, 'activeDoctor']);

    Route::get('/doctor/active-files', [DashboardController::class, 'activeFiles'])->name('doctor.active-files');
    Route::get('/doctor/unactive-files', [DashboardController::class, 'unactiveFiles'])->name('doctor.unactive-files');

    Route::get('/doctor/active', [DashboardController::class, 'activePatientIndex'])->name('doctor.active');
    Route::post('/doctor/active', [DashboardController::class, 'activePatient'])->name('doctor.active');

    Route::get('/search-for-file', [DashboardController::class, 'searchForFileIndex'])->name('doctor.search-for-file');
    Route::post('/search-for-file', [DashboardController::class, 'searchForFile'])->name('doctor.search-for-file');

    Route::get('/doctor/show/{patient}', [DashboardController::class, 'showActivePatient'])->name('doctor.patient.show');

    //add note
    Route::get('/doctor/add-note/{patient_id}', [DashboardController::class, 'addNoteIndex'])->name('doctor.add-note.index');
    Route::post('/doctor/add-note', [DashboardController::class, 'addNote'])->name('doctor.add-note');


    Route::get('/patient-manager', [DashboardController::class, 'patientManager'])->name('patient-manager');
    Route::delete('/patient-manager/delete/{patient}', [DashboardController::class, 'deletePatient'])->name('patient.delete');
    Route::get('/patient-manager/{patient}', [DashboardController::class, 'showPatient'])->name('patient.show');
    Route::get('/doctor-manager', [DashboardController::class, 'doctorManager'])->name('doctor-manager');
    Route::get('/doctor-manager/edit/{doctor}', [DashboardController::class, 'editDoctor'])->name('doctor.edit');
    Route::put('/doctor-manager/edit/{doctor}', [DashboardController::class, 'updateDoctor']);
    Route::get('/doctor-manager/delete/{doctor}', [DashboardController::class, 'deleteDoctor'])->name('doctor.delete');



    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/change-lang/{lang}', [DashboardController::class, 'changeLang'])->name('change-lang');