<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemInfoController;
use App\Http\Controllers\UnconfirmedItemController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('item_info')->group(function () {
        // 商品一覧
        Route::get('index', [ItemInfoController::class, 'index'])->name('itemInfoIndex');
        // 商品登録
        Route::get('store', [ItemInfoController::class, 'createForm'])->name('itemInfoCreate');
        // 商品登録処理
        Route::post('store', [ItemInfoController::class, 'store'])->name('itemInfoStore');
    });
    Route::prefix('unconfirmed_item')->group(function () {
        // 確認したい商品一覧
        Route::get('index', [UnconfirmedItemController::class, 'index'])->name('unconfirmedItemIndex');
        // 確認したい商品登録
        Route::get('store', [UnconfirmedItemController::class, 'createForm'])->name('unconfirmedItemCreate');
        // 確認したい商品登録処理
        Route::post('store', [UnconfirmedItemController::class, 'store'])->name('unconfirmedItemStore');
    });
});

require __DIR__.'/auth.php';
