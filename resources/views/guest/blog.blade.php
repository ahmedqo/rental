@extends('shared.guest.base')
@section('title', $blog->title)

@section('seo')
    <meta name="description" content="{{ Core::subString($blog->details ?? '') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ env('COMPANY_NAME') }}">
    <meta property="og:title" content="{{ env('COMPANY_NAME') }} {{ $blog->title }} Page">
    <meta property="og:description" content="{{ Core::subString('') }}">
    <meta property="og:image" content="{{ $blog->Image->Link }}">
    <meta property="og:url" content="{{ url(url()->full(), secure: true) }}">
    @if (Core::getSetting('x'))
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="{{ Core::getSetting('x') }}">
        <meta name="twitter:title" content="{{ env('COMPANY_NAME') }} {{ $blog->title }} Page">
        <meta name="twitter:description" content="{{ Core::subString($blog->details ?? '') }}">
        <meta name="twitter:image" content="{{ $blog->Image->Link }}">
    @endif
    <script type="application/ld+json">
        {!! json_encode($json) !!}
    </script>
@endsection

@section('content')
    <section>
        <hr class="border-t border-t-x-shade">
        <div class="w-full mx-auto container py-2">
            @include('shared.guest.crumbs', [
                'items' => [
                    [__('Home'), route('views.guest.index')],
                    [__('Blogs'), route('views.guest.blogs')],
                    [ucwords($blog->title), route('views.guest.blog', $blog->slug)],
                ],
            ])
        </div>
    </section>
    <section>
        <div class="w-full aspect-[16/6] max-h-[36rem] relative isolate flex items-end justify-center lg:py-6">
            <h1 class="text-x-white font-x-huge text-2xl lg:text-5xl lg:w-9/12 p-4 container mx-auto text-center">
                {{ $blog->title }}
            </h1>
            <img src="{{ $blog->Image->Link }}" alt="{{ $blog->title }} Thumbnail Image" loading="lazy"
                class="w-full h-full absolute inset-0 z-[-1] object-cover object-center" />
        </div>
        <div class="w-full container mx-auto p-4 lg:w-9/12">
            <div class="w-full revert">
                {!! $blog->content !!}
            </div>
        </div>
    </section>
@endsection
