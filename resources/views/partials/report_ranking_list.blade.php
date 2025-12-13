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


<div class="table-responsive">
    <div class="row">
        <div class="col col-md-2">#</div>
        <div class="col col-md-3">Nombre</div>
        <div class="col col-md-3">Total</div>
        <div class="col col-md-4"></div>
    </div>
    @foreach($RankingReport as $item)
    <div class="accordion" id="accordionList">
        <div class="accordion-item">
            <div class="row accordion-button">
                <div class="col col-md-2">{{$item->ranking}}</div>
                <div class="col col-md-3">{{$item->nombre}} {{$item->apellido_p}}</div>
                <div class="col col-md-3">{{$item->total_calificacion}}</div>
                <div class="col col-md-4"></div>
            </div>

        </div>
    </div>

    @endforeach

</div>