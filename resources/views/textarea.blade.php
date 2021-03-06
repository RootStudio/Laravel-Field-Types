<div class="form-group @if($errors->has($name)) has-danger @endif">
    <label for="{{ $id }}">{{ $label }}</label>

    <textarea class="form-control {{ $class }} @if ($errors->has($name)) form-control-danger @endif" id="{{ $id }}" name="{{ $name }}" {{ $attributes }} @if($help) aria-describedby="{{ $id }}_help" @endif>
        {{ $value }}
    </textarea>

    @if ($errors->has(fieldNameToDot($name)))
        <div class="form-control-feedback">
            <strong>{{ $errors->first(fieldNameToDot($name)) }}</strong>
        </div>
    @endif

    @if($help)
        <small id="{{ $id }}_help" class="form-text text-muted">
            {{ $help }}
        </small>
    @endif
</div>
