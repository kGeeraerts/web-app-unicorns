<div class="grid grid-cols-1">
    <label for="image" class="dark:text-white">Image</label>
    <div class="border-2 border-gray-300 border-dashed rounded-md relative max-w-xl">
        <input type="file" id="image" name="image" {{isset($required)? $required : ''}}
               class="cursor-pointer relative block opacity-0 w-full h-full p-20 z-50">
        <img id="previewImage" src="" alt="uploaded image"
             class="max-h-full max-w-full text-gray-400 absolute top-0 right-0 left-0 m-auto"/>
        <svg class="h-12 w-12 text-gray-400 absolute top-2 right-0 left-0 m-auto" stroke="currentColor" fill="none"
             viewBox="0 0 48 48"
             aria-hidden="true" id="addImage">
            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"/>
        </svg>
        <div id="inputText"
             class="text-gray-600 dark:text-gray-200 text-center absolute top-16 right-0 left-0 m-auto">
            <h4>
                Drop files anywhere to upload
                <br/>or
            </h4>
            <p>Select Files</p>
            <p class="text-xs text-gray-500">
                PNG or JPG up to 10MB
            </p>
        </div>
    </div>
    @error('image')
    <p class="text-red-600">{{$message}}</p>
    @enderror
    @once
        @push('scripts')
            <script src="{{ mix('js/image.js') }}"></script>
        @endpush
    @endonce
</div>
