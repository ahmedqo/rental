@extends('shared.core.base')
@section('title', __('Edit Order') . ' #' . $data->id)
@php
    $charges = json_decode($data->charges, true);
@endphp
@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-center lg:text-start text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('Edit Order') . ' #' . $data->id }}
        </h1>
        <div class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-6">
            <form action="{{ route('actions.orders.patch', $data->id) }}" method="POST" enctype="multipart/form-data"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-6">
                @csrf
                @method('patch')
                <input id="charge_value" type="hidden" name="charges" value="{!! $data->charges !!}" />
                <neo-textbox label="{{ __('Name') }}" name="name" value="{{ $data->name }}"></neo-textbox>
                <neo-textbox type="tel" label="{{ __('Phone') }}" name="phone"
                    value="{{ $data->phone }}"></neo-textbox>
                <neo-textbox type="email" label="{{ __('Email') }}" name="email"
                    value="{{ $data->email }}"></neo-textbox>
                <neo-select label="{{ __('Location') }}" name="location">
                    <neo-select-item value="airport" {{ $data->location == 'airport' ? 'active' : '' }}>
                        {{ __(ucwords('Airport')) }}
                    </neo-select-item>
                    <neo-select-item value="city center" {{ $data->location == 'city center' ? 'active' : '' }}>
                        {{ __(ucwords('City Center')) }}
                    </neo-select-item>
                </neo-select>
                <neo-autocomplete set-query="{{ 'name_' . Core::lang() }}" set-value="id" label="{{ __('Car') }}"
                    name="car" value="{{ $data->car }}" query="{{ $data->Car->{'name_' . Core::lang()} }}"
                    class="lg:col-span-2"></neo-autocomplete>
                <neo-datepicker full-day="3" label="{{ __('Pick-up Date') }}" name="from_date"
                    value="{{ Carbon::parse($data->from)->format('Y-m-d') ?? '#now' }}" format="mmm dd"></neo-datepicker>
                <neo-datepicker full-day="3" label="{{ __('Drop-off Date') }}" name="to_date"
                    value="{{ Carbon::parse($data->to)->format('Y-m-d') ?? '#now+1' }}" format="mmm dd"></neo-datepicker>
                <neo-timepicker label="{{ __('Pick-up Time') }}" name="from_time"
                    value="{{ Carbon::parse($data->from)->format('H:i') ?? '#now' }}" format="HH:MM AA"></neo-timepicker>
                <neo-timepicker label="{{ __('Drop-off Time') }}" name="to_time"
                    value="{{ Carbon::parse($data->to)->format('H:i') ?? '#now' }}" format="HH:MM AA"></neo-timepicker>
                <neo-textbox id="charge_trigger" label="{{ __('Charges') }}" name="total" value="{{ old('total') }}"
                    value="{{ $charges['total'] }}" disable></neo-textbox>
                <neo-select label="{{ __('Status') }}" name="status">
                    @foreach (Core::orderList() as $status)
                        <neo-select-item value="{{ $status }}" {{ $status == $data->status ? 'active' : '' }}>
                            {{ __(ucwords($status)) }}
                        </neo-select-item>
                    @endforeach
                </neo-select>
                <div class="w-full flex lg:col-span-2">
                    <neo-button
                        class="w-full lg:w-max lg:px-20 lg:ms-auto px-4 py-2 text-base lg:text-lg font-x-huge text-x-white bg-x-core bg-gradient-to-br rtl:bg-gradient-to-bl">
                        <span>{{ __('Save') }}</span>
                    </neo-button>
                </div>
            </form>
        </div>
    </div>
    <neo-overlay id="charge_modal" label="{{ __('Charges') }}">
        <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-2 p-6">
            <neo-textbox id="charge_name" label="{{ __('Name') }}"></neo-textbox>
            <neo-textbox type="number" id="charge_cost" label="{{ __('Cost') }}"></neo-textbox>
            <div class="w-full flex lg:col-span-2">
                <neo-button id="charge_add"
                    class="w-full lg:w-max lg:px-20 lg:ms-auto px-4 py-2 text-base lg:text-lg font-x-huge text-x-white bg-x-core bg-gradient-to-br rtl:bg-gradient-to-bl">
                    <span>{{ __('Add') }}</span>
                </neo-button>
            </div>
            <div class="w-full border border-x-shade bg-x-light rounded-x-thin overflow-auto lg:col-span-2 mt-4">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <td class="text-x-black text-sm font-bold px-4 py-2 first:ps-8 last:pe-8">
                                {{ __('Name') }}
                            </td>
                            <td class="text-x-black text-sm font-bold text-center px-4 py-2 w-[100px] first:ps-8 last:pe-8">
                                {{ __('Cost') }} ($)
                            </td>
                            <td class="text-x-black text-sm font-bold text-center px-4 py-2 w-[20px] first:ps-8 last:pe-8">
                            </td>
                        </tr>
                    </thead>
                    <tbody id="charge_show"></tbody>
                </table>
            </div>
        </div>
    </neo-overlay>
@endsection

@section('scripts')
    <script>
        OrderInitializer({
                Search: "{{ route('actions.cars.search') }}"
            }
            @if ($data->charges)
                , {!! json_encode($charges['items']) !!}
            @endif );
    </script>
@endsection
