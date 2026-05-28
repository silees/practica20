<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{user}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{user}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

Route::middleware(['auth', 'role:usuario'])->group(function () {
    Route::get('/perfil', [UserController::class, 'index'])->name('perfil');
});

use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/crear-mi-usuario-secreto', function () {
    // 1. Limpiamos la tabla para que no dé error de duplicado
    User::truncate();

    // 2. Creamos el usuario usando el encriptador nativo de Laravel
    $user = User::create([
        'name' => 'Marvin',
        'email' => 'marvin@gmail.com',
        'password' => Hash::make('password'), // La contraseña será: password
        'role' => 'admin',
    ]);

    return "¡Usuario creado con éxito usando encriptación nativa de Laravel!";
});