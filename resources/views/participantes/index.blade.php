<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes de {{ $capacitacion->nombre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f0f2f5, #cfd9df);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table {
            border-radius: 10px;
            overflow: hidden;
        }
        thead {
            background: #007bff;
            color: white;
        }
        tbody tr:hover {
            background: #f1f1f1;
        }
        .btn-primary {
            background: #007bff;
            border: none;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center text-primary">Participantes de {{ $capacitacion->nombre }}</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover text-center">
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
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('capacitaciones.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</body>
</html>