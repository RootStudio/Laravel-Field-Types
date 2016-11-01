<div class="form-group">
    <label for="{{ $id }}">{{ $label }}</label>
    <input class="form-control {{ $class }}" id="{{ $id }}" name="{{ $name }}" type="{{ $type }}" value="{{ $value }}" {{ $attributes }} @if($help) aria-describedby="{{ $id }}_help" @endif />

    @if($help)
        <small id="{{ $id }}_help" class="form-text text-muted">
            {{ $help }}
        </small>
    @endif
</div>
