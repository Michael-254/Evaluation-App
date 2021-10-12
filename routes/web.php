<?php

use App\Http\Livewire\SecFive;
use App\Http\Livewire\SectionThree;
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

//User
Route::get('New-Performance-Evaluation', [\App\Http\Controllers\ExtraInformationController::class, 'index'])->name('new.evaluation');

Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/Extra-Information', [\App\Http\Controllers\ExtraInformationController::class, 'moreInfo'])->name('more.information');
    Route::post('/store-Performance-Evaluation', [\App\Http\Controllers\ExtraInformationController::class, 'store'])->name('store.evaluation');
    Route::get('/Section-one', [\App\Http\Controllers\SectionOneController::class, 'create'])->name('section.one');
    Route::post('/Section-one', [\App\Http\Controllers\SectionOneController::class, 'store'])->name('sectionOne.store');
    Route::get('/Section-two', [\App\Http\Controllers\SectionTwoController::class, 'create'])->name('section.two');
    Route::post('/Section-two', [\App\Http\Controllers\SectionTwoController::class, 'store'])->name('sectionTwo.store');
    Route::post('/Signature', [\App\Http\Controllers\SignatureController::class, 'store'])->name('signature.store');
    Route::get('/Section-three', SectionThree::class)->name('section.three');
    Route::get('/Section-four', [\App\Http\Controllers\SectionFourController::class, 'create'])->name('section.four');
    Route::post('/Section-four', [\App\Http\Controllers\SectionFourController::class, 'store'])->name('sectionFour.store');
    Route::get('/Section-five', SecFive::class)->name('section.five');
    Route::get('/Section-six', [\App\Http\Controllers\SectionSixController::class, 'create'])->name('section.six');
    Route::post('/Section-six', [\App\Http\Controllers\SectionSixController::class, 'store'])->name('sectionSix.store');
    Route::get('/preview', [\App\Http\Controllers\SectionSixController::class, 'final'])->name('final');
});

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
