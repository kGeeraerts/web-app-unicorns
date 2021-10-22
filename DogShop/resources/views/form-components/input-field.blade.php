<div class="grid grid-cols-1 ">
    <label for="{{$name}}" class="dark:text-white">{{ucfirst($name)}}</label>
    <input type="{{$type}}" id="{{$name}}" name="{{$name}}" value="{{isset($value)?$value:old($name)}}" required
           class="my-1 rounded-md border-gray-300 shadow-sm focus:border-yellow-600 focus:ring focus:ring-yellow-600 focus:ring-opacity-50">
    @error($name)
    <p class="text-red-600">{{$message}}</p>
    @enderror
</div>
