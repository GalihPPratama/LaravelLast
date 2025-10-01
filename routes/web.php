<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;

Route::get('/home', [HomeController::class, 'index']);




Route::get('/', [ProfilController::class, 'index']);

Route::get('/profil', [ProfilController::class, 'profil']);

Route::get('/kontak', [ContactController::class, 'index']);

Route::get('/students', [StudentController::class, 'index']);

Route::get('/guardian', [GuardianController::class, 'index']);

Route::get('/classroom', [ClassroomController::class, 'index']);

// Route::get('/home', [ProfilController::class, 'home']);

    