<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'register' => false
]);

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //crud route
    Route::resource('student', StudentController::class);
    Route::resource('organization', OrganizationController::class);
    Route::resource('member', MemberController::class);

    //Cetak custom controller
    Route::get('student/print', [StudentController::class, 'print'])->name('student.print');    
    Route::get('organization/print', [OrganizationController::class, 'print'])->name('organization.print');    
    Route::get('member/print', [MemberController::class, 'print'])->name('member.print');    

    //test
    // Route::get('surat-masuk/print', [SuratMasukController::class, 'print'])->name('surat-masuk.print');
    // Route::resource('surat-masuk', SuratMasukController::class);
    // Route::get('surat-keluar/print', [SuratKeluarController::class, 'print'])->name('surat-keluar.print');
    // Route::resource('surat-keluar', SuratKeluarController::class);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
