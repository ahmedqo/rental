@extends('shared.guest.base')
@section('title', $car->name)

@section('seo')
    <meta name="description" content="{{ Core::subString($car->details ?? '') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">
    <meta property="og:title" content="{{ env('APP_NAME') }} {{ $car->name }} Page">
    <meta property="og:description" content="{{ Core::subString('') }}">
    <meta property="og:image" content="{{ $car->Images[0]->Link }}">
    <meta property="og:url" content="{{ url(url()->full(), secure: true) }}">
    @if (Core::getSetting('x'))
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="{{ Core::getSetting('x') }}">
        <meta name="twitter:title" content="{{ env('APP_NAME') }} {{ $car->name }} Page">
        <meta name="twitter:description" content="{{ Core::subString($car->details ?? '') }}">
        <meta name="twitter:image" content="{{ $car->Images[0]->Link }}">
    @endif
@endsection

@section('content')
    <div class="bg-x-light">
        <section class="bg-x-white shadow-x-core">
            <hr class="border-t border-t-x-shade">
            <div class="w-full mx-auto container py-2">
                @include('shared.guest.crumbs', [
                    'items' => [
                        [__('Home'), route('views.guest.index')],
                        [__('Fleet'), route('views.guest.fleet')],
                        [$car->name, route('views.guest.show', $car->slug)],
                    ],
                ])
            </div>
            <hr class="border-t border-t-x-shade">
        </section>
        <section class="bg-x-white shadow-x-core sticky top-0 left-0 right-0 z-[1]">
            <div class="w-full mx-auto container">
                <div class="w-full overflow-auto">
                    <ul class="flex flex-wrap px-4 w-max">
                        <li>
                            <a href="#overview"
                                class="tabs block w-max px-4 py-3 font-x-thin text-x-black text-opacity-70 active">
                                {{ __('Overview') }}
                            </a>
                        </li>
                        @if ($car->details)
                            <li>
                                <a href="#details"
                                    class="tabs block w-max px-4 py-3 font-x-thin text-x-black text-opacity-70">
                                    {{ __('Détails') }}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="#policies" class="tabs block w-max px-4 py-3 font-x-thin text-x-black text-opacity-70">
                                {{ __('Policies') }}
                            </a>
                        </li>
                        @if ($car->Images->count() > 1)
                            <li>
                                <a href="#gallery"
                                    class="tabs block w-max px-4 py-3 font-x-thin text-x-black text-opacity-70">
                                    {{ __('Gallery') }}
                                </a>
                            </li>
                        @endif
                        @if ($car->description)
                            <li>
                                <a href="#description"
                                    class="tabs block w-max px-4 py-3 font-x-thin text-x-black text-opacity-70">
                                    {{ __('Description') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </section>
        <section class="my-4 lg:my-6">
            <div class="w-full mx-auto container p-4">
                <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-10">
                    <div class="w-full lg:col-span-2 flex flex-col gap-6">
                        <div block id="overview"
                            class="w-full flex flex-wrap gap-4 lg:gap-6 p-4 bg-x-white shadow-x-core rounded-x-thin">
                            <ul class="w-full col-span-2 flex flex-col gap-2 flex-[2]">
                                <li class="w-full">
                                    <h1 class="text-xl text-x-prime font-x-huge -mb-2">
                                        {{ strtoupper($car->Category->name) }}
                                    </h1>
                                </li>
                                <li class="w-full">
                                    <h2 class="text-base text-x-black font-x-thin">
                                        {{ ucwords($car->name) }} ({{ ucwords(__('or similar')) }})
                                    </h2>
                                </li>
                                <li class="w-full mt-2">
                                    <ul class="w-full lg:w-2/3 grid grid-rows-1 grid-cols-2 gap-2">
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                <path
                                                    d="M480.16-502Q395-502 336.5-561T278-704.5q0-84.5 58.34-142.5t143.5-58q85.16 0 143.66 57.89T682-704q0 84-58.34 143t-143.5 59ZM114-86v-159q0-46.77 23.79-84.47Q161.58-367.16 201-387q66-34 136.17-51 70.18-17 142.55-17Q554-455 624-438t135 50q39.42 19.69 63.21 57.11T846-245.05V-86H114Z" />
                                            </svg>
                                            <span class="text-base text-x-black text-opacity-50 font-normal">
                                                {{ $car->passengers }} {{ __('Passengers') }}
                                            </span>
                                        </li>
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                                fill="currentcolor" viewBox="0 0 48 48">
                                                <path
                                                    d="M23.0864 4C19.7858 4 15.278 6.00759 13.0712 8.46097L1.76252 21.0267C0.290132 22.6617 -0.397464 25.7222 0.235532 27.8318L3.93631 40.1677C4.5675 42.2749 6.88589 43.9999 9.08667 43.9999H43.9998C46.2108 43.9999 48 42.2089 48 39.9997V4H23.0864ZM43.9998 29.9996H36.0001V25.9994H43.9998V29.9996ZM43.9998 21.9993H6.26669L16.0436 11.137C17.4968 9.52356 20.9186 7.99957 23.0864 7.99957H43.9998V21.9993Z" />
                                            </svg>
                                            <span class="text-base text-x-black text-opacity-50 font-normal">
                                                {{ $car->doors }} {{ __('Doors') }}
                                            </span>
                                        </li>
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                <path
                                                    d="M440-760h80v-81h-80v81Zm40 272q-91 0-171.5-40T151-615v-9q0-57.38 39.31-96.69Q229.63-760 287-760h48v-136q0-21.4 14.01-35.7Q363.02-946 384-946h192q20.97 0 34.99 14.3Q625-917.4 625-896v136h48q57.38 0 96.69 39.31Q809-681.38 809-624v9q-76 47-157 87t-172 40ZM287-14v-55q-57.4 0-96.7-40.01Q151-149.02 151-205v-297q63 41 132 72.5T427-384v50h106v-50q75-13 143.5-45T809-502v297q0 55.98-39.31 95.99T673-69v55H567v-55H393v55H287Z" />
                                            </svg>
                                            <span class="text-base text-x-black text-opacity-50 font-normal">
                                                {{ $car->cargo }} {{ __('sutecase') }}
                                            </span>
                                        </li>
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                <path
                                                    d="M132.76-74Q71-74 28-117.17-15-160.33-15-222q0-43.46 22.5-78.23T65-353v-254q-35-18-57.5-52.77T-15-738q0-61.67 43.24-104.83Q71.47-886 133.24-886 195-886 238-842.83q43 43.16 43 104.83 0 43.46-22.5 78.23T201-607v59h211v-59q-35-18-57.5-52.77T332-738q0-61.67 43.24-104.83 43.23-43.17 105-43.17Q542-886 585-842.83q43 43.16 43 104.83 0 43.46-22.5 78.23T548-607v59h199q5.7 0 8.85-3.15Q759-554.3 759-560v-46.98q-35-18.02-57.5-52.79Q679-694.54 679-738q0-61.67 43.5-104.83Q766-886 827.47-886t104.5 43.17Q975-799.67 975-738q0 43.46-22 78.23t-58 52.79V-560q0 61.67-43.17 104.83Q808.67-412 747-412H548v59q35 18 57.5 52.77T628-222q0 61.67-43.24 104.83Q541.53-74 479.76-74 418-74 375-117.17 332-160.33 332-222q0-43.46 22.5-78.23T412-353v-59H201v59q35 18 57.5 52.77T281-222q0 61.67-43.24 104.83Q194.53-74 132.76-74Z" />
                                            </svg>
                                            <span class="text-base text-x-black text-opacity-50 font-normal">
                                                {{ __(ucwords($car->transmission)) }}
                                            </span>
                                        </li>
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                <path
                                                    d="M101-62v-700q0-57.13 39.44-96.56Q179.88-898 237-898h242q57.13 0 96.56 39.44Q615-819.13 615-762v317h54q39.9 0 68.45 27.64Q766-389.71 766-349v175q0 13.18 8.48 22.09 8.49 8.91 21.03 8.91 12.97 0 21.73-8.91T826-174v-350q-7.62 3-16.31 4-8.69 1-17.69 1-46.74 0-79.87-32.82T679-634.16q0-30.84 16-58.34 16-27.5 45-42.5l-80-80 56-57 131 126q24 24.18 42 51.59Q907-667 907-634v460.51q0 46.85-31.68 79.17T795.64-62q-47.58 0-79.11-32.22T685-174v-190h-70v302H101Zm136-503h242v-197H237v197Zm556-36q13.45 0 23.22-9.34 9.78-9.35 9.78-23.16t-9.77-23.16q-9.77-9.34-23.21-9.34-14.44 0-23.73 9.34-9.29 9.35-9.29 23.16t9.49 23.16Q778.98-601 793-601Z" />
                                            </svg>
                                            <span class="text-base text-x-black text-opacity-50 font-normal">
                                                {{ __(ucwords($car->fuel)) }}
                                            </span>
                                        </li>
                                        <li class="w-max flex flex-wrap items-center gap-2">
                                            <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                                fill="currentcolor" viewBox="0 -960 960 960">
                                                <path
                                                    d="M279.78-736.59 394-884q16.48-20.94 39.38-31.47Q456.29-926 480-926q25 0 47.67 10.53Q550.33-904.94 567-884l113.22 147.41L852-679q36 12 55 41.5t19 62.45q0 17.05-4.5 33.55Q917-525 906-510L797-353.41 801-187q0 47-34 79t-82 32q-2 0-23-2l-182-50-181.11 50.08Q293-76 287-75.5q-6 .5-12 .5-47.2 0-81.6-32.5Q159-140 160-188l4-165L53.79-510.33Q43-526 38.5-542.17 34-558.33 34-575q0-34 19.42-63.11Q72.84-667.21 109-679l170.78-57.59Z" />
                                            </svg>
                                            <span class="text-base text-x-black text-opacity-50 font-normal">
                                                {{ $car->rating }} / 5
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <img src="{{ $car->Images[0]->Link }}" alt="{{ ucwords($car->name) }} Image" loading="lazy"
                                class="block w-3/12 aspect-square object-contain object-center" />
                        </div>
                        @if ($car->details)
                            <div block id="details"
                                class="w-full flex flex-col gap-4 p-4 bg-x-white shadow-x-core rounded-x-thin">
                                <h3 class="text-x-black font-x-huge text-xl">
                                    {{ __('Details') }}
                                </h3>
                                <div class="flex flex-col gap-2">
                                    @foreach ($car->detailsArray as $detail)
                                        <p class="text-x-black text-sm text-x-thin">{{ $detail }} </p>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div block id="policies"
                            class="w-full flex flex-col gap-4 p-4 bg-x-white shadow-x-core rounded-x-thin">
                            <h3 class="text-x-black font-x-huge text-xl">
                                {{ __('Rental Policies') }}
                            </h3>
                        </div>
                        @if ($car->Images->count() > 1)
                            <div block id="gallery"
                                class="w-full flex flex-col gap-4 p-4 bg-x-white shadow-x-core rounded-x-thin">
                                <h3 class="text-x-black font-x-huge text-xl">
                                    {{ __('Gallery') }}
                                </h3>
                                <div class="relative">
                                    <div
                                        class="w-full absolute left-0 right-0 flex justify-between top-1/2 -translate-y-1/2 pointer-events-none">
                                        <button id="ui-prev" aria-label="prev_arrow"
                                            class="pointer-events-auto flex items-center justify-center w-8 h-8 rounded-full outline-none border border-x-shade shadow-x-core bg-x-white z-[1] relative isolate overflow-hidden after:z-[-1] after:content-[''] after:absolute after:w-full after:h-full after:inset-0 hover:after:bg-x-prime hover:after:bg-opacity-20 focus:after:bg-x-prime focus:after:bg-opacity-20 me-auto">
                                            <svg class="block w-5 h-5 pointer-events-none text-x-black"
                                                viewBox="0 -960 960 960" fill="currentColor">
                                                <path d="M423-59 2-480l421-421 78 79-342 342 342 342-78 79Z" />
                                            </svg>
                                        </button>
                                        <button id="ui-next" aria-label="next_arrow"
                                            class="pointer-events-auto flex items-center justify-center w-8 h-8 rounded-full outline-none border border-x-shade shadow-x-core bg-x-white z-[1] relative isolate overflow-hidden after:z-[-1] after:content-[''] after:absolute after:w-full after:h-full after:inset-0 hover:after:bg-x-prime hover:after:bg-opacity-20 focus:after:bg-x-prime focus:after:bg-opacity-20 ms-auto">
                                            <svg class="block w-5 h-5 pointer-events-none text-x-black"
                                                viewBox="0 -960 960 960" fill="currentColor">
                                                <path d="m305-61-79-79 342-342-342-342 79-79 420 421L305-61Z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="ui-carousel" class="w-full">
                                        <ul>
                                            @foreach ($car->Images as $Image)
                                                <li class="aspect-video">
                                                    <img src="{{ $Image->Link }}"
                                                        alt="{{ ucwords($car->name) }} Slide Image {{ $loop->index + 1 }}"
                                                        class="block w-full h-full object-contain object-center" />
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($car->description)
                            <div block id="description"
                                class="w-full flex flex-col gap-4 p-4 bg-x-white shadow-x-core rounded-x-thin">
                                <h3 class="text-x-black font-x-huge text-xl">
                                    {{ __('Description') }}
                                </h3>
                                <div class="w-full revert">
                                    {!! $car->description !!}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="w-full flex flex-col gap-6">
                        <div class="w-full flex flex-col gap-2 p-4 bg-x-white shadow-x-core rounded-x-thin">
                            <ul class="w-full flex items-end justify-between col-span-2">
                                <li class="text-x-black font-x-thin text-sm">
                                    {{ __('Per Day') }}
                                </li>
                                <li class="text-x-black font-x-huge text-base">
                                    <span id="price">{{ number_format($car->price / Core::rate(), 2) }}</span>
                                    <span>{{ Core::$CURRENCY }}</span>
                                </li>
                            </ul>
                            <ul class="w-full flex items-end justify-between col-span-2">
                                <li class="text-x-black font-x-thin text-sm">
                                    {{ __('Days Count') }}
                                </li>
                                <li class="text-x-black font-x-huge text-base">
                                    <span id="days">1</span>
                                    <span class="text-sm">{{ __('Days') }}</span>
                                </li>
                            </ul>
                            <hr class="border-t border-t-x-shade my-2">
                            <ul class="w-full flex items-end justify-between col-span-2">
                                <li class="text-x-black font-x-huge text-base">
                                    {{ __('Total') }}
                                </li>
                                <li class="text-x-black font-x-huge text-lg">
                                    <span id="total">{{ number_format($car->price / Core::rate(), 2) }}</span>
                                    <span>{{ Core::$CURRENCY }}</span>
                                </li>
                            </ul>
                        </div>
                        <div id="reservation"
                            class="w-full flex flex-col gap-4 p-4 bg-x-white shadow-x-core rounded-x-thin">
                            <h3 class="text-x-black font-x-huge text-xl">
                                {{ __('Reservation') }}
                            </h3>
                            <form id="book" action="{{ route('actions.guest.reserve') }}" method="POST"
                                class="grid grid-rows-1 grid-cols-1 gap-4">
                                @csrf
                                <input type="hidden" name="car" value="{{ $car->id }}" />
                                <div class="flex flex-col gap-1 col-span-2">
                                    <neo-textbox data-error=".error-0" label="{{ __('Name') . ' (*)' }}"
                                        value="{{ old('name') ?? '' }}" name="name"
                                        class="bg-transparent"></neo-textbox>
                                    <span class="error-0 hidden block text-sm font-x-thin text-red-400"></span>
                                </div>
                                <div class="flex flex-col gap-1 col-span-2">
                                    <neo-textbox data-error=".error-1"type="email" label="{{ __('Email') . ' (*)' }}"
                                        value="{{ old('email') ?? '' }}" name="email"
                                        class="bg-transparent"></neo-textbox>
                                    <span class="error-1 hidden block text-sm font-x-thin text-red-400"></span>
                                </div>
                                <div class="flex flex-col gap-1 col-span-2">
                                    <neo-textbox data-error=".error-2"type="tel" label="{{ __('Phone') . ' (*)' }}"
                                        value="{{ old('phone') ?? '' }}" name="phone"
                                        class="bg-transparent"></neo-textbox>
                                    <span class="error-2 hidden block text-sm font-x-thin text-red-400"></span>
                                </div>
                                <div class="flex flex-col gap-1 col-span-2">
                                    <neo-select data-error=".error-3"label="{{ __('Location') . ' (*)' }}"
                                        name="location" class="bg-transparent custom">
                                        @foreach (Core::locationList() as $location)
                                            <neo-select-item
                                                value="{{ $location }}"{{ request('location') == $location ? 'active' : '' }}>
                                                {{ ucwords(__($location)) }}
                                            </neo-select-item>
                                        @endforeach
                                        <svg slot="end"
                                            class="block w-[1.2rem] h-[1.2rem] pointer-events-none text-x-black"
                                            viewBox="0 -960 960 960" fill="currentColor">
                                            <path
                                                d="M479.77 12Q303 12 191.5-44.11 80-100.23 80-189q0-43.06 30-80.53T196-335l94 103q-18 6-39 17t-36 24q21.49 27.2 101.28 47.1Q396.07-124 481.25-124q86.02 0 164.81-20.3T746-191q-16-14-37.81-24.86Q686.38-226.71 667-233l95-104q57 28 87.5 66.5t30.5 80.77q0 89.63-111.73 145.68Q656.54 12 479.77 12ZM481-154Q315.76-271 235.38-382.44T155-600.74q0-80.61 29.83-141.33 29.83-60.71 76.62-101.57 46.79-40.85 104.54-61.61Q423.74-926 480.31-926q56.9 0 115.53 20.93 58.63 20.92 104.87 61.77t75.77 101.49Q806-681.17 806-601.08q0 107.38-80.63 218.73Q644.73-271 481-154Zm.12-360q38.88 0 66.38-27.56 27.5-27.57 27.5-65.16 0-38.87-27.44-66.58Q520.13-701 481.5-701q-39.04 0-67.27 27.7Q386-645.59 386-607.22q0 38.38 28.12 65.8 28.12 27.42 67 27.42Z" />
                                        </svg>
                                    </neo-select>
                                    <span class="error-3 hidden block text-sm font-x-thin text-red-400"></span>
                                </div>
                                <div class="flex flex-col gap-1 col-span-2">
                                    <div class="flex gap-4">
                                        <neo-datepicker data-error=".error-4"full-day="3"
                                            label="{{ __('Pick-up Date') . ' (*)' }}"
                                            class="bg-transparent flex-[1] custom start" name="from_date"
                                            value="{{ request('pick-up-date') ?? '#now' }}"
                                            format="mmm dd"></neo-datepicker>
                                        <neo-datepicker data-error=".error-4"full-day="3"
                                            label="{{ __('Drop-off Date') . ' (*)' }}"
                                            class="bg-transparent flex-[1] custom end" name="to_date"
                                            value="{{ request('drop-off-date') ?? '#now+1' }}"
                                            format="mmm dd"></neo-datepicker>
                                    </div>
                                    <span class="error-4 hidden block text-sm font-x-thin text-red-400"></span>
                                </div>
                                <div class="flex flex-col gap-1 col-span-2">
                                    <div class="flex gap-4">
                                        <neo-timepicker data-error=".error-5"label="{{ __('Pick-up Time') . ' (*)' }}"
                                            class="bg-transparent flex-[1] custom start" name="from_time"
                                            value="{{ request('pick-up-time') ?? '#now' }}"
                                            format="HH:MM AA"></neo-timepicker>
                                        <neo-timepicker data-error=".error-5"label="{{ __('Drop-off Time') . ' (*)' }}"
                                            class="bg-transparent flex-[1] custom end" name="to_time"
                                            value="{{ request('drop-off-time') ?? '#now' }}"
                                            format="HH:MM AA"></neo-timepicker>
                                    </div>
                                    <span class="error-5 hidden block text-sm font-x-thin text-red-400"></span>
                                </div>
                                <neo-button
                                    class="w-full col-span-2 px-10 text-x-white bg-x-core bg-gradient-to-br rtl:bg-gradient-to-bl">
                                    <span>{{ __('Reserve') }}</span>
                                </neo-button>
                            </form>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-6 lg:col-span-3">
                        <div class="w-full flex flex-col gap-4 items-center justify-center px-4 py-10">
                            <h3 class="text-x-black font-x-thin text-xl text-center">
                                {{ __('Your opinion matters. Tell us about your experience') }}
                            </h3>
                            <button id="feedback_trigger"
                                class="w-max max-w-full text-center py-2 px-4 font-x-huge text-x-prime text-base border rounded-x-thin border-x-prime bg-x-white relative isolate overflow-hidden after:z-[-1] after:content-[''] after:absolute after:w-full after:h-full after:inset-0 hover:after:bg-x-prime hover:after:bg-opacity-20 focus:after:bg-x-prime focus:after:bg-opacity-20">
                                {{ __('Share Feedback') }}
                            </button>
                            <neo-overlay id="feedback_overlay" label="{{ __('Create Feedback') }}">
                                <form id="feedback_form" action="{{ route('actions.guest.review', $car->id) }}"
                                    method="POST" class="w-full grid grid-row-1 grid-cols-1 lg:grid-cols-2 gap-4 p-4">
                                    @csrf
                                    <div class="lg:col-span-2">
                                        <p class="text-x-black font-x-thin text-base">
                                            {{ __('Thank you in advance for your feedback.') }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col lg:col-span-2">
                                        <label class="text-xs text-x-black text-opacity-80 font-x-thin">
                                            {{ __('Overall Satisfaction') . ' (*)' }}
                                        </label>
                                        <div id="rate-group" class="w-full flex gap-2 rounded-x-thin">
                                            @for ($i = 1; $i < 6; $i++)
                                                <div class="flex-[1] relative">
                                                    <input type="radio" id="rate-{{ $i }}" name="rate"
                                                        value="{{ $i }}"
                                                        {{ old('rate') == $i ? 'checked' : '' }}
                                                        class="w-0 h-0 absolute inset-0 pointer-events-none opacity-0 peer" />
                                                    <label for="rate-{{ $i }}"
                                                        class="w-full p-2 flex font-x-huge text-base items-center justify-center gap-2 border border-x-shade rounded-x-thin peer-checked:outline peer-checked:outline-2 peer-checked:-outline-offset-2 peer-checked:outline-x-prime peer-focus:bg-x-prime peer-focus:bg-opacity-20 hover:bg-x-prime hover:bg-opacity-20">
                                                        {{ $i }}
                                                        <svg class="block w-2.5 h-2.5 pointer-events-none"
                                                            viewBox="0 -960 960 960" fill="currentColor">
                                                            <path
                                                                d="M279.78-736.59 394-884q16.48-20.94 39.38-31.47Q456.29-926 480-926q25 0 47.67 10.53Q550.33-904.94 567-884l113.22 147.41L852-679q36 12 55 41.5t19 62.45q0 17.05-4.5 33.55Q917-525 906-510L797-353.41 801-187q0 47-34 79t-82 32q-2 0-23-2l-182-50-181.11 50.08Q293-76 287-75.5q-6 .5-12 .5-47.2 0-81.6-32.5Q159-140 160-188l4-165L53.79-510.33Q43-526 38.5-542.17 34-558.33 34-575q0-34 19.42-63.11Q72.84-667.21 109-679l170.78-57.59Z" />
                                                        </svg>
                                                    </label>
                                                </div>
                                            @endfor
                                        </div>
                                        <span
                                            class="feed-error-0 mt-1 hidden block text-sm font-x-thin text-red-400"></span>
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <neo-textbox data-error=".feed-error-1" label="{{ __('Name') . ' (*)' }}"
                                            name="name" value="{{ old('name') }}"
                                            class="bg-transparent"></neo-textbox>
                                        <span class="feed-error-1 hidden block text-sm font-x-thin text-red-400"></span>
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <neo-textbox data-error=".feed-error-2" type="email"
                                            label="{{ __('Email') . ' (*)' }}" name="email"
                                            value="{{ old('email') }}" class="bg-transparent"></neo-textbox>
                                        <span class="feed-error-2 hidden block text-sm font-x-thin text-red-400"></span>
                                    </div>
                                    <div class="flex flex-col gap-1 lg:col-span-2">
                                        <neo-textarea data-error=".feed-error-3" label="{{ __('Content') . ' (*)' }}"
                                            name="content" value="{{ old('content') }}" rows="4"
                                            class="bg-transparent"></neo-textarea>
                                        <span class="feed-error-3 hidden block text-sm font-x-thin text-red-400"></span>
                                    </div>
                                    <div class="w-full flex lg:col-span-2">
                                        <neo-button
                                            class="w-full lg:w-max lg:px-20 lg:ms-auto px-4 py-2 text-base lg:text-lg font-x-huge text-x-white bg-x-core bg-gradient-to-br rtl:bg-gradient-to-bl">
                                            <span>{{ __('Create') }}</span>
                                        </neo-button>
                                    </div>
                                </form>
                            </neo-overlay>
                        </div>
                    </div>
                    @php
                        $Reviews = $car->Reviews->where('status', 'approved');
                    @endphp
                    @if ($Reviews->count())
                        <ul class="w-full gap-6 lg:col-span-3 grid grid-rows-1 grid-cols-1 lg:grid-cols-2 items-start">
                            @foreach ($Reviews as $Review)
                                <li class="w-full flex flex-col gap-4 rounded-x-thin bg-x-white p-6">
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
                    @endif
                </div>
            </div>
        </section>
        <ul id="sm-reserve"
            class="w-full translate-y-full transition-transform duration-200 lg:hidden flex items-center justify-between gap-4 p-4 bg-x-white shadow-2xl shadow-x-black fixed left-0 right-0 bottom-0">
            <li class="text-x-black font-x-huge text-2xl">
                <span id="sm-total">{{ number_format($car->price / Core::rate(), 2) }}</span>
                <span>{{ Core::$CURRENCY }}</span>
                <span id="sm-days" class="font-x-thin text-lg"></span>
            </li>
            <li>
                <a href="#reservation"
                    class="tabs block w-max px-6 py-2 bg-x-prime text-x-white font-x-huge outline-none hover:bg-opacity-60 focus:bg-opacity-60">
                    {{ __('Reserve') }}
                </a>
            </li>
        </ul>
    </div>
    @if (Session::has('modal'))
        <neo-overlay id="modal" class="sm-center">
            <div class="w-full flex flex-col gap-4 p-6 overflow-hidden pb-12">
                <div class="check-container">
                    <div class="check-background">
                        <svg viewBox="0 0 65 51" class="text-x-white" fill="none">
                            <path d="M7 25L27.3077 44L58.5 7" stroke="currentColor" stroke-width="13"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="check-shadow"></div>
                </div>
                <span class="check-text text-x-black font-x-thin text-xl lg:text-2xl text-center">
                    {{ Session::get('content') }}
                </span>
            </div>
        </neo-overlay>
    @endif
@endsection

@section('scripts')
    <script src="{{ asset('js/neo/plugins/fields.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    @if ($car->Images->count() > 1)
        <script src="{{ asset('js/slider.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    @endif
    @if (!Core::lang('en'))
        <script src="{{ asset('js/trans.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    @endif
    <script src="{{ asset('js/car.min.js') }}?v={{ env('APP_VERSION') }}"></script>
@endsection
