<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentReportController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', 'App\Http\Controllers\ClientController@storeContact')->name('contact.store');

Route::get('success', function () {
    return view('success');
})->name('success');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('clients', ClientController::class);
Route::resource('destinations', DestinationController::class);
Route::resource('packages', PackageController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('payment', PaymentController::class);
Route::get('reportes', [ReportController::class, 'generarPDF'])->name('reporte.reservas');

Route::get('reportespagos', [PaymentReportController::class, 'showPaymentReport'])->name('reporte.pagos');
