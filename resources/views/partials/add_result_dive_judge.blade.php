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

    button.accordion-button.collapsed {
        padding: 10px;
        background-color: transparent !important;
    }


    .accordion-button::after {
        content: "+";
        font-size: 1.3rem;
        font-weight: bold;
        color: #0d6efd;
        margin-left: auto;
        background-image: none !important;
        transform: none !important;
        transition: color 0.2s ease;
    }

    .accordion-button:not(.collapsed)::after {
        content: "–";
        color: #0a58ca;
        border-color: transparent !important;
        transform: none !important;
    }

    button.accordion-button {
        padding: 10px;
        background-color: transparent;
    }

    .accordion-body {
        padding: 0px;
    }
</style>
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
    <!--<div class="d-none d-md-block">-->
    <div class="d-none d-md-block">
        <div class="table-responsive">
            @foreach($participants as $index => $participant)
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <div class="list-group">
                        <h2 class="accordion-header list-group-item list-group-item-action">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-{{ $index }}" aria-expanded="false" aria-controls="flush-collapseOne">
                                <strong>{{ $participant['country'] }}</strong> - {{ $participant['athlete'] }} - {{ $participant['round'] }}
                            </button>
                        </h2>
                    </div>
                    <div id="flush-collapseOne-{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
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
                                            <td><input class="col-md-2" type="text" name="j1"></td>
                                            <td><input class="col-md-2" type="text" name="j2"></td>
                                            <td><input class="col-md-2" type="text" name="j3"></td>
                                            <td><input class="col-md-2" type="text" name="j4"></td>
                                            <td><input class="col-md-2" type="text" name="j5"></td>
                                            <td><input class="col-md-2" type="text" name="j6"></td>
                                            <td><input class="col-md-2" type="text" name="j7"></td>
                                            <td><input class="col-md-2" type="text" name="j8"></td>
                                            <td><input class="col-md-2" type="text" name="divePoints"></td>
                                            <td><input class="col-md-2" type="text" name="totalPoints"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Versión móvil -->
    <div class="d-md-none">
        @foreach($participants as $index => $participant)
        <div class="list-group accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-{{ $index }}" aria-expanded="false" aria-controls="flush-collapseOne">
                        {{ $participant['country'] }}- {{ $participant['athlete'] }} - {{ $participant['round'] }}
                    </button>
                </h2>
                <div id="flush-collapseOne-{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="card card-body">
                            <div class="table-responsive">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>