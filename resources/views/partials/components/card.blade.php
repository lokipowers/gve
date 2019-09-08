@php
    $headerClass = '';

    if(isset($icon)){
        $headerClass = 'card-header-icon';
    }

@endphp

<div class="card ">
    <div class="card-header card-header-primary {{ $headerClass }}">
        @isset($icon)
        <div class="card-icon">
            <i class="material-icons">{{ $icon }}</i>
        </div>
        @endisset
        <h4 class="card-title">{{ $title }}</h4>
        @if(isset($category))
            <p class="card-category">{{ $category }}</p>
        @endif
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
