<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\admin\AdminClassroomController;
use App\Http\Controllers\admin\AdminStudentController;

Route::get('/home', [HomeController::class, 'index']);




Route::get('/', [ProfilController::class, 'index']);

Route::get('/profil', [ProfilController::class, 'profil']);

Route::get('/kontak', [ContactController::class, 'index']);

Route::get('/students', [StudentController::class, 'index']);

Route::get('/guardian', [GuardianController::class, 'index']);

Route::get('/classroom', [ClassroomController::class, 'index']);

Route::get('/teacher', [TeacherController::class, 'index']);

Route::get('/subject', [SubjectController::class, 'index']);

Route::get('/dashboard', [DashController::class, 'index']);

Route::get('/admin/student', [AdminStudentController::class, 'index'])->name('students.index');
Route::post('admin/student', [AdminStudentController::class, 'store'])->name('students.store');
Route::put('/admin/students/{student}', [AdminStudentController::class, 'update'])->name('students.update');
Route::delete('admin/students/{student}', [AdminStudentController::class, 'destroy'])->name('students.destroy');


Route::get('/admin/classroom', [AdminClassroomController::class, 'index']);
Route::post('admin/classroom', [AdminClassroomController::class, 'store'])->name('classrooms.store');

// Route::get('/students', [StudentController::class, 'index']);

// Route::get('/guardian', [GuardianController::class, 'index']);

// Route::get('/adminclassroom', [DashController::class, 'indexClass']);

// Route::get('/teacher', [TeacherController::class, 'index']);

// Route::get('/subject', [SubjectController::class, 'index']);


// Route::get('/home', [ProfilController::class, 'home']);

    