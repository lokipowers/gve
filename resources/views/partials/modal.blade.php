<div class="modal fade {{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $ariaLabel ?? '' }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            @includeIf($view)
        </div>
    </div>
</div>
