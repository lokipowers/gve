@extends('layouts.app', ['activePage' => 'character.create', 'titlePage' => __('Create Character')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('partials.forms.character', ['character' => null])
                </div>
            </div>
        </div>
    </div>

@endsection
