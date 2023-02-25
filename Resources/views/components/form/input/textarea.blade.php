<label for="{{ $getId() }}">
    {{ $getLabel() }} {{ $isRequired() ? '*' : '' }}
</label>
<textarea {{ $isRequired() ? 'required' : '' }} class="border border-gray-300 rounded" cols="50" rows="3" name="{{ $getId() }}" id="{{ $getId() }}"></textarea>