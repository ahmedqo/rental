@extends('shared.core.base')
@section('title', __('New Blog'))
@section('styles')
    <link rel="stylesheet" href="{{ asset('js/editor/theme.min.css') }}?v={{ env('APP_VERSION') }}" />
@endsection

@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-center lg:text-start text-xl lg:text-2xl text-x-black font-x-thin">
            {{ __('New Blog') }}
        </h1>
        <div class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-6">
            <form action="{{ route('actions.blogs.store') }}" method="POST" enctype="multipart/form-data"
                class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-2 gap-6">
                @csrf
                <div class="flex flex-col lg:col-span-2">
                    <label class="text-sm text-x-black font-x-thin">
                        {{ __('Image') }}
                    </label>
                    <neo-imagetransfer name="image" class="video"></neo-imagetransfer>
                </div>
                <neo-textbox label="{{ __('Title') . ' (en)' }}" name="title_en"
                    value="{{ old('title_en') }}"></neo-textbox>
                <neo-textbox label="{{ __('Title') . ' (fr)' }}" name="title_fr"
                    value="{{ old('title_fr') }}"></neo-textbox>
                <neo-textbox label="{{ __('Title') . ' (it)' }}" name="title_it"
                    value="{{ old('title_it') }}"></neo-textbox>
                <neo-textbox label="{{ __('Title') . ' (sp)' }}" name="title_sp"
                    value="{{ old('title_sp') }}"></neo-textbox>
                <neo-textarea auto="false" label="{{ __('Details') . ' (en)' }}" name="details_en"
                    value="{{ old('details_en') }}" rows="5"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Details') . ' (fr)' }}" name="details_fr"
                    value="{{ old('details_fr') }}" rows="5"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Details') . ' (it)' }}" name="details_it"
                    value="{{ old('details_it') }}" rows="5"></neo-textarea>
                <neo-textarea auto="false" label="{{ __('Details') . ' (sp)' }}" name="details_sp"
                    value="{{ old('details_sp') }}" rows="5"></neo-textarea>
                <div class="flex flex-col">
                    <label class="text-sm text-x-black font-x-thin">
                        {{ __('Content') }} (en)
                    </label>
                    <textarea id="content_en" name="content_en" placeholder="{{ __('Content') }}  (en)" rows="3">{{ old('content_en') }}</textarea>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-x-black font-x-thin">
                        {{ __('Content') }} (fr)
                    </label>
                    <textarea id="content_fr" name="content_fr" placeholder="{{ __('Content') }}  (fr)" rows="3">{{ old('content_fr') }}</textarea>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-x-black font-x-thin">
                        {{ __('Content') }} (it)
                    </label>
                    <textarea id="content_it" name="content_it" placeholder="{{ __('Content') }}  (it)" rows="3">{{ old('content_it') }}</textarea>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-x-black font-x-thin">
                        {{ __('Content') }} (sp)
                    </label>
                    <textarea id="content_sp" name="content_sp" placeholder="{{ __('Content') }}  (sp)" rows="3">{{ old('content_sp') }}</textarea>
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
        BlogInitializer();
    </script>
@endsection
