<?php

use App\Models\Section;
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

Route::get('/optimize',function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('event:clear');
    $exitCode = Artisan::call('optimize:clear');
    return "$exitCode";
}
)->name('localization');

Route::group(['middleware' => ['auth'], 'prefix' => 'cp/Admin'], function () {

    Route::resource('section', App\Http\Controllers\Admin\SectionController::class);
    Route::resource('lesson', App\Http\Controllers\Admin\LessonController::class);
    Route::resource('book', App\Http\Controllers\Admin\BookController::class);
    Route::resource('coupon', App\Http\Controllers\Admin\CouponController::class);
    Route::get('coupon/{coupon}/status/update', 'App\Http\Controllers\Admin\CouponController@update')->name('coupon.change');

    Route::get('profile', 'App\Http\Controllers\HomeController@profile')->name('profile');
    Route::post('profile', 'App\Http\Controllers\HomeController@updateProfile')->name('updateProfile');

    Route::post('ckeditor/upload', 'App\Http\Controllers\Admin\CkeditorController@upload')->name('ckeditor.upload');

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Auth::routes();

Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('index');
Route::get('/{section}', [App\Http\Controllers\SiteController::class, 'showSection'])->name('showSection');
Route::get('/lesson/{lesson}', [App\Http\Controllers\SiteController::class, 'showLesson'])->name('showLesson');



Route::post('/add/code', [App\Http\Controllers\SiteController::class, 'setCoupon'])->name('setCoupon');

Route::get('/locked/{section?}', function (Section $section) {
    return view('site.locked' , ['section' => $section]);
});
Route::get('/unLocked/{section?}', function (Section $section) {
    return view('site.unlocked' , ['section' => $section] );
});



