<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\TasksController;
use App\Http\Controllers\Front\TaskController;
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
Route::get('/home' , function () {
    return view('welcome');
});
Auth::routes();
Route::group(['middleware'=>'auth:web','prefix'=>'task','as'=>'task.'],function () {
    Route::get('/', \App\Http\Livewire\Task::class)->name('index');
    Route::get('/create', \App\Http\Livewire\CreateTask::class)->name('create');
    Route::get('/{task_id}/edit', \App\Http\Livewire\EditTask::class)->name('edit');
    Route::get('/{task_id}', \App\Http\Livewire\ShowTask::class)->name('show');
});

Route::get('/admin/login', [AdminLoginController::class,'loginPage'])->name('admin.loginPage')->middleware('guest:admin');
Route::post('/admin/login', [AdminLoginController::class,'login'])->name('admin.login')->middleware('guest:admin');
Route::group(['prefix'=>'admin','middleware'=>['auth:admin'],'as'=>'admin.'],function (){
    Route::post('/logout', [AdminLoginController::class,'logout'])->name('logout');
    Route::resource('/tasks', TasksController::class);

});
//Route::resource('/task', TaskController::class)->middleware('auth');

