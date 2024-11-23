<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'login')->name('admin.login');
    Route::post('/loginpost', 'loginpost')->name('admin.loginpost');
    Route::middleware('auth:admin')->group(function () {
        Route::get('/admin/super', 'index')->name('admin.super');
        Route::get('admin/index', 'index')->name('admin.index');
        Route::get('/admin/logout', 'logout')->name('admin.logout');


        Route::get('/admin/user', 'UserIndex')->name('admin.user');
        Route::post('/admin/add','UserStore')->name('admin.add');
        Route::get('admin/{id}/userprofile','UserProfile')->name('admin.userprofile');
        Route::patch('/admin/edit','UserUpdate')->name('admin.edit');
        Route::delete('/admin/user/{id}', 'UserDelete')->name('admin.userdelete');


        Route::get('admin/company','CompanyIndex')->name('admin.company');
        Route::post('/admin/addcompany','CompanyStore')->name('admin.addcompany');
        Route::get('admin/{id}/companyprofile','CompanyProfile')->name('admin.userprofile');

    });
        });



require __DIR__.'/auth.php';
