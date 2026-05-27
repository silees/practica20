<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('usuario.perfil', compact('user'));
    }
}