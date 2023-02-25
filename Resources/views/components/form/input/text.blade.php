<label for="{{ $getId() }}">
    {{ $getLabel() }} {{ $isRequired() ? '*' : '' }}
</label>
<input 
    {{ $isRequired() ? 'required' : '' }} 
    class="border border-gray-300 rounded" 
    type="text" 
    name="{{ $getId() }}" 
    id="{{ $getId() }}"
    value="{{ old('title') }}">