<?php

use App\Http\Controllers\AutoReplyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReceiveMessageController;
use App\Http\Controllers\ScheduleMessageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WaSenderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('list-contacts', [ListContactController::class, 'index'])->name('list-contacts');
    Route::post('add-contact', [ListContactController::class, 'addContact'])->name('add-contact');
    Route::post('edit-contact', [ListContactController::class, 'editContact'])->name('edit-contact');
    Route::post('delete-contact', [ListContactController::class, 'deleteContact'])->name('delete-contact');
    Route::post('delete-all-contacts', [ListContactController::class, 'deleteAll'])->name('delete-all-contacts');
    Route::post('file-import-contact', [ListContactController::class, 'fileImport'])->name('file-import-contact');
    Route::get('file-export-contact', [ListContactController::class, 'fileExport'])->name('file-export-contact');
    Route::post('save-contact', [ListContactController::class, 'saveContact'])->name('save-contact');

    Route::get('/wa-sender', [WaSenderController::class, 'index'])->name('wa-sender');
    Route::post('/upload-image', [WaSenderController::class, 'uploadImage'])->name('upload-image');
    // Route::post('/upload-audio', [WaSenderController::class, 'uploadAudio'])->name('upload-audio');
    Route::post('/upload-document', [WaSenderController::class, 'uploadDocument'])->name('upload-document');
    // Route::post('/upload-video', [WaSenderController::class, 'uploadVideo'])->name('upload-video');
    Route::post('/get-nomor-hp-by-prodi', [WaSenderController::class, 'getNomerByProdi'])->name('get-nomor-hp-by-prodi');
    



});
