<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tarea;
use Carbon\Carbon;

class TareaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fk' => 'required|string',
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        $tarea = Tarea::create($request->all());

        return response()->json(['message' => 'Tarea creada exitosamente'], 201);
    }

   public function getByFk($fk)
    {
        $tareas = Tarea::where('fk', $fk)->get()->map(function ($tarea) {
            $tarea->created_at = Carbon::parse($tarea->created_at)->format('Y-m-d H:i:s');
            return $tarea;
        });

        return response()->json(['tareas' => $tareas], 200);
    }
}

