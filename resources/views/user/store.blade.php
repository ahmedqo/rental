@extends('shared.core.base')
@section('title', __('New User'))

@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-center lg:text-start text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('New User') }}
        </h1>
        <div class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4">
            <form action="{{ route('actions.users.store') }}" method="POST"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-4 gap-4">
                @csrf
                <neo-textbox label="{{ __('First Name') }}" name="first_name" value="{{ old('first_name') }}"
                    class="lg:col-span-2"></neo-textbox>
                <neo-textbox label="{{ __('Last Name') }}" name="last_name" value="{{ old('last_name') }}"
                    class="lg:col-span-2"></neo-textbox>
                <neo-select label="{{ __('Gender') }}" name="gender" class="lg:col-span-2">
                    @foreach (Core::genderList() as $gender)
                        <neo-select-item value="{{ $gender }}" {{ $gender == old('gender') ? 'active' : '' }}>
                            {{ ucwords(__($gender)) }}
                        </neo-select-item>
                    @endforeach
                </neo-select>
                <neo-datepicker {{ !Core::lang('ar') ? 'full-day=3' : '' }} label="{{ __('Birth Date') }}"
                    name="birth_date" format="dddd dd mmmm yyyy" value="{{ old('birth_date') }}"
                    class="lg:col-span-2"></neo-datepicker>
                <neo-textbox type="email" label="{{ __('Email') }}" name="email" value="{{ old('email') }}"
                    class="lg:col-span-2"></neo-textbox>
                <neo-textbox type="tel" label="{{ __('Phone') }}" name="phone" value="{{ old('phone') }}"
                    class="lg:col-span-2"></neo-textbox>
                <neo-textarea label="{{ __('Address') }}" name="address" value="{{ old('address') }}"
                    class="lg:col-span-4"></neo-textarea>
                <div class="w-full flex lg:col-span-4">
                    <neo-button
                        class="w-full lg:w-max lg:px-20 lg:ms-auto px-4 py-2 text-base lg:text-lg font-x-huge text-x-white bg-x-core bg-gradient-to-br rtl:bg-gradient-to-bl">
                        <span>{{ __('Save') }}</span>
                    </neo-button>
                </div>
            </form>
        </div>
    </div>
@endsection
