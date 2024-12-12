<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;


Route::get('/', [RegisteredUserController::class, 'create'])
    ->name('register');

    Route::get('/cv-form', [CVController::class, 'showForm'])->name('cv.form');
    Route::post('/generate-cv', [CVController::class, 'generateCV'])->name('cv.generate'); // Ruta para generar el CV
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cvs', [CVController::class, 'index'])->name('cv.index');
    Route::get('/cvs/{id}/edit', [CVController::class, 'edit'])->name('cv.edit');
    Route::put('/cvs/{id}', [CVController::class, 'update'])->name('cv.update');
    Route::delete('/cvs/{id}', [CVController::class, 'destroy'])->name('cv.destroy');
    Route::get('/cvs/{id}/download', [CVController::class, 'download'])->name('cv.download');
});


Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

require __DIR__.'/auth.php';
