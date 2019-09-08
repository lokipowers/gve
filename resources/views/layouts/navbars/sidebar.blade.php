<div class="sidebar" data-color="purple" data-background-color="black" data-image="/images/sidebar.jpg">
    @php

        if(!isset($activePage)){
            $activePage = '';
        }

        $navItems = [
            'Dashboard' => [
                'route' => 'home',
                'icon' => 'dashboard',
                'id' => 'dashboard'
            ],
            'Character' => [
                'route' => 'character.create',
                'icon' => 'assignment_ind',
                'id' => 'character'
            ],
            'Characters' => [
                'route' => 'character.viewAll',
                'icon' => 'group',
                'id' => 'characterViewAll'
            ],
            'Equipment' => [
                'route' => null,
                'icon' => 'style',
                'id' => 'equipment',
                'children' => [
                    'Inventory' => [
                        'route' => 'equipment.inventory',
                        'icon' => 'style',
                        'id' => 'equipmentInvetory'
                    ],
                    'Purchase' => [
                        'route' => 'equipment.marketplace',
                        'icon' => 'shopping_cart',
                        'id' => 'equipmentMarketplace'
                    ]
                ]
            ],
            'Properties' => [
                'route' => null,
                'icon' => 'apartment',
                'id' => 'properties',
                'children' => [
                    'View All' => [
                        'route' => 'properties.index',
                        'icon' => 'apartment',
                        'id' => 'propertiesIndex'
                    ]
                ]
            ],
            'Puzzles' => [
                'route' => null,
                'icon' => 'filter_b_and_w',
                'id' => 'puzzles',
                'children' => [
                    'Word Search' => [
                        'route' => 'puzzle.wordsearch.difficulty',
                        'route_opts' => ['difficulty' => 'easy'],
                        'icon' => 'grid_on',
                        'id' => 'puzzleWordsearch',
                        'children' => [
                            'Easy' => [
                                'route' => 'puzzle.wordsearch.difficulty',
                                'route_opts' => ['difficulty' => 'easy'],
                                'icon' => 'mood',
                                'id' => 'puzzleWordsearchEasy'
                            ],
                            'Medium' => [
                                'route' => 'puzzle.wordsearch.difficulty',
                                'route_opts' => ['difficulty' => 'medium'],
                                'icon' => 'sentiment_dissatisfied',
                                'id' => 'puzzleWordsearchMedium'
                            ],
                            'Hard' => [
                                'route' => 'puzzle.wordsearch.difficulty',
                                'route_opts' => ['difficulty' => 'hard'],
                                'icon' => 'sentiment_very_dissatisfied',
                                'id' => 'puzzleWordsearchHard'
                            ]

                        ]
                    ],
                    'Sliced Images' => [
                        'route' => 'puzzle.slideimage.difficulty',
                        'route_opts' => ['difficulty' => 'easy'],
                        'icon' => 'burst_mode',
                        'id' => 'puzzleSlideImage',
                        'children' => [
                            'Easy' => [
                                'route' => 'puzzle.slideimage.difficulty',
                                'route_opts' => ['difficulty' => 'easy'],
                                'icon' => 'mood',
                                'id' => 'puzzleSlideImageEasy'
                            ],
                            'Medium' => [
                                'route' => 'puzzle.slideimage.difficulty',
                                'route_opts' => ['difficulty' => 'medium'],
                                'icon' => 'sentiment_dissatisfied',
                                'id' => 'puzzleSlideImageMedium'
                            ],
                            'Hard' => [
                                'route' => 'puzzle.slideimage.difficulty',
                                'route_opts' => ['difficulty' => 'hard'],
                                'icon' => 'sentiment_very_dissatisfied',
                                'id' => 'puzzleSlideImageHard'
                            ],
                            'Insane' => [
                                'route' => 'puzzle.slideimage.difficulty',
                                'route_opts' => ['difficulty' => 'insane'],
                                'icon' => 'mood_bad',
                                'id' => 'puzzleSlideImageInsane'
                            ]
                        ]
                    ]
                ]
            ]
        ]

    @endphp
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            <img src="/images/logo-wings-small.png" alt="gve.world" width="260">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @foreach($navItems as $name => $item)
                @include('partials.elements.sidebar.navItem', ['item' => $item, 'name' => $name])
            @endforeach
        </ul>
    </div>
</div>
