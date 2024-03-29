<?php

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

//master
use App\Http\Controllers\Master\BarangController;
use App\Http\Controllers\Master\SuplierController;
use App\Http\Controllers\Master\PelangganController;

//transaksi
use App\Http\Controllers\Transaksi\PenerimaanController;


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/restore', 'UserController@restore')->name('users.restore');
    Route::get('users/{id}/restore', 'UserController@restoreUser')->name('users.restore-user');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::any('users/{id}/destroy', 'UserController@destroy')->name('users.destroy');
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');
});


Route::get('/', 'HomeController@index');

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});

/**
 * Master
 */
Route::group(['prefix' => 'master', 'as' => 'master.', 'namespace' => 'Master'], function () {
    //Barang
    Route::get('barang', [BarangController::class, 'index'])->name('barang');
    Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('barang/store', [BarangController::class, 'store'])->name('barang.store');
    Route::get('barang/{barang}', [BarangController::class, 'show'])->name('barang.show');
    Route::get('barang/edit/{barang}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
    Route::any('barang/destroy/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
        //autocomplete
        Route::get('barangforcombo', [BarangController::class,'search']);

    //Suplier
    Route::get('suplier', [SuplierController::class, 'index'])->name('suplier');
    Route::get('suplier/create', [SuplierController::class, 'create'])->name('suplier.create');
    Route::post('suplier/store', [SuplierController::class, 'store'])->name('suplier.store');
    Route::get('suplier/{suplier}', [SuplierController::class, 'show'])->name('suplier.show');
    Route::get('suplier/edit/{suplier}', [SuplierController::class, 'edit'])->name('suplier.edit');
    Route::put('suplier/{suplier}', [SuplierController::class, 'update'])->name('suplier.update');
    Route::any('suplier/destroy/{id}', [SuplierController::class, 'destroy'])->name('suplier.destroy');
        //autocomplete
        Route::get('suplierforcombo', [SuplierController::class,'search']);

    //Pelanggan
    Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
    Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('pelanggan/{pelanggan}', [PelangganController::class, 'show'])->name('pelanggan.show');
    Route::get('pelanggan/edit/{pelanggan}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('pelanggan/{pelanggan}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::any('pelanggan/destroy/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
        //autocomplete
        Route::get('pelangganforcombo', [PelangganController::class,'search']);
});

Route::group(['prefix' => 'transaksi', 'as' => 'transaksi.', 'namespace' => 'Transaksi'], function () {
    //Penerimaan
    Route::get('penerimaan', [PenerimaanController::class, 'index'])->name('penerimaan');
    Route::get('penerimaan/create', [PenerimaanController::class, 'create'])->name('penerimaan.create');
    Route::post('penerimaan/store', [PenerimaanController::class, 'store'])->name('penerimaan.store');
    Route::get('penerimaan/{penerimaan}', [PenerimaanController::class, 'show'])->name('penerimaan.show');
    Route::get('penerimaan/edit/{penerimaan}', [PenerimaanController::class, 'edit'])->name('penerimaan.edit');
    Route::put('penerimaan/{penerimaan}', [PenerimaanController::class, 'update'])->name('penerimaan.update');
    Route::any('penerimaan/destroy/{id}', [PenerimaanController::class, 'destroy'])->name('penerimaan.destroy');
});

// Route::get('/greeting', function () {
//     return 'Hello World';
// });