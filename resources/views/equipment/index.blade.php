@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Equipment')])

@php

    $tableHeaders = [
        'Thumbnail' => [
            'item' => ['{{type}}'],
            'type' => 'image',
            'image' => 'thumbnail',
            'route' => 'equipment.purchase',
            'routeParams' => [
                'id' => 'id',
                'type' => 'type'
            ]
        ],
        'Name' => [
            'item' => ['{{type}}.name'],
            'route' => 'equipment.purchase',
            'routeParams' => [
                'id' => 'id',
                'type' => 'type'
            ]
        ],
        'Type' => [
            'item' => ['type']
        ],
        'Attack' => [
            'item' => ['{{type}}.attack']
        ],
        'Defence' => [
            'item' => ['{{type}}.defence']
        ],
        'Price' => [
            'item' => ['cost_price.symbol', 'cost_price.converted'],
            'nobr' => true
        ],
        'P&P' => [
            'item' => ['cost_price.symbol', 'localShippingCost'],
            'nobr' => true
        ],
        'ETA' => [
            'item' => ['localShippingDuration'],
            'icon_before' => 'access_time',
            'append' => ' mins'
        ]
    ];

@endphp

@section('content')
    @component('partials.components.page')
        @component('partials.components.card', ['title' => 'Equipment', 'icon' => 'group'])
            @include('partials.elements.table', ['headers' => $tableHeaders, 'items' => $equipment])
        @endcomponent
    @endcomponent
@endsection
