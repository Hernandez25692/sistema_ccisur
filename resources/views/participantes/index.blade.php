<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes de {{ $capacitacion->nombre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Participantes de {{ $capacitacion->nombre }}</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($capacitacion->participantes as $participante)
                    <tr>
                        <td>{{ $participante->nombre }}</td>
                        <td>{{ $participante->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('capacitaciones.index') }}" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>