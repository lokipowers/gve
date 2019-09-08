@extends('layouts.app', ['activePage' => 'property.index', 'titlePage' => __('Properties')])

@php

    $tableHeaders = [
        'Name' => [
            'item' => ['name'],
            'route' => 'properties.view'
        ],
        'Type' => [
            'item' => ['type']
        ],
        'Defence' => [
            'item' => ['defence']
        ],
        'Salary' => [
            'item' => ['salaryConverted.symbol', 'salaryConverted.converted']
        ],
        'Owner' => [
            'item' => ['owner.name'],
            'fallback' => 'Vacant'
        ]
    ];

    $actions = [
        'Claim Property' => [
            'route' => 'properties.claim',
            'icon' => 'emoji_people',
            'class' => 'success',
            'if' => [
                ['owner_id', '==', null]
            ]
        ],
        'Edit Property' => [
            'route' => 'properties.edit',
            'icon' => 'build',
            'class' => 'default',
            'if' => [
                ['owner_id', '==', $character->id]
            ]
        ],
        'Attack Property' => [
            'route' => 'properties.attack',
            'icon' => 'security',
            'class' => 'danger',
            'if' => [
                ['owner_id', '!=', null],
                ['owner_id', '!=', $character->id]
            ]
        ]
    ]

@endphp

@section('content')
    @component('partials.components.page')
        @component('partials.components.card', ['title' => 'Properties', 'icon' => 'apartment'])

            @include('partials.elements.table', ['headers' => $tableHeaders, 'items' => $properties, 'actions' => $actions])

        @endcomponent
    @endcomponent
@endsection

