@php
    $winPercentage = ($data->completed / $data->total_played) * 100;

    $percentageClass = 'success';

    switch(true){
        case $winPercentage <= 75:
            $percentageClass = 'warning';
            break;
        case $winPercentage <=50;
            $percentageClass = 'danger';
            break;
    }

@endphp
<div class="col-md-4">
    <div class="card card-chart">
        <div class="card-header card-header-success">
            <div class="ct-chart" id="puzzle{{ $puzzle }}"></div>
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $puzzle }}</h4>
            <p class="card-category">
                <span class="text-{{ $percentageClass }}">{{ number_format($winPercentage, 2) }}% </span> win ratio
            </p>
            <p class="card-category">
                Dollars earned <span class="text-info">${{ number_format($data->reward_dollars, 2, '.', ',') }}</span>
            </p>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons">access_time</i> last played {{ $data->last_played->diffForHumans() }}
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>

        @php

            $today = \Carbon\Carbon::now();

            for($i=0; $i > -7; $i--){

                if(isset($data->days_played[$today->format('Y-m-d')])){
                    echo 'var day'.abs($i).' = ' . $data->days_played[$today->format('Y-m-d')] .';';
                }else{
                    echo 'var day'.abs($i).' = 0;';
                }

                $today = $today->subDays(1);
            }

        @endphp

            dataPuzzle{{ $puzzle }}Chart = {
            labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
            series: [
                [day6, day5, day4, day3, day2, day1, day0]
            ]
        };

        optionsPuzzle{{ $puzzle }}Chart = {
            lineSmooth: Chartist.Interpolation.cardinal({
                tension: 0
            }),
            low: 0,
            high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            chartPadding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            },
        };

        var dataPuzzle{{ $puzzle }}Chart = new Chartist.Line('#puzzle{{ $puzzle }}', dataPuzzle{{ $puzzle }}Chart, optionsPuzzle{{ $puzzle }}Chart);

        md.startAnimationForLineChart(dataPuzzle{{ $puzzle }}Chart);
    </script>
@endpush
