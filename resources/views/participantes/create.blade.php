<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Participante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            min-height: 100vh;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-volver {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Agregar Participante</h1>

        <!-- Formulario para agregar participantes -->
        <form id="form-agregar-participante">
            @csrf
            <input type="hidden" name="capacitacion_id" value="{{ $capacitacion->id }}">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Participante</button>
        </form>

        <!-- Botón de Volver -->
        <a href="{{ route('capacitaciones.index') }}" class="btn btn-secondary btn-volver">Volver a Capacitaciones</a>

        <!-- Mensaje de éxito -->
        <div id="mensaje-exito" class="alert alert-success mt-3" style="display: none;"></div>
    </div>

    <script>
        $(document).ready(function () {
            // Enviar el formulario con AJAX
            $('#form-agregar-participante').on('submit', function (e) {
                e.preventDefault(); // Evitar el envío tradicional del formulario

                $.ajax({
                    url: "{{ route('participantes.store') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        // Mostrar mensaje de éxito
                        $('#mensaje-exito').text('Participante agregado exitosamente.').show();

                        // Limpiar el formulario
                        $('#form-agregar-participante')[0].reset();

                        // Ocultar el mensaje después de 3 segundos
                        setTimeout(function () {
                            $('#mensaje-exito').hide();
                        }, 3000);
                    },
                    error: function (xhr) {
                        // Mostrar mensaje de error
                        alert('Error al agregar el participante. Inténtalo de nuevo.');
                    }
                });
            });
        });
    </script>
</body>
</html>