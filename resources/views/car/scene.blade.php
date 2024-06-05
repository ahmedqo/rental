@extends('shared.core.base')
@section('title', __('New Car'))

@section('content')
    <div class="w-full flex flex-col gap-6">
        <div class="flex flex-col gap-2">
            <div class="flex flex-col items-center lg:flex-row lg:justify-between gap-2">
                <h1 class="text-center lg:text-start text-xl lg:text-2xl text-x-black font-x-thin">
                    {{ __('Statistics') }}
                </h1>
                <div class="w-max flex gap-2">
                    <button id="printer" title="{{ __('Print') }}"
                        class="block w-6 h-6 text-x-black outline-none relative isolate before:content-[''] before:rounded-x-thin before:absolute before:block before:w-[130%] before:h-[130%] before:-inset-[15%] before:-z-[1] before:!bg-opacity-40 hover:before:bg-x-shade focus:before:bg-x-shade focus-within:before:bg-x-shade">
                        <svg class="block w-6 h-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M741-701H220v-160h521v160Zm-17 236q18 0 29.5-10.812Q765-486.625 765-504.5q0-17.5-11.375-29.5T724.5-546q-18.5 0-29.5 12.062-11 12.063-11 28.938 0 18 11 29t29 11Zm-75 292v-139H311v139h338Zm92 86H220v-193H60v-264q0-53.65 36.417-91.325Q132.833-673 186-673h588q54.25 0 90.625 37.675T901-544v264H741v193Z" />
                        </svg>
                    </button>
                </div>
            </div>
            <ul class="grid grid-rows-1 grid-cols-12 gap-4">
                <li
                    class="w-full col-span-12 lg:col-span-4 flex flex-wrap gap-4 p-4 bg-x-white rounded-x-thin shadow-x-core border border-x-shade">
                    <ul class="w-full col-span-2 flex flex-col gap-2 flex-[2]">
                        <li class="w-full">
                            <h4 class="text-xl text-x-prime font-x-huge -mb-2">
                                {{ strtoupper($data->Category->name) }}
                            </h4>
                        </li>
                        <li class="w-full">
                            <h5 class="text-base text-x-black font-x-thin">
                                {{ ucwords($data->name) }} ({{ ucwords(__('or similar')) }})
                            </h5>
                        </li>
                        <li class="w-full mt-2">
                            <ul class="w-full flex flex-wrap gap-2">
                                <li class="w-max flex flex-wrap items-center gap-2">
                                    <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                        fill="currentcolor" viewBox="0 -960 960 960">
                                        <path
                                            d="M480.16-502Q395-502 336.5-561T278-704.5q0-84.5 58.34-142.5t143.5-58q85.16 0 143.66 57.89T682-704q0 84-58.34 143t-143.5 59ZM114-86v-159q0-46.77 23.79-84.47Q161.58-367.16 201-387q66-34 136.17-51 70.18-17 142.55-17Q554-455 624-438t135 50q39.42 19.69 63.21 57.11T846-245.05V-86H114Z" />
                                    </svg>
                                    <span class="text-base text-x-black text-opacity-50 font-normal">
                                        {{ $data->passengers }} {{ __('Passengers') }}
                                    </span>
                                </li>
                                <li class="w-max flex flex-wrap items-center gap-2">
                                    <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                        fill="currentcolor" viewBox="0 -960 960 960">
                                        <path
                                            d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                                    </svg>
                                    <span class="text-base text-x-black text-opacity-50 font-normal">
                                        {{ $data->doors }} {{ __('Doors') }}
                                    </span>
                                </li>
                                <li class="w-max flex flex-wrap items-center gap-2">
                                    <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                        fill="currentcolor" viewBox="0 -960 960 960">
                                        <path
                                            d="M440-760h80v-81h-80v81Zm40 272q-91 0-171.5-40T151-615v-9q0-57.38 39.31-96.69Q229.63-760 287-760h48v-136q0-21.4 14.01-35.7Q363.02-946 384-946h192q20.97 0 34.99 14.3Q625-917.4 625-896v136h48q57.38 0 96.69 39.31Q809-681.38 809-624v9q-76 47-157 87t-172 40ZM287-14v-55q-57.4 0-96.7-40.01Q151-149.02 151-205v-297q63 41 132 72.5T427-384v50h106v-50q75-13 143.5-45T809-502v297q0 55.98-39.31 95.99T673-69v55H567v-55H393v55H287Z" />
                                    </svg>
                                    <span class="text-base text-x-black text-opacity-50 font-normal">
                                        {{ $data->cargo }} {{ __('sutecase') }}
                                    </span>
                                </li>
                                <li class="w-max flex flex-wrap items-center gap-2">
                                    <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                        fill="currentcolor" viewBox="0 -960 960 960">
                                        <path
                                            d="M132.76-74Q71-74 28-117.17-15-160.33-15-222q0-43.46 22.5-78.23T65-353v-254q-35-18-57.5-52.77T-15-738q0-61.67 43.24-104.83Q71.47-886 133.24-886 195-886 238-842.83q43 43.16 43 104.83 0 43.46-22.5 78.23T201-607v59h211v-59q-35-18-57.5-52.77T332-738q0-61.67 43.24-104.83 43.23-43.17 105-43.17Q542-886 585-842.83q43 43.16 43 104.83 0 43.46-22.5 78.23T548-607v59h199q5.7 0 8.85-3.15Q759-554.3 759-560v-46.98q-35-18.02-57.5-52.79Q679-694.54 679-738q0-61.67 43.5-104.83Q766-886 827.47-886t104.5 43.17Q975-799.67 975-738q0 43.46-22 78.23t-58 52.79V-560q0 61.67-43.17 104.83Q808.67-412 747-412H548v59q35 18 57.5 52.77T628-222q0 61.67-43.24 104.83Q541.53-74 479.76-74 418-74 375-117.17 332-160.33 332-222q0-43.46 22.5-78.23T412-353v-59H201v59q35 18 57.5 52.77T281-222q0 61.67-43.24 104.83Q194.53-74 132.76-74Z" />
                                    </svg>
                                    <span class="text-base text-x-black text-opacity-50 font-normal">
                                        {{ __(ucwords($data->transmission)) }}
                                    </span>
                                </li>
                                <li class="w-max flex flex-wrap items-center gap-2">
                                    <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                        fill="currentcolor" viewBox="0 -960 960 960">
                                        <path
                                            d="M101-62v-700q0-57.13 39.44-96.56Q179.88-898 237-898h242q57.13 0 96.56 39.44Q615-819.13 615-762v317h54q39.9 0 68.45 27.64Q766-389.71 766-349v175q0 13.18 8.48 22.09 8.49 8.91 21.03 8.91 12.97 0 21.73-8.91T826-174v-350q-7.62 3-16.31 4-8.69 1-17.69 1-46.74 0-79.87-32.82T679-634.16q0-30.84 16-58.34 16-27.5 45-42.5l-80-80 56-57 131 126q24 24.18 42 51.59Q907-667 907-634v460.51q0 46.85-31.68 79.17T795.64-62q-47.58 0-79.11-32.22T685-174v-190h-70v302H101Zm136-503h242v-197H237v197Zm556-36q13.45 0 23.22-9.34 9.78-9.35 9.78-23.16t-9.77-23.16q-9.77-9.34-23.21-9.34-14.44 0-23.73 9.34-9.29 9.35-9.29 23.16t9.49 23.16Q778.98-601 793-601Z" />
                                    </svg>
                                    <span class="text-base text-x-black text-opacity-50 font-normal">
                                        {{ __(ucwords($data->fuel)) }}
                                    </span>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="w-full flex flex-col items-end flex-[1] min-w-20 my-auto">
                        <li class="w-full">
                            <img src="{{ $data->Images[0]->Link }}" alt="{{ ucwords($data->name) }} Image" loading="lazy"
                                class="block w-full aspect-square object-contain object-center" />
                        </li>
                        <li class="text-2xl text-x-black font-x-huge mt-2">
                            {{ $data->price }} {{ Core::$CURRENCY }}
                        </li>
                        <li class="text-xs text-x-black font-normal">
                            {{ __('Per Day') }}
                        </li>
                    </ul>
                </li>
                <li class="w-full col-span-12 lg:col-span-8">
                    <ul class="w-full h-full grid grid-rows-1 grid-cols-2 lg:grid-rows-2 gap-4">
                        <li
                            class="w-full bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                            <svg class="block w-10 h-10 pointer-events-none" style="color: var(--color-3);"
                                fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M222-340v-56H121v-121h202v-40H180q-24.28 0-41.64-16.8T121-615.94V-782q0-23.85 17.36-40.42Q155.72-839 180-839h42v-55h121v55h101v121H242v40h145q23.85 0 40.42 16.86Q444-644.27 444-620v166q0 23.85-16.58 40.92Q410.85-396 387-396h-44v56H222ZM573-75 380-269l91-90 102 102 216-214 90 90L573-75Z" />
                            </svg>
                            <div class="flex flex-1 flex-col items-center lg:items-end">
                                <h2 class="text-sm lg:text-base text-x-black font-x-thin">{{ __('Profit') }}
                                    ({{ Core::$CURRENCY }})</h2>
                                <p class="text-base text-x-black text-opacity-50">
                                    {{ Core::formatNumber($money[0] - $charges[0]) }} /
                                    {{ Core::formatNumber($money[1] - $charges[1]) }}
                                </p>
                            </div>
                        </li>
                        <li
                            class="w-full bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                            <svg class="block w-10 h-10 pointer-events-none" style="color: var(--color-5);"
                                fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M527-94v-91h183L527-367v-128l246 246v-183h93v338H527ZM234-276v-46H97v-92h247v-113H189q-37.95 0-64.97-26.74Q97-580.47 97-621v-110q0-38 27.03-66 27.02-28 64.97-28h45v-45h68v45h134v92H188v114h154q39.06 0 66.53 27.5T436-525v110q0 39.41-27.47 66.21Q381.06-322 342-322h-40v46h-68Z" />
                            </svg>
                            <div class="flex flex-1 flex-col items-center lg:items-end">
                                <h2 class="text-sm lg:text-base text-x-black font-x-thin">{{ __('Charges') }}
                                    ({{ Core::$CURRENCY }})</h2>
                                <p class="text-base text-x-black text-opacity-50">
                                    {{ $charges[0] }} / {{ $charges[1] }}
                                </p>
                            </div>
                        </li>
                        <li
                            class="w-full bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                            <svg class="block w-10 h-10 pointer-events-none" style="color: var(--color-0);"
                                fill="currentcolor" viewBox="0 -960 960 960">
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
                            <svg class="block w-10 h-10 pointer-events-none" style="color: var(--color-4);"
                                fill="currentcolor" viewBox="0 -960 960 960">
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
                </li>
            </ul>
        </div>
        <neo-datavisualizer print search filter download title="{{ __('Reservations List') }}">
            @include('shared.page.print')
        </neo-datavisualizer>
    </div>
    <neo-printer>
        <h1 id="main-title">
            {{ __('Statistics') }}
        </h1>
        <ul class="grid grid-cols-1 grid-rows-1 gap-4">
            <li class="w-full flex flex-wrap items-center gap-4 p-4 bg-x-white rounded-x-thin border border-x-shade">
                <ul class="w-full col-span-2 flex flex-col gap-2 flex-[2]">
                    <li class="w-full">
                        <h4 class="text-xl text-x-prime font-x-huge -mb-2">
                            {{ strtoupper($data->Category->name) }}
                        </h4>
                    </li>
                    <li class="w-full">
                        <h5 class="text-base text-x-black font-x-thin">
                            {{ ucwords($data->name) }} ({{ ucwords(__('or similar')) }})
                        </h5>
                    </li>
                    <li class="w-full mt-2">
                        <ul class="w-full flex flex-wrap gap-2">
                            <li class="w-max flex flex-wrap items-center gap-2">
                                <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M480.16-502Q395-502 336.5-561T278-704.5q0-84.5 58.34-142.5t143.5-58q85.16 0 143.66 57.89T682-704q0 84-58.34 143t-143.5 59ZM114-86v-159q0-46.77 23.79-84.47Q161.58-367.16 201-387q66-34 136.17-51 70.18-17 142.55-17Q554-455 624-438t135 50q39.42 19.69 63.21 57.11T846-245.05V-86H114Z" />
                                </svg>
                                <span class="text-base text-x-black text-opacity-50 font-normal">
                                    {{ $data->passengers }} {{ __('Passengers') }}
                                </span>
                            </li>
                            <li class="w-max flex flex-wrap items-center gap-2">
                                <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                                </svg>
                                <span class="text-base text-x-black text-opacity-50 font-normal">
                                    {{ $data->doors }} {{ __('Doors') }}
                                </span>
                            </li>
                            <li class="w-max flex flex-wrap items-center gap-2">
                                <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M440-760h80v-81h-80v81Zm40 272q-91 0-171.5-40T151-615v-9q0-57.38 39.31-96.69Q229.63-760 287-760h48v-136q0-21.4 14.01-35.7Q363.02-946 384-946h192q20.97 0 34.99 14.3Q625-917.4 625-896v136h48q57.38 0 96.69 39.31Q809-681.38 809-624v9q-76 47-157 87t-172 40ZM287-14v-55q-57.4 0-96.7-40.01Q151-149.02 151-205v-297q63 41 132 72.5T427-384v50h106v-50q75-13 143.5-45T809-502v297q0 55.98-39.31 95.99T673-69v55H567v-55H393v55H287Z" />
                                </svg>
                                <span class="text-base text-x-black text-opacity-50 font-normal">
                                    {{ $data->cargo }} {{ __('sutecase') }}
                                </span>
                            </li>
                            <li class="w-max flex flex-wrap items-center gap-2">
                                <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M132.76-74Q71-74 28-117.17-15-160.33-15-222q0-43.46 22.5-78.23T65-353v-254q-35-18-57.5-52.77T-15-738q0-61.67 43.24-104.83Q71.47-886 133.24-886 195-886 238-842.83q43 43.16 43 104.83 0 43.46-22.5 78.23T201-607v59h211v-59q-35-18-57.5-52.77T332-738q0-61.67 43.24-104.83 43.23-43.17 105-43.17Q542-886 585-842.83q43 43.16 43 104.83 0 43.46-22.5 78.23T548-607v59h199q5.7 0 8.85-3.15Q759-554.3 759-560v-46.98q-35-18.02-57.5-52.79Q679-694.54 679-738q0-61.67 43.5-104.83Q766-886 827.47-886t104.5 43.17Q975-799.67 975-738q0 43.46-22 78.23t-58 52.79V-560q0 61.67-43.17 104.83Q808.67-412 747-412H548v59q35 18 57.5 52.77T628-222q0 61.67-43.24 104.83Q541.53-74 479.76-74 418-74 375-117.17 332-160.33 332-222q0-43.46 22.5-78.23T412-353v-59H201v59q35 18 57.5 52.77T281-222q0 61.67-43.24 104.83Q194.53-74 132.76-74Z" />
                                </svg>
                                <span class="text-base text-x-black text-opacity-50 font-normal">
                                    {{ __(ucwords($data->transmission)) }}
                                </span>
                            </li>
                            <li class="w-max flex flex-wrap items-center gap-2">
                                <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50"
                                    fill="currentcolor" viewBox="0 -960 960 960">
                                    <path
                                        d="M101-62v-700q0-57.13 39.44-96.56Q179.88-898 237-898h242q57.13 0 96.56 39.44Q615-819.13 615-762v317h54q39.9 0 68.45 27.64Q766-389.71 766-349v175q0 13.18 8.48 22.09 8.49 8.91 21.03 8.91 12.97 0 21.73-8.91T826-174v-350q-7.62 3-16.31 4-8.69 1-17.69 1-46.74 0-79.87-32.82T679-634.16q0-30.84 16-58.34 16-27.5 45-42.5l-80-80 56-57 131 126q24 24.18 42 51.59Q907-667 907-634v460.51q0 46.85-31.68 79.17T795.64-62q-47.58 0-79.11-32.22T685-174v-190h-70v302H101Zm136-503h242v-197H237v197Zm556-36q13.45 0 23.22-9.34 9.78-9.35 9.78-23.16t-9.77-23.16q-9.77-9.34-23.21-9.34-14.44 0-23.73 9.34-9.29 9.35-9.29 23.16t9.49 23.16Q778.98-601 793-601Z" />
                                </svg>
                                <span class="text-base text-x-black text-opacity-50 font-normal">
                                    {{ __(ucwords($data->fuel)) }}
                                </span>
                            </li>
                        </ul>
                    </li>
                    <li class="w-full">
                        <ul class="w-full flex flex-col flex-[1]">
                            <li class="text-2xl text-x-black font-x-huge mt-2">
                                ${{ $data->price }}
                            </li>
                            <li class="text-xs text-x-black font-normal">
                                {{ __('Per Day') }}
                            </li>
                        </ul>
                    </li>
                </ul>
                <img src="{{ $data->Images[0]->Link }}" alt="{{ ucwords($data->name) }} Image"
                    class="block w-56 aspect-square object-contain object-center" />
            </li>
            <li class="w-full">
                <ul class="w-full h-full grid grid-rows-1 grid-cols-2 lg:grid-rows-2 gap-4">
                    <li
                        class="w-full bg-x-white rounded-x-thin border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                        <svg class="block w-10 h-10 pointer-events-none" style="color: var(--color-3);"
                            fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M222-340v-56H121v-121h202v-40H180q-24.28 0-41.64-16.8T121-615.94V-782q0-23.85 17.36-40.42Q155.72-839 180-839h42v-55h121v55h101v121H242v40h145q23.85 0 40.42 16.86Q444-644.27 444-620v166q0 23.85-16.58 40.92Q410.85-396 387-396h-44v56H222ZM573-75 380-269l91-90 102 102 216-214 90 90L573-75Z" />
                        </svg>
                        <div class="flex flex-1 flex-col items-center lg:items-end">
                            <h2 class="text-sm lg:text-base text-x-black font-x-thin">{{ __('Profit') }}</h2>
                            <p class="text-base text-x-black text-opacity-50">
                                {{ $money[0] - $charges[0] }} / {{ $money[1] - $charges[1] }}
                            </p>
                        </div>
                    </li>
                    <li
                        class="w-full bg-x-white rounded-x-thin border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                        <svg class="block w-10 h-10 pointer-events-none" style="color: var(--color-5);"
                            fill="currentcolor" viewBox="0 -960 960 960">
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
                        class="w-full bg-x-white rounded-x-thin border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                        <svg class="block w-10 h-10 pointer-events-none" style="color: var(--color-0);"
                            fill="currentcolor" viewBox="0 -960 960 960">
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
                        class="w-full bg-x-white rounded-x-thin border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                        <svg class="block w-10 h-10 pointer-events-none" style="color: var(--color-4);"
                            fill="currentcolor" viewBox="0 -960 960 960">
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
            </li>
        </ul>
        @include('shared.page.print')
    </neo-printer>
@endsection

@section('scripts')
    <script>
        TableVisualizer(document.querySelector("neo-datavisualizer"), "car", {
            Search: "{{ route('actions.cars.reservations', $data->id) }}",
            Csrf: "{{ csrf_token() }}",
        });
        document.querySelector("#printer").addEventListener("click", e => {
            document.querySelector("neo-printer").print();
        });
    </script>
@endsection
