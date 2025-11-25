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
use App\Http\Controllers\admin\AdminTeacherController;
use App\Http\Controllers\admin\AdminGuardianController;
use App\Http\Controllers\admin\AdminSubjectController;

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

Route::get('/admin/teacher', [AdminTeacherController::class, 'index'])->name('teacher.index');
Route::post('admin/teacher', [AdminTeacherController::class, 'store'])->name('teacher.store');
Route::put('/admin/teacher/{teacher}', [AdminTeacherController::class, 'update'])->name('teacher.update');
Route::delete('admin/teacher/{teacher}', [AdminTeacherController::class, 'destroy'])->name('teacher.destroy');

Route::get('/admin/guardian', [AdminGuardianController::class, 'index'])->name('guardian.index');
Route::post('admin/guardian', [AdminGuardianController::class, 'store'])->name('guardian.store');
Route::put('/admin/guardian/{guardian}', [AdminGuardianController::class, 'update'])->name('guardian.update'); 
Route::delete('admin/guardian/{guardian}', [AdminGuardianController::class, 'destroy'])->name('guardian.destroy');

Route::get('/admin/classroom', [AdminClassroomController::class, 'index']);
Route::post('admin/classroom', [AdminClassroomController::class, 'store'])->name('classrooms.store');

Route::get('/admin/subject', [AdminSubjectController::class, 'index'])->name('subject.index');
Route::post('/admin/subject', [AdminSubjectController::class, 'store'])->name('subject.store');
Route::put('/admin/subject/{subject}', [AdminSubjectController::class, 'update'])->name('subject.update');

// Route::get('/students', [StudentController::class, 'index']);

// Route::get('/guardian', [GuardianController::class, 'index']);

// Route::get('/adminclassroom', [DashController::class, 'indexClass']);

// Route::get('/teacher', [TeacherController::class, 'index']);

// Route::get('/subject', [SubjectController::class, 'index']);


// Route::get('/home', [ProfilController::class, 'home']);

    