<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\SubCategoryController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\verifyOtpController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});                                                                                                                                            

Route::get('/category',[CategoryController::class,"GetCategory"]);
Route::get('/subcategory',[SubCategoryController::class,"GetSubcategory"]);
Route::get('/product',[ProductController::class,"getproduct"]);
Route::post('loginUser',[UserController::class, 'index']);
Route::post('verifyOTP',[verifyOtpController::class, 'verifyOTP']);

