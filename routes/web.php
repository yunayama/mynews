<?php


use App\Http\Controllers\Admin\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SelfProfileController;

Route::controller(SelfProfileController::class)->prefix('admin')->name('profile.')->group(function(){
    Route::get('profile/create', 'add')->name('add');
    Route::get('profile/edit', 'edit')->name('edit');
});
Route::controller(NewsController::class)->prefix('admin')->name('news.')->group(function(){
    Route::get('news/create', 'add')->name('add');
});