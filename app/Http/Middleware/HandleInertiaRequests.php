<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * La plantilla raíz que se carga en la primera visita.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Devuelve la versión actual de los assets.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define los datos que se comparten por defecto con todas las vistas de Inertia.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            // Puedes compartir datos globales aquí si quieres
            // 'auth.user' => fn () => $request->user(),
        ]);
    }
}
