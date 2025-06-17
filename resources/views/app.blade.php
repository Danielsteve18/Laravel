
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
  <link rel="stylesheet" href="{{ asset('build/assets/app-DyfMcpx4.cs') }}">
  <script type="module" src="{{ asset('build/assets/app-BJD1AlhV.js') }}"></script>
@endif


</head>
<body>
  @inertia
</body>
</html>
