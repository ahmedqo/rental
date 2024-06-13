@extends('shared.core.base')
@section('title', __('Edit Reservation') . ' #' . $data->id)
@php
    $charges = json_decode($data->charges, true);
@endphp
@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-center lg:text-start text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('Edit Reservation') . ' #' . $data->id }}
        </h1>
        <div class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-6">
            <form action="{{ route('actions.reservations.patch', $data->id) }}" method="POST" enctype="multipart/form-data"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-6">
                @csrf
                @method('patch')
                <input id="charge_value" type="hidden" name="charges" value="{{ $data->charges }}" />
                <neo-textbox label="{{ __('Name') . ' (*)' }}" name="name" value="{{ $data->name }}"></neo-textbox>
                <neo-textbox type="tel" label="{{ __('Phone') . ' (*)' }}" name="phone"
                    value="{{ $data->phone }}"></neo-textbox>
                <neo-textbox type="email" label="{{ __('Email') . ' (*)' }}" name="email"
                    value="{{ $data->email }}"></neo-textbox>
                <neo-select label="{{ __('Location') . ' (*)' }}" name="location">
                    @foreach (Core::locationList() as $location)
                        <neo-select-item value="{{ $location }}"{{ $data->location == $location ? 'active' : '' }}>
                            {{ ucwords(__($location)) }}
                        </neo-select-item>
                    @endforeach
                </neo-select>
                <neo-autocomplete set-query="{{ 'name_' . Core::lang() }}" set-value="id" label="{{ __('Car') . ' (*)' }}"
                    name="car" value="{{ $data->car }}" query="{{ $data->Car->{'name_' . Core::lang()} }}"
                    class="lg:col-span-2">
                    <svg slot="end" class="icon hidden w-[1.2rem] h-[1.2rem] pointer-events-none text-x-black"
                        fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M196-305q-28-40-39.5-83.5T145-480q0-136 98.5-234.5T476-813h43l-69-70 45-45 160 160-160 160-46-45 69-69h-39q-99 0-171 72t-72 170q0 32 6.5 60.5T260-369l-64 64ZM464-29 304-189l160-162 45 47-70 69h43q98 1 170-71t72-172q0-31-6.5-59.5T699-589l65-64q27 43 39 86t12 89q0 137-98.5 236.5T485-143h-46l70 70-45 44Z" />
                    </svg>
                </neo-autocomplete>
                <neo-datepicker full-day="3" label="{{ __('Pick-up Date') . ' (*)' }}" name="from_date"
                    value="{{ Carbon::parse($data->from)->format('Y-m-d') ?? '#now' }}" format="mmm dd"></neo-datepicker>
                <neo-datepicker full-day="3" label="{{ __('Drop-off Date') . ' (*)' }}" name="to_date"
                    value="{{ Carbon::parse($data->to)->format('Y-m-d') ?? '#now+1' }}" format="mmm dd"></neo-datepicker>
                <neo-timepicker label="{{ __('Pick-up Time') . ' (*)' }}" name="from_time"
                    value="{{ Carbon::parse($data->from)->format('H:i') ?? '#now' }}" format="HH:MM AA"></neo-timepicker>
                <neo-timepicker label="{{ __('Drop-off Time') . ' (*)' }}" name="to_time"
                    value="{{ Carbon::parse($data->to)->format('H:i') ?? '#now' }}" format="HH:MM AA"></neo-timepicker>
                <neo-textbox id="charge_trigger" label="{{ __('Charges') }}" name="total" value="{{ old('total') }}"
                    value="{{ $charges['total'] }}" class="cursor-pointer" disable>
                    <svg slot="end" class="block w-[1.2rem] h-[1.2rem] pointer-events-none text-x-black"
                        fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M700-412H330v-136h370l-58-59 95-96 222 223-222 222-95-95 58-59ZM474-628v-122H210v540h264v-122h136v122q0 57-39.5 96.5T474-74H210q-57 0-96.5-39.5T74-210v-540q0-57 39.5-96.5T210-886h264q57 0 96.5 39.5T610-750v122H474Z" />
                    </svg>
                </neo-textbox>
                <neo-select label="{{ __('Status') . ' (*)' }}" name="status">
                    @foreach (Core::orderList() as $status)
                        <neo-select-item value="{{ $status }}" {{ $status == $data->status ? 'active' : '' }}>
                            {{ ucwords(__($status)) }}
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
        ReservationInitializer({
                Search: "{{ route('actions.cars.search') }}"
            }
            @if ($data->charges)
                , {!! json_encode($charges['items']) !!}
            @endif );
    </script>
@endsection
