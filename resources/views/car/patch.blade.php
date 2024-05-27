@extends('shared.core.base')
@section('title', __('Edit Car') . ' #' . $data->id)
@section('styles')
    <link rel="stylesheet" href="{{ asset('js/editor/theme.min.css') }}?v={{ env('APP_VERSION') }}" />
@endsection

@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-center lg:text-start text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('Edit Car') . ' #' . $data->id }}
        </h1>
        <div class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4">
            <form action="{{ route('actions.cars.patch', $data->id) }}" method="POST" enctype="multipart/form-data"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-4">
                @csrf
                @method('patch')
                <neo-textbox label="{{ __('Name') . ' (en)' }}" name="name_en" value="{{ $data->name_en }}"></neo-textbox>
                <neo-textbox label="{{ __('Name') . ' (fr)' }}" name="name_fr" value="{{ $data->name_fr }}"></neo-textbox>
                <neo-textbox label="{{ __('Name') . ' (it)' }}" name="name_it" value="{{ $data->name_it }}"></neo-textbox>
                <neo-textbox label="{{ __('Name') . ' (sp)' }}" name="name_sp" value="{{ $data->name_sp }}"></neo-textbox>
                <div class="lg:col-span-2"></div>
                <neo-textarea auto="false" label="{{ __('Details') . ' (en)' }}" name="details_en"
                    value="{{ $data->details_en }}" rows="4"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Details') . ' (fr)' }}" name="details_fr"
                    value="{{ $data->details_fr }}" rows="4"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Details') . ' (it)' }}" name="details_it"
                    value="{{ $data->details_it }}" rows="4"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Details') . ' (sp)' }}" name="details_sp"
                    value="{{ $data->details_sp }}" rows="4"></neo-textarea>
                <div class="lg:col-span-2"></div>
                <neo-imagetransfer name="images[]" class="lg:col-span-2" multiple></neo-imagetransfer>
                <div class="lg:col-span-2"></div>
                <neo-textbox type="number" label="{{ __('Price') }}" name="price"
                    value="{{ $data->price }}"></neo-textbox>
                <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-3 gap-4 lg:col-span-2">
                    <neo-textbox type="number" label="{{ __('Passengers') }}" name="passengers"
                        value="{{ $data->passengers }}"></neo-textbox>
                    <neo-textbox type="number" label="{{ __('Doors') }}" name="doors"
                        value="{{ $data->doors }}"></neo-textbox>
                    <neo-textbox type="number" label="{{ __('Cargo') }}" name="cargo"
                        value="{{ $data->cargo }}"></neo-textbox>
                </div>
                <neo-select label="{{ __('Transmission') }}" name="transmission">
                    @foreach (Core::transmissionList() as $transmission)
                        <neo-select-item value="{{ $transmission }}"
                            {{ $transmission == $data->transmission ? 'active' : '' }}>
                            {{ __(ucwords($transmission)) }}
                        </neo-select-item>
                    @endforeach
                </neo-select>
                <neo-select label="{{ __('Fuel') }}" name="fuel">
                    @foreach (Core::fuelList() as $fuel)
                        <neo-select-item value="{{ $fuel }}" {{ $fuel == $data->fuel ? 'active' : '' }}>
                            {{ __(ucwords($fuel)) }}
                        </neo-select-item>
                    @endforeach
                </neo-select>
                <neo-autocomplete set-query="{{ 'name_' . Core::lang() }}" set-value="id" label="{{ __('Brand') }}"
                    name="brand" value="{{ $data->brand }}"
                    query="{{ $data->Brand->{'name_' . Core::lang()} }}"></neo-autocomplete>
                <neo-autocomplete set-query="{{ 'name_' . Core::lang() }}" set-value="id" label="{{ __('Category') }}"
                    name="category" value="{{ $data->category }}"
                    query="{{ $data->Category->{'name_' . Core::lang()} }}"></neo-autocomplete>
                <neo-select label="{{ __('Promote') }}" name="promote">
                    @foreach (Core::promoteList() as $promote)
                        <neo-select-item value="{{ $promote }}" {{ $promote == $data->promote ? 'active' : '' }}>
                            {{ __(ucwords($promote)) }}
                        </neo-select-item>
                    @endforeach
                </neo-select>
                <neo-select label="{{ __('Status') }}" name="status">
                    @foreach (Core::statusList() as $status)
                        <neo-select-item value="{{ $status }}" {{ $status == $data->status ? 'active' : '' }}>
                            {{ __(ucwords($status)) }}
                        </neo-select-item>
                    @endforeach
                </neo-select>
                <div class="lg:col-span-2"></div>
                <textarea id="description_en" name="description_en" placeholder="{{ __('Description') }}  (en)" rows="3">{{ $data->description_en }}</textarea>
                <textarea id="description_fr" name="description_ar" placeholder="{{ __('Description') }}  (fr)" rows="3">{{ $data->description_fr }}</textarea>
                <textarea id="description_it" name="description_en" placeholder="{{ __('Description') }}  (it)" rows="3">{{ $data->description_it }}</textarea>
                <textarea id="description_sp" name="description_ar" placeholder="{{ __('Description') }}  (sp)" rows="3">{{ $data->description_sp }}</textarea>
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
        const imageTransfer = document.querySelector("neo-imagetransfer");
        imageTransfer.default = {!! $data->Images->map(function ($Image) {
            return ['id' => $Image->id, 'src' => $Image->Link];
        }) !!};
        CarInitializer([{
            Auto: document.querySelector("neo-autocomplete[name=brand]"),
            Link: "{{ route('actions.brands.search') }}"
        }, {
            Auto: document.querySelector("neo-autocomplete[name=category]"),
            Link: "{{ route('actions.categories.search') }}"
        }], imageTransfer);
    </script>
@endsection
