<header>
    <neo-topbar align="space-between" class="bg-x-white">
        <neo-dropdown label="{{ __('Menu') }}" class="lg:hidden menu-dropdown" position="center">
            <button aria-label="menu_trigger" slot="trigger"
                class="flex items-center justify-center w-6 h-6 text-x-black outline-none relative isolate before:content-[''] before:rounded-x-thin before:absolute before:block before:w-[130%] before:h-[130%] before:-inset-[15%] before:-z-[1] before:!bg-opacity-40 hover:before:bg-x-shade focus:before:bg-x-shade focus-within:before:bg-x-shade">
                <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                    <path
                        d="M129-215q-20.75 0-33.375-12.675Q83-240.351 83-261.175 83-280 95.625-293T129-306h458q19.75 0 32.375 13.175 12.625 13.176 12.625 32Q632-240 619.375-227.5 606.75-215 587-215H129Zm0-221q-20.75 0-33.375-13.175Q83-462.351 83-482.175 83-502 95.625-514.5 108.25-527 129-527h339q18.75 0 31.875 12.675Q513-501.649 513-481.825 513-462 499.875-449 486.75-436 468-436H129Zm0-218q-20.75 0-33.375-13.175Q83-680.351 83-700.175 83-720 95.625-733 108.25-746 129-746h458q19.75 0 32.375 13.175 12.625 13.176 12.625 33Q632-680 619.375-667 606.75-654 587-654H129Zm605 173 114 113q13 14 12.5 33T847-304q-15 14-33.5 14T782-304L637-450q-14-13-14-31t14-32l145-146q13-13 31.5-13t33.5 13q13 14 12.5 33T847-594L734-481Z" />
                </svg>
            </button>
            <ul class="w-full flex flex-col p-2 gap-2">
                @foreach ([['views.guest.index', __('Home')], ['views.guest.fleet', __('Fleet')]] as $url)
                    <li class="w-full flex items-center justify-center">
                        <a href="{{ route($url[0]) }}"
                            class="flex px-10 py-1 w-max h-full items-center font-x-thin text-base relative isolate rounded-full overflow-hidden {{ request()->routeIs($url[0]) ? 'text-x-white after:z-[-1] after:content-[\'\'] after:absolute after:w-full after:h-full after:inset-0 after:bg-x-core after:bg-gradient-to-br' : 'outline-none text-x-black hover:text-x-prime focus:text-x-prime' }}">
                            {{ $url[1] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </neo-dropdown>
        <a aria-label="home_link" href="{{ route('views.guest.index') }}" class="block w-20">
            <img src="{{ asset('img/logo.webp') }}?v={{ env('APP_VERSION') }}" alt="{{ env('APP_NAME') }} logo image"
                class="block w-full" width="576" height="465" loading="lazy" />
        </a>
        <nav class="hidden w-max lg:flex items-center ms-auto">
            <ul class="flex gap-4 w-max items-center">
                @foreach ([['views.guest.index', __('Home')], ['views.guest.fleet', __('Fleet')]] as $url)
                    <li class="w-max h-full">
                        <a href="{{ route($url[0]) }}"
                            class="flex px-4 py-1 w-max h-full items-center font-x-thin text-base relative isolate rounded-full overflow-hidden {{ request()->routeIs($url[0]) ? 'text-x-white after:z-[-1] after:content-[\'\'] after:absolute after:w-full after:h-full after:inset-0 after:bg-x-core after:bg-gradient-to-br' : 'outline-none text-x-black hover:text-x-prime focus:text-x-prime' }}">
                            {{ $url[1] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <neo-dropdown label="{{ __('Languages') }}" position="{{ Core::lang('ar') ? 'start' : 'end' }}">
            <button slot="trigger" aria-label="language_trigger"
                class="flex items-center justify-center w-6 h-6 text-x-black outline-none relative isolate before:content-[''] before:rounded-x-thin before:absolute before:block before:w-[130%] before:h-[130%] before:-inset-[15%] before:-z-[1] before:!bg-opacity-40 hover:before:bg-x-shade focus:before:bg-x-shade focus-within:before:bg-x-shade">
                <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                    <path
                        d="M610-196 568.513-90.019Q566-78 555.452-71q-10.548 7-23.606 7Q510-64 499.5-80.963 489-97.927 497-118.094L654.571-537.15Q658-549 668-556.5q10-7.5 22-7.5h31.552q11.821 0 21.672 7T758-538l164 419q6 20.462-5.6 37.73Q904.799-64 884.273-64q-14.692 0-26.733-7.76t-15.536-22.576L808.585-196H610Zm22-72h148l-73.054-202H705l-73 202ZM355.135-397l-179.34 178.842Q162.86-206 146.206-206.5q-16.654-.5-27.93-11Q107-229 108-246.689q1-17.69 11.654-28.321L303-458q-39.6-45.818-70.8-92.409Q201-597 179-646h90q16 34 38.329 64.567 22.328 30.566 48.274 63.433Q403-567 434.628-619.861 466.256-672.721 489-730H63.857q-17.753 0-29.305-12.289Q23-754.579 23-771.982q0-17.404 12.35-29.318 12.35-11.914 29.895-11.914h248.731v-41.893q0-17.529 11.748-29.211Q337.471-896 355.098-896t29.637 11.682q12.011 11.682 12.011 29.211v41.893h249.548q17.685 0 29.696 11.768Q688-789.679 688-771.895q0 17.509-12.282 29.702Q663.436-730 645.759-730h-74.975Q548-656 510-587.5T416-457l102 103-29.389 83.933L355.135-397Z" />
                </svg>
            </button>
            <ul class="w-full flex flex-col">
                <li class="w-full">
                    <a href="{{ route('actions.language.index', 'en') }}"
                        class="w-full flex flex-wrap gap-2 px-2 py-1 text-x-black items-center outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ Core::lang('en') ? '!bg-x-black' : '' }}">
                        <img src="{{ asset('lang/en.png') }}?v={{ env('APP_VERSION') }}" alt="english flag"
                            class="block w-6 h-4 object-contain" />
                        <span class="block flex-1 text-base text-start">{{ __('English') }}</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="{{ route('actions.language.index', 'fr') }}"
                        class="w-full flex flex-wrap gap-2 px-2 py-1 text-x-black items-center outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ Core::lang('fr') ? '!bg-x-black' : '' }}">
                        <img src="{{ asset('lang/fr.png') }}?v={{ env('APP_VERSION') }}" alt="french flag"
                            class="block w-6 h-4 object-contain" />
                        <span class="block flex-1 text-base text-start">{{ __('Francais') }}</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="{{ route('actions.language.index', 'it') }}"
                        class="w-full flex flex-wrap gap-2 px-2 py-1 text-x-black items-center outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ Core::lang('it') ? '!bg-x-black' : '' }}">
                        <img src="{{ asset('lang/it.png') }}?v={{ env('APP_VERSION') }}" alt="arabic flag"
                            class="block w-6 h-4 object-contain" />
                        <span class="block flex-1 text-base text-start">{{ __('Italian') }}</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="{{ route('actions.language.index', 'sp') }}"
                        class="w-full flex flex-wrap gap-2 px-2 py-1 text-x-black items-center outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ Core::lang('sp') ? '!bg-x-black' : '' }}">
                        <img src="{{ asset('lang/sp.png') }}?v={{ env('APP_VERSION') }}" alt="arabic flag"
                            class="block w-6 h-4 object-contain" />
                        <span class="block flex-1 text-base text-start">{{ __('Spanish') }}</span>
                    </a>
                </li>
            </ul>
        </neo-dropdown>
    </neo-topbar>
</header>
