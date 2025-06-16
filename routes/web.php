<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Usuario;


//usuarios

Route::post('/singinUsers', function (Request $request) {
    
    //logger()->info('Datos antes de guardar:', $request->all());

    // Guarda el usuario
    $usuario = Usuario::create([
        'name' => $request->input('name'),
        'lastname' => $request->input('lastname'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')), // Cifrar contraseña
    ]);

    return response()->json(['user' => ['name' => $usuario->name]], 201);
});




Route::post('/loginUsers', function (Request $request) {
    $credenciales = $request->only('email', 'password');
    $usuario = Usuario::where('email', $credenciales['email'])->first();

    if (!$usuario) {
        return response()->json(['mensaje' => '❌ Email no encontrado'], 404);
    }

    if (!Hash::check($credenciales['password'], $usuario->password)) {
        return response()->json(['mensaje' => '❌ Contraseña incorrecta'], 401);
    }

    return response()->json(['user' => ['id' => $usuario->id, 'name' => $usuario->name]], 200); // Retorna 200 en caso de login exitoso
});









Route::get('/', function () {
    return Inertia::render('IndexPage');
});

Route::get('/login', function () {
    return Inertia::render('auth/Login');
});

Route::get('/singin', function () {
    return Inertia::render('auth/Singin');
});

Route::get('/MiTarea', function () {
    return Inertia::render('private/MiTarea');
});




