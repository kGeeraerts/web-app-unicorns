<div class="flex items-center space-x-2">
    <input type="checkbox" id="{{$name}}" name="{{$name}}" {{isset($required)? $required : ''}}
           {{isset($check)?(($check)? "checked" : ""):(old($name)? "checked" : '')}} {{isset($wire)? $wire : ''}}
           class="rounded border-gray-300 text-yellow-500 shadow-sm focus:border-yellow-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
    <label for="{{$name}}" class="dark:text-white">{!! isset($message)? $message : ucfirst($name)!!}</label>
</div>
@error($name)
<p class="text-red-600">{{$message}}</p>
@enderror
