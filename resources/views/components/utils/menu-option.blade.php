<li class="flex mb-3 p-2 hover:bg-sky-300 hover:text-blue-700 rounded @if (Route::currentRouteName() === $current) bg-sky-300 @endif">
    {{ $slot }}
</li>
