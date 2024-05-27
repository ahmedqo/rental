<neo-sidebar id="sidebar">
    <neo-topbar transparent>
        <img src="{{ asset('img/logo.webp') }}?v={{ env('APP_VERSION') }}" alt="{{ env('APP_NAME') }} logo image"
            class="block w-full mx-auto pointer-events-auto" width="916" height="516" loading="lazy" />
    </neo-topbar>
    <ul class="nav-colors w-full flex flex-col flex-1 gap-4">
        <li class="w-full">
            <ul class="w-full flex flex-col">
                <li class="w-full">
                    <h3 class="font-x-thin text-x-black text-xs mx-2">{{ __('General') }}</h3>
                    <hr class="border-x-shade">
                </li>
                <li class="w-full">
                    <a href="{{ route('views.core.index') }}" aria-label="dashboard_page_link"
                        class="w-full flex flex-wrap gap-2 p-2 text-start text-x-black items-center outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ Core::matchRoute('dashboard') ? '!bg-x-black' : '' }}">
                        <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M99-425v-356q0-32.025 24.194-56.512Q147.387-862 179-862h277v437H99Zm405-437h277q32.025 0 56.512 24.488Q862-813.025 862-781v197H504v-278Zm0 763v-436h358v356q0 31.613-24.488 55.806Q813.025-99 781-99H504ZM99-376h357v277H179q-31.613 0-55.806-24.194Q99-147.387 99-179v-197Z" />
                        </svg>
                        <span class="block flex-1 text-sm">{{ __('Dashboard') }}</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="w-full">
            <ul class="w-full flex flex-col">
                <li class="w-full">
                    <h3 class="font-x-thin text-x-black text-xs mx-2">{{ __('Agency') }}</h3>
                    <hr class="border-x-shade">
                </li>
                <li class="w-full">
                    <a href="{{ route('views.brands.index') }}"
                        class="w-full flex flex-wrap gap-2 p-2 text-start text-x-black items-center outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ Core::matchRoute('brands') ? '!bg-x-black' : '' }}">
                        <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="m437-439-69-73q-10-12-25-11.5t-26 9.5q-12 13-12 27.5t12 25.5l88 86q12 15 32 15t33-15l174-172q10-9 10-24.5T643-598q-11-8-25-8t-23 10L437-439ZM316-68l-60-103-119-25q-19-3-29.5-17t-7.5-32l14-116-76-90q-10-12-10-29t10-30l76-88-14-116q-3-18 7.5-32t29.5-18l119-24 60-104q9-15 26-20.5t34 1.5l104 49 105-49q16-5 33-1t26 19l61 105 118 24q19 4 29.5 18t7.5 32l-14 116 76 88q10 13 10 30t-10 29l-76 90 14 116q3 18-7.5 32T823-196l-118 25-61 104q-9 15-26 19t-33-1L480-98 376-49q-17 5-34 .5T316-68Z" />
                        </svg>
                        <span class="block flex-1 text-sm">{{ __('Brands') }}</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="{{ route('views.categories.index') }}"
                        class="w-full flex flex-wrap gap-2 p-2 text-start text-x-black items-center outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ Core::matchRoute('categories') ? '!bg-x-black' : '' }}">
                        <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="m264-572 178-288q6-10 17-15.5t22-5.5q11 0 21.375 5.289Q512.75-870.421 520-860l179 288q6 11 5.5 23.5t-5.625 23.948q-5.125 10.449-16.15 16.5Q671.7-502 659-502H302q-12.814 0-23.925-6.177-11.111-6.176-14.95-16.375Q257-536 256.5-548.5T264-572ZM726-39q-82.917 0-139.458-56.25Q530-151.5 530-234.588t56.662-140.75Q643.324-433 726.412-433t139.338 57.542Q922-317.917 922-235q0 82.083-56.958 139.042Q808.083-39 726-39ZM65-111v-257q0-18.775 12.625-32.388Q90.25-414 112-414h257q19.775 0 32.388 13.612Q414-386.775 414-368v257q0 21.75-12.612 34.375Q388.775-64 369-64H112q-21.75 0-34.375-12.625T65-111Z" />
                        </svg>
                        <span class="block flex-1 text-sm">{{ __('Categories') }}</span>
                    </a>
                </li>
                <li class="w-full">
                    <a href="{{ route('views.cars.index') }}"
                        class="w-full flex flex-wrap gap-2 p-2 text-start text-x-black items-center outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ Core::matchRoute('cars') ? '!bg-x-black' : '' }}">
                        <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M244-161v8q0 30.6-22.5 51.3Q199-81 166.7-81h-10.89Q125-81 102.5-103.29 80-125.58 80-156v-331.43L167-735q9.64-28.8 34.86-46.4Q227.08-799 258-799h444q30.92 0 56.14 17.6T793-735l87 247.57V-156q0 30.42-22.5 52.71T804.19-81H793.3q-32.3 0-54.8-20.7T716-153v-8H244Zm1-404h470l-36-105H281l-36 105Zm60 241q26 0 44-18.38t18-43.5q0-25.12-18-43.62-18-18.5-43.5-18.5T262-429.62q-18 18.38-18 43.5t18.13 43.62Q280.25-324 305-324Zm349.5 0q25.5 0 43.5-18.38t18-43.5q0-25.12-18.12-43.62Q679.75-448 655-448q-26 0-44 18.38t-18 43.5q0 25.12 18 43.62 18 18.5 43.5 18.5Z" />
                        </svg>
                        <span class="block flex-1 text-sm">{{ __('Cars') }}</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="w-full">
            <ul class="w-full flex flex-col">
                <li class="w-full">
                    <h3 class="font-x-thin text-x-black text-xs mx-2">{{ __('System') }}</h3>
                    <hr class="border-x-shade">
                </li>
                <li class="w-full">
                    <a href="{{ route('views.users.index') }}"
                        class="w-full flex flex-wrap gap-2 p-2 text-start text-x-black items-center outline-none !bg-opacity-10 hover:bg-x-black focus:bg-x-black focus-within:bg-x-black {{ Core::matchRoute('users') ? '!bg-x-black' : '' }}">
                        <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                            <path
                                d="M68-130q-20.1 0-33.05-12.45Q22-154.9 22-174.708V-246q0-42.011 21.188-75.36 21.187-33.348 59.856-50.662Q178-404 238.469-419 298.938-434 363-434q66.062 0 126.031 15Q549-404 624-372q38.812 16.018 60.406 49.452Q706-289.113 706-246v71.708Q706-155 693.275-142.5T660-130H68Zm679 0q11-5 20.5-17.5T777-177v-67q0-65-32.5-108T659-432q60 10 113 24.5t88.88 31.939q34.958 18.329 56.539 52.945Q939-288 939-241v66.787q0 19.505-13.225 31.859Q912.55-130 893-130H747ZM364-494q-71.55 0-115.275-43.725Q205-581.45 205-652.5q0-71.05 43.725-115.275Q292.45-812 363.5-812q70.05 0 115.275 44.113Q524-723.775 524-653q0 71.55-45.112 115.275Q433.775-494 364-494Zm386-159q0 70.55-44.602 114.775Q660.796-494 591.035-494 578-494 567.5-495.5T543-502q26-27.412 38.5-65.107 12.5-37.696 12.5-85.599 0-46.903-12.5-83.598Q569-773 543-804q10.75-3.75 23.5-5.875T591-812q69.775 0 114.387 44.613Q750-722.775 750-653Z" />
                        </svg>
                        <span class="block flex-1 text-sm">{{ __('Users') }}</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</neo-sidebar>
