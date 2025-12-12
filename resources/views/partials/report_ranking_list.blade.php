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
    <div>
        <h7></h7>
    </div>
    @foreach($RankingReport as $item)
    <div class="accordion" id="accordionList">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <span  class="accordion-button">
                   {{$item->ranking}}  {{$item->nombre}}  {{$item->apellido_p}}  
                </span>
            </h2>
        </div>
    </div>

    @endforeach

</div>