<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/view', [HomeController::class, 'view'])->name('view');

Route::get('/update/{id}', [HomeController::class, 'update'])->name('update');
Route::post('/update/{id}', [HomeController::class, 'saveUpdate'])->name('save.update');

Route::resource('users', UserController::class);

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::get('edit/profile', [ProfileController::class, 'editProfile'])->name('edit.profile');

Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('update.profile');
// Route::get('/send-email', [EmailController::class, 'updateConfirmation']);

Route::middleware(['isAdmin'])->group(function () {
    Route::resource('contacts', ContactController::class);
    Route::get('/contacts/restore/{id}', [ContactController::class, 'restoreContact'])->name('contacts.restore');
    Route::Delete('/contacts/forceDelete/{id}', [ContactController::class, 'forceDelete'])->name('force.delete');
    Route::get('/contact/list', [ContactController::class, 'getData'])->name('contacts.list');
    Route::post('/contact/submit-form', [ContactController::class, 'submitForm'])->name('form.submit');

});
