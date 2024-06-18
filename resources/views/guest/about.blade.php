@extends('shared.guest.base')
@section('title', __('About us'))

@section('seo')
    <meta name="description" content="{{ Core::subString('') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">
    <meta property="og:title" content="{{ env('APP_NAME') }} {{ __('About us') }} Page">
    <meta property="og:description" content="{{ Core::subString('') }}">
    <meta property="og:image" content="">
    <meta property="og:url" content="{{ url(url()->full(), secure: true) }}">
    @if (Core::getSetting('x'))
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="{{ Core::getSetting('x') }}">
        <meta name="twitter:title" content="{{ env('APP_NAME') }} {{ __('About us') }} Page">
        <meta name="twitter:description" content="{{ Core::subString('') }}">
        <meta name="twitter:image" content="">
    @endif
@endsection

@section('content')
    <section>
        <hr class="border-t border-t-x-shade">
        <div class="w-full mx-auto container py-2">
            @include('shared.guest.crumbs', [
                'items' => [
                    [__('Home'), route('views.guest.index')],
                    [__('About us'), route('views.guest.about')],
                ],
            ])
        </div>
        <hr class="border-t border-t-x-shade">
    </section>
    <section class="my-8 lg:my-10">
        <div class="w-full mx-auto container p-4">
            <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-6 items-center">
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
                            {{ __(':company makes renting a car hastle free, our goal is to provide you with a simple and efficient way to make your booking without going through a long process. You will have access 24/7 to personalized assistance to help you make the most out of your holiday, customer service is a greaet deal for us and we take it seriously, so whatever you need, we will try our best to make it happen.', ['company' => env('APP_NAME')]) }}
                        </p>
                        <p class="text-base text-x-black font-medium">
                            {{ __('Our word is our currency. We will guarantee your car is ready for you before you arrive or 15 minutes before the pickup time in the exact location where you need it.') }}
                        </p>
                    </div>
                </div>
                <div class="w-full aspect-video min-h-[calc(100%+2rem)] rounded-x-thin bg-x-shade"></div>
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
                <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-6 items-center">
                    <div class="w-full aspect-video min-h-[calc(100%+2rem)] rounded-x-thin bg-x-shade"></div>
                    <div class="w-full flex flex-col gap-6 lg:gap-8">
                        <p class="text-lg lg:text-xl text-x-black text-opacity-70 font-normal">
                            {{ __('We\'re here for you and eager to help! Your satisfaction is our top priority. Contact us anytime, we can\'t wait to connect with you.') }}
                        </p>
                        <ul class="w-full flex flex-col gap-4 lg:gap-6">
                            <li class="w-full">
                                <a href="" aria-label="map_location"
                                    class="w-full flex flex-wrap gap-4 items-center">
                                    <span class="flex items-center justify-center p-4 bg-x-prime rounded-x-thin">
                                        <svg class="block w-5 h-5 pointer-events-none text-x-white" viewBox="0 -960 960 960"
                                            fill="currentColor">
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
                                                XXX XXXX XXXXX XXXXX XXXXX
                                            </p>
                                        </li>
                                    </ul>
                                </a>
                            </li>
                            <li class="w-full">
                                <a href="mailto:{{ Core::getSetting('contact_email') }}" aria-label="email_address"
                                    class="w-full flex flex-wrap gap-4 items-center">
                                    <span class="flex items-center justify-center p-4 bg-x-prime rounded-x-thin">
                                        <svg class="block w-5 h-5 pointer-events-none text-x-white" viewBox="0 -960 960 960"
                                            fill="currentColor">
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
