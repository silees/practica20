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
    // 1. Limpiamos la tabla para empezar desde cero de forma ordenada
    User::truncate();

    // 2. Creamos primero a tu Administrador (Tú)
    User::create([
        'name' => 'Marvin',
        'email' => 'marvin@gmail.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
    ]);

    // 3. Creamos al usuario específico de Omar con sus credenciales requeridas
    User::create([
        'name' => 'Omar QM',
        'email' => 'omarqm@gmail.com', // Usamos este correo estándar para su login
        'password' => Hash::make('Omar411*'), // Su contraseña personalizada
        'role' => 'usuario',
    ]);

    // 4. Arreglo con los otros 6 usuarios restantes con rol 'usuario'
    $usuariosNuevos = [
        ['name' => 'Juan Perez', 'email' => 'juan@gmail.com'],
        ['name' => 'Maria Gomez', 'email' => 'maria@gmail.com'],
        ['name' => 'Carlos Lopez', 'email' => 'carlos@gmail.com'],
        ['name' => 'Ana Rodriguez', 'email' => 'ana@gmail.com'],
        ['name' => 'Luis Fernandez', 'email' => 'luis@gmail.com'],
        ['name' => 'Elena Martinez', 'email' => 'elena@gmail.com'],
    ];

    // 5. Los insertamos en bucle usando la encriptación nativa
    foreach ($usuariosNuevos as $u) {
        User::create([
            'name' => $u['name'],
            'email' => $u['email'],
            'password' => Hash::make('password'), // Ellos mantienen la clave: password
            'role' => 'usuario',
        ]);
    }

    return "¡Se ha reiniciado la tabla: Creado 1 Administrador, el usuario Omar y los demás accesos con éxito!";
});