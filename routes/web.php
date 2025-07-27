<?php

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/', [PropertyController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  
    Route::get('/dashboard', function (Request $request) {
    $user = $request->user();

    if ($user->role === 'admin') {
        
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'owner') {
        return redirect()->route('owner.properties.index');
    } else {
        return view('dashboard'); // Customer dashboard
    }
})->middleware(['verified'])->name('dashboard');
});


// House Owner Routes
Route::middleware(['auth', 'role:owner'])->prefix('owner')->name('owner.')->group(function () {
    
    Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
     Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');
    
    
    Route::get('/properties', [PropertyController::class, 'myProperties'])->name('properties.index'); 
    Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
    
    
    Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
    
    
    Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
});


// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    
    Route::get('/users', [DashboardController::class, 'users'])->name('users.index');
    
    
    Route::get('/properties', [DashboardController::class, 'properties'])->name('properties.index');
});


