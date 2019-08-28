@php
    $inlineClass = '';
    $span = 'form-check-sign';

    if(isset($inline) && $inline === true){
        $inlineClass = 'form-check-inline';
    }
    if(isset($type) && $type === 'radio'){
        $inlineClass .= ' form-check-radio';
        $span = 'circle';
    }
@endphp
<div class="form-group">
    <h6>{{ $label }}</h6>
    @foreach($options as $value => $label)
    <div class="form-check {{ $inlineClass }}">
        <label class="form-check-label">
            <input class="form-check-input"
                   type="{{ $type ?? 'checkbox' }}"
                   id="input-{{ $type ?? 'checkbox' }}-{{  $name }}"
                   value="{{ $value }}"
                   name="{{ $name }}"
                   @if(isset($required) && $required === true)
                   required="true"
                   aria-required="true"
                   @endif
            >
            {{ $label }}
            <span class="{{ $span }}">
                <span class="check"></span>
            </span>
        </label>
    </div>
    @endforeach
</div>
