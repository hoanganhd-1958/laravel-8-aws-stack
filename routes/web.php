<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

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

Route::post('file-upload', [FileUploadController::class, 'fileUploadPost'])->name('file.upload.post');
Route::get('test-cache', [FileUploadController::class, 'testCache']);
Route::get('test-queue', [FileUploadController::class, 'testQueue']);

require __DIR__.'/auth.php';
