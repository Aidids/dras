<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

require __DIR__.'/auth.php';

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('location')->group(function () {
       Route::get('/', [FacultyController::class, 'index'])->name('faculty');
       Route::get('/create', [FacultyController::class, 'create'])->name('faculty.create');
       Route::post('/create', [FacultyController::class, 'store'])->name('faculty.store');
       Route::post('/edit', [FacultyController::class, 'edit'])->name('faculty.edit');
    });

    Route::prefix('programme')->group(function () {
       Route::get('/', [ProgrammeController::class, 'index'])->name('programme');
       Route::get('/create', [ProgrammeController::class, 'create'])->name('programme.create');
       Route::post('/create', [ProgrammeController::class, 'store'])->name('programme.store');
       Route::post('/edit', [ProgrammeController::class, 'edit'])->name('programme.edit');
    });

    Route::prefix('field-expertise')->group(function () {
        Route::get('/', [FieldExpertiseController::class, 'index'])->name('field-expertise');
        Route::get('/create', [FieldExpertiseController::class, 'create'])->name('field-expertise.create');
        Route::post('/create', [FieldExpertiseController::class, 'store'])->name('field-expertise.store');
        Route::get('/edit', [FieldExpertiseController::class, 'edit'])->name('field-expertise.edit');
        Route::get('/expand', [FieldExpertiseController::class, 'getChildrens'])->name('field-expertise.childs');
        Route::get('/projects', [FieldExpertiseController::class, 'getProjects'])->name('field-expertise.projects');

    });

    Route::prefix('project')->group(function () {

    });
});







//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});
//
//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
