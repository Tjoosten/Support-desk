<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Users\AccountController;
use App\Http\Controllers\Users\IndexController;
use App\Http\Controllers\Users\LockController;
use App\Http\Controllers\TagsController;

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

Auth::routes(['register' => false]);
 
// Home routes
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

// Activity routes
Route::get('{user}/logs', [ActivityController::class, 'show'])->name('users.activity');

// Notification routes
Route::get('/notificaties/{type?}', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('/notificaties/markAll', [NotificationController::class, 'markAll'])->name('notifications.markAll');
Route::get('/notificaties/markOne/{notification}', [NotificationController::class, 'markOne'])->name('notifications.markAsRead');

// User state routes
Route::get('/account/gedeactiveerd', [LockController::class, 'index'])->name('user.blocked');
Route::get('/{userEntity}/deactiveer', [LockController::class, 'create'])->name('users.lock');
Route::get('/{userEntity}/activeer', [LockController::class, 'destroy'])->name('users.unlock');
Route::post('/{userEntity}/deactiveer', [LockController::class, 'store'])->name('users.lock.store');

// User Settings routes
Route::get('/account/{type?}', [AccountController::class, 'index'])->name('account.settings');
Route::patch('/account/informatie', [AccountController::class, 'updateInformation'])->name('account.settings.info');
Route::patch('/account/beveiliging', [AccountController::class, 'updateSecurity'])->name('account.settings.security');

// User routes
Route::match(['get', 'delete'], '/verwijder/gebruiker/{user}', [IndexController::class, 'destroy'])->name('users.destroy');
Route::get('/gebruikers/zoek', [IndexController::class, 'search'])->name('users.search');
Route::get('/gebruiker/{user}', [IndexController::class, 'show'])->name('users.show');
Route::patch('/gebruikers/{user}', [IndexController::class, 'update'])->name('users.update');
Route::get('/gebruikers/nieuw', [IndexController::class, 'create'])->name('users.create');
Route::post('/gebruikers/nieuw', [IndexController::class, 'store'])->name('users.store');
Route::get('/gebruikers/{filter?}', [IndexController::class, 'index'])->name('users.index');

// Tags routes 
Route::get('/tags', [TagsController::class, 'index'])->name('tags.dashboard');
Route::get('/tags/nieuw', [TagsController::class, 'create'])->name('tags.create');
Route::post('/tags/nieuw', [TagsController::class, 'store'])->name('tags.store');
Route::get('/tags/{tag}', [TagsController::class, 'show'])->name('tags.show');
Route::patch('/tags/{tag}', [TagsController::class, 'update'])->name('tags.update');
Route::match(['get', 'delete'], '/tags/verwijder/{tag}', [TagsController::class, 'destroy'])->name('tags.delete');