<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Settings\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

//ContactsRoutes
// Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
// Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
// Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
// Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
// Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
// Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
// Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

Route::resources([
    'contacts' => ContactController::class,
    'companies' => CompanyController::class,
]);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('settings', [ProfileController::class, 'index'])->name('settings.index');
Route::get('settings/profile', [ProfileController::class, 'edit'])->name('settings.profile.edit');
Route::put('settings/profile', [ProfileController::class, 'update'])->name('settings.profile.update');
