<div class="form-group{{ $errors->has($name) ? ' has-danger' : '' }}">
    <label for="input-{{ $name }}">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}"
           class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}"
           id="input-{{ $name }}"
           aria-describedby="{{ $name }}-description"
           placeholder="{{ $placeholder ?? '' }}"
           value="{{ old($name, ($value ?? '' )) }}"
           name="{{ $name }}"
           @if(isset($required) && $required === true)
           required="true"
           aria-required="true"
           @endif
    >

    @if ($errors->has($name))
        <span class="form-control-feedback">
        <i class="material-icons">done</i>
        </span>
        <span id="{{ $name }}-error" class="error text-danger" for="input-{{ $name }}">{{ $errors->first($name) }}</span>
    @endif

    @isset($description)
    <small id="{{ $name }}-description" class="form-text text-muted">{{ $description }}</small>
    @endisset

</div>
