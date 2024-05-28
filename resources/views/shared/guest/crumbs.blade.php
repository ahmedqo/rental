@php
    $items = isset($items) ? $items : false;
@endphp
@if ($items)
    <nav class="w-full overflow-auto lg:overflow-unset px-4">
        <ul class="flex items-center gap-2 text-md font-medium w-max">
            @foreach ($items as $item)
                <li class="{{ $loop->index < count($items) - 1 ? 'text-x-black text-opacity-50' : 'text-x-black' }}">
                    <a {{ count($item) > 1 ? 'href=' . $item[1] : '' }}>{{ $item[0] }}</a>
                </li>
                @if ($loop->index < count($items) - 1)
                    <li>
                        <svg class="block w-4 h-4 pointer-events-none text-x-black text-opacity-50" fill="currentcolor"
                            viewBox="0 -960 960 960">
                            <path
                                d="M727-433H145q-21 0-33.5-13T99-479q0-20 12.5-32.5T145-524h583l-66-67q-15-14-15-33t14-33q12-13 31.5-12t33.5 13l145 145q11 13 11 32t-11 32L725-303q-13 14-32 14t-32-13q-14-12-14-32.5t15-33.5l65-65Z" />
                        </svg>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
@endif
