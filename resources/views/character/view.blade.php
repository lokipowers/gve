@extends('layouts.app', ['activePage' => 'character.create', 'titlePage' => __($character->name)])

@php
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
                    </div>

                    @include('partials.cards.open', ['title' => 'Character Location', 'category' => $character->location->name])
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
                    <ul class="timeline timeline-simple">
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class="material-icons">card_travel</i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="badge badge-pill badge-danger">Some title</span>
                                </div>
                                <div class="timeline-body">
                                    <p>Wifey made the best Father's Day meal ever. So thankful so happy so blessed. Thank you for making my family We just had fun with the “future” theme !!! It was a fun night all together ... The always rude Kanye Show at 2am Sold Out Famous viewing @ Figueroa and 12th in downtown.</p>
                                </div>
                                <h6>
                                    <i class="ti-time"></i> 11 hours ago via Twitter
                                </h6>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge success">
                                <i class="material-icons">extension</i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="badge badge-pill badge-success">Another One</span>
                                </div>
                                <div class="timeline-body">
                                    <p>Thank God for the support of my wife and real friends. I also wanted to point out that it’s the first album to go number 1 off of streaming!!! I love you Ellen and also my number one design rule of anything I do from shoes to music to homes is that Kim has to like it....</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge info">
                                <i class="material-icons">fingerprint</i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="badge badge-pill badge-info">Another Title</span>
                                </div>
                                <div class="timeline-body">
                                    <p>Called I Miss the Old Kanye That’s all it was Kanye And I love you like Kanye loves Kanye Famous viewing @ Figueroa and 12th in downtown LA 11:10PM</p>
                                    <p>What if Kanye made a song about Kanye Royère doesn't make a Polar bear bed but the Polar bear couch is my favorite piece of furniture we own It wasn’t any Kanyes Set on his goals Kanye</p>
                                    <hr>
                                    <div class="dropdown pull-left">
                                        <button type="button" class="btn btn-round btn-info dropdown-toggle" data-toggle="dropdown">
                                            <i class="material-icons">build</i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            <li>
                                                <a href="#action">Action</a>
                                            </li>
                                            <li>
                                                <a href="#action">Another action</a>
                                            </li>
                                            <li>
                                                <a href="#here">Something else here</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#link">Separated link</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    @include('partials.cards.close')
                </div>
            </div>
        </div>
    </div>
@endsection
