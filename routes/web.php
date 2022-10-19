<?php

use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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

    return view('dashboard', ['transactions' => Transaction::with('user')->latest()->get()]);
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::resource('/transfer', TransactionController::class)->middleware(['auth', 'verified']);
Route::controller(TransactionController::class)->group(function () {
    Route::get('transfer', 'index');
    Route::get('confirm', function () {
        return view('confirm');
    });
    Route::post('confirm', 'confirm');
    Route::post('transfer', 'store');
});

require __DIR__ . '/auth.php';
