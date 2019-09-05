@extends('layouts.app', ['activePage' => 'puzzles', 'titlePage' => __('Word Search')])

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                @include('partials.cards.open', ['title' => 'Word Search', 'category' => 'Complete to earn ' . $reward->symbol . ' ' . $reward->converted])
                <div id="collage">
                <div id="playPanel" style="padding:5px;display:none;">
                    <div style="display:inline-block; margin:auto; width:95%; vertical-align:top; text-align:center;">
                        <ul id="sortable" class="sortable"></ul>
                        <div id="actualImageBox" @if($difficulty === 'insane') style="display:none;" @endif>
                            <div id="stepBox">
                                <div>Steps:</div>
                                <div id="stepCount" class="stepCount">0</div>
                            </div>

                            <img id="actualImage" />
                            <div>Re-arrange to create a picture like this.</div>
                        </div>
                    </div>
                </div>

                <script>
                        var rewardSymbol = '{{ $reward->symbol }}';
                        var rewardCash = '{{ $reward->converted }}';
                        var gvePuzzleId = '{{ $puzzleId }}';
                        var gridSize = {{ (int)$slices }};
                        var images = [
                            { src: 'https://lorempixel.com/640/640', title: 'London Bridge' },
                            { src: 'https://lorempixel.com/640/640', title: 'Lotus Temple' },
                            { src: 'https://lorempixel.com/640/640', title: 'Qutub Minar' },
                            { src: 'https://lorempixel.com/640/640', title: 'Statue Of Liberty' },
                            { src: 'https://lorempixel.com/640/640', title: 'Taj Mahal' }
                        ];
                        window.onload = function () {
                            imagePuzzle.startGame(images, gridSize);
                        };
                </script>
                </div>
                @include('partials.cards.close')
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="/js/puzzles/slidingPuzzle.js" type="text/javascript"></script>
@endpush

@push('css')
    <style type="text/css">
        #collage hr{
            border:none;
            border-top:2px solid #f5f2f2;
            height:1px;
        }

        #collage.complete{
            opacity:0.5;
            pointer-events: none;
        }

        #collage #playPanel {
            padding:10px 0px;
            margin: 10px auto;
            max-width:800px;
            width:95%;
        }

        #collage #actualImageBox {
            display: inline-block;
            font-size:0.8em;
            margin: 10px 10px;
            vertical-align: top;
            width:280px;
        }

        #collage #stepBox, #collage #timeBox {
            display:inline-block;
            width:48%;
        }

        #collage #stepBox div {
            display:inline-block;
            padding:1px 4px;
            margin: 0px auto;
            max-width:800px;
        }

        #collage img#actualImage{
            border:2px solid #a46;
            height:280px;
            width:280px;
        }

        #collage #sortable {
            border:2px solid #a46;
            list-style-type: none;
            display: inline-block;
            margin: 10px;
            padding: 0;
            width: 400px;
            box-sizing: content-box;
        }

        #collage #sortable li {
            background-size: 400% 400%;
            border: none;
            cursor: pointer;
            margin: 0;
            padding: 0;
            float: left;
            width: 100px;
            height: 100px;
        }

        #collage button  {
            background-color:#f5f2f2;
            border:1px solid #cce;
            display: inline;
            font-size: 14px;
            height: auto;
            width: auto;
            padding: 3px 8px;
        }
    </style>
@endpush



