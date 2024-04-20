<?php

use App\Http\Controllers\DateController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\testcontroller;
use App\Http\Controllers\TranslationController;
use Illuminate\Support\Facades\Route;
use Spatie\PdfToText\Exceptions\PdfNotFound;

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

// Route::match(['get', 'post'], '/test', [PdfController::class, 'create']);
Route::any('/tests/create', [TestController::class, 'create']);
Route::get('/tests/index',[testcontroller::class,'index'])->name('tests.index');
// Route::get('/tests/create',[testcontroller::class,'create'])->name('tests.create');
// Route::post('/tests',[testcontroller::class,'store'])->name('tests.store');

Route::delete('/tests/{tests}', [testcontroller::class, 'destroy'])->name('tests.destroy');
Route::put('tests/{tests}',[testcontroller::class,'edit'])->name('tests.edit');
Route::get('/test', [PdfController::class,'showForm'])->name('test.showForm');

Route::post('/test', [PdfController::class, 'store'])->name('test.store');
Route::get('/pdf/generate-pdf-form', [PdfController::class, 'showForm'])->name('pdf.generate-pdf-form');
Route::post('/generate-pdf', [PdfController::class, 'generateFromForm'])->name('pdf.generateFromForm');

// Route::get('/tests/create', [testcontroller::class, 'create'])->name('tests.create');
// Route::post('/tests', [testcontroller::class, 'store']);

Route::get('/convert-date', [DateController::class, 'showConvertForm'])->name('show.convert.form');
Route::post('/convert-date', [DateController::class, 'convertToAmharic'])->name('convert.date');