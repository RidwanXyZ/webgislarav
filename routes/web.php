<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\gis\GISController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

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
    return redirect("map");
});

Auth::routes();

Route::get("/map", [GISController::class, "index"])->name("map.data");

Route::group(["prefix" => "admin"], function () {
    Route::get("users",[AdminController::class,'index']);
    Route::post("users",[AdminController::class,'store']);
    Route::delete("users/{id}",[AdminController::class,'destroy'])->name("admin.users.destroy");
    Route::put("users/{id}",[AdminController::class,'update'])->name("admin.users.update");
});

Route::group(["prefix" => "data"],function (){
   Route::get("/upload",[AdminController::class,'upload']);
});

Route::get("/admin/users",[AdminController::class,'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/upload/json",function (){
    return view("upload.upload_json");
});
Route::post("/upload/json",[UploadController::class,'store'])->name('upload.json');
Route::get("/about",function (){
    return view("about");
})->name("about");
Route::get('maps', function () {
    return view('maps');
})->name('maps');
