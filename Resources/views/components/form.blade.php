<form method="{{ $getMethod }}" action="{{ $getAction() }}">

    @csrf

    <div class="grid grid-cols-2">
        @foreach ($getInputs() as $input)
            <x-form-input :input="$input" />
        @endforeach
    </div>

</form>