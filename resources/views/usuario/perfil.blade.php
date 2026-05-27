<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="bg-white p-8 rounded shadow-md w-full max-w-md">

    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Mi Perfil</h1>

    <div class="mb-4">
        <p class="text-sm text-gray-500">Nombre</p>
        <p class="text-gray-800 font-medium">{{ $user->name }}</p>
    </div>
    <div class="mb-4">
        <p class="text-sm text-gray-500">Email</p>
        <p class="text-gray-800 font-medium">{{ $user->email }}</p>
    </div>
    <div class="mb-6">
        <p class="text-sm text-gray-500">Rol</p>
        <span class="inline-block bg-gray-100 text-gray-700 px-3 py-1 rounded text-sm font-medium">
            {{ $user->role }}
        </span>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded font-semibold transition">
            Cerrar Sesión
        </button>
    </form>
</div>
</body>
</html>