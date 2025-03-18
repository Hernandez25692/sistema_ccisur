<!DOCTYPE html>
<html>
<head>
    <title>Diploma</title>
</head>
<body>
    <h1>{{ $nombreCapacitacion }}</h1>
    <p>Este certificado se otorga a:</p>
    <h2>{{ $participante->nombre }}</h2>
    <p>Fecha: {{ $fecha }}</p>
    <img src="{{ $firma }}" alt="Firma">
</body>
</html>