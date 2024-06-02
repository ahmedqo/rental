@extends('shared.guest.base')
@section('title', $data['title'])

@section('content')
    <section>
        <hr class="border-t border-t-x-shade">
        <div class="w-full mx-auto container py-2">
            @include('shared.guest.crumbs', [
                'items' => [[__('Home'), route('views.guest.index')], [$data['title'], $data['link']]],
            ])
        </div>
        <hr class="border-t border-t-x-shade">
    </section>
    <section class="my-4 lg:my-6">
        <div class="w-full mx-auto container p-4">
            <div class="w-full grid grid-rows-1 grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-10">
                <div class="w-full lg:col-span-2 flex flex-col gap-6">
                    <neo-explorer label="{{ __('Search') }}" target=".tabs" class="bg-transparent col-span-2"></neo-explorer>
                    @foreach ($data['tabs'] as $tab)
                        <div class="tabs w-full flex flex-col">
                            <button
                                class="btn w-full bg-x-prime bg-opacity-10 p-2 outline-none rounded-x-thin flex flex-wrap gap-2 items-center hover:bg-opacity-20 focus:bg-opacity-20">
                                <svg class="block w-8 h-8 pointer-events-none text-x-prime" viewBox="0 96 960 960"
                                    fill="currentColor">
                                    <path
                                        d="M344 805q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407 344l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408 805q-13 13-32 12.5T344 805Z" />
                                </svg>
                                <h3 class="w-0 flex-[1] text-x-black text-base font-x-thin text-start">
                                    {{ $tab['title'] }}
                                </h3>
                            </button>
                            <div class="w-full txt">
                                <p class="w-full p-4 ps-12 text-base">
                                    {!! $tab['content'] !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="w-full flex flex-col gap-6">
                    <h2 class="text-x-black font-x-huge text-xl -mb-2">
                        {{ __('QUICK LINKS') }}
                    </h2>
                    @if ($data['link'] !== route('views.guest.faqs'))
                        <a href="{{ route('views.guest.faqs') }}"
                            class="w-full flex flex-col gap-2 p-4 bg-x-light rounded-x-thin outline-none hover:bg-x-prime hover:bg-opacity-20 hover:shadow-x-core focus:bg-x-prime focus:bg-opacity-20 focus:shadow-x-core">
                            <h3 class="text-x-black font-x-huge text-base">
                                {{ __('FAQs') }}
                            </h3>
                            <p class="text-x-black text-opacity-70 font-x-thin text-sm">
                                {{ __('Find quick answers to common queries, ensuring a smooth experience.') }}
                            </p>
                        </a>
                    @endif
                    @if ($data['link'] !== route('views.guest.terms'))
                        <a href="{{ route('views.guest.terms') }}"
                            class="w-full flex flex-col gap-2 p-4 bg-x-light rounded-x-thin outline-none hover:bg-x-prime hover:bg-opacity-20 hover:shadow-x-core focus:bg-x-prime focus:bg-opacity-20 focus:shadow-x-core">
                            <h3 class="text-x-black font-x-huge text-base">
                                {{ __('Terms And Conditions') }}
                            </h3>
                            <p class="text-x-black text-opacity-70 font-x-thin text-sm">
                                {{ __('Explore our guidelines for product/service usage, outlining responsibilities, rights, and limitations for a transparent relationship.') }}
                            </p>
                        </a>
                    @endif
                    @if ($data['link'] !== route('views.guest.privacy'))
                        <a href="{{ route('views.guest.privacy') }}"
                            class="w-full flex flex-col gap-2 p-4 bg-x-light rounded-x-thin outline-none hover:bg-x-prime hover:bg-opacity-20 hover:shadow-x-core focus:bg-x-prime focus:bg-opacity-20 focus:shadow-x-core">
                            <h3 class="text-x-black font-x-huge text-base">
                                {{ __('Privacy Policy') }}
                            </h3>
                            <p class="text-x-black text-opacity-70 font-x-thin text-sm">
                                {{ __('Discover how we safeguard your data and outline its usage, ensuring confidentiality and security.') }}
                            </p>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @if (!Core::lang('en'))
        <script src="{{ asset('js/trans.min.js') }}?v={{ env('APP_VERSION') }}"></script>
    @endif
    <script>
        const tabs = document.querySelectorAll(".tabs");
        tabs.forEach((tab) => {
            tab.querySelector("button").addEventListener("click", () => {
                tabs.forEach(t => {
                    t.classList.remove("is-open");
                });
                tab.classList.add("is-open");
            });
        });
    </script>
@endsection