@php
    // Datos de ejemplo para la tabla
    $participants = [
        ['rank' => 1, 'country' => 'USA', 'athlete' => 'Michael Johnson', 'age' => 28, 'points' => 95.7, 'pts_behind' => 0],
        ['rank' => 2, 'country' => 'GER', 'athlete' => 'Thomas Müller', 'age' => 26, 'points' => 94.2, 'pts_behind' => 1.5],
        ['rank' => 3, 'country' => 'JPN', 'athlete' => 'Yuki Tanaka', 'age' => 24, 'points' => 92.8, 'pts_behind' => 2.9],
        ['rank' => 4, 'country' => 'AUS', 'athlete' => 'James Wilson', 'age' => 27, 'points' => 91.5, 'pts_behind' => 4.2],
        ['rank' => 5, 'country' => 'BRA', 'athlete' => 'Carlos Silva', 'age' => 29, 'points' => 90.1, 'pts_behind' => 5.6],
        ['rank' => 6, 'country' => 'FRA', 'athlete' => 'Pierre Dubois', 'age' => 25, 'points' => 89.3, 'pts_behind' => 6.4],
        ['rank' => 7, 'country' => 'CAN', 'athlete' => 'Ryan Cooper', 'age' => 23, 'points' => 88.7, 'pts_behind' => 7.0],
        ['rank' => 8, 'country' => 'GBR', 'athlete' => 'David Williams', 'age' => 30, 'points' => 87.9, 'pts_behind' => 7.8],
    ];
@endphp

<div class="results-table-container">
    <h6 class="mb-3">{{ $event }} - Resultados</h6>
    
    <!-- Versión desktop -->
    <div class="d-none d-md-block">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Rank</th>
                        <th>Country</th>
                        <th>Athlete</th>
                        <th>Age</th>
                        <th>Points</th>
                        <th>Pts Behind</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($participants as $participant)
                    <tr>
                        <td><strong>{{ $participant['rank'] }}</strong></td>
                        <td>{{ $participant['country'] }}</td>
                        <td>{{ $participant['athlete'] }}</td>
                        <td>{{ $participant['age'] }}</td>
                        <td><span class="badge bg-primary">{{ $participant['points'] }}</span></td>
                        <td>{{ $participant['pts_behind'] }}</td>
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
                        <strong>#{{ $participant['rank'] }} {{ $participant['athlete'] }}</strong>
                        <div class="text-muted small">{{ $participant['country'] }} • {{ $participant['age'] }} años</div>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-primary">{{ $participant['points'] }} pts</span>
                        <div class="text-muted small">+{{ $participant['pts_behind'] }}</div>
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