
@if(isset($items) && !empty($items))
    <ul class="timeline timeline-simple">

        @foreach($items as $item)
            @include('partials.elements.timeline.segment', ['item' => $item])
        @endforeach

    </ul>

@else
    <div class="text-center">Nothing to display</div>
@endif
