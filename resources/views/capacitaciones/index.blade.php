<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Capacitaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            min-height: 100vh;
        }
        .navbar {
            background: #343a40 !important;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-toggler-icon {
            background-color: white;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .btn {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Menú de navegación -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Gestión de Capacitaciones</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('capacitaciones.create') }}">Registrar Capacitación</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Listado de capacitaciones -->
        <h1 class="my-4 text-center">Listado de Capacitaciones</h1>
        @if ($capacitaciones->isEmpty())
            <div class="alert alert-info text-center">No hay capacitaciones registradas.</div>
        @else
            <div class="row">
                @foreach ($capacitaciones as $capacitacion)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $capacitacion->nombre }}</h5>
                                <p class="card-text">
                                    <strong>Fecha:</strong> {{ $capacitacion->fecha }}<br>
                                    <strong>Lugar:</strong> {{ $capacitacion->lugar }}<br>
                                    <strong>Instructor:</strong> {{ $capacitacion->instructor }}
                                </p>
                                <div class="d-grid gap-2">
                                    <!-- Botón para editar -->
                                    <a href="{{ route('capacitaciones.edit', $capacitacion->id) }}" class="btn btn-warning">Editar</a>

                                    <!-- Botón para eliminar -->
                                    <form action="{{ route('capacitaciones.destroy', $capacitacion->id) }}" method="POST" class="d-grid">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta capacitación?')">Eliminar</button>
                                    </form>

                                    <!-- Otros botones -->
                                    <a href="{{ route('participantes.create', $capacitacion->id) }}" class="btn btn-primary">Agregar Participantes</a>
                                    <a href="{{ route('participantes.index', $capacitacion->id) }}" class="btn btn-info">Listar Participantes</a>
                                    <a href="{{ route('capacitaciones.plantilla', $capacitacion->id) }}" class="btn btn-secondary">Agregar Plantilla</a>
                                    <a href="{{ route('generar.diploma', $capacitacion->id) }}" class="btn btn-success">Generar Diplomas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>