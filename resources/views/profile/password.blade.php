@extends('shared.core.base')
@section('title', __('Update Password'))

@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-center lg:text-start text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('Update Password') }}
        </h1>
        <div class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4">
            <form action="{{ route('actions.password.patch') }}" method="POST"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-4 gap-4">
                @csrf
                @method('patch')
                <neo-password label="{{ __('Old Password') }}" name="old_password" value="{{ old('old_password') }}"
                    class="lg:col-span-4"></neo-password>
                <neo-password label="{{ __('New Password') }}" name="new_password" value="{{ old('new_password') }}"
                    class="lg:col-span-2"></neo-password>
                <neo-password label="{{ __('Confirm Password') }}" name="confirm_password"
                    value="{{ old('confirm_password') }}" class="lg:col-span-2"></neo-password>
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
