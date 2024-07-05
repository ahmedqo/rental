@extends('shared.guest.base')
@section('title', __('About Us'))

@section('seo')
    <meta name="description" content="{{ Core::subString('') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ env('COMPANY_NAME') }}">
    <meta property="og:title" content="{{ env('COMPANY_NAME') }} {{ __('About Us') }} Page">
    <meta property="og:description" content="{{ Core::subString('') }}">
    <meta property="og:image" content="{{ url(asset('img/logo.webp'), secure: true) }}?v={{ env('APP_VERSION') }}">
    <meta property="og:url" content="{{ url(url()->full(), secure: true) }}">
    @if (Core::getSetting('x'))
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="{{ Core::getSetting('x') }}">
        <meta name="twitter:title" content="{{ env('COMPANY_NAME') }} {{ __('About Us') }} Page">
        <meta name="twitter:description" content="{{ Core::subString('') }}">
        <meta name="twitter:image" content="{{ url(asset('img/logo.webp'), secure: true) }}?v={{ env('APP_VERSION') }}">
    @endif
    <script type="application/ld+json">
        {!! json_encode($json) !!}
    </script>
@endsection

@section('content')
    <section>
        <hr class="border-t border-t-x-shade">
        <div class="w-full mx-auto container py-2">
            @include('shared.guest.crumbs', [
                'items' => [
                    [__('Home'), route('views.guest.index')],
                    [__('About Us'), route('views.guest.about')],
                ],
            ])
        </div>
        <hr class="border-t border-t-x-shade">
    </section>
    <section class="my-8 lg:my-10">
        <div class="w-full mx-auto container p-4">
            <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div class="flex flex-col gap-6">
                    <div class="flex flex-col">
                        <h2 class="text-base lg:text-lg font-x-thin text-start text-x-prime">
                            {{ __('ABOUT US') }}
                        </h2>
                        <h3 class="text-2xl lg:text-3xl font-x-huge text-start text-x-black">
                            {{ __('WHO ARE WE') }}
                        </h3>
                    </div>
                    <div class="flex flex-col gap-4">
                        <p class="text-base text-x-black font-medium">
                            {{ __(':company makes renting a car hastle free, our goal is to provide you with a simple and efficient way to make your booking without going through a long process. You will have access 24/7 to personalized assistance to help you make the most out of your holiday, customer service is a greaet deal for us and we take it seriously, so whatever you need, we will try our best to make it happen.', ['company' => env('COMPANY_NAME')]) }}
                        </p>
                        <p class="text-base text-x-black font-medium">
                            {{ __('Our word is our currency. We will guarantee your car is ready for you before you arrive or 15 minutes before the pickup time in the exact location where you need it.') }}
                        </p>
                    </div>
                    @if (Core::getSetting('social', 'group'))
                        <ul class="flex gap-4 sm:gap-6 lg:gap-10 items-center justify-center flex-wrap me-auto mt-6">
                            @if (Core::getSetting('instagram'))
                                <li>
                                    <a href="{{ Core::getSetting('instagram') }}" aria-label="instagram_page"
                                        class="flex text-x-prime text-sm">
                                        <svg class="block w-8 h-8  sm:w-10 sm:h-10 pointer-events-none" fill="currentColor"
                                            viewBox="0 0 31 30">
                                            <path
                                                d="M8.7 0.250977H21.3C26.1 0.250977 30 4.15098 30 8.95098V21.551C30 23.8584 29.0834 26.0712 27.4518 27.7028C25.8203 29.3344 23.6074 30.251 21.3 30.251H8.7C3.9 30.251 0 26.351 0 21.551V8.95098C0 6.64359 0.916605 4.43071 2.54817 2.79915C4.17974 1.16758 6.39262 0.250977 8.7 0.250977ZM8.4 3.25098C6.96783 3.25098 5.59432 3.8199 4.58162 4.8326C3.56893 5.8453 3 7.21881 3 8.65098V21.851C3 24.836 5.415 27.251 8.4 27.251H21.6C23.0322 27.251 24.4057 26.6821 25.4184 25.6694C26.4311 24.6567 27 23.2831 27 21.851V8.65098C27 5.66598 24.585 3.25098 21.6 3.25098H8.4ZM22.875 5.50098C23.3723 5.50098 23.8492 5.69852 24.2008 6.05015C24.5525 6.40178 24.75 6.8787 24.75 7.37598C24.75 7.87326 24.5525 8.35017 24.2008 8.7018C23.8492 9.05343 23.3723 9.25098 22.875 9.25098C22.3777 9.25098 21.9008 9.05343 21.5492 8.7018C21.1975 8.35017 21 7.87326 21 7.37598C21 6.8787 21.1975 6.40178 21.5492 6.05015C21.9008 5.69852 22.3777 5.50098 22.875 5.50098ZM15 7.75098C16.9891 7.75098 18.8968 8.54115 20.3033 9.94768C21.7098 11.3542 22.5 13.2619 22.5 15.251C22.5 17.2401 21.7098 19.1478 20.3033 20.5543C18.8968 21.9608 16.9891 22.751 15 22.751C13.0109 22.751 11.1032 21.9608 9.6967 20.5543C8.29018 19.1478 7.5 17.2401 7.5 15.251C7.5 13.2619 8.29018 11.3542 9.6967 9.94768C11.1032 8.54115 13.0109 7.75098 15 7.75098ZM15 10.751C13.8065 10.751 12.6619 11.2251 11.818 12.069C10.9741 12.9129 10.5 14.0575 10.5 15.251C10.5 16.4445 10.9741 17.589 11.818 18.433C12.6619 19.2769 13.8065 19.751 15 19.751C16.1935 19.751 17.3381 19.2769 18.182 18.433C19.0259 17.589 19.5 16.4445 19.5 15.251C19.5 14.0575 19.0259 12.9129 18.182 12.069C17.3381 11.2251 16.1935 10.751 15 10.751Z">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                            @endif
                            @if (Core::getSetting('tiktok'))
                                <li>
                                    <a href="{{ Core::getSetting('tiktok') }}" aria-label="tiktok_page"
                                        class="flex text-x-prime text-sm">
                                        <svg class="block w-8 h-8  sm:w-10 sm:h-10 pointer-events-none" fill="currentColor"
                                            viewBox="0 0 32 32">
                                            <path
                                                d="M16.708 0.027c1.745-0.027 3.48-0.011 5.213-0.027 0.105 2.041 0.839 4.12 2.333 5.563 1.491 1.479 3.6 2.156 5.652 2.385v5.369c-1.923-0.063-3.855-0.463-5.6-1.291-0.76-0.344-1.468-0.787-2.161-1.24-0.009 3.896 0.016 7.787-0.025 11.667-0.104 1.864-0.719 3.719-1.803 5.255-1.744 2.557-4.771 4.224-7.88 4.276-1.907 0.109-3.812-0.411-5.437-1.369-2.693-1.588-4.588-4.495-4.864-7.615-0.032-0.667-0.043-1.333-0.016-1.984 0.24-2.537 1.495-4.964 3.443-6.615 2.208-1.923 5.301-2.839 8.197-2.297 0.027 1.975-0.052 3.948-0.052 5.923-1.323-0.428-2.869-0.308-4.025 0.495-0.844 0.547-1.485 1.385-1.819 2.333-0.276 0.676-0.197 1.427-0.181 2.145 0.317 2.188 2.421 4.027 4.667 3.828 1.489-0.016 2.916-0.88 3.692-2.145 0.251-0.443 0.532-0.896 0.547-1.417 0.131-2.385 0.079-4.76 0.095-7.145 0.011-5.375-0.016-10.735 0.025-16.093z">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                            @endif
                            @if (Core::getSetting('facebook'))
                                <li>
                                    <a href="{{ Core::getSetting('facebook') }}" aria-label="favebook_page"
                                        class="flex text-x-prime text-sm">
                                        <svg class="block w-8 h-8  sm:w-10 sm:h-10 pointer-events-none" fill="currentColor"
                                            viewBox="0 0 32 32">
                                            <path
                                                d="M 19.253906 2 C 15.311906 2 13 4.0821719 13 8.8261719 L 13 13 L 8 13 L 8 18 L 13 18 L 13 30 L 18 30 L 18 18 L 22 18 L 23 13 L 18 13 L 18 9.671875 C 18 7.884875 18.582766 7 20.259766 7 L 23 7 L 23 2.2050781 C 22.526 2.1410781 21.144906 2 19.253906 2 z" />
                                        </svg>
                                    </a>
                                </li>
                            @endif
                            @if (Core::getSetting('x'))
                                <li>
                                    <a href="{{ Core::getSetting('x') }}" aria-label="x_page"
                                        class="flex text-x-prime text-sm">
                                        <svg class="block w-8 h-8  sm:w-10 sm:h-10 pointer-events-none" fill="currentColor"
                                            viewBox="0 0 512 462.799">
                                            <path
                                                d="M403.229 0h78.506L310.219 196.04 512 462.799H354.002L230.261 301.007 88.669 462.799h-78.56l183.455-209.683L0 0h161.999l111.856 147.88L403.229 0zm-27.556 415.805h43.505L138.363 44.527h-46.68l283.99 371.278z">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                            @endif
                            @if (Core::getSetting('telegram'))
                                <li>
                                    <a href="{{ Core::getSetting('telegram') }}" aria-label="telegram_channel"
                                        class="flex text-x-prime text-sm">
                                        <svg class="block w-8 h-8  sm:w-10 sm:h-10 pointer-events-none" fill="currentColor"
                                            viewBox="0 0 50 50">
                                            <path
                                                d="M46.137,6.552c-0.75-0.636-1.928-0.727-3.146-0.238l-0.002,0C41.708,6.828,6.728,21.832,5.304,22.445	c-0.259,0.09-2.521,0.934-2.288,2.814c0.208,1.695,2.026,2.397,2.248,2.478l8.893,3.045c0.59,1.964,2.765,9.21,3.246,10.758	c0.3,0.965,0.789,2.233,1.646,2.494c0.752,0.29,1.5,0.025,1.984-0.355l5.437-5.043l8.777,6.845l0.209,0.125	c0.596,0.264,1.167,0.396,1.712,0.396c0.421,0,0.825-0.079,1.211-0.237c1.315-0.54,1.841-1.793,1.896-1.935l6.556-34.077	C47.231,7.933,46.675,7.007,46.137,6.552z M22,32l-3,8l-3-10l23-17L22,32z" />
                                        </svg>
                                    </a>
                                </li>
                            @endif
                            @if (Core::getSetting('youtube'))
                                <li>
                                    <a href="{{ Core::getSetting('youtube') }}" aria-label="youtube_channel"
                                        class="flex text-x-prime text-sm">
                                        <svg class="block w-8 h-8  sm:w-10 sm:h-10 pointer-events-none" fill="currentColor"
                                            viewBox="0 0 310 310">
                                            <path
                                                d="M297.917,64.645c-11.19-13.302-31.85-18.728-71.306-18.728H83.386c-40.359,0-61.369,5.776-72.517,19.938 C0,79.663,0,100.008,0,128.166v53.669c0,54.551,12.896,82.248,83.386,82.248h143.226c34.216,0,53.176-4.788,65.442-16.527 C304.633,235.518,310,215.863,310,181.835v-53.669C310,98.471,309.159,78.006,297.917,64.645z M199.021,162.41l-65.038,33.991 c-1.454,0.76-3.044,1.137-4.632,1.137c-1.798,0-3.592-0.484-5.181-1.446c-2.992-1.813-4.819-5.056-4.819-8.554v-67.764 c0-3.492,1.822-6.732,4.808-8.546c2.987-1.814,6.702-1.938,9.801-0.328l65.038,33.772c3.309,1.718,5.387,5.134,5.392,8.861 C204.394,157.263,202.325,160.684,199.021,162.41z">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    @endif
                </div>
                <div class="w-full aspect-[16/10] relative">
                    <img src="{{ asset('img/bg-about.webp') }}?v={{ env('APP_VERSION') }}"
                        alt="{{ env('COMPANY_NAME') }} logo image"
                        class="block w-10/12 ms-auto aspect-[10/6] rounded-x-thin border-2 border-x-prime object-cover object-center"
                        width="503" height="300" loading="lazy" />
                    <img src="{{ asset('img/bg-cover.webp') }}?v={{ env('APP_VERSION') }}"
                        alt="{{ env('COMPANY_NAME') }} logo image"
                        class="block w-8/12 aspect-[10/6] absolute left-0 bottom-0 border-2 border-x-prime rounded-x-thin object-cover object-center"
                        width="401" height="239" loading="lazy" />
                </div>
            </div>
        </div>
    </section>
    @if ($reviews->count())
        <section class="bg-x-light">
            <div class="w-full mx-auto container p-4 my-8 lg:my-10">
                <div class="flex flex-col gap-6 lg:gap-10">
                    <div class="flex flex-col">
                        <h2 class="text-base lg:text-lg font-x-thin text-center text-x-prime">
                            {{ __('LATEST REVIEWS') }}
                        </h2>
                        <h3 class="text-2xl lg:text-3xl font-x-huge text-center text-x-black">
                            {{ __('OUR CLIENTS FEEDBACK') }}
                        </h3>
                    </div>
                    <div class="w-full flex flex-wrap items-center relative">
                        <button id="ui-review-prev" aria-label="prev_arrow"
                            class="flex items-center justify-center w-6 h-6 rounded-full absolute left-2 outline outline-2 outline-x-white bg-x-white -me-4 z-[1] isolate overflow-hidden after:z-[-1] after:content-[''] after:absolute after:w-full after:h-full after:inset-0 after:bg-x-black after:bg-opacity-80 hover:after:bg-x-prime hover:after:bg-opacity-70 focus:after:bg-x-prime focus:after:bg-opacity-70">
                            <svg class="block w-3 h-3 pointer-events-none text-x-white" viewBox="0 -960 960 960"
                                fill="currentColor">
                                <path d="M423-59 2-480l421-421 78 79-342 342 342 342-78 79Z" />
                            </svg>
                        </button>
                        <div id="ui-review-carousel" class="w-full">
                            <ul>
                                @foreach ($reviews as $Review)
                                    <li class="w-full flex flex-col gap-4 rounded-x-thin bg-x-white p-6 px-12">
                                        <ul class="w-full flex gap-4 items-center flex-wrap">
                                            <li class="text-x-black font-x-huge text-base flex-[1]">
                                                {{ ucwords($Review->name) }}
                                            </li>
                                            <li class="w-max flex flex-wrap items-center gap-px">
                                                @for ($i = 1; $i < 6; $i++)
                                                    <svg class="block w-4 h-4 pointer-events-none {{ $Review->rate >= $i ? 'text-yellow-500' : 'text-x-black text-opacity-70' }}"
                                                        fill="currentcolor" viewBox="0 -960 960 960">
                                                        <path
                                                            d="M279.78-736.59 394-884q16.48-20.94 39.38-31.47Q456.29-926 480-926q25 0 47.67 10.53Q550.33-904.94 567-884l113.22 147.41L852-679q36 12 55 41.5t19 62.45q0 17.05-4.5 33.55Q917-525 906-510L797-353.41 801-187q0 47-34 79t-82 32q-2 0-23-2l-182-50-181.11 50.08Q293-76 287-75.5q-6 .5-12 .5-47.2 0-81.6-32.5Q159-140 160-188l4-165L53.79-510.33Q43-526 38.5-542.17 34-558.33 34-575q0-34 19.42-63.11Q72.84-667.21 109-679l170.78-57.59Z" />
                                                    </svg>
                                                @endfor
                                            </li>
                                        </ul>
                                        <p class="text-x-black text-base font-normal">
                                            {{ $Review->content }}
                                        </p>
                                        <span class="text-x-black text-opacity-50 font-x-huge text-sm">
                                            {{ $Review->updated_at }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <button id="ui-review-next" aria-label="next_arrow"
                            class="flex items-center justify-center w-6 h-6 rounded-full absolute right-2 outline outline-2 outline-x-white bg-x-white -ms-4 z-[1] isolate overflow-hidden after:z-[-1] after:content-[''] after:absolute after:w-full after:h-full after:inset-0 after:bg-x-black after:bg-opacity-80 hover:after:bg-x-prime hover:after:bg-opacity-70 focus:after:bg-x-prime focus:after:bg-opacity-70">
                            <svg class="block w-3 h-3 pointer-events-none text-x-white" viewBox="0 -960 960 960"
                                fill="currentColor">
                                <path d="m305-61-79-79 342-342-342-342 79-79 420 421L305-61Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="bg-x-acent bg-opacity-30 bg-repeat"
        style="background-image: url({{ asset('img/pattern-2.png') }}?v={{ env('APP_VERSION') }})">
        <div class="w-full mx-auto container p-4 my-8 lg:my-10">
            <div class="flex flex-col gap-6 lg:gap-10">
                <div class="flex flex-col">
                    <h2 class="text-base lg:text-lg font-x-thin text-center text-x-prime">
                        {{ __('CONTACT US') }}
                    </h2>
                    <h3 class="text-2xl lg:text-3xl font-x-huge text-center text-x-black">
                        {{ __('GET IN TOUCH') }}
                    </h3>
                </div>
                <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 items-center">
                    <div class="w-full aspect-video min-h-full rounded-x-thin bg-x-shade"></div>
                    <div class="w-full flex flex-col gap-6 lg:gap-8">
                        <p class="text-lg lg:text-xl text-x-black text-opacity-70 font-normal">
                            {{ __('We\'re here for you and eager to help! Your satisfaction is our top priority. Contact us anytime, we can\'t wait to connect with you.') }}
                        </p>
                        <ul class="w-full flex flex-col gap-4 lg:gap-6">
                            <li class="w-full">
                                <a href="{{ env('MAP_CONTACT_LINK') }}" aria-label="map_location"
                                    class="w-full flex flex-wrap gap-4 items-center">
                                    <span class="flex items-center justify-center p-4 bg-x-prime rounded-x-thin">
                                        <svg class="block w-5 h-5 pointer-events-none text-x-white"
                                            viewBox="0 -960 960 960" fill="currentColor">
                                            <path
                                                d="M479.511-83Q468-83 454.91-87q-13.089-4-22.91-13-48-38-99.503-89.226t-94.5-109.5Q195-357 167-421.938 139-486.875 139-555q0-159.719 103.253-253.86Q345.506-903 480-903q134.494 0 238.247 94.14Q822-714.719 822-555q0 68.125-28.5 133.062Q765-357 722.003-298.726t-94.5 109.5Q576-138 530-100q-11.955 9-25.466 13-13.512 4-25.023 4Zm.622-401Q512-484 534.5-506.133q22.5-22.133 22.5-54T534.367-614.5q-22.633-22.5-54.5-22.5T426-614.367q-22 22.633-22 54.5T426.133-506q22.133 22 54 22Z" />
                                        </svg>
                                    </span>
                                    <ul class="w-0 flex-[1] max-w-max flex flex-col">
                                        <li class="w-full">
                                            <h4 class="text-lg font-x-huge text-x-black">
                                                {{ __('Address') }}
                                            </h4>
                                        </li>
                                        <li class="w-full">
                                            <p class="text-sm font-semibold text-x-black text-opacity-60">
                                                {{ env('MAP_CONTACT_ADDRESS') }}
                                            </p>
                                        </li>
                                    </ul>
                                </a>
                            </li>
                            <li class="w-full">
                                <a href="mailto:{{ Core::getSetting('contact_email') }}" aria-label="email_address"
                                    class="w-full flex flex-wrap gap-4 items-center">
                                    <span class="flex items-center justify-center p-4 bg-x-prime rounded-x-thin">
                                        <svg class="block w-5 h-5 pointer-events-none text-x-white"
                                            viewBox="0 -960 960 960" fill="currentColor">
                                            <path
                                                d="M479-59q-85.352 0-162.749-32.73-77.398-32.731-134.804-89.841Q124.04-238.68 91.52-315.966 59-393.251 59-479.946q0-86.694 32.73-163.947 32.731-77.254 89.683-134.713 56.953-57.459 134.312-90.427Q393.084-902 479.862-902t164.15 33.101q77.371 33.1 134.756 90.13 57.384 57.029 90.308 134.647Q902-566.504 902-481v50.504q0 61.144-44.946 102.82Q812.107-286 750-286q-41.33 0-74.165-19Q643-324 626-358q-25 37-63.808 54.5T480.306-286q-80.721 0-138.014-56.561Q285-399.123 285-480.481q0-82.167 57.013-138.843Q399.026-676 479.625-676q80.6 0 137.987 56.68Q675-562.64 675-480v43.933q0 30.964 22.067 51.015Q719.133-365 749.977-365q29.41 0 50.216-20.052Q821-405.103 821-436.067V-481q0-141.7-99.703-240.85Q621.595-821 479.819-821q-141.775 0-241.297 99.703Q139-621.595 139-479.819q0 141.775 99.15 241.297Q337.3-139 479-139h176q17.15 0 28.075 11.479T694-99.017q0 17.649-10.925 28.833Q672.15-59 655-59H479Zm1.353-306Q527-365 561.5-399.544q34.5-34.544 34.5-80.75Q596-528 561.147-562.5t-81.5-34.5Q433-597 398.5-562.206q-34.5 34.794-34.5 82.5 0 46.206 34.853 80.456t81.5 34.25Z" />
                                        </svg>
                                    </span>
                                    <ul class="w-0 flex-[1] max-w-max flex flex-col">
                                        <li class="w-full">
                                            <h4 class="text-lg font-x-huge text-x-black">
                                                {{ __('Email') }}
                                            </h4>
                                        </li>
                                        <li class="w-full">
                                            <p class="text-sm font-semibold text-x-black text-opacity-60">
                                                {{ Core::getSetting('contact_email') }}
                                            </p>
                                        </li>
                                    </ul>
                                </a>
                            </li>
                            <li class="w-full">
                                <a href="tel:{{ Core::getSetting('contact_phone') }}" aria-label="phone_number"
                                    class="w-full flex flex-wrap gap-4 items-center">
                                    <span class="flex items-center justify-center p-4 bg-x-prime rounded-x-thin">
                                        <svg class="block w-5 h-5 pointer-events-none text-x-white"
                                            viewBox="0 -960 960 960" fill="currentColor">
                                            <path
                                                d="M793-99q-121 0-244.5-58T321-319Q216-423 157.5-548T99-792q0-29 20-49.5t49-20.5h135q31 0 51 16.5t26 47.5l27 106q2 26-3.5 47T383-611l-102 94q20 36 46.5 68.5T385-387q33 36 67 61.5t69 44.5l99-99q16-18 37.5-24.5t46.5-.5l95 22q30 9 46.5 29t16.5 50v136q0 29-20.5 49T793-99Z" />
                                        </svg>
                                    </span>
                                    <ul class="w-0 flex-[1] max-w-max flex flex-col">
                                        <li class="w-full">
                                            <h4 class="text-lg font-x-huge text-x-black">
                                                {{ __('Phone') }}
                                            </h4>
                                        </li>
                                        <li class="w-full">
                                            <p class="text-sm font-semibold text-x-black text-opacity-60">
                                                {{ Core::getSetting('contact_phone') }}
                                            </p>
                                        </li>
                                    </ul>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @if ($reviews->count())
        <script src="{{ asset('js/slider.min.js') }}?v={{ env('APP_VERSION') }}"></script>
        <script src="{{ asset('js/about.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    @endif
@endsection
