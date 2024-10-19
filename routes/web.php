<?php

use Illuminate\Support\Facades\Route;
use App\Models\Customer; 
use App\Http\Controllers\DemoController;
use App\http\Controllers\RegistrationController;
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

Route::get('/register',[RegistrationController::class, 'index']); 
Route::post('/register',[RegistrationController::class, 'register']);

Route::get('/customers/{id}/edit', [RegistrationController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{id}', [RegistrationController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}', [RegistrationController::class, 'destroy'])->name('customers.destroy');

Route::get('/',[DemoController::class, 'index']); 

Route::get('/customer', function(){
    $customers = Customer::all();
    echo "<pre>";
    print_r($customers->toArray());
});  