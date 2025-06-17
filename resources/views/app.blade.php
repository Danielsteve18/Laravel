<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="{{ asset('gato-negro-fondo-blanco.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StApp</title>

  @if (app()->environment('local'))
    @vite('resources/js/app.js')
  @else
    @php
      $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
    @endphp

    {{-- Estilos CSS (puede haber más de uno) --}}
    @foreach ($manifest['resources/js/app.js']['css'] ?? [] as $css)
      <link rel="stylesheet" href="{{ asset('build/' . $css) }}">
    @endforeach

    {{-- Script JS --}}
    <script type="module" src="{{ asset('build/' . $manifest['resources/js/app.js']['file']) }}"></script>
  @endif
</head>
<body>
  @inertia
</body>
</html>
