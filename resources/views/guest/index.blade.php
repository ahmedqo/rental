@extends('shared.guest.base')
@section('title', __('Home'))

@section('content')
    <section class="bg-x-acent bg-opacity-30">
        <div class="w-full mx-auto container p-4">
            <div class="flex flex-col lg:flex-row lg:items-center gap-10 my-6 lg:my-20">
                <div class="w-full flex flex-col">
                    <span class="text-xl lg:text-2xl text-x-black font-x-huge">{{ __('Plan your trip now') }}</span>
                    <h1 class="font-x-huge text-x-prime text-4xl lg:text-6xl !leading-[2.6rem] lg:!leading-[4.3rem]">
                        {{ __('Fast And Easy Way To Rent A Car.') }}
                    </h1>
                    <ul class="w-full grid grid-rows-1 grid-cols-1 gap-4 mt-8">
                        <li class="w-full flex flex-wrap items-center gap-2">
                            <svg class="block w-6 h-6 pointer-events-none text-x-prime" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                            </svg>
                            <span class="text-lg lg:text-xl text-x-black font-x-thin">{{ __('Free Replacement') }}</span>
                        </li>
                        <li class="w-full flex flex-wrap items-center gap-2">
                            <svg class="block w-6 h-6 pointer-events-none text-x-prime" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                            </svg>
                            <span class="text-lg lg:text-xl text-x-black font-x-thin">{{ __('Free Cancellation') }}</span>
                        </li>
                        <li class="w-full flex flex-wrap items-center gap-2">
                            <svg class="block w-6 h-6 pointer-events-none text-x-prime" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                            </svg>
                            <span class="text-lg lg:text-xl text-x-black font-x-thin">{{ __('All-Risk Coverage') }}</span>
                        </li>
                        <li class="w-full flex flex-wrap items-center gap-2">
                            <svg class="block w-6 h-6 pointer-events-none text-x-prime" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                            </svg>
                            <span class="text-lg lg:text-xl text-x-black font-x-thin">{{ __('No Hidden Fees') }}</span>
                        </li>
                        <li class="w-full flex flex-wrap items-center gap-2">
                            <svg class="block w-6 h-6 pointer-events-none text-x-prime" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                            </svg>
                            <span class="text-lg lg:text-xl text-x-black font-x-thin">{{ __('24/7 Support') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="w-full -order-1 lg:order-1">
                    <form action="{{ route('views.guest.fleet') }}"
                        class="grid grid-rows-1 grid-cols-2 gap-6 p-6 rounded-x-huge bg-x-white">
                        <h2 class="font-x-thin text-x-black text-3xl lg:text-4xl col-span-2">
                            {{ __('Find Your Car') }}
                        </h2>
                        <neo-select label="{{ __('Location') }}" name="location"
                            class="bg-transparent py-3 px-5 col-span-2 custom">
                            @foreach (Core::locationList() as $location)
                                <neo-select-item value="{{ $location }}">
                                    {{ __(ucwords($location)) }}
                                </neo-select-item>
                            @endforeach
                            <svg slot="end" class="block w-[1.2rem] h-[1.2rem] pointer-events-none text-x-black"
                                viewBox="0 -960 960 960" fill="currentColor">
                                <path
                                    d="M479.77 12Q303 12 191.5-44.11 80-100.23 80-189q0-43.06 30-80.53T196-335l94 103q-18 6-39 17t-36 24q21.49 27.2 101.28 47.1Q396.07-124 481.25-124q86.02 0 164.81-20.3T746-191q-16-14-37.81-24.86Q686.38-226.71 667-233l95-104q57 28 87.5 66.5t30.5 80.77q0 89.63-111.73 145.68Q656.54 12 479.77 12ZM481-154Q315.76-271 235.38-382.44T155-600.74q0-80.61 29.83-141.33 29.83-60.71 76.62-101.57 46.79-40.85 104.54-61.61Q423.74-926 480.31-926q56.9 0 115.53 20.93 58.63 20.92 104.87 61.77t75.77 101.49Q806-681.17 806-601.08q0 107.38-80.63 218.73Q644.73-271 481-154Zm.12-360q38.88 0 66.38-27.56 27.5-27.57 27.5-65.16 0-38.87-27.44-66.58Q520.13-701 481.5-701q-39.04 0-67.27 27.7Q386-645.59 386-607.22q0 38.38 28.12 65.8 28.12 27.42 67 27.42Z" />
                            </svg>
                        </neo-select>
                        <neo-datepicker full-day="3" label="{{ __('Pick-up Date') }}" name="pick-up-date"
                            class="bg-transparent py-3 px-5 custom start" value="#now" format="mmm dd"></neo-datepicker>
                        <neo-datepicker full-day="3" label="{{ __('Drop-off Date') }}" name="drop-off-date"
                            class="bg-transparent py-3 px-5 custom end" value="#now+1" format="mmm dd"></neo-datepicker>
                        <neo-timepicker label="{{ __('Pick-up Time') }}" class="bg-transparent py-3 px-5 custom start"
                            name="pick-up-time" value="#now" format="HH:MM AA"></neo-timepicker>
                        <neo-timepicker label="{{ __('Drop-off Time') }}" class="bg-transparent py-3 px-5 custom end"
                            name="drop-off-time" value="#now" format="HH:MM AA"></neo-timepicker>
                        <div class="w-full flex col-span-2">
                            <neo-button
                                class="w-full lg:w-max lg:px-20 py-[.95rem] px-5 text-lg font-x-huge text-x-white bg-x-core bg-gradient-to-br rtl:bg-gradient-to-bl">
                                <span>{{ __('custom') }}</span>
                            </neo-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @if ($cars->count())
        <section class="my-8 lg:my-10">
            <div class="w-full mx-auto container p-4">
                <div class="flex flex-col gap-6 lg:gap-10">
                    <div class="flex flex-col">
                        <h2 class="text-base lg:text-lg font-x-thin text-center text-x-prime">
                            {{ __('EXPLORE AWSOME CARS') }}
                        </h2>
                        <h3 class="text-2xl lg:text-3xl font-x-huge text-center text-x-black">
                            {{ __('RECOMMENDED FOR YOU') }}
                        </h3>
                    </div>
                    <div class="w-full flex flex-wrap items-center">
                        <button id="ui-car-prev" aria-label="prev_arrow"
                            class="flex items-center justify-center w-8 h-8 rounded-full outline outline-1 outline-x-prime bg-x-white -me-2 z-[1] relative isolate overflow-hidden after:z-[-1] after:content-[''] after:absolute after:w-full after:h-full after:inset-0 hover:after:bg-x-prime hover:after:bg-opacity-20 focus:after:bg-x-prime focus:after:bg-opacity-20">
                            <svg class="block w-5 h-5 pointer-events-none text-x-prime" viewBox="0 -960 960 960"
                                fill="currentColor">
                                <path d="M423-59 2-480l421-421 78 79-342 342 342 342-78 79Z" />
                            </svg>
                        </button>
                        <div id="ui-car-carousel" class="flex-[1] w-0">
                            <ul>
                                @foreach ($cars as $car)
                                    <li class="w-full">
                                        <a href="{{ route('views.guest.show', $car->slug) }}" draggable="false"
                                            class="w-full flex flex-wrap gap-4 p-4 border border-x-shade rounded-x-thin">
                                            <ul class="w-full col-span-2 flex flex-col gap-2 flex-[2]">
                                                <li class="w-full">
                                                    <h4 class="text-xl text-x-prime font-x-huge -mb-2">
                                                        {{ strtoupper($car->Category->name) }}
                                                    </h4>
                                                </li>
                                                <li class="w-full">
                                                    <h5 class="text-base text-x-black font-x-thin">
                                                        {{ ucwords($car->name) }} ({{ ucwords(__('or similar')) }})
                                                    </h5>
                                                </li>
                                                <li class="w-full mt-2">
                                                    <ul class="w-full flex flex-wrap gap-2">
                                                        <li class="w-max flex flex-wrap items-center gap-2">
                                                            <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                                <path
                                                                    d="M480.16-502Q395-502 336.5-561T278-704.5q0-84.5 58.34-142.5t143.5-58q85.16 0 143.66 57.89T682-704q0 84-58.34 143t-143.5 59ZM114-86v-159q0-46.77 23.79-84.47Q161.58-367.16 201-387q66-34 136.17-51 70.18-17 142.55-17Q554-455 624-438t135 50q39.42 19.69 63.21 57.11T846-245.05V-86H114Z" />
                                                            </svg>
                                                            <span
                                                                class="text-base text-x-black text-opacity-50 font-normal">
                                                                {{ $car->passengers }} {{ __('Passengers') }}
                                                            </span>
                                                        </li>
                                                        <li class="w-max flex flex-wrap items-center gap-2">
                                                            <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                                <path
                                                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                                                            </svg>
                                                            <span
                                                                class="text-base text-x-black text-opacity-50 font-normal">
                                                                {{ $car->doors }} {{ __('Doors') }}
                                                            </span>
                                                        </li>
                                                        <li class="w-max flex flex-wrap items-center gap-2">
                                                            <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                                <path
                                                                    d="M440-760h80v-81h-80v81Zm40 272q-91 0-171.5-40T151-615v-9q0-57.38 39.31-96.69Q229.63-760 287-760h48v-136q0-21.4 14.01-35.7Q363.02-946 384-946h192q20.97 0 34.99 14.3Q625-917.4 625-896v136h48q57.38 0 96.69 39.31Q809-681.38 809-624v9q-76 47-157 87t-172 40ZM287-14v-55q-57.4 0-96.7-40.01Q151-149.02 151-205v-297q63 41 132 72.5T427-384v50h106v-50q75-13 143.5-45T809-502v297q0 55.98-39.31 95.99T673-69v55H567v-55H393v55H287Z" />
                                                            </svg>
                                                            <span
                                                                class="text-base text-x-black text-opacity-50 font-normal">
                                                                {{ $car->cargo }} {{ __('sutecase') }}
                                                            </span>
                                                        </li>
                                                        <li class="w-max flex flex-wrap items-center gap-2">
                                                            <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                                <path
                                                                    d="M132.76-74Q71-74 28-117.17-15-160.33-15-222q0-43.46 22.5-78.23T65-353v-254q-35-18-57.5-52.77T-15-738q0-61.67 43.24-104.83Q71.47-886 133.24-886 195-886 238-842.83q43 43.16 43 104.83 0 43.46-22.5 78.23T201-607v59h211v-59q-35-18-57.5-52.77T332-738q0-61.67 43.24-104.83 43.23-43.17 105-43.17Q542-886 585-842.83q43 43.16 43 104.83 0 43.46-22.5 78.23T548-607v59h199q5.7 0 8.85-3.15Q759-554.3 759-560v-46.98q-35-18.02-57.5-52.79Q679-694.54 679-738q0-61.67 43.5-104.83Q766-886 827.47-886t104.5 43.17Q975-799.67 975-738q0 43.46-22 78.23t-58 52.79V-560q0 61.67-43.17 104.83Q808.67-412 747-412H548v59q35 18 57.5 52.77T628-222q0 61.67-43.24 104.83Q541.53-74 479.76-74 418-74 375-117.17 332-160.33 332-222q0-43.46 22.5-78.23T412-353v-59H201v59q35 18 57.5 52.77T281-222q0 61.67-43.24 104.83Q194.53-74 132.76-74Z" />
                                                            </svg>
                                                            <span
                                                                class="text-base text-x-black text-opacity-50 font-normal">
                                                                {{ __(ucwords($car->transmission)) }}
                                                            </span>
                                                        </li>
                                                        <li class="w-max flex flex-wrap items-center gap-2">
                                                            <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                                <path
                                                                    d="M101-62v-700q0-57.13 39.44-96.56Q179.88-898 237-898h242q57.13 0 96.56 39.44Q615-819.13 615-762v317h54q39.9 0 68.45 27.64Q766-389.71 766-349v175q0 13.18 8.48 22.09 8.49 8.91 21.03 8.91 12.97 0 21.73-8.91T826-174v-350q-7.62 3-16.31 4-8.69 1-17.69 1-46.74 0-79.87-32.82T679-634.16q0-30.84 16-58.34 16-27.5 45-42.5l-80-80 56-57 131 126q24 24.18 42 51.59Q907-667 907-634v460.51q0 46.85-31.68 79.17T795.64-62q-47.58 0-79.11-32.22T685-174v-190h-70v302H101Zm136-503h242v-197H237v197Zm556-36q13.45 0 23.22-9.34 9.78-9.35 9.78-23.16t-9.77-23.16q-9.77-9.34-23.21-9.34-14.44 0-23.73 9.34-9.29 9.35-9.29 23.16t9.49 23.16Q778.98-601 793-601Z" />
                                                            </svg>
                                                            <span
                                                                class="text-base text-x-black text-opacity-50 font-normal">
                                                                {{ __(ucwords($car->fuel)) }}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul class="w-full flex flex-col items-end flex-[1] min-w-20 my-auto">
                                                <li class="w-full">
                                                    <img src="{{ $car->Images[0]->Link }}"
                                                        alt="{{ ucwords($car->name) }} Image" loading="lazy"
                                                        class="block w-full aspect-square object-contain object-center" />
                                                </li>
                                                <li class="text-2xl text-x-black font-x-huge mt-2">
                                                    {{ $car->price * Core::rate() }} {{ __('$') }}
                                                </li>
                                                <li class="text-xs text-x-black font-normal">
                                                    {{ __('Per Day') }}
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <button id="ui-car-next" aria-label="next_arrow"
                            class="flex items-center justify-center w-8 h-8 rounded-full outline outline-1 outline-x-prime bg-x-white -ms-2 z-[1] relative isolate overflow-hidden after:z-[-1] after:content-[''] after:absolute after:w-full after:h-full after:inset-0 hover:after:bg-x-prime hover:after:bg-opacity-20 focus:after:bg-x-prime focus:after:bg-opacity-20">
                            <svg class="block w-5 h-5 pointer-events-none text-x-prime" viewBox="0 -960 960 960"
                                fill="currentColor">
                                <path d="m305-61-79-79 342-342-342-342 79-79 420 421L305-61Z" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col items-center mt-2">
                        <h4 class="text-lg text-x-black font-x-huge">
                            {{ __('Don\'t see what you\'re looking for?') }}
                        </h4>
                        <h5 class="text-basse text-x-black font-normal">
                            {{ __('See all car rentals') }}
                        </h5>
                        <a href="{{ route('views.guest.fleet') }}"
                            class="w-max mx-auto block px-6 py-2 text-base text-x-prime font-x-huge border-2 border-x-prime border-opacity-60 rounded-full outline-none hover:bg-x-prime hover:bg-opacity-20 focus:bg-x-prime focus:bg-opacity-20 mt-4">
                            {{ __('VIEW ALL CARS') }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="my-8 lg:my-10 bg-x-light bg-repeat"
        style="background-image: url({{ asset('img/pattern-1.png') }}?v={{ env('APP_VERSION') }})">
        <div class="w-full mx-auto container p-4 my-6 lg:my-10">
            <div class="flex flex-col gap-6 lg:gap-10">
                <div class="flex flex-col">
                    <h2 class="text-base lg:text-lg font-x-thin text-center text-x-prime">
                        {{ __('WHY CHOOSE US') }}
                    </h2>
                    <h3 class="text-2xl lg:text-3xl font-x-huge text-center text-x-black">
                        {{ __('EXCELLENCE IS OUR STANDARD') }}
                    </h3>
                </div>
                <ul class="w-full grid grid-rows-1 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                    @php
                        $array = [
                            [
                                'title' => __('Free Replacement'),
                                'desc' => __('Need a different car? We\'ll replace it at no extra cost.'),
                            ],
                            [
                                'title' => __('Free Cancellation'),
                                'desc' => __('Plans changed? Cancel anytime without any charges.'),
                            ],
                            [
                                'title' => __('All-Risk Coverage'),
                                'desc' => __('Enjoy peace of mind with our all-risk coverage.'),
                            ],
                            [
                                'title' => __('No Hidden Fees'),
                                'desc' => __('No surprises, transparent pricing. What you see is what you pay.'),
                            ],
                            [
                                'title' => __('24/7 Support'),
                                'desc' => __('We\'re here for you, day and night, whenever you need us.'),
                            ],
                            [
                                'title' => __('Easy Transportation'),
                                'desc' => __('Convenient pick-up and drop-off locations for hassle-free travel.'),
                            ],
                            [
                                'title' => __('Affordable Pricing'),
                                'desc' => __('Competitive rates that fit your budget.'),
                            ],
                            [
                                'title' => __('Reliable Cars'),
                                'desc' => __('Well-maintained and dependable vehicles.'),
                            ],
                        ];
                    @endphp
                    @foreach ($array as $arr)
                        <li class="w-full flex flex-col items-center md:items-start gap-1 p-4 rounded-x-thin bg-x-white">
                            <span
                                class="w-14 h-14 flex items-center justify-center rounded-x-thin bg-x-acent bg-opacity-30">
                                <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 -960 960 960"
                                    fill="currentColor">
                                    <path
                                        d="M261-167-5-433l95-95 172 171 95 95-96 95Zm240-32L232-467l97-95 172 171 369-369 96 96-465 465Zm-7-280-95-95 186-186 95 95-186 186Z" />
                                </svg>
                            </span>
                            <h4 class="text-xl text-center md:text-start text-x-black font-x-huge mt-2">
                                {{ $arr['title'] }}
                            </h4>
                            <p class="text-base text-center md:text-start text-x-black text-opacity-80 font-x-thin">
                                {{ $arr['desc'] }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @if ($blogs->count())
        <section class="my-8 lg:my-10">
            <div class="w-full mx-auto container p-4">
                <div class="flex flex-col gap-6 lg:gap-10">
                    <div class="flex flex-col">
                        <h2 class="text-base lg:text-lg font-x-thin text-center text-x-prime">
                            {{ __('BLOG NEWS') }}
                        </h2>
                        <h3 class="text-2xl lg:text-3xl font-x-huge text-center text-x-black">
                            {{ __('LATEST HEADLINES') }}
                        </h3>
                    </div>
                    <div class="w-full flex flex-wrap items-center relative">
                        <button id="ui-blog-prev" aria-label="prev_arrow"
                            class="flex items-center justify-center w-8 h-8 rounded-full absolute left-4 outline outline-2 outline-x-white bg-x-white -me-4 z-[1] isolate overflow-hidden after:z-[-1] after:content-[''] after:absolute after:w-full after:h-full after:inset-0 after:bg-x-black after:bg-opacity-80 hover:after:bg-x-prime hover:after:bg-opacity-70 focus:after:bg-x-prime focus:after:bg-opacity-70">
                            <svg class="block w-5 h-5 pointer-events-none text-x-white" viewBox="0 -960 960 960"
                                fill="currentColor">
                                <path d="M423-59 2-480l421-421 78 79-342 342 342 342-78 79Z" />
                            </svg>
                        </button>
                        <div id="ui-blog-carousel" class="w-full">
                            <ul>
                                @foreach ($blogs as $blog)
                                    <li class="w-full">
                                        <a href="{{ route('views.guest.blog', $blog->slug) }}"
                                            class="flex items-end p-4 w-full rounded-x-thin overflow-hidden aspect-video sm:aspect-[8/10] relative isolate">
                                            <img src="{{ $blog->Image->Link }}"
                                                alt="{{ $blog->title }} Thumbnail Image" loading="lazy"
                                                class="w-full h-full block absolute inset-0 object-cover object-center z-[-2]" />
                                            <div
                                                class="w-full h-full absolute inset-0 z-[-1] bg-gradient-to-b from-transparent via-transparent to-x-black">
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <h4 class="text-x-white font-x-thin text-lg">
                                                    {{ $blog->title }}
                                                </h4>
                                                <div class="w-full flex flex-wrap items-center gap-2">
                                                    <svg class="block w-3 h-3 pointer-events-none text-x-white text-opacity-70"
                                                        fill="currentcolor" viewBox="0 -960 960 960">
                                                        <path
                                                            d="M568-272 412-428v-228h136v171l115 116-95 97ZM412-716v-136h136v136H412Zm304 304v-136h136v136H716ZM412-108v-136h136v136H412ZM108-412v-136h136v136H108ZM480-34q-92.64 0-174.47-34.6-81.82-34.61-142.07-94.86T68.6-305.53Q34-387.36 34-480q0-92.9 34.66-174.45 34.67-81.55 95.18-141.94 60.51-60.39 142.07-95Q387.48-926 480-926q92.89 0 174.48 34.59 81.59 34.6 141.96 94.97 60.37 60.37 94.97 141.99Q926-572.83 926-479.92q0 92.92-34.61 174.25-34.61 81.32-95 141.83Q736-103.33 654.45-68.66 572.9-34 480-34Zm-.23-136q130.74 0 220.49-89.51Q790-349.03 790-479.77t-89.51-220.49Q610.97-790 480.23-790t-220.49 89.51Q170-610.97 170-480.23t89.51 220.49Q349.03-170 479.77-170Zm.23-310Z" />
                                                    </svg>
                                                    <span class="text-xs text-x-white text-opacity-70 font-x-thin">
                                                        {{ $blog->updated_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <button id="ui-blog-next" aria-label="next_arrow"
                            class="flex items-center justify-center w-8 h-8 rounded-full absolute right-4 outline outline-2 outline-x-white bg-x-white -ms-4 z-[1] isolate overflow-hidden after:z-[-1] after:content-[''] after:absolute after:w-full after:h-full after:inset-0 after:bg-x-black after:bg-opacity-80 hover:after:bg-x-prime hover:after:bg-opacity-70 focus:after:bg-x-prime focus:after:bg-opacity-70">
                            <svg class="block w-5 h-5 pointer-events-none text-x-white" viewBox="0 -960 960 960"
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
                                                XXX XXXX XXXXX XXXXX XXXXX
                                            </p>
                                        </li>
                                    </ul>
                                </a>
                            </li>
                            <li class="w-full">
                                <a href="mailto:" aria-label="email_address"
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
                                                test@test.com
                                            </p>
                                        </li>
                                    </ul>
                                </a>
                            </li>
                            <li class="w-full">
                                <a href="tel:" aria-label="phone_number"
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
                                                XXXXXXXXXX
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
    <script src="{{ asset('js/neo/plugins/fields.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    <script src="{{ asset('js/slider.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    @if (!Core::lang('en'))
        <script src="{{ asset('js/trans.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    @endif
    <script>
        const slider = Slider({
            root: document.querySelector("#ui-car-carousel"),
            prev: document.querySelector("#ui-car-prev"),
            next: document.querySelector("#ui-car-next"),
            opts: {
                drag: true,
                gaps: 24,
            }
        }).lg({
            cols: 2,
            move: 2,
        }).xl({
            cols: 3,
            move: 3,
        });

        Slider({
            root: document.querySelector("#ui-blog-carousel"),
            prev: document.querySelector("#ui-blog-prev"),
            next: document.querySelector("#ui-blog-next"),
            opts: {
                drag: true,
                gaps: 24,
            }
        }).sm({
            cols: 2,
            move: 2,
        }).md({
            cols: 2,
            move: 2,
        }).lg({
            cols: 3,
            move: 3,
        }).xl({
            cols: 4,
            move: 4,
        });
    </script>
@endsection
