
@include('partials.elements.table.open')
@include('partials.elements.table.head', ['headers' => $headers, 'actions' => $actions ?? null])
<tbody>
@foreach($items as $item)
    @include('partials.elements.table.row', ['item' => $item, 'headers' => $headers, 'actions' => $actions ?? null])
@endforeach
</tbody>
@include('partials.elements.table.close')

<div class="float-right">
{{ $items->links() }}
</div>
