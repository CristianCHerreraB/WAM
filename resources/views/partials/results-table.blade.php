
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