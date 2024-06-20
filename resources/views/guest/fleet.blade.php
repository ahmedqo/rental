@extends('shared.guest.base')
@section('title', __('Fleet'))

@section('seo')
    <meta name="description" content="{{ Core::subString('') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ env('COMPANY_NAME') }}">
    <meta property="og:title" content="{{ env('COMPANY_NAME') }} Fleet Page">
    <meta property="og:description" content="{{ Core::subString('') }}">
    <meta property="og:image" content="{{ url(asset('img/logo.webp'), secure: true) }}?v={{ env('APP_VERSION') }}">
    <meta property="og:url" content="{{ url(url()->full(), secure: true) }}">
    @if (Core::getSetting('x'))
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="{{ Core::getSetting('x') }}">
        <meta name="twitter:title" content="{{ env('COMPANY_NAME') }} Fleet Page">
        <meta name="twitter:description" content="{{ Core::subString('') }}">
        <meta name="twitter:image" content="{{ url(asset('img/logo.webp'), secure: true) }}?v={{ env('APP_VERSION') }}">
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
                    ],
                ])
            </div>
            <hr class="border-t border-t-x-shade">
            <div class="w-full mx-auto container p-4">
                <input id="search-from" type="radio" class="hidden peer" />
                <label for="search-from"
                    class="w-full peer-checked:hidden lg:hidden text-base font-x-thin underline underline-offset-2 text-x-prime">
                    {{ __('Show Search Fields') }}
                </label>
                <form id="se-form"
                    class="hidden peer-checked:grid grid-rows-1 grid-cols-2 gap-4 lg:!flex lg:flex-wrap items-start">
                    <neo-select label="{{ __('Location') }}" name="location"
                        class="bg-transparent lg:flex-[2] col-span-2 custom">
                        @foreach (Core::locationList() as $location)
                            <neo-select-item
                                value="{{ $location }}"{{ request('location') == $location ? 'active' : '' }}>
                                {{ ucwords(__($location)) }}
                            </neo-select-item>
                        @endforeach
                        <svg slot="end" class="block w-[1.2rem] h-[1.2rem] pointer-events-none text-x-black"
                            viewBox="0 -960 960 960" fill="currentColor">
                            <path
                                d="M479.77 12Q303 12 191.5-44.11 80-100.23 80-189q0-43.06 30-80.53T196-335l94 103q-18 6-39 17t-36 24q21.49 27.2 101.28 47.1Q396.07-124 481.25-124q86.02 0 164.81-20.3T746-191q-16-14-37.81-24.86Q686.38-226.71 667-233l95-104q57 28 87.5 66.5t30.5 80.77q0 89.63-111.73 145.68Q656.54 12 479.77 12ZM481-154Q315.76-271 235.38-382.44T155-600.74q0-80.61 29.83-141.33 29.83-60.71 76.62-101.57 46.79-40.85 104.54-61.61Q423.74-926 480.31-926q56.9 0 115.53 20.93 58.63 20.92 104.87 61.77t75.77 101.49Q806-681.17 806-601.08q0 107.38-80.63 218.73Q644.73-271 481-154Zm.12-360q38.88 0 66.38-27.56 27.5-27.57 27.5-65.16 0-38.87-27.44-66.58Q520.13-701 481.5-701q-39.04 0-67.27 27.7Q386-645.59 386-607.22q0 38.38 28.12 65.8 28.12 27.42 67 27.42Z" />
                        </svg>
                    </neo-select>
                    <neo-datepicker full-day="3" label="{{ __('Pick-up Date') }}"
                        class="bg-transparent lg:flex-[1] custom center" name="pick-up-date"
                        value="{{ request('pick-up-date') ?? '#now' }}" format="mmm dd"></neo-datepicker>
                    <neo-datepicker full-day="3" label="{{ __('Drop-off Date') }}"
                        class="bg-transparent lg:flex-[1] custom center" name="drop-off-date"
                        value="{{ request('drop-off-date') ?? '#now+1' }}" format="mmm dd"></neo-datepicker>
                    <neo-timepicker label="{{ __('Pick-up Time') }}" class="bg-transparent lg:flex-[1] custom center"
                        name="pick-up-time" value="{{ request('pick-up-time') ?? '#now' }}"
                        format="HH:MM AA"></neo-timepicker>
                    <neo-timepicker label="{{ __('Drop-off Time') }}" class="bg-transparent lg:flex-[1] custom center"
                        name="drop-off-time" value="{{ request('drop-off-time') ?? '#now' }}"
                        format="HH:MM AA"></neo-timepicker>
                    <neo-button
                        class="w-full col-span-2 lg:w-max px-10 text-x-white bg-x-core bg-gradient-to-br rtl:bg-gradient-to-bl">
                        <span>{{ __('Search') }}</span>
                    </neo-button>
                </form>
            </div>
        </section>
        <section class="my-4 lg:my-6">
            <div class="w-full mx-auto container p-4">
                <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-4 gap-6 lg:gap-10">
                    <neo-dropdown label="{{ __('Filters') }}" class="lg:hidden sm-center">
                        <button slot="trigger"
                            class="w-full text-center py-2 font-x-huge rounded-x-thin text-x-prime text-base border border-x-prime bg-x-white relative isolate overflow-hidden after:z-[-1] after:content-[''] after:absolute after:w-full after:h-full after:inset-0 hover:after:bg-x-prime hover:after:bg-opacity-20 focus:after:bg-x-prime focus:after:bg-opacity-20">
                            {{ __('Filters') }}
                        </button>
                        <form id="sm-form" class="flex flex-col">
                            <ul class="flex flex-col gap-4 p-4">
                                <li class="flex flex-col gap-2">
                                    <h4 class="text-x-black font-x-huge text-lg">
                                        {{ __('Price') }}
                                    </h4>
                                    <div class="flex gap-4">
                                        <neo-textbox type="number" placeholder="{{ __('Min') }}" name="min"
                                            class="bg-x-white flex-[1]" value="{{ request('min') }}"></neo-textbox>
                                        <neo-textbox type="number" placeholder="{{ __('Max') }}" name="max"
                                            class="bg-x-white flex-[1]" value="{{ request('max') }}"></neo-textbox>
                                    </div>
                                </li>
                                <li class="flex flex-col gap-2">
                                    <h4 class="text-x-black font-x-huge text-lg">
                                        {{ __('Passengers') }}
                                    </h4>
                                    <div class="flex flex-col gap-1">
                                        <ul class="flex items-center justify-between px-px">
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">2</li>
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">3</li>
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">4</li>
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">5</li>
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">6</li>
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">7</li>
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">8</li>
                                        </ul>
                                        <input aria-label="sm_passengers_range" type="range" min="2"
                                            value="{{ request('passengers') ?? 2 }}" max="8" step="1"
                                            name="passengers" class="outline-x-prime outline-offset-" />
                                    </div>
                                </li>
                                <li class="flex flex-col gap-2">
                                    <h4 class="text-x-black font-x-huge text-lg">
                                        {{ __('Cargo') }}
                                    </h4>
                                    <div class="flex flex-col gap-1">
                                        <ul class="flex items-center justify-between px-px">
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">2</li>
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">3</li>
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">4</li>
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">5</li>
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">6</li>
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">7</li>
                                            <li class="text-x-black text-opacity-60 font-x-thin text-base">8</li>
                                        </ul>
                                        <input aria-label="sm_cargo_range" type="range" min="2"
                                            value="{{ request('cargo') ?? 2 }}" max="8" step="1"
                                            name="cargo" class="outline-x-prime outline-offset-" />
                                    </div>
                                </li>
                                <li class="w-full">
                                    <ul class="w-full flex gap-4">
                                        <li class="flex-[1] flex flex-col gap-2">
                                            <h4 class="text-x-black font-x-huge text-lg">
                                                {{ __('Fuel') }}
                                            </h4>
                                            <ul class="flex flex-col gap-2">
                                                @foreach (Core::fuelList() as $fuel)
                                                    <li class="w-full">
                                                        <label for="sm_fuel_{{ $loop->index }}"
                                                            class="w-auto flex flex-wrap gap-2 items-center">
                                                            <input id="sm_fuel_{{ $loop->index }}" name="fuel[]"
                                                                type="checkbox" value="{{ $fuel }}"
                                                                {{ in_array($fuel, request('fuel') ?? []) ? 'checked' : '' }}
                                                                class="w-5 h-5 block rounded-x-thin outline-x-prime outline-offset-2 border border-x-black">
                                                            <span
                                                                class="flex-[1] text-x-black text-opacity-60 font-x-thin text-base">
                                                                {{ __(ucwords($fuel)) }}
                                                            </span>
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="flex-[1] flex flex-col gap-2">
                                            <h4 class="text-x-black font-x-huge text-lg">
                                                {{ __('Transmission') }}
                                            </h4>
                                            <ul class="flex flex-col gap-2">
                                                @foreach (Core::transmissionList() as $transmission)
                                                    <li class="w-full">
                                                        <label for="sm_transmission_{{ $loop->index }}"
                                                            class="w-auto flex flex-wrap gap-2 items-center">
                                                            <input id="sm_transmission_{{ $loop->index }}"
                                                                name="transmission[]" type="checkbox"
                                                                value="{{ $transmission }}"
                                                                {{ in_array($transmission, request('transmission') ?? []) ? 'checked' : '' }}
                                                                class="w-5 h-5 block rounded-x-thin outline-x-prime outline-offset-2 border border-x-black">
                                                            <span
                                                                class="flex-[1] text-x-black text-opacity-60 font-x-thin text-base">
                                                                {{ __(ucwords($transmission)) }}
                                                            </span>
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="w-full">
                                    <ul class="w-full flex gap-4">
                                        <li class="flex-[1] flex flex-col gap-2">
                                            <h4 class="text-x-black font-x-huge text-lg">
                                                {{ __('Types') }}
                                            </h4>
                                            <ul class="flex flex-col gap-2">
                                                @foreach ($types as $type)
                                                    <li class="w-full">
                                                        <label for="sm_type_{{ $loop->index }}"
                                                            class="w-auto flex flex-wrap gap-2 items-center">
                                                            <input id="sm_type_{{ $loop->index }}" name="type[]"
                                                                type="checkbox" value="{{ $type['id'] }}"
                                                                {{ in_array($type['id'], request('type') ?? []) ? 'checked' : '' }}
                                                                class="w-5 h-5 block rounded-x-thin outline-x-prime outline-offset-2 border border-x-black">
                                                            <span
                                                                class="flex-[1] text-x-black text-opacity-60 font-x-thin text-base">
                                                                {{ __(ucwords($type['name'])) }}
                                                            </span>
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="flex-[1] flex flex-col gap-2">
                                            <h4 class="text-x-black font-x-huge text-lg">
                                                {{ __('Brands') }}
                                            </h4>
                                            <ul class="flex flex-col gap-2">
                                                @foreach ($brands as $brand)
                                                    <li class="w-full">
                                                        <label for="sm_brand_{{ $loop->index }}"
                                                            class="w-auto flex flex-wrap gap-2 items-center">
                                                            <input id="sm_brand_{{ $loop->index }}" name="brand[]"
                                                                type="checkbox" value="{{ $brand['id'] }}"
                                                                {{ in_array($brand['id'], request('brand') ?? []) ? 'checked' : '' }}
                                                                class="w-5 h-5 block rounded-x-thin outline-x-prime outline-offset-2 border border-x-black">
                                                            <span
                                                                class="flex-[1] text-x-black text-opacity-60 font-x-thin text-base">
                                                                {{ __(ucwords($brand['name'])) }}
                                                            </span>
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="bg-x-white sticky left-0 right-0 bottom-0 p-4">
                                <neo-button
                                    class="w-full text-base text-x-white bg-x-core bg-gradient-to-br rtl:bg-gradient-to-bl">
                                    <span>{{ __('Filter') }}</span>
                                </neo-button>
                            </div>
                        </form>
                    </neo-dropdown>
                    <form id="lg-form" class="lg:flex flex-col gap-4 hidden">
                        <h3 class="text-x-black font-x-huge text-2xl">
                            {{ __('Filter By') }}
                        </h3>
                        <ul class="flex flex-col gap-4">
                            <li class="flex flex-col gap-2">
                                <h4 class="text-x-black font-x-huge text-lg">
                                    {{ __('Price') }}
                                </h4>
                                <div class="flex gap-4">
                                    <neo-textbox type="number" placeholder="{{ __('Min') }}" name="min"
                                        class="bg-x-white flex-[1]" value="{{ request('min') }}"></neo-textbox>
                                    <neo-textbox type="number" placeholder="{{ __('Max') }}" name="max"
                                        class="bg-x-white flex-[1]" value="{{ request('max') }}"></neo-textbox>
                                </div>
                            </li>
                            <li class="flex flex-col gap-2">
                                <h4 class="text-x-black font-x-huge text-lg">
                                    {{ __('Passengers') }}
                                </h4>
                                <div class="flex flex-col gap-1">
                                    <ul class="flex items-center justify-between px-px">
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">2</li>
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">3</li>
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">4</li>
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">5</li>
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">6</li>
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">7</li>
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">8</li>
                                    </ul>
                                    <input aria-label="passengers_range" type="range" min="2"
                                        value="{{ request('passengers') ?? 2 }}" max="8" step="1"
                                        name="passengers" class="outline-x-prime outline-offset-" />
                                </div>
                            </li>
                            <li class="flex flex-col gap-2">
                                <h4 class="text-x-black font-x-huge text-lg">
                                    {{ __('Cargo') }}
                                </h4>
                                <div class="flex flex-col gap-1">
                                    <ul class="flex items-center justify-between px-px">
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">2</li>
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">3</li>
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">4</li>
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">5</li>
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">6</li>
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">7</li>
                                        <li class="text-x-black text-opacity-60 font-x-thin text-base">8</li>
                                    </ul>
                                    <input aria-label="cargo_range" type="range" min="2"
                                        value="{{ request('cargo') ?? 2 }}" max="8" step="1"
                                        name="cargo" class="outline-x-prime outline-offset-" />
                                </div>
                            </li>
                            <li class="w-full">
                                <ul class="w-full flex gap-4">
                                    <li class="flex-[1] flex flex-col gap-2">
                                        <h4 class="text-x-black font-x-huge text-lg">
                                            {{ __('Fuel') }}
                                        </h4>
                                        <ul class="flex flex-col gap-2">
                                            @foreach (Core::fuelList() as $fuel)
                                                <li class="w-full">
                                                    <label for="fuel_{{ $loop->index }}"
                                                        class="w-auto flex flex-wrap gap-2 items-center">
                                                        <input id="fuel_{{ $loop->index }}" name="fuel[]"
                                                            type="checkbox" value="{{ $fuel }}"
                                                            {{ in_array($fuel, request('fuel') ?? []) ? 'checked' : '' }}
                                                            class="w-5 h-5 block rounded-x-thin outline-x-prime outline-offset-2 border border-x-black">
                                                        <span
                                                            class="flex-[1] text-x-black text-opacity-60 font-x-thin text-base">
                                                            {{ __(ucwords($fuel)) }}
                                                        </span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="flex-[1] flex flex-col gap-2">
                                        <h4 class="text-x-black font-x-huge text-lg">
                                            {{ __('Transmission') }}
                                        </h4>
                                        <ul class="flex flex-col gap-2">
                                            @foreach (Core::transmissionList() as $transmission)
                                                <li class="w-full">
                                                    <label for="transmission_{{ $loop->index }}"
                                                        class="w-auto flex flex-wrap gap-2 items-center">
                                                        <input id="transmission_{{ $loop->index }}"
                                                            name="transmission[]" type="checkbox"
                                                            value="{{ $transmission }}"
                                                            {{ in_array($transmission, request('transmission') ?? []) ? 'checked' : '' }}
                                                            class="w-5 h-5 block rounded-x-thin outline-x-prime outline-offset-2 border border-x-black">
                                                        <span
                                                            class="flex-[1] text-x-black text-opacity-60 font-x-thin text-base">
                                                            {{ __(ucwords($transmission)) }}
                                                        </span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="w-full">
                                <ul class="w-full flex gap-4">
                                    <li class="flex-[1] flex flex-col gap-2">
                                        <h4 class="text-x-black font-x-huge text-lg">
                                            {{ __('Types') }}
                                        </h4>
                                        <ul class="flex flex-col gap-2">
                                            @foreach ($types as $type)
                                                <li class="w-full">
                                                    <label for="type_{{ $loop->index }}"
                                                        class="w-auto flex flex-wrap gap-2 items-center">
                                                        <input id="type_{{ $loop->index }}" name="type[]"
                                                            type="checkbox" value="{{ $type['id'] }}"
                                                            {{ in_array($type['id'], request('type') ?? []) ? 'checked' : '' }}
                                                            class="w-5 h-5 block rounded-x-thin outline-x-prime outline-offset-2 border border-x-black">
                                                        <span
                                                            class="flex-[1] text-x-black text-opacity-60 font-x-thin text-base">
                                                            {{ __(ucwords($type['name'])) }}
                                                        </span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="flex-[1] flex flex-col gap-2">
                                        <h4 class="text-x-black font-x-huge text-lg">
                                            {{ __('Brands') }}
                                        </h4>
                                        <ul class="flex flex-col gap-2">
                                            @foreach ($brands as $brand)
                                                <li class="w-full">
                                                    <label for="brand_{{ $loop->index }}"
                                                        class="w-auto flex flex-wrap gap-2 items-center">
                                                        <input id="brand_{{ $loop->index }}" name="brand[]"
                                                            type="checkbox" value="{{ $brand['id'] }}"
                                                            {{ in_array($brand['id'], request('brand') ?? []) ? 'checked' : '' }}
                                                            class="w-5 h-5 block rounded-x-thin outline-x-prime outline-offset-2 border border-x-black">
                                                        <span
                                                            class="flex-[1] text-x-black text-opacity-60 font-x-thin text-base">
                                                            {{ __(ucwords($brand['name'])) }}
                                                        </span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <neo-button
                            class="w-full text-base px-10 lg:w-max text-x-white bg-x-core bg-gradient-to-br rtl:bg-gradient-to-bl">
                            <span>{{ __('Filter') }}</span>
                        </neo-button>
                    </form>
                    <div class="lg:col-span-3">
                        <ul class="w-full grid grid-rows-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 lg:gap-6">
                            @forelse ($cars as $car)
                                <li
                                    class="w-full flex flex-wrap gap-4 lg:gap-6 p-4 lg:p-6 bg-x-white shadow-x-core border border-x-light rounded-x-huge">
                                    <img src="{{ $car->Images[0]->Link }}" alt="{{ ucwords($car->name) }} Image"
                                        loading="lazy"
                                        class="hidden lg:block w-1/5 aspect-square object-contain object-center" />
                                    <ul class="w-full col-span-2 flex flex-col gap-2 flex-[2]">
                                        <li class="w-full">
                                            <h3 class="text-xl text-x-prime font-x-huge -mb-2">
                                                {{ strtoupper($car->Category->name) }}
                                            </h3>
                                        </li>
                                        <li class="w-full">
                                            <h4 class="text-base text-x-black font-x-thin">
                                                {{ ucwords($car->name) }} ({{ ucwords(__('or similar')) }})
                                            </h4>
                                        </li>
                                        <li class="w-full mt-2">
                                            <ul class="w-full lg:w-2/3 flex flex-wrap gap-2" style="column-gap: 1rem;">
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
                                    <ul
                                        class="w-full flex flex-col items-end flex-[1] min-w-20 lg:min-w-0 my-auto lg:me-2">
                                        <li class="w-full lg:hidden">
                                            <img src="{{ $car->Images[0]->Link }}"
                                                alt="{{ ucwords($car->name) }} Image" loading="lazy"
                                                class="block w-full aspect-square object-contain object-center" />
                                        </li>
                                        <li class="hidden lg:block text-2xl text-x-black font-x-huge mt-2">
                                            {{ number_format($car->price / Core::rate(), 2) }}
                                            {{ Core::$CURRENCY }}
                                        </li>
                                        <li class="hidden lg:block text-xs lg:text-base text-x-black font-normal">
                                            {{ __('Per Day') }}
                                        </li>
                                        <li class="hidden lg:block">
                                            <a href="{{ route('views.guest.show', $car->slug) }}"
                                                class="link block w-max px-6 py-2 bg-x-prime text-x-white font-x-huge outline-none hover:bg-opacity-60 focus:bg-opacity-60 mt-4">
                                                {{ __('Reserve') }}
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="w-full flex items-center justify-between gap-4 lg:hidden">
                                        <li>
                                            <a href="{{ route('views.guest.show', $car->slug) }}"
                                                class="link block w-max px-6 py-2 bg-x-prime text-x-white font-x-huge outline-none hover:bg-opacity-60 focus:bg-opacity-60">
                                                {{ __('Reserve') }}
                                            </a>
                                        </li>
                                        <li>
                                            <ul class="w-full flex flex-col items-end">
                                                <li class=" text-2xl text-x-black font-x-huge">
                                                    {{ number_format($car->price / Core::rate(), 2) }}
                                                    {{ Core::$CURRENCY }}
                                                </li>
                                                <li class=" text-xs lg:text-base text-x-black font-normal">
                                                    {{ __('Per Day') }}
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            @empty
                                <li class="w-full flex flex-col items-center">
                                    <svg class="block w-20 h-20 lg:w-40 lg:h-40 pointer-events-none text-x-black text-opacity-70"
                                        viewBox="0 0 377 268" fill="none">
                                        <path
                                            d="M48.0903 99.4856C50.0543 103.898 57.3823 104.921 64.4603 101.77C71.5363 98.6186 75.6803 92.4876 73.7173 88.0756M115.013 69.5856C116.977 73.9976 124.306 75.0196 131.383 71.8686C138.46 68.7186 142.605 62.5866 140.641 58.1756M153.583 13.2126C186.604 87.3796 180.243 162.254 139.376 180.45C98.5103 198.645 38.6103 153.271 5.59034 79.1036C0.709341 68.1416 26.5173 36.9476 67.3853 18.7516C103.627 2.61564 139.541 2.12164 150.61 9.86164C152.023 10.8496 153.032 11.9716 153.584 13.2116L153.583 13.2126ZM139.864 128.652C139.864 128.652 132.266 109.666 112.824 118.322C92.8443 127.217 102.66 145.217 102.66 145.217C107.749 143.044 111.045 141.415 121.32 136.841C131.593 132.267 135.318 130.769 139.864 128.652Z"
                                            stroke="currentColor" stroke-width="6" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M205.744 105.795C207.821 96.8014 216.794 91.1935 225.788 93.2699C234.781 95.3462 240.389 104.32 238.313 113.314M290.803 125.619C292.88 116.625 301.854 111.018 310.847 113.094C319.841 115.171 325.448 124.144 323.372 133.138M368.481 97.2513C346.72 191.507 286.976 258.196 235.039 246.206C183.102 234.215 158.64 148.085 180.4 53.8296C183.617 39.8981 230.544 28.7202 282.482 40.7109C328.54 51.3444 363.071 76.6276 368.054 91.931C368.69 93.8844 368.845 95.6743 368.481 97.2513ZM278.13 173.54L230.848 162.625C227.834 175.681 235.974 188.709 249.031 191.723C262.088 194.737 275.116 186.597 278.13 173.54Z"
                                            class="text-x-prime" stroke="currentColor" stroke-width="6"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <h3
                                        class="text-2xl lg:text-3xl lg:-mt-4 text-x-black text-opacity-70 text-center font-normal">
                                        {{ __('No Data Found') }}
                                    </h3>
                                </li>
                            @endforelse
                        </ul>
                        {{ $cars->appends(request()->input())->links('shared.page.table') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/neo/plugins/fields.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    @if (!Core::lang('en'))
        <script src="{{ asset('js/trans.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    @endif
    <script src="{{ asset('js/fleet.min.js') }}?v={{ env('APP_VERSION') }}"></script>
@endsection
