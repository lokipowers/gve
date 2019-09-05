@extends('layouts.app', ['activePage' => 'puzzles', 'titlePage' => __('Word Search')])

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                @include('partials.cards.open', ['title' => 'Word Search', 'category' => 'Complete to earn ' . $reward->symbol . ' ' . $reward->converted])
                <div class="puzzleWrap">
                    <div id='puzzle'></div>
                    <div id='words'></div>
                </div>
                @include('partials.cards.close')
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        var gvePuzzleId = '{{ $puzzleId }}';
        var gvePuzzleHeight = {{ (int)$rows }};
        var gvePuzzleWidth = {{ (int)$columns }};
        var gveWordCount = {{ (int)$wordCount }};
    </script>
    <script src="/js/puzzles/wordsearch.js"></script>
@endpush

@push('css')
    <style type="text/css">
        /**
        * Wordfind.js 0.0.1
        * (c) 2012 Bill, BunKat LLC.
        * Wordfind is freely distributable under the MIT license.
        * For all details and documentation:
        *     https://github.com/bunkat/wordfind
        */

        /**
        * Styles for the puzzle
        */
        #puzzle {
            padding: 20px;
            margin: 30px auto;
            width: 100%;
            text-align:center;
        }

        #puzzle div {
            width: 100%;
            margin: 0 auto;
        }

        /* style for each square in the puzzle */
        #puzzle .puzzleSquare {
            height: 35px;
            width: 35px;
            text-transform: uppercase;
            border: 1px solid #bbb;
            outline: none;
            font: 1em;
        }

        button::-moz-focus-inner {
            border: none;
            outline: none;
        }

        /* indicates when a square has been selected */
        #puzzle .selected {
            color: #8e24aa;
            background:#f2f2f2;
            outline: none;
        }
        #Puzzle .selected:focus {
             border: none;
        }

        /* indicates that the square is part of a word that has been found */
        #puzzle .found {
            color: #8e24aa;
            background:#f2f2f2;
            font-weight:600;
        }

        #puzzle .solved {
            color: #8e24aa;
        }

        /* indicates that all words have been found */
        #puzzle .complete {
            //background-color: green;
            opacity:0.5;
        }

        /**
        * Styles for the word list
        */
        #words {
            margin-top: 37px;
        }

        #words ul {
            list-style-type: none;
            padding:0;
            text-align:center;
        }

        #words li {
            padding:  0 0 7px;
            font-size: 1.2em;
            display: inline-block;
            margin:0 20px;
        }

        /* indicates that the word has been found */
        #words .wordFound {
            text-decoration: line-through;
            color: #8e24aa;
        }
    </style>
@endpush
