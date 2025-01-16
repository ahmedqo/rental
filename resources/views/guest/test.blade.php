 <li class="w-full flex flex-wrap gap-4 p-4 border border-x-shade rounded-x-thin">
     <ul class="w-full flex flex-wrap items-center gap-4">
         <li class="flex-[1]">
             <ul class="w-full flex flex-col gap-2">
                 <li class="w-full">
                     <h4 class="text-xl text-x-prime font-x-huge -mb-2">
                         {{ strtoupper($car->Category->name) }}
                     </h4>
                 </li>
                 <li class="w-full">
                     <h5 class="text-base text-x-black font-x-thin">
                         {{ ucwords($car->name) }} ({{ ucwords(__('or similar')) }})
                     </h5>
                 </li>
             </ul>
         </li>
         <li class="w-24 my-auto">
             <img src="{{ $car->Images[0]->Link }}" alt="{{ ucwords($car->name) }} Image" loading="lazy"
                 class="block w-24 object-contain object-center" />
         </li>
     </ul>
     <ul class="w-full flex flex-wrap gap-2" style="column-gap: 1rem;">
         <li class="w-max flex flex-wrap items-center gap-2">
             <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50" fill="currentcolor"
                 viewBox="0 -960 960 960">
                 <path
                     d="M480.16-502Q395-502 336.5-561T278-704.5q0-84.5 58.34-142.5t143.5-58q85.16 0 143.66 57.89T682-704q0 84-58.34 143t-143.5 59ZM114-86v-159q0-46.77 23.79-84.47Q161.58-367.16 201-387q66-34 136.17-51 70.18-17 142.55-17Q554-455 624-438t135 50q39.42 19.69 63.21 57.11T846-245.05V-86H114Z" />
             </svg>
             <span class="text-base text-x-black text-opacity-50 font-normal">
                 {{ $car->passengers }} {{ __('Passengers') }}
             </span>
         </li>
         <li class="w-max flex flex-wrap items-center gap-2">
             <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50" fill="currentcolor"
                 viewBox="0 0 48 48">
                 <path
                     d="M23.0864 4C19.7858 4 15.278 6.00759 13.0712 8.46097L1.76252 21.0267C0.290132 22.6617 -0.397464 25.7222 0.235532 27.8318L3.93631 40.1677C4.5675 42.2749 6.88589 43.9999 9.08667 43.9999H43.9998C46.2108 43.9999 48 42.2089 48 39.9997V4H23.0864ZM43.9998 29.9996H36.0001V25.9994H43.9998V29.9996ZM43.9998 21.9993H6.26669L16.0436 11.137C17.4968 9.52356 20.9186 7.99957 23.0864 7.99957H43.9998V21.9993Z" />
             </svg>
             <span class="text-base text-x-black text-opacity-50 font-normal">
                 {{ $car->doors }} {{ __('Doors') }}
             </span>
         </li>
         <li class="w-max flex flex-wrap items-center gap-2">
             <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50" fill="currentcolor"
                 viewBox="0 -960 960 960">
                 <path
                     d="M440-760h80v-81h-80v81Zm40 272q-91 0-171.5-40T151-615v-9q0-57.38 39.31-96.69Q229.63-760 287-760h48v-136q0-21.4 14.01-35.7Q363.02-946 384-946h192q20.97 0 34.99 14.3Q625-917.4 625-896v136h48q57.38 0 96.69 39.31Q809-681.38 809-624v9q-76 47-157 87t-172 40ZM287-14v-55q-57.4 0-96.7-40.01Q151-149.02 151-205v-297q63 41 132 72.5T427-384v50h106v-50q75-13 143.5-45T809-502v297q0 55.98-39.31 95.99T673-69v55H567v-55H393v55H287Z" />
             </svg>
             <span class="text-base text-x-black text-opacity-50 font-normal">
                 {{ $car->cargo }} {{ __('sutecase') }}
             </span>
         </li>
         <li class="w-max flex flex-wrap items-center gap-2">
             <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50" fill="currentcolor"
                 viewBox="0 -960 960 960">
                 <path
                     d="M132.76-74Q71-74 28-117.17-15-160.33-15-222q0-43.46 22.5-78.23T65-353v-254q-35-18-57.5-52.77T-15-738q0-61.67 43.24-104.83Q71.47-886 133.24-886 195-886 238-842.83q43 43.16 43 104.83 0 43.46-22.5 78.23T201-607v59h211v-59q-35-18-57.5-52.77T332-738q0-61.67 43.24-104.83 43.23-43.17 105-43.17Q542-886 585-842.83q43 43.16 43 104.83 0 43.46-22.5 78.23T548-607v59h199q5.7 0 8.85-3.15Q759-554.3 759-560v-46.98q-35-18.02-57.5-52.79Q679-694.54 679-738q0-61.67 43.5-104.83Q766-886 827.47-886t104.5 43.17Q975-799.67 975-738q0 43.46-22 78.23t-58 52.79V-560q0 61.67-43.17 104.83Q808.67-412 747-412H548v59q35 18 57.5 52.77T628-222q0 61.67-43.24 104.83Q541.53-74 479.76-74 418-74 375-117.17 332-160.33 332-222q0-43.46 22.5-78.23T412-353v-59H201v59q35 18 57.5 52.77T281-222q0 61.67-43.24 104.83Q194.53-74 132.76-74Z" />
             </svg>
             <span class="text-base text-x-black text-opacity-50 font-normal">
                 {{ __(ucwords($car->transmission)) }}
             </span>
         </li>
         <li class="w-max flex flex-wrap items-center gap-2">
             <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50" fill="currentcolor"
                 viewBox="0 -960 960 960">
                 <path
                     d="M101-62v-700q0-57.13 39.44-96.56Q179.88-898 237-898h242q57.13 0 96.56 39.44Q615-819.13 615-762v317h54q39.9 0 68.45 27.64Q766-389.71 766-349v175q0 13.18 8.48 22.09 8.49 8.91 21.03 8.91 12.97 0 21.73-8.91T826-174v-350q-7.62 3-16.31 4-8.69 1-17.69 1-46.74 0-79.87-32.82T679-634.16q0-30.84 16-58.34 16-27.5 45-42.5l-80-80 56-57 131 126q24 24.18 42 51.59Q907-667 907-634v460.51q0 46.85-31.68 79.17T795.64-62q-47.58 0-79.11-32.22T685-174v-190h-70v302H101Zm136-503h242v-197H237v197Zm556-36q13.45 0 23.22-9.34 9.78-9.35 9.78-23.16t-9.77-23.16q-9.77-9.34-23.21-9.34-14.44 0-23.73 9.34-9.29 9.35-9.29 23.16t9.49 23.16Q778.98-601 793-601Z" />
             </svg>
             <span class="text-base text-x-black text-opacity-50 font-normal">
                 {{ __(ucwords($car->fuel)) }}
             </span>
         </li>
         <li class="w-max flex flex-wrap items-center gap-2">
             <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50" fill="currentcolor"
                 viewBox="0 -960 960 960">
                 <path
                     d="M279.78-736.59 394-884q16.48-20.94 39.38-31.47Q456.29-926 480-926q25 0 47.67 10.53Q550.33-904.94 567-884l113.22 147.41L852-679q36 12 55 41.5t19 62.45q0 17.05-4.5 33.55Q917-525 906-510L797-353.41 801-187q0 47-34 79t-82 32q-2 0-23-2l-182-50-181.11 50.08Q293-76 287-75.5q-6 .5-12 .5-47.2 0-81.6-32.5Q159-140 160-188l4-165L53.79-510.33Q43-526 38.5-542.17 34-558.33 34-575q0-34 19.42-63.11Q72.84-667.21 109-679l170.78-57.59Z" />
             </svg>
             <span class="text-base text-x-black text-opacity-50 font-normal">
                 {{ $car->rating }} / 5
             </span>
         </li>
     </ul>
     <ul class="w-full flex flex-wrap gap-4 items-center">
         <li class="flex-[1]">
             <a href="{{ route('views.guest.show', $car->slug) }}"
                 class="link block w-max px-6 py-2 bg-x-prime text-x-white font-x-huge outline-none hover:bg-opacity-60 focus:bg-opacity-60">
                 {{ __('Reserve') }}
             </a>
         </li>
         <li class="flex-[1] min-w-20 text-end">
             <ul class="flex flex-col">
                 <li class="text-2xl text-x-black font-x-huge mt-2">
                     {{ number_format($car->price / Core::rate(), 2) }}
                     {{ Core::$CURRENCY }}
                 </li>
                 <li class="text-xs text-x-black font-normal">
                     {{ __('Per Day') }}
                 </li>
             </ul>
         </li>
     </ul>
 </li>
