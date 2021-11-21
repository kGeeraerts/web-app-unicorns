<form method="POST" action="{{route($route)}}">
    @csrf
    <input id="model" name="model" type="hidden" value="{{$model}}">
    <input id="item" name="item" type="hidden" value="{{$item->id}}">
    <button type="button" onclick="event.preventDefault(); this.closest('form').submit();"
            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
        <p> {{__('Book appointment')}}</p>
    </button>
</form>
