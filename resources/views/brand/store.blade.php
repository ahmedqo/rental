@extends('shared.core.base')
@section('title', __('New Brand'))

@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-center lg:text-start text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('New Brand') }}
        </h1>
        <div class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-6">
            <form action="{{ route('actions.brands.store') }}" method="POST" enctype="multipart/form-data"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-6">
                @csrf
                <div class="flex flex-col lg:col-span-2">
                    <label class="text-sm text-x-black font-x-thin">
                        {{ __('Image') . ' (*)' }}
                    </label>
                    <neo-imagetransfer name="image" class="video"></neo-imagetransfer>
                </div>
                <neo-textbox label="{{ __('Name') . ' (*)' }}" name="name_en" value="{{ old('name_en') }}"
                    class="lg:col-span-2"></neo-textbox>
                <neo-textarea auto="false" label="{{ __('Description') . ' (en)' }}" name="description_en"
                    value="{{ old('description_en') }}" rows="5"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Description') . ' (fr)' }}" name="description_fr"
                    value="{{ old('description_fr') }}" rows="5"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Description') . ' (it)' }}" name="description_it"
                    value="{{ old('description_it') }}" rows="5"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Description') . ' (sp)' }}" name="description_sp"
                    value="{{ old('description_sp') }}" rows="5"></neo-textarea>
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
