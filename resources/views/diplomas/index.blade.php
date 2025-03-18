<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diplomas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .diploma {
            page-break-after: always;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100vh; /* Ocupa toda la altura de la página */
            position: relative;
            background-image: url("{{ asset('storage/Plantilla1.png') }}");
            background-size: 100% 100%; /* Ajusta la imagen al tamaño del contenedor */
            background-position: center;
            background-repeat: no-repeat;
        }
        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 80%;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semitransparente */
            padding: 20px;
            border-radius: 10px;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .subheader {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .participante {
            font-size: 22px;
            font-weight: bold;
            margin: 20px 0;
        }
        .evento {
            font-size: 20px;
            font-style: italic;
            margin: 10px 0;
        }
        .fecha {
            font-size: 16px;
            margin: 10px 0;
        }
        .firma {
            margin-top: 20px;
        }
        .firma img {
            width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    @foreach ($capacitacion->participantes as $participante)
        <div class="diploma">
            <div class="content">
                <!-- Encabezado -->
                <div class="header">
                    Cámara de Comercio e Industrias del Sur
                </div>

                <!-- Título del diploma -->
                <div class="subheader">
                    OTORGA EL PRESENTE<br>
                    CERTIFICADO DE PARTICIPACIÓN A:
                </div>

                <!-- Nombre del participante -->
                <div class="participante">
                    {{ $participante->nombre }}
                </div>

                <!-- Detalles del evento -->
                <div class="evento">
                    Por su participación en el webinar:<br>
                    “{{ $capacitacion->nombre }}”
                </div>

                <!-- Fecha y lugar -->
                <div class="fecha">
                    {{ $capacitacion->lugar }}, {{ $capacitacion->fecha }}<br>
                    Impartido por: {{ $capacitacion->instructor }} ({{ $capacitacion->cargo }})
                </div>

                <!-- Firma -->
                <div class="firma">
                    <img src="{{ asset('storage/' . $capacitacion->firma) }}" alt="Firma">
                    <div>
                        {{ $capacitacion->instructor }}<br>
                        {{ $capacitacion->cargo }}<br>
                        CCISur
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</body>
</html>