@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Vehicle')])

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-right" style="margin-bottom:-30px;">
                    <h3 style="white-space:nowrap;">{{ $vehicle->cost_price->symbol }} {{ number_format($vehicle->cost_price->converted, 2, '.', ',') }}</h3>
                </div>
                <div class="card card-profile">
                    <div style="margin:-70px auto -30px;">
                            <img class="img" src="{{ $vehicle->vehicle->thumbnail }}" style="max-width:480px;">
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="card-title text-left">{{ $vehicle->vehicle->name }}</h4>
                                    <p class="card-description text-left">
                                        {{ nl2br($vehicle->vehicle->description) }}
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="">
                                                <tr>
                                                    <th>Performance</th>
                                                    <th>Safety</th>
                                                    <th>Handling</th>
                                                    <th>Top Speed</th>
                                                    <th>0 - 60</th>
                                                    <th>BHP</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $vehicle->vehicle->performance }}</td>
                                                    <td>{{ $vehicle->vehicle->safety }}</td>
                                                    <td>{{ $vehicle->vehicle->handling }}</td>
                                                    <td>{{ $vehicle->vehicle->top_speed }}</td>
                                                    <td>{{ $vehicle->vehicle->zero_sixty }}</td>
                                                    <td>{{ $vehicle->vehicle->bhp }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#pablo" class="btn btn-rose btn-round">Purchase</a>

                        @if($vehicle->vehicle->images !== null)
                            <div class="container mt-3">
                                <div class="row">
                                @foreach(json_decode($vehicle->vehicle->images) as $image)
                                    <div class="col" style="background-image:url({{ $image }}); background-size:cover;height:300px;"></div>
                                @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>.
@endsection
