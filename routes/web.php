<?php

use App\Http\Controllers\Articles\ArticleCategoryController;
use App\Http\Controllers\Articles\ArticleController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Media\MediaController;
use App\Http\Controllers\Notifications\NotificationController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\Subscriptions\SubscriptionController;
use App\Http\Controllers\Subscriptions\SubscriptionItemController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Users\UserController;
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


Route::get('/', [IndexController::class, "index"])->name('dashboard');
// users
Route::resource('users', UserController::class);
//prescription
Route::get('/prescriptions/create', [PrescriptionController::class, 'create'])->name('prescription.create');
Route::get('/prescriptions', [PrescriptionController::class, 'index'])->name('prescription.index');
Route::get('/prescriptions/{id}/view', [PrescriptionController::class, "view"])->name('prescription.view');
//quotations
Route::get('/quotations/{id}/create', [QuotationController::class, 'create'])->name('quotation.create');
Route::get('/quotations', [QuotationController::class, 'index'])->name('quotation.index');
// article categories
Route::resource('article-categories', ArticleCategoryController::class);

// articles
Route::resource('articles', ArticleController::class);


//upload image
Route::post('image-upload', [CkeditorController::class, 'upload'])->name('upload-image');

// media
Route::resource('/medias', MediaController::class);

// notifications
Route::resource('/notifications', NotificationController::class);
