@extends('shared.guest.base')
@section('title', $blog->title)

@section('content')
    <section>
        <hr class="border-t border-t-x-shade">
        <div class="w-full mx-auto container py-2">
            @include('shared.guest.crumbs', [
                'items' => [
                    [__('Home'), route('views.guest.index')],
                    [__('Blogs'), route('views.guest.blogs')],
                    [$blog->title, route('views.guest.blog', $blog->slug)],
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
