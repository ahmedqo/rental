@extends('shared.guest.base')
@section('title', __('Home'))

@section('content')
    <section class="bg-x-acent bg-opacity-30">
        <div class="w-full mx-auto container p-4">
            <div class="flex flex-col lg:flex-row gap-10 my-6 lg:my-20">
                <div class="w-full flex flex-col">
                    <span class="text-xl lg:text-2xl text-x-black font-x-huge">{{ __('Plan your trip now') }}</span>
                    <h1 class="font-x-huge text-x-prime text-4xl lg:text-6xl !leading-[2.6rem] lg:!leading-[4.3rem]">
                        {{ __('Fast And Easy Way To Rent A Car.') }}
                    </h1>
                    <ul class="w-full flex flex-col gap-2 mt-4">
                        <li class="w-full flex flex-wrap items-center gap-2">
                            <svg class="block w-6 h-6 pointer-events-none text-x-prime" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                            </svg>
                            <span class="text-lg lg:text-xl text-x-black font-x-thin">{{ __('Free Cancelation') }}</span>
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
                <div class="w-full">
                    <form action="{{ route('views.guest.fleet') }}"
                        class="grid grid-rows-1 grid-cols-2 gap-6 p-6 rounded-x-huge bg-x-white">
                        <h2 class="font-x-thin text-x-black text-3xl lg:text-4xl col-span-2">
                            {{ __('Find Your Car') }}
                        </h2>
                        <neo-select label="{{ __('Location') }}" name="location"
                            class="bg-transparent py-3 px-5 col-span-2 search">
                            <neo-select-item value="airport">
                                {{ __(ucwords('Airport')) }}
                            </neo-select-item>
                            <neo-select-item value="city center">
                                {{ __(ucwords('City Center')) }}
                            </neo-select-item>
                            <svg slot="end" class="block w-[1.2rem] h-[1.2rem] pointer-events-none text-x-black"
                                viewBox="0 -960 960 960" fill="currentColor">
                                <path
                                    d="M479.77 12Q303 12 191.5-44.11 80-100.23 80-189q0-43.06 30-80.53T196-335l94 103q-18 6-39 17t-36 24q21.49 27.2 101.28 47.1Q396.07-124 481.25-124q86.02 0 164.81-20.3T746-191q-16-14-37.81-24.86Q686.38-226.71 667-233l95-104q57 28 87.5 66.5t30.5 80.77q0 89.63-111.73 145.68Q656.54 12 479.77 12ZM481-154Q315.76-271 235.38-382.44T155-600.74q0-80.61 29.83-141.33 29.83-60.71 76.62-101.57 46.79-40.85 104.54-61.61Q423.74-926 480.31-926q56.9 0 115.53 20.93 58.63 20.92 104.87 61.77t75.77 101.49Q806-681.17 806-601.08q0 107.38-80.63 218.73Q644.73-271 481-154Zm.12-360q38.88 0 66.38-27.56 27.5-27.57 27.5-65.16 0-38.87-27.44-66.58Q520.13-701 481.5-701q-39.04 0-67.27 27.7Q386-645.59 386-607.22q0 38.38 28.12 65.8 28.12 27.42 67 27.42Z" />
                            </svg>
                        </neo-select>
                        <neo-datepicker full-day="3" label="{{ __('Pick-up Date') }}" name="pick-up-date"
                            class="bg-transparent py-3 px-5" value="#now" format="mmm dd"></neo-datepicker>
                        <neo-datepicker full-day="3" label="{{ __('Drop-off Date') }}" name="drop-off-date"
                            class="bg-transparent py-3 px-5" value="#now+1" format="mmm dd"></neo-datepicker>
                        <neo-timepicker label="{{ __('Pick-up Time') }}" class="bg-transparent py-3 px-5"
                            name="pick-up-time" value="#now" format="HH:MM AA"></neo-timepicker>
                        <neo-timepicker label="{{ __('Drop-off Time') }}" class="bg-transparent py-3 px-5"
                            name="drop-off-time" value="#now" format="HH:MM AA"></neo-timepicker>
                        <div class="w-full flex col-span-2">
                            <neo-button
                                class="w-full lg:w-max lg:px-20 py-[.95rem] px-5 text-lg font-x-huge text-x-white bg-x-core bg-gradient-to-br rtl:bg-gradient-to-bl">
                                <span>{{ __('Search') }}</span>
                            </neo-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
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
                    <button id="ui-prev" aria-label="prev_arrow"
                        class="flex items-center justify-center w-8 h-8 rounded-full outline-none border border-x-shade shadow-x-core bg-x-white -me-4 z-[1] relative isolate overflow-hidden after:z-[-1] after:content-[''] after:absolute after:w-full after:h-full after:inset-0 hover:after:bg-x-prime hover:after:bg-opacity-20 focus:after:bg-x-prime focus:after:bg-opacity-20">
                        <svg class="block w-5 h-5 pointer-events-none text-x-black" viewBox="0 -960 960 960"
                            fill="currentColor">
                            <path d="M423-59 2-480l421-421 78 79-342 342 342 342-78 79Z" />
                        </svg>
                    </button>
                    <div id="ui-carousel" class="flex-[1] w-0">
                        <ul>
                            @foreach ($cars as $car)
                                @for ($i = 0; $i < 5; $i++)
                                    <li class="w-full">
                                        <a href="{{ route('views.guest.show', $car->slug) }}" draggable="false"
                                            class="w-full flex flex-wrap gap-4 p-4 border border-x-shade rounded-x-huge">
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
                                                    ${{ $car->price }}
                                                </li>
                                                <li class="text-xs text-x-black font-normal">
                                                    {{ __('Per Day') }}
                                                </li>
                                            </ul>
                                        </a>
                                    </li>
                                @endfor
                            @endforeach
                        </ul>
                    </div>
                    <button id="ui-next" aria-label="next_arrow"
                        class="flex items-center justify-center w-8 h-8 rounded-full outline-none border border-x-shade shadow-x-core bg-x-white -ms-4 z-[1] relative isolate overflow-hidden after:z-[-1] after:content-[''] after:absolute after:w-full after:h-full after:inset-0 hover:after:bg-x-prime hover:after:bg-opacity-20 focus:after:bg-x-prime focus:after:bg-opacity-20">
                        <svg class="block w-5 h-5 pointer-events-none text-x-black" viewBox="0 -960 960 960"
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
                        class="w-max mx-auto block px-6 py-2 text-base text-x-prime font-x-huge border border-x-black border-opacity-60 rounded-full outline-none hover:bg-x-prime hover:bg-opacity-20 focus:bg-x-prime focus:bg-opacity-20 mt-4">
                        {{ __('VIEW ALL CARS') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/slider.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    <script src="{{ asset('js/trans.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    <script>
        const slider = Slider({
            root: document.querySelector("#ui-carousel"),
            prev: document.querySelector("#ui-prev"),
            next: document.querySelector("#ui-next"),
            opts: {
                drag: true,
                gaps: 16,
            }
        }).lg({
            cols: 2,
            move: 2,
        }).xl({
            cols: 3,
            move: 3,
        });
    </script>
@endsection
