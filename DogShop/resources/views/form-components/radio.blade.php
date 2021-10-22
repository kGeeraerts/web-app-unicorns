<div class="flex items-center space-x-2">
    <input type="radio" id="{{$value}}" name="{{$name}}" value="{{$value}}" required
           {{(old($name) == $value)? "checked" : (isset($picked)?(($value == $picked)? "checked" : ''):'')}}
           class="rounded-full border-gray-300 text-yellow-500 shadow-sm focus:border-yellow-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
    <label for="{{$value}}" class="dark:text-white">{!! isset($message)? $message : ucfirst($value)!!}</label>
</div>
@error($value)
<p class="text-red-600">{{$value}}</p>
@enderror
