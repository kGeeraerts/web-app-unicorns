@if (session('status'))
    <div class="z-50 flex justify-center align-center" id="alert">
        <div class="absolute top-2 flex bg-green-100 text-xl font-bold text-green-600 rounded-lg p-4 items-center z-50">
            <div class="flex-shrink-0 mr-2">
                <!-- check-circle -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="limegreen" class="h-6 w-6">
                    <path fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                          clip-rule="evenodd"/>
                </svg>
            </div>
            {{ session('status') }}
            <div class="flex-shrink-0 ml-4 sm:ml-3">
                <button type="button" id="alertButton"
                        class="flex p-1 rounded-md hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-white">
                    <span class="sr-only">Dismiss</span>
                    <!-- x -->
                    <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    @once
        @push('scripts')
            <script src="{{ mix('js/alert.js') }}"></script>
        @endpush
    @endonce
@endif
