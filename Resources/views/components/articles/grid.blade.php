<table class="table-auto border-gray-200 rounded">
    <thead class="border-b border-gray-200">
        <tr>
            @foreach ($getColumns() as $column) 
                <x-grid-table-column :column="$column" /> 
            @endforeach
        </tr>
    </thead>
    <tbody>
        @if ($hasCollection())
            <tr class="text-center italic text-gray-600">
                <td class="py-2" colspan="{{ $getColumnsCount() }}">{{ $emptyMessage() }}</td>
            </tr>
        @else 
            @foreach ($getCollection() as $row)
                <tr>
                    @foreach ($getColumns() as $column) 
                        <x-grid-table-row :column="$column" :row="$row"/>
                    @endforeach
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

@section('js')

<script>

    document.addEventListener('click', event => {
        if (event.target.type == 'button') {
            window.location.href = event.target.getAttribute('data-action');
        }
    });

</script>

@endSection