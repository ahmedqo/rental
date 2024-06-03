@extends('shared.core.base')
@section('title', __('Dashboard'))

@section('content')
    <div class="w-full flex flex-col gap-6">
        <div class="flex flex-col gap-2">
            <h1 class="text-center lg:text-start text-xl lg:text-2xl text-x-black font-x-thin">
                {{ __('Statistics') }}
            </h1>
            <ul class="w-full h-full grid grid-rows-1 grid-cols-2 lg:grid-cols-4 gap-4">
                <li
                    class="w-full bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                    <svg class="block w-10 h-10 pointer-events-none" style="color: var(--color-3);" fill="currentcolor"
                        viewBox="0 -960 960 960">
                        <path
                            d="M222-340v-56H121v-121h202v-40H180q-24.28 0-41.64-16.8T121-615.94V-782q0-23.85 17.36-40.42Q155.72-839 180-839h42v-55h121v55h101v121H242v40h145q23.85 0 40.42 16.86Q444-644.27 444-620v166q0 23.85-16.58 40.92Q410.85-396 387-396h-44v56H222ZM573-75 380-269l91-90 102 102 216-214 90 90L573-75Z" />
                    </svg>
                    <div class="flex flex-1 flex-col items-center lg:items-end">
                        <h2 class="text-sm lg:text-base text-x-black font-x-thin">{{ __('Profit') }}</h2>
                        <p class="text-base text-x-black text-opacity-50">
                            {{ Core::formatNumber($money[0] - $charges[0]) }} /
                            {{ Core::formatNumber($money[1] - $charges[1]) }}
                        </p>
                    </div>
                </li>
                <li
                    class="w-full bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                    <svg class="block w-10 h-10 pointer-events-none" style="color: var(--color-5);" fill="currentcolor"
                        viewBox="0 -960 960 960">
                        <path
                            d="M527-94v-91h183L527-367v-128l246 246v-183h93v338H527ZM234-276v-46H97v-92h247v-113H189q-37.95 0-64.97-26.74Q97-580.47 97-621v-110q0-38 27.03-66 27.02-28 64.97-28h45v-45h68v45h134v92H188v114h154q39.06 0 66.53 27.5T436-525v110q0 39.41-27.47 66.21Q381.06-322 342-322h-40v46h-68Z" />
                    </svg>
                    <div class="flex flex-1 flex-col items-center lg:items-end">
                        <h2 class="text-sm lg:text-base text-x-black font-x-thin">{{ __('Charges') }}</h2>
                        <p class="text-base text-x-black text-opacity-50">
                            {{ $charges[0] }} / {{ $charges[1] }}
                        </p>
                    </div>
                </li>
                <li
                    class="w-full bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                    <svg class="block w-10 h-10 pointer-events-none" style="color: var(--color-0);" fill="currentcolor"
                        viewBox="0 -960 960 960">
                        <path
                            d="M210-34q-57.12 0-96.56-40.14Q74-114.28 74-170v-541q0-57.13 39.44-96.56Q152.88-847 210-847h15v-79h113v79h284v-79h113v79h15q57.13 0 96.56 39.44Q886-768.13 886-711v146q0 27.6-19.5 47.8-19.5 20.2-48 20.2T770-517.2q-20-20.2-20-47.8v-3H210v398h229q27.95 0 47.48 19.5Q506-131 506-102.5T486.48-54Q466.95-34 439-34H210Zm540.96 5q-87.58 0-149.27-61.73Q540-152.46 540-240.04q0-87.58 61.73-149.27Q663.46-451 751.04-451q87.58 0 149.27 61.73Q962-327.54 962-239.96q0 87.58-61.73 149.27Q838.54-29 750.96-29ZM818-133l39-41-77-77v-126h-57v148.72L818-133Z" />
                    </svg>
                    <div class="flex flex-1 flex-col items-center lg:items-end">
                        <h2 class="text-sm lg:text-base text-x-black font-x-thin">{{ __('Period') }}</h2>
                        <p class="text-base text-x-black text-opacity-50">
                            {{ $work[0] }} / {{ $work[1] }}
                        </p>
                    </div>
                </li>
                <li
                    class="w-full bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                    <svg class="block w-10 h-10 pointer-events-none" style="color: var(--color-4);" fill="currentcolor"
                        viewBox="0 -960 960 960">
                        <path
                            d="M250-34q-74 0-125-51T74-209.53V-384h123v-542h690v716q0 74-51 125T711-34H250Zm461.5-136q16.5 0 28-11.36Q751-192.71 751-209.5V-790H333v406h338v174q0 17 12 28.5t28.5 11.5ZM373-610v-116h338v116H373Zm0 156v-116h338v116H373Z" />
                    </svg>
                    <div class="flex flex-1 flex-col items-center lg:items-end">
                        <h2 class="text-sm lg:text-base text-x-black font-x-thin">{{ __('Reservations') }}</h2>
                        <p class="text-base text-x-black text-opacity-50">
                            {{ $count[0] }} / {{ $count[1] }}
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
