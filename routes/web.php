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
    Route::get('student/print/pdf', [StudentController::class, 'print'])->name('student.print');
    Route::get('organization/print/pdf', [OrganizationController::class, 'print'])->name('organization.print');
    Route::get('member/print/pdf', [MemberController::class, 'print'])->name('member.print');

    //export excel
    Route::get('student/export/excel', [StudentController::class, 'export'])->name('student.export');
    Route::get('organization/export/excel', [OrganizationController::class, 'export'])->name('organization.export');
    Route::get('member/export/excel', [MemberController::class, 'export'])->name('member.export');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
