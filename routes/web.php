<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::prefix('admin')->middleware('admin.guest')->group(function () {
    Route::get('/', [App\Http\Controllers\admin\AuthController::class, 'index']);
    Route::post('/login', [App\Http\Controllers\admin\AuthController::class, 'login'])->name('Login');
    
});

Route::middleware('admin.auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index']);
    Route::get('/logout', [App\Http\Controllers\admin\AuthController::class, 'logout'])->name('Logout');

    Route::get('/categoryList', [App\Http\Controllers\admin\CategoryController::class, 'categoryList'])->name('categoryList');
    Route::get('/categoryadd',[App\Http\Controllers\admin\CategoryController::class, 'categoryAdd'])->name('categoryadd');
    Route::post('/categoryaddSave1',[App\Http\Controllers\admin\CategoryController::class, 'categoryaddSave'])->name('categoryaddSave1');
    Route::get('/categoryEdit/{id}',[App\Http\Controllers\admin\CategoryController::class,'categoryEdit'])->name('categoryEdit');
    Route::put('/categoryUpdate/{id}',[App\Http\Controllers\admin\CategoryController::class,'categoryUpdate'])->name('categoryUpdate');
    Route::get('/categorydelete/{id}',[App\Http\Controllers\admin\CategoryController::class, 'categorydelete'])->name('categorydelete');


    Route::get('/subcategoryList', [App\Http\Controllers\admin\SubCategoryController::class, 'subcategoryList'])->name('subcategoryList');
    Route::get('/subcategoryadd',[App\Http\Controllers\admin\SubCategoryController::class, 'subcategoryadd'])->name('subcategoryadd');
    Route::post('/subcategoryaddSave',[App\Http\Controllers\admin\SubCategoryController::class, 'subcategoryaddSave'])->name('subcategoryaddSave');
    Route::get('/subcategoryEdit/{id}',[App\Http\Controllers\admin\SubCategoryController::class,'subcategoryEdit'])->name('subcategoryEdit');
    Route::put('/subcategoryUpdate/{id}',[App\Http\Controllers\admin\SubCategoryController::class,'subcategoryUpdate'])->name('subcategoryUpdate');
    Route::get('/subcategorydelete/{id}',[App\Http\Controllers\admin\SubCategoryController::class, 'subcategorydelete'])->name('subcategorydelete');

    Route::get('/productadd',[App\Http\Controllers\admin\ProductController::class, 'productadd'])->name('productadd');
    Route::get('/SubCategories-get/{id}',[App\Http\Controllers\admin\ProductController::class, 'getSubCategories'])->name('getSubCategories');
    Route::post('/productaddSave', [App\Http\Controllers\admin\ProductController::class, 'productaddSave'])->name('productaddSave');
    Route::get('/productList', [App\Http\Controllers\admin\ProductController::class, 'productList'])->name('productList');
    Route::get('/productimage/{id}', [App\Http\Controllers\admin\ProductController::class, 'productfeatureimage'])->name('productimage');
    Route::post('/productfeatureaddimage', [App\Http\Controllers\admin\ProductController::class, 'productfeatureaddimage'])->name('productfeatureaddimage');

    Route::get('/productEdit/{id}',[App\Http\Controllers\admin\ProductController::class,'productEdit'])->name('productEdit');
    Route::put('/productUpdate/{id}',[App\Http\Controllers\admin\ProductController::class,'productUpdate'])->name('productUpdate');
    Route::get('/productdelete/{id}',[App\Http\Controllers\admin\ProductController::class, 'productdelete'])->name('productdelete');
    
    Route::get('/slideradd',[App\Http\Controllers\admin\SliderController::class, 'slideradd'])->name('slideradd');
    Route::post('/slideraddsave',[App\Http\Controllers\admin\SliderController::class, 'slideraddsave'])->name('slideraddsave');
    Route::get('/sliderlist', [App\Http\Controllers\admin\SliderController::class, 'sliderlist'])->name('sliderlist');


});


Route::get('/',[App\Http\Controllers\frontend\HomeController::Class,'home']);



    
  