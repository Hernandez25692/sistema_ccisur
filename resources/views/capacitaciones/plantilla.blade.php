<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Plantilla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Cargar Plantilla para {{ $capacitacion->nombre }}</h1>
        <form action="{{ route('capacitaciones.guardarPlantilla', $capacitacion->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Campo para subir la plantilla -->
            <div class="mb-3">
                <label for="plantilla" class="form-label">Seleccionar Plantilla (PDF)</label>
                <input type="file" class="form-control" id="plantilla" name="plantilla" required>
            </div>
            <!-- Campo para subir la firma -->
            <div class="mb-3">
                <label for="firma" class="form-label">Subir Firma (Imagen)</label>
                <input type="file" class="form-control" id="firma" name="firma" required>
            </div>
            <!-- Campo para el nombre del instructor -->
            <div class="mb-3">
                <label for="instructor" class="form-label">Nombre del Instructor</label>
                <input type="text" class="form-control" id="instructor" name="instructor" required>
            </div>
            <!-- Campo para el cargo del instructor -->
            <div class="mb-3">
                <label for="cargo" class="form-label">Cargo del Instructor</label>
                <input type="text" class="form-control" id="cargo" name="cargo" required>
            </div>
            <!-- Botón para guardar -->
            <button type="submit" class="btn btn-primary">Cargar Plantilla</button>
        </form>
    </div>
</body>
</html>