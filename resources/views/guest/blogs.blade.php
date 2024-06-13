@extends('shared.guest.base')
@section('title', __('Blogs'))

@section('seo')
    <meta name="description" content="{{ Core::subString('') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">
    <meta property="og:title" content="{{ env('APP_NAME') }} Blogs Page">
    <meta property="og:description" content="{{ Core::subString('') }}">
    <meta property="og:image" content="">
    <meta property="og:url" content="{{ url(url()->full(), secure: true) }}">
    @if (Core::getSetting('x'))
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="{{ Core::getSetting('x') }}">
        <meta name="twitter:title" content="{{ env('APP_NAME') }} Blogs Page">
        <meta name="twitter:description" content="{{ Core::subString('') }}">
        <meta name="twitter:image" content="">
    @endif
@endsection

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
            @forelse ($blogs as $blog)
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
            @empty
                <li class="w-full flex flex-col items-center sm:col-span-2 lg:col-span-4">
                    <svg class="block w-20 h-20 lg:w-40 lg:h-40 pointer-events-none text-x-black text-opacity-70"
                        viewBox="0 0 377 268" fill="none">
                        <path
                            d="M48.0903 99.4856C50.0543 103.898 57.3823 104.921 64.4603 101.77C71.5363 98.6186 75.6803 92.4876 73.7173 88.0756M115.013 69.5856C116.977 73.9976 124.306 75.0196 131.383 71.8686C138.46 68.7186 142.605 62.5866 140.641 58.1756M153.583 13.2126C186.604 87.3796 180.243 162.254 139.376 180.45C98.5103 198.645 38.6103 153.271 5.59034 79.1036C0.709341 68.1416 26.5173 36.9476 67.3853 18.7516C103.627 2.61564 139.541 2.12164 150.61 9.86164C152.023 10.8496 153.032 11.9716 153.584 13.2116L153.583 13.2126ZM139.864 128.652C139.864 128.652 132.266 109.666 112.824 118.322C92.8443 127.217 102.66 145.217 102.66 145.217C107.749 143.044 111.045 141.415 121.32 136.841C131.593 132.267 135.318 130.769 139.864 128.652Z"
                            stroke="currentColor" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M205.744 105.795C207.821 96.8014 216.794 91.1935 225.788 93.2699C234.781 95.3462 240.389 104.32 238.313 113.314M290.803 125.619C292.88 116.625 301.854 111.018 310.847 113.094C319.841 115.171 325.448 124.144 323.372 133.138M368.481 97.2513C346.72 191.507 286.976 258.196 235.039 246.206C183.102 234.215 158.64 148.085 180.4 53.8296C183.617 39.8981 230.544 28.7202 282.482 40.7109C328.54 51.3444 363.071 76.6276 368.054 91.931C368.69 93.8844 368.845 95.6743 368.481 97.2513ZM278.13 173.54L230.848 162.625C227.834 175.681 235.974 188.709 249.031 191.723C262.088 194.737 275.116 186.597 278.13 173.54Z"
                            class="text-x-prime" stroke="currentColor" stroke-width="6" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <h3 class="text-2xl lg:text-3xl lg:-mt-4 text-x-black text-opacity-70 text-center font-normal">
                        {{ __('No Data Found') }}
                    </h3>
                </li>
            @endforelse
        </ul>
    </section>
@endsection
