@extends('layouts.app', ['activePage' => 'puzzles', 'titlePage' => __('Word Search')])

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                @include('partials.cards.open', ['title' => 'Word Search', 'category' => 'Complete to earn ' . $reward->symbol . ' ' . $reward->converted])
                <div class="filled" id="puzzle">
                    Loading...
                    <script src="/js/puzzles/crossButton.js" type="text/javascript"></script></div>
            </div>
                @include('partials.cards.close')
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush





