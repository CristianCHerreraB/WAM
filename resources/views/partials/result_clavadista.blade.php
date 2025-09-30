@php
$participants = [
['country' => 'USA', 'athlete' => 'Michael Johnson', 'round' => 1],
['country' => 'GER', 'athlete' => 'Thomas Müller', 'round' => 1],
['country' => 'JPN', 'athlete' => 'Yuki Tanaka', 'round' => 3],
['country' => 'AUS', 'athlete' => 'James Wilson', 'round' => 2],
['country' => 'BRA', 'athlete' => 'Carlos Silva', 'round' => 1],
['country' => 'FRA', 'athlete' => 'Pierre Dubois', 'round' => 3],
['country' => 'CAN', 'athlete' => 'Ryan Cooper', 'round' => 2],
['country' => 'GBR', 'athlete' => 'David Williams', 'round' => 1],
];
@endphp

<div class="results-table-container">
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
                    @foreach($participants as $index => $participant)
                    <tr>
                        <td><strong>{{ $participant['country'] }}</strong></td>
                        <td>{{ $participant['athlete'] }}</td>
                        <td>{{ $participant['round'] }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse-{{ $index }}"
                                aria-expanded="false"
                                aria-controls="collapse-{{ $index }}">
                                +
                            </button>
                        </td>
                    </tr>
                    <tr class="collapse" id="collapse-{{ $index }}">
                        <td colspan="4">
                            <div class="card card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Dive</th>
                                            <th scope="col">Dive No.</th>
                                            <th scope="col">DD</th>
                                            <th scope="col">J1</th>
                                            <th scope="col">J2</th>
                                            <th scope="col">J3</th>
                                            <th scope="col">J4</th>
                                            <th scope="col">J5</th>
                                            <th scope="col">J6</th>
                                            <th scope="col">J7</th>
                                            <th scope="col">Dive Points</th>
                                            <th scope="col">Total Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>203B</td>
                                            <td>23</td>
                                            <td>6.0</td>
                                            <td>6.5</td>
                                            <td>6.5</td>
                                            <td>70</td>
                                            <td>75</td>
                                            <td>6.0</td>
                                            <td>6.5</td>
                                            <td>44.85</td>
                                            <td>44.85</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Versión móvil -->
    <div class="d-md-none">
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
                    @foreach($participants as $index => $participant)
                    <tr>
                        <td><strong>{{ $participant['country'] }}</strong></td>
                        <td>{{ $participant['athlete'] }}</td>
                        <td>{{ $participant['round'] }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse-{{ $index }}"
                                aria-expanded="false"
                                aria-controls="collapse-{{ $index }}">
                                +
                            </button>
                        </td>
                    </tr>
                    <tr class="collapse" id="collapse-{{ $index }}">
                        <td colspan="4">
                            <div class="card card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Dive</th>
                                            <th scope="col">Dive No.</th>
                                            <th scope="col">DD</th>
                                            <th scope="col">J1</th>
                                            <th scope="col">J2</th>
                                            <th scope="col">J3</th>
                                            <th scope="col">J4</th>
                                            <th scope="col">J5</th>
                                            <th scope="col">J6</th>
                                            <th scope="col">J7</th>
                                            <th scope="col">Dive Points</th>
                                            <th scope="col">Total Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>203B</td>
                                            <td>23</td>
                                            <td>6.0</td>
                                            <td>6.5</td>
                                            <td>6.5</td>
                                            <td>70</td>
                                            <td>75</td>
                                            <td>6.0</td>
                                            <td>6.5</td>
                                            <td>44.85</td>
                                            <td>44.85</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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