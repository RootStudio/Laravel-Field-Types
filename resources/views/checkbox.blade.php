<fieldset id="{{ $id }}" class="form-group" @if($help) aria-describedby="{{ $id }}_help" @endif>
    <legend>{{ $label }}</legend>

    @foreach($options as $optValue => $optLabel)
        <div class="form-check">
            <label class="form-check-label">
                <input type="{{ $type }}" class="form-check-input {{ $class }}" id="{{ $id }}_{{ $loop->iteration }}" name="{{ $name }}" value="{{ $optValue }}" @if(in_array($optValue, $value)) checked="checked" @endif />
                {{ $optLabel }}
            </label>
        </div>
    @endforeach

    @if($help)
        <small id="{{ $id }}_help" class="form-text text-muted">
            {{ $help }}
        </small>
    @endif
</fieldset>
