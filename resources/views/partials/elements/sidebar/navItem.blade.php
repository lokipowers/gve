
@php

    $class = '';
    $toggle = '';
    $expanded = '';

    $routeOps = null;

    if(isset($item['route_opts'])){
        $routeOps = $item['route_opts'];
    }

    if(isset($item['children']) && !empty($item['children'])){
        $link = '#' . $item['id'];
        $class = ' collapsed';
        $toggle = 'data-toggle="collapse"';
        $expanded = 'aria-expanded="false"';
    }else{
        $link = route($item['route'], $routeOps);
    }

@endphp

<li class="nav-item {{ ($activePage == $item['route']) ? ' active' : '' }}">
    <a class="nav-link{{ $class }}" {!! $toggle !!} href="{{ $link }}" {!! $expanded !!}>
        @isset($item['icon'])
        <i class="material-icons">{{ $item['icon'] }}</i>
        @endisset
        <p>
            {{ $name }}
            @isset($item['children'])
            <b class="caret"></b>
            @endisset
        </p>
    </a>
    @isset($item['children'])
        <div class="collapse" id="{{ $item['id'] }}">
            <ul class="nav">
                @foreach($item['children'] as $name => $childItem)
                    @include('partials.elements.sidebar.navItem', ['item' => $childItem, 'name' => $name])
                @endforeach
            </ul>
        </div>
    @endisset
</li>
