<?php


use App\Http\Controllers\Backend\CustomFeatureController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\BlogController;
use Illuminate\Support\Facades\Route;

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

route::get('admin',[CustomFeatureController::class,'defaultIndex'])->name('admin.index');

// Settings routes
route::namespace('Backend')->group(function (){
    route::prefix('admin/settings')->group(function (){
        route::get('/',[CustomFeatureController::class,'settingsIndex'])->name('settings.index');
        route::post('',[SettingsController::class,'sortable'])->name('settings.sortable');
        route::get('/delete/{id}',[SettingsController::class,'destroy'])->name('settings.destroy');
        route::get('/edit/{id}',[SettingsController::class,'edit'])->name('settings.edit');
        route::post('/update/{id}',[SettingsController::class,'update'])->name('settings.update');
    });
});


// Blogs routes
route::prefix('admin')->group(function (){
    route::post('sortable',[BlogController::class,'sortable'])->name('blog.sortable');
    route::resource('blog',BlogController::class);
});



