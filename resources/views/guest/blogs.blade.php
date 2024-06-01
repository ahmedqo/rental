@extends('shared.guest.base')
@section('title', __('Blogs'))

@section('content')
    <section>
        <hr class="border-t border-t-x-shade">
        <div class="w-full mx-auto container py-2">
            @include('shared.guest.crumbs', [
                'items' => [[__('Home'), route('views.guest.index')], [__('Blogs'), route('views.guest.blogs')]],
            ])
        </div>
        <hr class="border-t border-t-x-shade">
    </section>
    <section class="w-full container mx-auto p-4 my-4 lg:my-6">
        <ul class="w-full grid grid-rows-1 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
            @foreach ($blogs as $blog)
                @for ($i = 0; $i < 5; $i++)
                    <li class="w-fill flex flex-col gap-2 rounded-x-huge bg-x-light p-4">
                        <a href="{{ route('views.guest.blog', $blog->slug) }}" class="block shadow-xl">
                            <img src="{{ $blog->Image->Link }}" alt="{{ $blog->title }} Thumbnail Image" loading="lazy"
                                class="w-full aspect-video rounded-x-thin object-cover object-center" />
                        </a>
                        <a href="{{ route('views.guest.blog', $blog->slug) }}">
                            <h4 class="text-x-black font-x-huge text-base">
                                {{ $blog->title }}
                            </h4>
                        </a>
                        @if ($blog->details)
                            <p class="text-sm text-x-black text-opacity-80">
                                {{ Core::subString($blog->details, 150) }}
                            </p>
                        @endif
                        <div class="w-full flex flex-wrap items-center gap-2">
                            <svg class="block w-3 h-3 pointer-events-none text-x-black text-opacity-50" fill="currentcolor"
                                viewBox="0 -960 960 960">
                                <path
                                    d="M568-272 412-428v-228h136v171l115 116-95 97ZM412-716v-136h136v136H412Zm304 304v-136h136v136H716ZM412-108v-136h136v136H412ZM108-412v-136h136v136H108ZM480-34q-92.64 0-174.47-34.6-81.82-34.61-142.07-94.86T68.6-305.53Q34-387.36 34-480q0-92.9 34.66-174.45 34.67-81.55 95.18-141.94 60.51-60.39 142.07-95Q387.48-926 480-926q92.89 0 174.48 34.59 81.59 34.6 141.96 94.97 60.37 60.37 94.97 141.99Q926-572.83 926-479.92q0 92.92-34.61 174.25-34.61 81.32-95 141.83Q736-103.33 654.45-68.66 572.9-34 480-34Zm-.23-136q130.74 0 220.49-89.51Q790-349.03 790-479.77t-89.51-220.49Q610.97-790 480.23-790t-220.49 89.51Q170-610.97 170-480.23t89.51 220.49Q349.03-170 479.77-170Zm.23-310Z" />
                            </svg>
                            <span class="text-xs text-x-black text-opacity-50 font-x-thin">
                                {{ $blog->updated_at->diffForHumans() }}
                            </span>
                        </div>
                    </li>
                @endfor
            @endforeach
        </ul>
    </section>
@endsection
