<?php

use App\Http\Controllers\Auth\TeachersController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\QualificationsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TitlesController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'isTeacher'])->prefix('teachers')->group(function () {
    Route::get('dashboard', [TeachersController::class, 'index'])->name('teachers.dashboard');

    Route::prefix('titles')->group(function () {
        Route::get('create', [TitlesController::class, 'create'])->name('titles.create');
        Route::post('store', [TitlesController::class, 'store'])->name('titles.store');
        Route::get('edit/{id}/id', [TitlesController::class, 'edit'])->name('titles.edit');
        Route::put('update', [TitlesController::class, 'update'])->name('titles.update');
        Route::delete('destroy', [TitlesController::class, 'destroy'])->name('titles.destroy');
    });

    Route::prefix('courses')->group(function () {
        Route::get('create', [CoursesController::class, 'create'])->name('courses.create');
        Route::post('store', [CoursesController::class, 'store'])->name('courses.store');
        Route::get('edit/{id}/id', [CoursesController::class, 'edit'])->name('courses.edit');
        Route::put('update', [CoursesController::class, 'update'])->name('courses.update');
        Route::delete('destroy', [CoursesController::class, 'destroy'])->name('courses.destroy');
    });

    Route::prefix('qualifications')->group(function () {
        Route::get('index', [QualificationsController::class, 'index'])->name('qualifications.index');
        Route::post('store', [QualificationsController::class, 'store'])->name('qualifications.store');
    });
});

Route::middleware(['auth'])->prefix('students')->group(function () {
    Route::get('dashboard', [StudentsController::class, 'index'])->name('students.dashboard');
});

Route::get('prueba', function () {
    $user = User::create([
                             'name' => 'student',
                             'surname' => 'surstudent',
                             'birthday' => \Carbon\Carbon::now()->subYears(20),
                             'email' => 'student@mail.com',
                             'password' => bcrypt('123123123')
                         ]);
    $role = Role::create(['name' => 'teacher']);
    $role2 = Role::create(['name' => 'student']);
    $user->assignRole('student');
    $user2 = User::create([
                              'name' => 'teacher',
                              'surname' => 'surteacher',
                              'birthday' => \Carbon\Carbon::now()->subYears(40),
                              'email' => 'prueba@mail.com',
                              'password' => bcrypt('123123123')
                          ]);
    $user2->assignRole('teacher');

    dd('todo ok');
});
