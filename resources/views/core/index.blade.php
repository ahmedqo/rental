@extends('shared.core.base')
@section('title', __('Dashboard'))

@section('content')
    <div class="w-full flex flex-col gap-6">
        <div class="flex flex-col gap-2">
            <h1 class="text-center lg:text-start text-xl lg:text-2xl text-x-black font-x-thin">
                {{ __('Statistics') }}
            </h1>
            <ul class="grid grid-rows-1 grid-cols-2 lg:grid-cols-4 gap-4">
                <li
                    class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                    <svg class="block w-12 h-12 pointer-events-none" style="color: var(--color-0);" fill="currentcolor"
                        viewBox="0 -960 960 960">
                        <path
                            d="M255-638q-38.2 0-64.6-27.125Q164-692.25 164-730v-100q0-38.613 26.4-65.306Q216.8-922 255-922h450q38.613 0 65.306 26.694Q797-868.613 797-830v100q0 37.75-26.694 64.875Q743.613-638 705-638H255Zm12-80h426q8 0 15.5-7.1T716-741v-78q0-8-7.5-15.5T693-842H267q-8 0-15.5 7.5T244-819v78q0 8.8 7.5 15.9T267-718ZM130-38q-38.612 0-65.306-26.694Q38-91.388 38-130v-55h884v55q0 38.612-26.694 65.306Q868.613-38 830-38H130ZM38-214l153-341q10-24 32.405-39T274-609h413q27.143 0 49.571 15Q759-579 770-555l153 341H38Zm291-80h40q11.2 0 18.1-7 6.9-7 6.9-17.5 0-11.5-6.9-19T369-345h-40q-11 0-18.5 7.4T303-319q0 11 7.5 18t18.5 7Zm0-91h40q11.2 0 18.1-7.5 6.9-7.5 6.9-18 0-11.5-6.9-18.5t-18.1-7h-40q-11 0-18.5 6.9T303-411q0 11 7.5 18.5T329-385Zm0-91h40q11.2 0 18.1-7.5 6.9-7.5 6.9-18 0-11.5-6.9-19T369-528h-40q-11 0-18.5 7.4T303-502q0 11 7.5 18.5T329-476Zm131 182h40q11.2 0 18.6-7 7.4-7 7.4-17.5 0-11.5-7.4-19T500-345h-40q-11 0-18.5 7.4T434-319q0 11 7.5 18t18.5 7Zm0-91h40q11.2 0 18.6-7.5 7.4-7.5 7.4-18 0-11.5-7.4-18.5t-18.6-7h-40q-11 0-18.5 6.9T434-411q0 11 7.5 18.5T460-385Zm0-91h40q11.2 0 18.6-7.5 7.4-7.5 7.4-18 0-11.5-7.4-19T500-528h-40q-11 0-18.5 7.4T434-502q0 11 7.5 18.5T460-476Zm131 182h40q11.2 0 18.6-7 7.4-7 7.4-17.5 0-11.5-7.4-19T631-345h-40q-10.2 0-17.6 7.4-7.4 7.4-7.4 18.6 0 11 7.4 18t17.6 7Zm0-91h40q11.2 0 18.6-7.5 7.4-7.5 7.4-18 0-11.5-7.4-18.5t-18.6-7h-40q-10.2 0-17.6 6.9-7.4 6.9-7.4 18.1 0 11 7.4 18.5T591-385Zm0-91h40q11.2 0 18.6-7.5 7.4-7.5 7.4-18 0-11.5-7.4-19T631-528h-40q-10.2 0-17.6 7.4-7.4 7.4-7.4 18.6 0 11 7.4 18.5T591-476Z" />
                    </svg>
                    <div class="flex flex-1 flex-col items-center lg:items-end">
                        <h2 class="text-sm lg:text-base text-x-black font-x-thin">{{ __('Total') }}</h2>
                        <p class="text-base lg:text-base text-gray-800">00</p>
                    </div>
                </li>
                <li
                    class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                    <svg class="block w-12 h-12 pointer-events-none" style="color: var(--color-3);" fill="currentcolor"
                        viewBox="0 -960 960 960">
                        <path
                            d="M191-99q-37.8 0-64.9-27.1Q99-153.2 99-192v-490q0-14.882 5-29.559 5-14.676 15-27.441l73-94q11.75-16.034 29.316-22.517Q238.882-862 259-862h443q18.085 0 35.664 6.483Q755.242-849.034 767-834l76 95q8 13.765 13.5 28.441Q862-695.882 862-681v489q0 38.8-27.394 65.9Q807.213-99 769-99H191Zm33-626h512l-36.409-46H259l-35 46Zm429 84H309v266q0 27 21 39.5t43 2.5l107-54 107 54q22 10 44-2.5t22-39.5v-266Z" />
                    </svg>
                    <div class="flex flex-1 flex-col items-center lg:items-end">
                        <h2 class="text-sm lg:text-base text-x-black font-x-thin">{{ __('Products') }}</h2>
                        <p class="text-base lg:text-base text-gray-800">00</p>
                    </div>
                </li>
                <li
                    class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                    <svg class="block w-12 h-12 pointer-events-none" style="color: var(--color-4);" fill="currentcolor"
                        viewBox="0 -960 960 960">
                        <path
                            d="M445-243v17q0 9.8 7.6 16.4 7.6 6.6 16.4 6.6h23.833q9.567 0 15.867-7.2 6.3-7.2 6.3-16.8v-16h55q16.275 0 25.638-9.075Q605-261.15 605-276.752V-412q0-15.425-9.362-25.212Q586.275-447 569.752-447H425v-65h146q14.45 0 24.225-9.967 9.775-9.966 9.775-24.7 0-14.308-9.775-24.32Q585.45-581 571-581h-56v-17q0-8.8-7-15.9t-16-7.1h-23.833q-9.367 0-16.267 7.1-6.9 7.1-6.9 15.9v17h-55q-16.275 0-25.638 9.5Q355-562 355-547v135.248q0 16.027 9.362 25.39Q373.725-377 390.248-377H535v65H389q-14.45 0-24.225 9.805-9.775 9.806-9.775 24.3 0 15.345 10.062 25.12Q375.125-243 390-243h55ZM229-59q-35.775 0-63.388-26.912Q138-112.825 138-150v-660q0-37.588 27.612-64.794Q193.225-902 229-902h347l247 246v506q0 37.175-27.906 64.088Q767.188-59 731-59H229Zm325-751v130q0 20.75 13.325 33.375T600-634h131L554-810Z" />
                    </svg>
                    <div class="flex flex-1 flex-col items-center lg:items-end">
                        <h2 class="text-sm lg:text-base text-x-black font-x-thin">{{ __('Quotations') }}</h2>
                        <p class="text-base lg:text-base text-gray-800">00</p>
                    </div>
                </li>
                <li
                    class="bg-x-white rounded-x-thin shadow-x-core border border-x-shade p-4 flex gap-2 flex-col items-center lg:flex-row lg:flex-wrap">
                    <svg class="block w-12 h-12 pointer-events-none" style="color: var(--color-5);" fill="currentcolor"
                        viewBox="0 -960 960 960">
                        <path
                            d="M227-38q-58.917 0-97.958-39.75Q90-117.5 90-175v-100q0-19.65 13.312-32.825Q116.625-321 136-321h93v-546q0-8.5 6.5-11.25t12.794 3.544L277-846q5.455 7 16.227 6.5Q304-840 310-847l32-31q4.818-5 15.909-5Q369-883 374-878l30 31q4.818 7 15.955 7 11.136 0 17.045-7l32-31q4.273-5 15.409-5 11.136 0 17.591 5l30 31q5.727 7 16.864 7Q560-840 565-847l32-31q3.636-5 15.136-5T630-878l30 31q5.455 7 16.227 7Q687-840 693-847l31-31q4.545-5 16.045-5 11.5 0 16.955 5l31 31q4.818 7 15.955 7.5 11.136.5 17.045-6.5l30-29q5.118-6 12.559-3.042Q871-875.083 871-867v692q0 57.5-40.042 97.25Q790.917-38 734-38H227Zm505.5-92q18.5 0 31-12.885T776-174.6V-775H323v504h324q18.8 0 32.4 13.175Q693-244.65 693-225v50q0 19 10 32t29.5 13ZM405-674h162q11.8 0 20.4 8.456 8.6 8.456 8.6 20.316t-8.6 20.044Q578.8-617 567-617H405q-11.375 0-19.688-8.439-8.312-8.438-8.312-20 0-11.561 8.312-20.061Q393.625-674 405-674Zm0 132h162q11.8 0 20.4 8.375 8.6 8.376 8.6 20.116 0 11.741-8.6 20.125T567-485H405q-11.375 0-19.688-8.56-8.312-8.559-8.312-20.3 0-11.74 8.312-19.94Q393.625-542 405-542Zm284.421-75Q678-617 669.5-625.763t-8.5-19.5Q661-656 669.281-665q8.28-9 20-9 11.719 0 20.219 8.781 8.5 8.78 8.5 19.815 0 11.036-8.579 19.72t-20 8.684Zm0 127Q678-490 669.5-498.884t-8.5-19.8q0-10.916 8.281-19.616 8.28-8.7 20-8.7 11.719 0 20.219 8.7 8.5 8.7 8.5 19.616t-8.579 19.8q-8.579 8.884-20 8.884Z" />
                    </svg>
                    <div class="flex flex-1 flex-col items-center lg:items-end">
                        <h2 class="text-sm lg:text-base text-x-black font-x-thin">{{ __('Requests') }}</h2>
                        <p class="text-base lg:text-base text-gray-800">00</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
