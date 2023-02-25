<button 
    id="{{ $getId() }}" 
    type="button" 
    data-action="{{ $getAction() }}"
    class="py-2 px-4 text-sm bg-purple-500 text-white font-semibold rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-opacity-75" >
    {{ $getLabel() }}
</button>