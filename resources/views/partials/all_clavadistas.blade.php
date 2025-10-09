@php
    // Datos de ejemplo para la tabla
    $participants = [
        ['country' => 'USA', 'athlete' => 'Michael Johnson',    'round' => 1], 
        ['country' => 'GER', 'athlete' => 'Thomas Müller',      'round' => 1], 
        ['country' => 'JPN', 'athlete' => 'Yuki Tanaka',        'round' => 3], 
        ['country' => 'AUS', 'athlete' => 'James Wilson',       'round' => 2], 
        ['country' => 'BRA', 'athlete' => 'Carlos Silva',       'round' => 1], 
        ['country' => 'FRA', 'athlete' => 'Pierre Dubois',      'round' => 3], 
        ['country' => 'CAN', 'athlete' => 'Ryan Cooper',        'round' => 2], 
        ['country' => 'GBR', 'athlete' => 'David Williams',     'round' => 1], 
    ];
@endphp

<div class="results-table-container">
    <h5>Atletas que participan</h5>
    <!-- Versión desktop -->
    <div class="d-none d-md-block">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>País</th>
                        <th>Nombre</th>
                        <th>Ronda</th>
                        <th>Calificar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($participants as $participant)
                    <tr>
                        <td><strong>{{ $participant['country'] }}</strong></td>
                        <td>{{ $participant['athlete'] }}</td>
                        <td>{{ $participant['round'] }}</td>
                        <td><a href="/qualify" class="btn btn-primary">Calificar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Versión móvil -->
    <div class="d-md-none">
        @foreach($participants as $participant)
        <div class="card mb-2">
            <div class="card-body py-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $participant['athlete'] }}</strong>
                        <div class="text-muted small">{{ $participant['country'] }} </div>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-primary">{{ $participant['round'] }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
.results-table-container {
    background-color: #fff;
    border-radius: 8px;
    padding: 15px;
    border: 1px solid #dee2e6;
}

.table th {
    font-weight: 600;
    font-size: 0.9rem;
}

.table td {
    vertical-align: middle;
}

.badge {
    font-size: 0.8rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .results-table-container {
        padding: 10px;
    }
    
    .card-body {
        padding: 0.75rem;
    }
}
</style>