<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FolderController;

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

//Resources
Route::resource('/reports', ReportController::class);
Route::resource('/folders', FolderController::class);

Route::get('/import/{id}', [ReportController::class, 'import'])->name('reports.import');
Route::get('/download/{id}', [ReportController::class, 'download'])->name('reports.download');
Route::get('/compressedDownload', [ReportController::class, 'compressedDownload'])->name('reports.compressedDownload');

Route::get('/filtered', [FolderController::class, 'filter'])->name('folders.filter');

// Static pages
Route::get('/', function () {
    return view('index');
})->name('index');
Route::view('/contact', 'contact')->name('contact');


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

require __DIR__.'/auth.php';
