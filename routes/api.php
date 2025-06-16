<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TareaController;

Route::post('/tareas', [TareaController::class, 'store']);

Route::get('/tareas/fk/{fk}', [TareaController::class, 'getByFk']);




