<div class="js-cookie-consent cookie-consent fixed bottom-0 inset-x-0 pb-2 z-10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="p-2 rounded-lg bg-yellow-100">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-full pr-2 flex-1 items-center  md:inline">
                    <p class="ml-3 text-yellow-600 cookie-consent__message">
                        {!! trans('cookie-consent::texts.message',[
                            'cookie_policy' => '<a target="_blank" href="'.route('cookie').'"  class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Cookie Policy').'</a>',
                    ]) !!}
                    </p>
                </div>
                <div class="mt-2 flex-shrink-0 w-full sm:mt-0 sm:w-auto">
                    <a class="js-cookie-consent-agree cookie-consent__agree cursor-pointer flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-300">
                        {{ trans('cookie-consent::texts.agree') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
