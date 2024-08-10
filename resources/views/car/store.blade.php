@extends('shared.core.base')
@section('title', __('New Car'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('js/editor/theme.min.css') }}?v={{ env('APP_VERSION') }}" />
@endsection

@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-center lg:text-start text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('New Car') }}
        </h1>
        <div class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-6">
            <form action="{{ route('actions.cars.store') }}" method="POST" enctype="multipart/form-data"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-6">
                @csrf
                <neo-textbox label="{{ __('Name') . ' (*)' }}" name="name_en"
                    value="{{ old('name_en') }}"class="lg:col-span-2"></neo-textbox>
                <div class="flex flex-col lg:col-span-2">
                    <label class="text-xs text-x-black text-opacity-80 font-x-thin">
                        {{ __('Price') . ' (*)' }}
                    </label>
                    <div class="grid grid-rows-1 grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach (['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'] as $price)
                            <neo-textbox type="number" label="{{ ucwords(__($price)) . ' (*)' }}"
                                name="price_{{ $price }}" value="{{ old('price_' . $price) }}"></neo-textbox>
                        @endforeach
                    </div>
                </div>
                <neo-textarea auto="false" label="{{ __('Details') . ' (en)' }}" name="details_en"
                    value="{{ old('details_en') }}" rows="4"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Details') . ' (fr)' }}" name="details_fr"
                    value="{{ old('details_fr') }}" rows="4"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Details') . ' (it)' }}" name="details_it"
                    value="{{ old('details_it') }}" rows="4"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Details') . ' (sp)' }}" name="details_sp"
                    value="{{ old('details_sp') }}" rows="4"></neo-textarea>
                <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-3 gap-6 lg:col-span-2">
                    <neo-textbox type="number" label="{{ __('Passengers') . ' (*)' }}" name="passengers"
                        value="{{ old('passengers') }}"></neo-textbox>
                    <neo-textbox type="number" label="{{ __('Doors') . ' (*)' }}" name="doors"
                        value="{{ old('doors') }}"></neo-textbox>
                    <neo-textbox type="number" label="{{ __('Cargo') . ' (*)' }}" name="cargo"
                        value="{{ old('cargo') }}"></neo-textbox>
                </div>
                <neo-select label="{{ __('Transmission') . ' (*)' }}" name="transmission">
                    @foreach (Core::transmissionList() as $transmission)
                        <neo-select-item value="{{ $transmission }}"
                            {{ $transmission == old('transmission') ? 'active' : '' }}>
                            {{ __(ucwords($transmission)) }}
                        </neo-select-item>
                    @endforeach
                </neo-select>
                <neo-select label="{{ __('Fuel') . ' (*)' }}" name="fuel">
                    @foreach (Core::fuelList() as $fuel)
                        <neo-select-item value="{{ $fuel }}" {{ $fuel == old('fuel') ? 'active' : '' }}>
                            {{ __(ucwords($fuel)) }}
                        </neo-select-item>
                    @endforeach
                </neo-select>
                <neo-autocomplete set-query="{{ 'name_' . Core::lang() }}" set-value="id"
                    label="{{ __('Brand') . ' (*)' }}" name="brand" value="{{ old('brand') }}"
                    query="{{ old('brand_name') }}">
                    <svg slot="end" class="icon hidden w-[1.2rem] h-[1.2rem] pointer-events-none text-x-black"
                        fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M196-305q-28-40-39.5-83.5T145-480q0-136 98.5-234.5T476-813h43l-69-70 45-45 160 160-160 160-46-45 69-69h-39q-99 0-171 72t-72 170q0 32 6.5 60.5T260-369l-64 64ZM464-29 304-189l160-162 45 47-70 69h43q98 1 170-71t72-172q0-31-6.5-59.5T699-589l65-64q27 43 39 86t12 89q0 137-98.5 236.5T485-143h-46l70 70-45 44Z" />
                    </svg>
                </neo-autocomplete>
                <neo-autocomplete set-query="{{ 'name_' . Core::lang() }}" set-value="id"
                    label="{{ __('Category') . ' (*)' }}" name="category" value="{{ old('category') }}"
                    query="{{ old('category_name') }}">
                    <svg slot="end" class="icon hidden w-[1.2rem] h-[1.2rem] pointer-events-none text-x-black"
                        fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M196-305q-28-40-39.5-83.5T145-480q0-136 98.5-234.5T476-813h43l-69-70 45-45 160 160-160 160-46-45 69-69h-39q-99 0-171 72t-72 170q0 32 6.5 60.5T260-369l-64 64ZM464-29 304-189l160-162 45 47-70 69h43q98 1 170-71t72-172q0-31-6.5-59.5T699-589l65-64q27 43 39 86t12 89q0 137-98.5 236.5T485-143h-46l70 70-45 44Z" />
                    </svg>
                </neo-autocomplete>
                <neo-select label="{{ __('Promote') . ' (*)' }}" name="promote">
                    @foreach (Core::promoteList() as $promote)
                        <neo-select-item value="{{ $promote[0] }}"
                            {{ old('promote') !== null && $promote[0] == old('promote') ? 'active' : '' }}>
                            {{ __(ucwords($promote[1])) }}
                        </neo-select-item>
                    @endforeach
                </neo-select>
                <neo-select label="{{ __('Status') . ' (*)' }}" name="status">
                    @foreach (Core::statusList() as $status)
                        <neo-select-item value="{{ $status }}" {{ $status == old('status') ? 'active' : '' }}>
                            {{ __(ucwords($status)) }}
                        </neo-select-item>
                    @endforeach
                </neo-select>
                <div class="flex flex-col lg:col-span-2">
                    <label class="text-xs text-x-black text-opacity-80 font-x-thin">
                        {{ __('Images') . ' (*)' }}
                    </label>
                    <neo-imagetransfer name="images[]" class="lg:col-span-2" multiple></neo-imagetransfer>
                </div>
                <div class="flex flex-col">
                    <label class="text-xs text-x-black text-opacity-80 font-x-thin">
                        {{ __('Description') }} (en)
                    </label>
                    <textarea id="description_en" name="description_en" placeholder="{{ __('Description') }}  (en)" rows="3">{{ old('description_en') }}</textarea>
                </div>
                <div class="flex flex-col">
                    <label class="text-xs text-x-black text-opacity-80 font-x-thin">
                        {{ __('Description') }} (fr)
                    </label>
                    <textarea id="description_fr" name="description_fr" placeholder="{{ __('Description') }}  (fr)" rows="3">{{ old('description_fr') }}</textarea>
                </div>
                <div class="flex flex-col">
                    <label class="text-xs text-x-black text-opacity-80 font-x-thin">
                        {{ __('Description') }} (it)
                    </label>
                    <textarea id="description_it" name="description_it" placeholder="{{ __('Description') }}  (it)" rows="3">{{ old('description_it') }}</textarea>
                </div>
                <div class="flex flex-col">
                    <label class="text-xs text-x-black text-opacity-80 font-x-thin">
                        {{ __('Description') }} (sp)
                    </label>
                    <textarea id="description_sp" name="description_sp" placeholder="{{ __('Description') }}  (sp)" rows="3">{{ old('description_sp') }}</textarea>
                </div>
                <div class="w-full flex lg:col-span-2">
                    <neo-button
                        class="w-full lg:w-max lg:px-20 lg:ms-auto px-4 py-2 text-base lg:text-lg font-x-huge text-x-white bg-x-core bg-gradient-to-br rtl:bg-gradient-to-bl">
                        <span>{{ __('Save') }}</span>
                    </neo-button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/editor/rte.js') }}?v={{ env('APP_VERSION') }}"></script>
    <script type="text/javascript" src="{{ asset('js/editor/plugins/all_plugins.js') }}?v={{ env('APP_VERSION') }}">
    </script>
    <script src="{{ asset('js/editor/lang/rte-lang-' . app()->getLocale() . '.js') }}?v={{ env('APP_VERSION') }}">
    </script>
    <script>
        CarInitializer([{
            Auto: document.querySelector("neo-autocomplete[name=brand]"),
            Link: "{{ route('actions.brands.search') }}"
        }, {
            Auto: document.querySelector("neo-autocomplete[name=category]"),
            Link: "{{ route('actions.categories.search') }}"
        }]);
    </script>
@endsection
