
@php

    if($item->status === null){
        $item->status = 'default';
    }

@endphp

<li class="timeline-inverted">
    @if($item->icon !== null)
    <div class="timeline-badge {{ $item->status }}">
        <i class="material-icons">{{ $item->icon }}</i>
    </div>
    @endif
    <div class="timeline-panel">
        <div class="timeline-heading">
            <span class="badge badge-pill badge-{{ $item->status }}">{{ $item->name }}</span>
        </div>
        <div class="timeline-body">
            <p>{{ $item->content }}</p>
        </div>
        <h6>
            <i class="ti-time"></i> {{ $item->created_at->diffForHumans() }}
        </h6>
    </div>
</li>
