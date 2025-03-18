<div>
    <h1>Dashboard</h1>
    @foreach ($capacitaciones as $capacitacion)
        <h2>{{ $capacitacion->nombre }}</h2>
        <p>Fecha: {{ $capacitacion->fecha }}</p>
        <p>Lugar: {{ $capacitacion->lugar }}</p>
        <p>Instructor: {{ $capacitacion->instructor }}</p>
        <h3>Participantes:</h3>
        <ul>
            @foreach ($capacitacion->participantes as $participante)
                <li>{{ $participante->nombre }} ({{ $participante->email }})</li>
            @endforeach
        </ul>
    @endforeach
</div>