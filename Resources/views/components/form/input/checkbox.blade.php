<label for="{{ $getId() }}">
    {{ $getLabel() }} {{ $isRequired() ? '*' : '' }}
</label>
<input type="checkbox" name="{{ $getId() }}" id="{{ $getId() }}">