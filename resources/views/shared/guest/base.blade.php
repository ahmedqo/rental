<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ Core::lang('ar') ? 'rtl' : 'ltr' }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('shared.base.styles', ['type' => 'guest'])
    @yield('styles')
    <title>@yield('title')</title>
</head>

<body close>
    <section id="neo-page-cover">
        <img src="{{ asset('img/logo.webp') }}?v={{ env('APP_VERSION') }}" alt="{{ env('APP_NAME') }} logo image"
            class="block w-36" width="916" height="516" />
    </section>
    <neo-wrapper class="bg-[#fcfcfc]">
        @include('shared.guest.header')
        <main class="w-full flex flex-col">
            @yield('content')
        </main>
        @include('shared.guest.footer')
    </neo-wrapper>
    <neo-toaster horisontal="center" vertical="end"></neo-toaster>
    @include('shared.base.scripts', ['type' => 'guest'])
    @yield('scripts')
</body>

</html>
