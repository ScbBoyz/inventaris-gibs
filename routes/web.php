<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BuildingController;

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

    Route::get('/building', [BuildingController::class, 'index'])->name('building.index');
    Route::get('/building/create', [BuildingController::class, 'create'])->name('building.create');
    Route::post('building', [BuildingController::class, 'store'])->name('building.store');
    Route::get('/building/{id}/edit', [BuildingController::class, 'edit'])->name('building.edit');
    Route::patch('/building/{id}', [BuildingController::class, 'update'])->name('building.update');
    Route::delete('/building/{id}', [BuildingController::class, 'destroy'])->name('building.destroy');

    Route::get('/buildings/{building}/rooms', [RoomController::class, 'index'])->name('room.index');
    Route::get('/buildings/{building}/rooms/create', [RoomController::class, 'create'])->name('room.create');
    Route::post('/buildings/{building}/rooms', [RoomController::class, 'store'])->name('room.store');
    Route::get('/buildings/{building}/rooms/{room}/edit', [RoomController::class, 'edit'])->name('room.edit');
    Route::put('/buildings/{building}/rooms/{room}', [RoomController::class, 'update'])->name('room.update');
    Route::delete('/buildings/{building}/rooms/{room}', [RoomController::class, 'destroy'])->name('room.destroy');

});

require __DIR__.'/auth.php';
