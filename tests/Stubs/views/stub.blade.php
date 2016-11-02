{{ $id }} <br />
{{ $name }} <br />
{{ $type }} <br />
{{ $label }} <br />
{{ $class }} <br />
{{ $help }} <br />
{{ is_array($value) ? implode('<br /> ', $value) : $value }} <br />
{!! $attributes !!} <br />

@if(isset($options))
    @foreach($options as $value => $option)
        {{ $value }} => {{ $option }} <br />
    @endforeach
@endif