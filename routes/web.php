<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [FrontController::class, 'indexHome'])->name('home');


Route::middleware('guest')->group(function () {
    Route::get('/loginUser', [AuthController::class, 'login'])->name('login');
    Route::post('/loginUser', [AuthController::class, 'authenticate']);

});

Route::middleware(['auth', 'checkRole:admin'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'indexAdmin'])->name('admin.index');
    Route::get('/absensi', function () {
        return view('admin.absent.index');
        });

    Route::get('/students', [AdminController::class, 'indexStudents'])->name('admin.students');
    Route::get('/createStudents', [AdminController::class, 'createStudents'])->name('admin.createStudents');
    Route::post('/storeStudents', [AdminController::class, 'storeStudents'])->name('admin.storeStudents');
    Route::get('/students/{id}/', [AdminController::class, 'editStudents'])->name('admin.editStudents');
    Route::put('/students/update/{id}', [AdminController::class, 'updateStudents'])->name('admin.updateStudents');
    Route::delete('/deleteStudents', [AdminController::class, 'destroyStudents'])->name('admin.deleteStudents');

    Route::get('/divisi', [AdminController::class, 'indexDivisi'])->name('admin.divisi');
    Route::get('/createDivisi', [AdminController::class, 'createDivisi'])->name('admin.createDivisi');
    Route::post('/storeDivisi', [AdminController::class, 'storeDivisi'])->name('admin.storeDivisi');
    Route::get('/divisi/{id}/', [AdminController::class, 'editDivisi'])->name('admin.editDivisi');
    Route::put('/divisi/update/{id}', [AdminController::class, 'updateDivisi'])->name('admin.updateDivisi');
    Route::delete('/deleteDivisi', [AdminController::class, 'destroyDivisi'])->name('admin.deleteDivisi');

    Route::get('/college', [AdminController::class, 'indexCollege'])->name('admin.college');
    Route::get('/createCollege', [AdminController::class, 'createCollege'])->name('admin.createCollege');
    Route::post('/storeCollege', [AdminController::class, 'storeCollege'])->name('admin.storeCollege');
    Route::get('/college/{id}/', [AdminController::class, 'editCollege'])->name('admin.editCollege');
    Route::put('/college/update/{id}', [AdminController::class, 'updateCollege'])->name('admin.updateCollege');
    Route::delete('/deleteCollege', [AdminController::class, 'destroyCollege'])->name('admin.deleteCollege');

});

// ====== Frontend ==========

Route::middleware(['auth', 'redirectIfAdmin'])->group(function (){

    Route::get('/clock-in', function () {
        return view('client.pages.clock-in');
    });
    Route::get('/clockinwfo', [FrontController::class, 'indexClockInwfo'])->name('user.clockInwfo');
    Route::get('/clockinwfh', [FrontController::class, 'indexClockInwfh'])->name('user.clockInwfh');
    Route::get('/clockinDinas', [FrontController::class, 'indexClockInDinas'])->name('user.clockInDinas');
    Route::get('/clockinIzin', [FrontController::class, 'indexClockInIzin'])->name('user.clockInIzin');
    Route::get('/clockout', [FrontController::class, 'indexClockOut'])->name('user.clockOut');
    Route::post('/storeClockinwfo', [FrontController::class, 'storeClockinwfo'])->name('user.storeClockinwfo');
    Route::post('/storeClockinwfh', [FrontController::class, 'storeClockinwfh'])->name('user.storeClockinwfh');
    Route::post('/storeClockinDinas', [FrontController::class, 'storeClockinDinas'])->name('user.storeClockinDinas');
    Route::post('/storeClockinIzin', [FrontController::class, 'storeClockinIzin'])->name('user.storeClockinIzin');
    Route::post('/storeClockOut', [FrontController::class, 'storeClockOut'])->name('user.storeClockOut');
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
