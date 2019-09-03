@extends('layouts.app', ['activePage' => 'character.create', 'titlePage' => __($character->name)])

@php

    //dd($character->activity);

    $sideClass = 'default';

    switch($character->side){
        case 'GOOD':
            $sideClass = 'success';
        break;
        case 'BAD':
            $sideClass = 'danger';
        break;
    }
@endphp

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card card-profile mb-5">
                        <div class="card-avatar">
                            <img class="img" src="{{ $character->avatar_url }}" alt="{{ $character->name }}'s Avatar">
                        </div>
                        <div class="card-body">
                            <h4 class="card-category text-gray">{{ $character->rank->name }}</h4>
                            <h2 class="card-title">{{ $character->name }} <span style="vertical-align: middle;" class="badge badge-{{ $sideClass }}">{{ strtolower(ucwords($character->side)) }}</span></h2>
                            <p class="card-description">{{ $character->description }}</p>
                            <a href="#pablo" class="btn btn-rose btn-round">Follow</a>
                        </div>
                        <div class="card-footer">
                            {{ $character->currency->symbol }} {{ number_format($character->currency->converted, 2, '.', ',') }}
                        </div>
                    </div>

                    @include('partials.cards.open', ['title' => 'Character Location', 'category' => $character->location->name . ', '.$character->location->country])
                    <img src="https://maps.googleapis.com/maps/api/staticmap?
                        center={{ $character->location->latitude }},{{ $character->location->longitude }}
                        &zoom=6&size=640x640&maptype=roadmap
                        &markers=color:red%7C{{ $character->location->latitude }},{{ $character->location->longitude }}
                        &key={{ env('GOOGLE_MAPS_KEY') }}"
                         alt="{{ $character->name }} Location"
                         style="width: 100%; height: auto; margin-top: -40px; border-radius: 5px;"
                    />
                    @include('partials.cards.close')
                </div>
                <div class="col-sm-4">
                    @include('partials.cards.open', ['title' => 'Equipment'])

                    @if(empty($character->equipment->items))
                        <div class="text-center">{{ $character->name }} has no equipment</div>
                    @endif

                    @include('partials.cards.close')
                </div>
                <div class="col-sm-4">
                    @include('partials.cards.open', ['title' => 'Activity'])
                    @include('partials.elements.timeline.timeline', ['items' => $character->activity])
                    @include('partials.cards.close')
                </div>
            </div>
        </div>
    </div>
@endsection
