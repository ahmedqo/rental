@extends('shared.guest.base')
@section('title', __('Home'))

@section('content')
    <section class="bg-x-acent bg-opacity-30">
        <div class="w-full mx-auto container p-4">
            <div class="flex flex-col lg:flex-row gap-10 my-6 lg:my-20">
                <div class="w-full flex flex-col">
                    <span class="text-xl lg:text-2xl text-x-black font-x-huge">Plan your trip now</span>
                    <h1 class="font-x-huge text-x-prime text-4xl lg:text-6xl !leading-[2.6rem] lg:!leading-[4.3rem]">
                        Fast And Easy Way To Rent A Car.
                    </h1>
                    <ul class="w-full flex flex-col gap-2 mt-4">
                        <li class="w-full flex flex-wrap items-center gap-2">
                            <svg class="block w-6 h-6 pointer-events-none text-x-prime" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                            </svg>
                            <h6 class="text-lg lg:text-xl text-x-black font-x-thin">Free Cancelation</h6>
                        </li>
                        <li class="w-full flex flex-wrap items-center gap-2">
                            <svg class="block w-6 h-6 pointer-events-none text-x-prime" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                            </svg>
                            <h6 class="text-lg lg:text-xl text-x-black font-x-thin">No Hidden Fees</h6>
                        </li>
                        <li class="w-full flex flex-wrap items-center gap-2">
                            <svg class="block w-6 h-6 pointer-events-none text-x-prime" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                            </svg>
                            <h6 class="text-lg lg:text-xl text-x-black font-x-thin">24/7 Support</h6>
                        </li>
                    </ul>
                </div>
                <div class="w-full">
                    <form class="grid grid-rows-1 grid-cols-1 gap-4 p-6 rounded-x-huge bg-x-white">
                        <span class="font-x-thin text-x-black text-3xl lg:text-4xl py-2">
                            {{ __('Find Your Car') }}
                        </span>
                        <neo-explorer label="{{ __('Search') }}"
                            class="bg-transparent border-x-black py-3 px-5"></neo-explorer>
                        <neo-datepicker full-day="3" label="{{ __('Pick-up Date') }}"
                            class="bg-transparent border-x-black py-3 px-5" value="#now" format="mmm dd"></neo-datepicker>
                        <neo-datepicker full-day="3" label="{{ __('Drop-off Date') }}"
                            class="bg-transparent border-x-black py-3 px-5" value="#now+1" format="mmm dd"></neo-datepicker>
                        <div class="w-full flex">
                            <neo-button
                                class="w-full lg:w-max lg:px-20 py-3 px-5 text-base lg:text-lg font-x-huge text-x-white bg-x-core bg-gradient-to-br rtl:bg-gradient-to-bl">
                                <span>{{ __('Search') }}</span>
                            </neo-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="hidden">
        <div class="w-full mx-auto container p-4">
            <form class="grid grid-rows-1 grid-cols-2 gap-4">
                <neo-explorer label="{{ __('Search') }}" class="col-span-2 bg-transparent border-x-black"></neo-explorer>
                <neo-datepicker full-day="3" label="{{ __('Pick-up Date') }}" class="bg-transparent border-x-black"
                    value="#now" format="mmm dd"></neo-datepicker>
                <neo-datepicker full-day="3" label="{{ __('Drop-off Date') }}" class="bg-transparent border-x-black"
                    value="#now+1" format="mmm dd"></neo-datepicker>
                <div class="w-full flex lg:col-span-2">
                    <neo-button
                        class="w-full lg:w-max lg:px-20 px-4 py-2 text-base lg:text-lg font-x-huge text-x-white bg-x-core bg-gradient-to-br rtl:bg-gradient-to-bl">
                        <span>{{ __('Search') }}</span>
                    </neo-button>
                </div>
            </form>
        </div>
    </section>
    <section class="my-8 lg:my-10">
        <div class="w-full mx-auto container p-4">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col">
                    <h2 class="text-base lg:text-lg font-x-thin text-center text-x-prime">
                        {{ __('EXPLORE AWSOME CARS') }}
                    </h2>
                    <h3 class="text-2xl lg:text-3xl font-x-huge text-center text-x-black">
                        {{ __('RECOMMENDED FOR YOU') }}
                    </h3>
                </div>
                <ul class="grid grid-rows-1 grid-cols-1 lg:grid-cols-3 gap-4">
                    @for ($i = 0; $i < 6; $i++)
                        <li class="w-full flex flex-wrap gap-4 p-4 border border-x-shade rounded-x-huge">
                            <ul class="w-full col-span-2 flex flex-col gap-2 flex-[2]">
                                <li class="w-full">
                                    <h4 class="text-base text-x-prime font-x-thin -mb-1">
                                        Midsize
                                    </h4>
                                </li>
                                <li class="w-full">
                                    <h5 class="text-xl text-x-black font-x-huge">
                                        Toyota Corolla or similar
                                    </h5>
                                </li>
                                <li class="w-full mt-auto">
                                    <ul class="w-full flex flex-wrap gap-2">
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-6 h-6 pointer-events-none text-x-black" fill="currentcolor"
                                                viewBox="0 -960 960 960">
                                                <path
                                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                                            </svg>
                                            <h6 class="text-lg text-x-black font-normal">5 people</h6>
                                        </li>
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-6 h-6 pointer-events-none text-x-black" fill="currentcolor"
                                                viewBox="0 -960 960 960">
                                                <path
                                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                                            </svg>
                                            <h6 class="text-lg text-x-black font-normal">Unlimited</h6>
                                        </li>
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-6 h-6 pointer-events-none text-x-black" fill="currentcolor"
                                                viewBox="0 -960 960 960">
                                                <path
                                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                                            </svg>
                                            <h6 class="text-lg text-x-black font-normal">5 people</h6>
                                        </li>
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-6 h-6 pointer-events-none text-x-black" fill="currentcolor"
                                                viewBox="0 -960 960 960">
                                                <path
                                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                                            </svg>
                                            <h6 class="text-lg text-x-black font-normal">Unlimited mileage</h6>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="w-full flex flex-col items-end flex-[1] min-w-28">
                                <li class="w-full my-auto">
                                    <img src="{{ asset('img/logo.webp') }}?v={{ env('APP_VERSION') }}" alt=""
                                        loading="lazy" class="block w-full aspect-video object-contain object-center" />
                                </li>
                                <li class="text-2xl text-x-black font-x-huge mt-2">
                                    $28
                                </li>
                                <li class="text-xs text-x-black font-normal">
                                    Per Day
                                </li>
                            </ul>
                        </li>
                    @endfor
                </ul>
                <div class="flex flex-col items-center mt-4">
                    <h4 class="text-lg text-x-black font-x-huge">
                        {{ __('Don\'t see what you\'re looking for?') }}
                    </h4>
                    <h5 class="text-basse text-x-black font-normal">
                        {{ __('See all car rentals') }}
                    </h5>
                    <a href=""
                        class="w-max mx-auto block px-6 py-2 text-base text-x-prime font-x-huge border border-x-black border-opacity-60 rounded-full outline-none hover:bg-x-prime hover:bg-opacity-20 focus:bg-x-prime focus:bg-opacity-20 mt-4">
                        {{ __('VIEW ALL CARS') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="hidden">
        <div class="w-full mx-auto container p-4">
            <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-4 gap-4">
                <div></div>
                <ul class="w-full grid grid-rows-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 lg:col-span-3">
                    @for ($i = 0; $i < 6; $i++)
                        <li class="w-full flex flex-wrap gap-4 p-4 border border-x-shade rounded-x-huge">
                            <img src="{{ asset('img/logo.webp') }}?v={{ env('APP_VERSION') }}" alt=""
                                loading="lazy" class="hidden lg:block w-3/12 aspect-video object-contain object-center" />
                            <ul class="w-full col-span-2 flex flex-col gap-2 flex-[2]">
                                <li class="w-full">
                                    <h4 class="text-base text-x-prime font-x-thin -mb-1">
                                        Midsize
                                    </h4>
                                </li>
                                <li class="w-full">
                                    <h5 class="text-xl text-x-black font-x-huge">
                                        Toyota Corolla or similar
                                    </h5>
                                </li>
                                <li class="w-full mt-auto lg:mb-auto">
                                    <ul class="w-full lg:w-2/3 flex flex-wrap gap-2">
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-6 h-6 pointer-events-none text-x-black"
                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                <path
                                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                                            </svg>
                                            <h6 class="text-lg text-x-black font-normal">5 people</h6>
                                        </li>
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-6 h-6 pointer-events-none text-x-black"
                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                <path
                                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                                            </svg>
                                            <h6 class="text-lg text-x-black font-normal">Unlimited</h6>
                                        </li>
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-6 h-6 pointer-events-none text-x-black"
                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                <path
                                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                                            </svg>
                                            <h6 class="text-lg text-x-black font-normal">5 people</h6>
                                        </li>
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-6 h-6 pointer-events-none text-x-black"
                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                <path
                                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                                            </svg>
                                            <h6 class="text-lg text-x-black font-normal">Unlimited mileage</h6>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="w-full flex flex-col items-end flex-[1] min-w-28 lg:min-w-0 lg:my-auto">
                                <li class="w-full my-auto lg:hidden">
                                    <img src="{{ asset('img/logo.webp') }}?v={{ env('APP_VERSION') }}" alt=""
                                        loading="lazy" class="block w-full aspect-video object-contain object-center" />
                                </li>
                                <li class="text-2xl lg:text-4xl text-x-black font-x-huge mt-2">
                                    $28
                                </li>
                                <li class="text-xs lg:text-base text-x-black font-normal">
                                    Per Day
                                </li>
                                <li>
                                    <a href=""
                                        class="hidden lg:block w-max px-6 py-2 bg-x-prime text-x-white font-x-huge mt-4">
                                        Reserve
                                    </a>
                                </li>
                            </ul>
                            <a href=""
                                class="block lg:hidden w-full px-12 py-2 bg-x-prime text-x-white font-x-huge text-center">
                                Reserve
                            </a>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </section>
@endsection
