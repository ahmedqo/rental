<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ Core::lang('ar') ? 'rtl' : 'ltr' }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="google-site-verification" content="your-verification-code">
    <meta name="referrer" content="no-referrer">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="theme-color" content="#2196f3">
    @yield('seo')
    <link rel="canonical" href="{{ url(url()->full(), secure: true) }}">
    @include('shared.base.styles', ['type' => 'guest'])
    @yield('styles')
    <title>@yield('title')</title>
</head>

<body close>
    <section id="neo-page-cover">
        <img src="{{ asset('img/logo.webp') }}?v={{ env('APP_VERSION') }}" alt="{{ env('COMPANY_NAME') }} logo image"
            class="block w-48" width="500" height="349" />
    </section>
    <neo-wrapper class="bg-w-white">
        @include('shared.guest.header')
        <main class="w-full flex flex-col">
            @yield('content')
        </main>
        @include('shared.guest.footer')
    </neo-wrapper>
    <neo-toaster horisontal="end" vertical="end"></neo-toaster>
    @include('shared.base.scripts', ['type' => 'guest'])
    @yield('scripts')
</body>

</html>
