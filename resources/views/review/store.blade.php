@extends('shared.core.base')
@section('title', __('New Review'))

@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-center lg:text-start text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('New Review') }}
        </h1>
        <div class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-6">
            <form action="{{ route('actions.reviews.store') }}" method="POST" enctype="multipart/form-data"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-6">
                @csrf
                <neo-autocomplete set-query="{{ 'name_' . Core::lang() }}" set-value="id" label="{{ __('Car') . ' (*)' }}"
                    name="car" value="{{ old('car') }}" query="{{ old('car_name') }}">
                    <svg slot="end" class="icon hidden w-[1.2rem] h-[1.2rem] pointer-events-none text-x-black"
                        fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M196-305q-28-40-39.5-83.5T145-480q0-136 98.5-234.5T476-813h43l-69-70 45-45 160 160-160 160-46-45 69-69h-39q-99 0-171 72t-72 170q0 32 6.5 60.5T260-369l-64 64ZM464-29 304-189l160-162 45 47-70 69h43q98 1 170-71t72-172q0-31-6.5-59.5T699-589l65-64q27 43 39 86t12 89q0 137-98.5 236.5T485-143h-46l70 70-45 44Z" />
                    </svg>
                </neo-autocomplete>
                <neo-select label="{{ __('Status') . ' (*)' }}" name="status">
                    @foreach (Core::rateList() as $status)
                        <neo-select-item value="{{ $status }}" {{ $status == old('status') ? 'active' : '' }}>
                            {{ __(ucwords($status)) }}
                        </neo-select-item>
                    @endforeach
                </neo-select>
                <neo-textbox label="{{ __('Name') . ' (*)' }}" name="name" value="{{ old('name') }}"></neo-textbox>
                <neo-textbox type="email" label="{{ __('Email') . ' (*)' }}" name="email"
                    value="{{ old('email') }}"></neo-textbox>
                <neo-textarea auto="false" label="{{ __('Content') . ' (*)' }}" name="content"
                    value="{{ old('content') }}" rows="5" class="lg:col-span-2"></neo-textarea>
                <div class="flex flex-col lg:col-span-2">
                    <label class="text-xs text-x-black text-opacity-80 font-x-thin">
                        {{ __('Rate') . ' (*)' }}
                    </label>
                    <div class="w-full flex gap-2 rounded-x-thin">
                        @for ($i = 1; $i < 6; $i++)
                            <div class="flex-[1] relative">
                                <input type="radio" id="rate-{{ $i }}" name="rate"
                                    value="{{ $i }}" {{ old('rate') == $i ? 'checked' : '' }}
                                    class="w-0 h-0 absolute inset-0 pointer-events-none opacity-0 peer" />
                                <label for="rate-{{ $i }}"
                                    class="w-full p-2 flex font-x-huge text-base items-center justify-center gap-2 bg-x-light border border-x-shade rounded-x-thin peer-checked:outline peer-checked:outline-2 peer-checked:-outline-offset-2 peer-checked:outline-x-prime peer-focus:bg-x-prime peer-focus:bg-opacity-20 hover:bg-x-prime hover:bg-opacity-20">
                                    {{ $i }}
                                    <svg class="block w-2.5 h-2.5 pointer-events-none" viewBox="0 -960 960 960"
                                        fill="currentColor">
                                        <path
                                            d="M279.78-736.59 394-884q16.48-20.94 39.38-31.47Q456.29-926 480-926q25 0 47.67 10.53Q550.33-904.94 567-884l113.22 147.41L852-679q36 12 55 41.5t19 62.45q0 17.05-4.5 33.55Q917-525 906-510L797-353.41 801-187q0 47-34 79t-82 32q-2 0-23-2l-182-50-181.11 50.08Q293-76 287-75.5q-6 .5-12 .5-47.2 0-81.6-32.5Q159-140 160-188l4-165L53.79-510.33Q43-526 38.5-542.17 34-558.33 34-575q0-34 19.42-63.11Q72.84-667.21 109-679l170.78-57.59Z" />
                                    </svg>
                                </label>
                            </div>
                        @endfor
                    </div>
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
    <script>
        ReviewInitializer({
            Search: "{{ route('actions.cars.search') }}"
        });
    </script>
@endsection
