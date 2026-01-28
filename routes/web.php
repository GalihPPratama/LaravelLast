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
use App\Http\Controllers\AuthControllerer;
use App\Http\Controllers\admin\AdminClassroomController;
use App\Http\Controllers\admin\AdminStudentController;
use App\Http\Controllers\admin\AdminTeacherController;
use App\Http\Controllers\admin\AdminGuardianController;
use App\Http\Controllers\admin\AdminSubjectController;

use App\Http\Controllers\PaymentController;

Route::post('/payments/snap-token', [PaymentController::class, 'createSnapToken']);
Route::post('/payments/notify', [PaymentController::class, 'handleNotification']); // webhook
Route::get('/payments/status/{orderId}', [PaymentController::class, 'getStatus']); // for Flutter polling










Route::get('/home', [HomeController::class, 'index'])->name('home');




Route::get('/', [ProfilController::class, 'index']);

Route::get('/profil', [ProfilController::class, 'profil']);

Route::get('/kontak', [ContactController::class, 'index']);

Route::get('/students', [StudentController::class, 'index']);

Route::get('/guardian', [GuardianController::class, 'index']);

Route::get('/classroom', [ClassroomController::class, 'index']);

Route::get('/teacher', [TeacherController::class, 'index']);

Route::get('/subject', [SubjectController::class, 'index']);

Route::get('/dashboard', [DashController::class, 'index'])->name('admin.dashboard');



//auth shi
Route::get('/login', [AuthControllerer::class, 'showLogin'])->name('login');
Route::post('/login', [AuthControllerer::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthControllerer::class, 'logout'])->name('logout');





Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        // STUDENTS
        Route::get('/student', [AdminStudentController::class, 'index'])->name('students.index');
        Route::post('/student', [AdminStudentController::class, 'store'])->name('students.store');
        Route::put('/students/{student}', [AdminStudentController::class, 'update'])->name('students.update');
        Route::delete('/students/{student}', [AdminStudentController::class, 'destroy'])->name('students.destroy');

        // TEACHERS
        Route::get('/teacher', [AdminTeacherController::class, 'index'])->name('teacher.index');
        Route::post('/teacher', [AdminTeacherController::class, 'store'])->name('teacher.store');
        Route::put('/teacher/{teacher}', [AdminTeacherController::class, 'update'])->name('teacher.update');
        Route::delete('/teacher/{teacher}', [AdminTeacherController::class, 'destroy'])->name('teacher.destroy');

        // GUARDIANS
        Route::get('/guardian', [AdminGuardianController::class, 'index'])->name('guardian.index');
        Route::post('/guardian', [AdminGuardianController::class, 'store'])->name('guardian.store');
        Route::put('/guardian/{guardian}', [AdminGuardianController::class, 'update'])->name('guardian.update');
        Route::delete('/guardian/{guardian}', [AdminGuardianController::class, 'destroy'])->name('guardian.destroy');

        // CLASSROOM
        Route::get('/classroom', [AdminClassroomController::class, 'index']);
        Route::post('/classroom', [AdminClassroomController::class, 'store'])->name('classrooms.store');
        Route::put('/classroom/{classroom}', [AdminClassroomController::class, 'update'])->name('classroom.update');

        // SUBJECT
        Route::get('/subject', [AdminSubjectController::class, 'index'])->name('subject.index');
        Route::post('/subject', [AdminSubjectController::class, 'store'])->name('subject.store');
        Route::put('/subject/{subject}', [AdminSubjectController::class, 'update'])->name('subject.update');

    });







// Route::get('/students', [StudentController::class, 'index']);

// Route::get('/guardian', [GuardianController::class, 'index']);

// Route::get('/adminclassroom', [DashController::class, 'indexClass']);

// Route::get('/teacher', [TeacherController::class, 'index']);

// Route::get('/subject', [SubjectController::class, 'index']);


// Route::get('/home', [ProfilController::class, 'home']);

    