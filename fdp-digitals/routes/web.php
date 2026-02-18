<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController; 
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home'); 
})->name('home');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/digital-advertising', function () {
    return view('digital-advertising');
})->name('digital-advertising');

/*
|--------------------------------------------------------------------------
| Case Study Routes
|--------------------------------------------------------------------------
*/

Route::prefix('case-study')->name('case-study.')->group(function () {
    Route::get('/yunik-haven', function () {
        return view('case-studies.yunik-haven');
    })->name('yunik-haven');

    Route::get('/makarius-empire', function() {
        return view('case-studies.makarius-empire');
    })->name('makarius-empire');

    Route::get('/treatbox-foods', function() {
        return view('case-studies.treatbox-foods');
    })->name('treatbox-foods');
});

/*
|--------------------------------------------------------------------------
| Forms & Admin Area
|--------------------------------------------------------------------------
*/

// Public form submission
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

// Protected Admin Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    // Senior Dev Addition: Root admin redirect to avoid 404
    Route::get('/', function () {
        return redirect()->route('admin.leads');
    });

    // Leads Management
    Route::get('/leads', [LeadController::class, 'index'])->name('admin.leads');
    
    // CSV Export Route
    Route::get('/leads/export', [LeadController::class, 'downloadCsv'])->name('admin.leads.export');
    
    // UPDATE LEAD STATUS
    Route::patch('/leads/{id}/status', [LeadController::class, 'updateStatus'])->name('admin.leads.status');
    
    // DELETE LEAD
    Route::delete('/leads/{id}', [LeadController::class, 'destroy'])->name('admin.leads.delete');
    
    // Admin User Creation
    Route::post('/create-admin', [LeadController::class, 'storeAdmin'])->name('admin.create');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';