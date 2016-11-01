<div class="form-check">
    <label class="form-check-label">
        <input type="hidden" value="0" name="{{ $name }}" />
        <input type="{{ $type }}" class="form-check-input {{ $class }}" name="{{ $name }}" id="{{ $id }}" value="1" @if($value) checked="checked" @endif @if($help) aria-describedby="{{ $id }}_help" @endif />
        {{ $label }}
    </label>
    @if($help)
        <small id="{{ $id }}_help" class="form-text text-muted">
            {{ $help }}
        </small>
    @endif
</div>
