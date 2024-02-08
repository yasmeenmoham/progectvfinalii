<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuth\LoginController;
use App\Http\Controllers\AdminAuth\RegisterController;
use App\Http\Controllers\AdminAuth\CustomRegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController2;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
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

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login']);
    
    Route::get('register', [CustomRegisterController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('register', [CustomRegisterController::class, 'register']);
});
Auth::routes();
Route::group(['middleware' => ['auth', 'admin']], function () {
    // Admin-only routes here
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
// routes/web.php

Route::get('/admin/users/add', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users/store', [UserController::class,'store'])->name('admin.users.store');


Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.edituser');
Route::put('/admin/users/{user}', [UserController::class,'update'])->name('admin.users.update');
///
Route::get('/admin/categories', [CategoryController2::class, 'index'])->name('admin.categories');
Route::get('/admin/categories/create', [CategoryController2::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories/store', [CategoryController2::class, 'store'])->name('admin.categories.store');


Route::get('admin/categories/{category}/edit', [CategoryController2::class, 'edit'])->name('admin.categories.edit');
Route::put('admin/categories/{category}', [CategoryController2::class, 'update'])->name('admin.categories.update');
Route::delete('admin/categories/{category}', [CategoryController2::class, 'destroy'])->name('admin.categories.destroy');
////
use App\Http\Controllers\BeverageController;

Route::get('/beverages', [BeverageController::class, 'index'])->name('beverages.index');
Route::get('/beverages/create', [BeverageController::class, 'create'])->name('beverages.create');
Route::post('/beverages', [BeverageController::class, 'store'])->name('beverages.store');

Route::get('/beverages/{id}/edit', [BeverageController::class, 'edit'])->name('beverages.edit');
Route::put('/beverages/{id}', [BeverageController::class, 'update'])->name('beverages.update');
Route::delete('/beverages/{id}', [BeverageController::class, 'destroy'])->name('beverages.destroy');
Route::post('/contact', 'App\Http\Controllers\ContactController@store')->name('contact.store');
Route::get('/messages', [ContactController::class, 'index'])->name('messages.index');
Route::get('/all-messages', [ContactController::class, 'allMessages'])->name('all-messages');

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home3', [HomeController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return 'Hello, world!';
// });

Route::get('categories/{category}', [CategoryController2::class, 'show'])->name('category.products');
Route::get('/admin/categories/{category}/products', [CategoryController2::class, 'showProducts'])->name('admin.categories.products');


Route::get('/index', [Controller::class, 'index'])->name('index');
// Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');

Route::get('/admin/messages', [Controller::class, 'showContactMessages'])->name('admin.messages');
Route::post('/contact', [Controller::class, 'contact'])->name('contact');

