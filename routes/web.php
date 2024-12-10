<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StrategicAreaController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\WorkplanController;
use App\Http\Controllers\ScorecardController;
use App\Http\Controllers\ReportController;

// Homepage Route
Route::get('/', function () {
    return view('welcome');  // This will load the welcome.blade.php view when visiting the homepage
})->name('welcome');  // Name the route as 'welcome' for easy access in views

// Resource Routes
Route::resource('objectives', ObjectiveController::class);
Route::resource('strategic-areas', StrategicAreaController::class);
Route::resource('reports', ReportController::class);
Route::resource('workplans', WorkplanController::class);
Route::resource('scorecards', ScorecardController::class);  // Changed to plural

// Download Route for Reports
Route::get('reports/{report}/download', [ReportController::class, 'download'])->name('reports.download');
