@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Vehicle')])

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                @if (\Session::has('success'))
                    <div class="col-12 alert alert-success">
                        <ul class="mb-0" style="padding-left:0;">
                            @foreach(Session::get('success') as $success)
                            <li style="list-style:none;">{!! $success !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($errors->any())
                    <div class="col-12 alert alert-danger">
                        <ul class="mb-0" style="padding-left:0;">
                            <li style="list-style:none;">{!! $errors->first() !!}</li>
                        </ul>
                    </div>
                @endif
                <div class="col-12 text-right" style="margin-bottom:-30px;">
                    <h3 style="white-space:nowrap;">{{ $vehicle->cost_price->symbol }} {{ number_format($vehicle->cost_price->converted, 2, '.', ',') }}</h3>
                    <h5>
                        {{ $vehicle->cost_price->symbol }} {{ number_format($vehicle->localShippingCost, 2, '.', ',') }}
                        @if($vehicle->location_id === $currentUser->character->current_location_id)
                            <i style="vertical-align: middle" class="material-icons">local_shipping</i>
                        @else
                            <i style="vertical-align: bottom" class="material-icons">flight</i>
                        @endif
                    </h5>
                    <h6>
                        <i style="font-size:1.2em; vertical-align: sub;" class="material-icons">access_time</i>
                        {{ $vehicle->localShippingDuration }}
                        @if($vehicle->localShippingDuration !== 'Instant') mins @endif
                    </h6>

                </div>
                <div class="card card-profile">
                    <div style="margin:-70px auto -30px;">
                            <img class="img" src="{{ $vehicle->vehicle->getFirstMediaUrl('thumbnail') }}" style="max-width:480px;">
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

                        @if($vehicle->quantity === 0)
                            <div class="alert alert-warning">
                                <h4 class="mb-0"><strong>Item is out of stock.</strong></h4>
                            </div>
                        @else
                            <form action="{{ route('equipment.purchase_item', ['id' => $vehicle->id, 'type' => strtolower($vehicle->type)]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-rose btn-round">Purchase</button>
                            </form>
                        @endif

                        @if($vehicle->vehicle->getMedia('gallery') !== null)
                            <div class="container mt-3">
                                <div class="row">
                                @foreach($vehicle->vehicle->getMedia('gallery') as $image)
                                    <div class="col" style="background-image:url({{ $image->getFullUrl() }}); background-size:cover;height:300px;"></div>
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
