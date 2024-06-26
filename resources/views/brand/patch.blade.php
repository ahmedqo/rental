@extends('shared.core.base')
@section('title', __('Edit Brand') . ' #' . $data->id)

@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-center lg:text-start text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('Edit Brand') . ' #' . $data->id }}
        </h1>
        <div class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-6">
            <form action="{{ route('actions.brands.patch', $data->id) }}" method="POST" enctype="multipart/form-data"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-6">
                @csrf
                @method('patch')
                <div class="flex flex-col lg:col-span-2">
                    <label class="text-xs text-x-black text-opacity-80 font-x-thin">
                        {{ __('Image') . ' (*)' }}
                    </label>
                    <neo-imagetransfer name="image" class="video"></neo-imagetransfer>
                </div>
                <neo-textbox label="{{ __('Name') . ' (*)' }}" name="name_en" value="{{ $data->name_en }}"
                    class="lg:col-span-2"></neo-textbox>
                <neo-textarea auto="false" label="{{ __('Description') . ' (en)' }}" name="description_en"
                    value="{{ $data->description_en }}" rows="5"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Description') . ' (fr)' }}" name="description_fr"
                    value="{{ $data->description_fr }}" rows="5"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Description') . ' (it)' }}" name="description_it"
                    value="{{ $data->description_it }}" rows="5"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Description') . ' (sp)' }}" name="description_sp"
                    value="{{ $data->description_sp }}" rows="5"></neo-textarea>
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
        const imageTransfer = document.querySelector("neo-imagetransfer");
        imageTransfer.default = [{
            src: "{{ $data->Image->link }}"
        }];
    </script>
@endsection
