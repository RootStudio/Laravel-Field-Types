<div class="form-group @if($errors->has($name)) has-danger @endif">
    <label for="{{ $id }}">{{ $label }}</label>

    <select class="form-control {{ $class }}" id="{{ $id }}" name="{{ $name }}" {{ $attributes }} @if($help) aria-describedby="{{ $id }}_help" @endif>
        @foreach($options as $optValue => $optLabel)
            <option value="{{ $optValue }}" @if($optValue == $value) selected="selected" @endif>
                {{ $optLabel }}
            </option>
        @endforeach
    </select>

    @if ($errors->has($name))
        <div class="form-control-feedback">
            <strong>{{ $errors->first($name) }}</strong>
        </div>
    @endif

    @if($help)
        <small id="{{ $id }}_help" class="form-text text-muted">
            {{ $help }}
        </small>
    @endif
</div>
