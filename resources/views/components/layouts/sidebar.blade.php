<!-- Sidebar -->
<aside class="bg-sky-200 text-blue-800 ls:w-64 md:w-60 sm:w-24 max-h-screen sticky top-0 shadow-md ">
    <div class="py-4 px-4 sticky flex flex-col justify-between h-full">
        <!-- Sidebar content -->
        
        {{-- <hr class="mb-3 border-emerald-500"> --}}

        <div class="flex flex-col items-center mt-4">
            <img src="{{ asset('assets/icons/wolf.png') }}" alt="" class="drop-shadow-xl w-[100px] w-[100px] md:w-[100px] md:h-[100px] sm:w-[44px] sm:w-[44px]">
            <p class="text-center text-md mb-1 font-semibold sm:hidden md:block">{{ Auth::user()->name }}</p>
            <p class="text-center text-sm mb-1 font-light sm:hidden md:block">{{ Auth::user()->email }}</p>
        </div>
        
        <ul>
            <x-utils.menu-option :current="'home'">
                <a href="{{ route('home') }}" class="w-full truncate">
                    <i class="fa-solid fa-gauge me-2 my-auto text-2xl"></i>
                    <span class="md:inline-block sm:hidden">Dashboard</span>
                </a>
            </x-utils.menu-option>
            <x-utils.menu-option :current="'all-schemes'">
                <a href="{{ route('all-schemes') }}" class="w-full truncate">
                    <i class="fa-solid fa-file-lines me-2 my-auto text-2xl"></i>
                    <span class="md:inline-block sm:hidden">Schemes</span>
                </a>
            </x-utils.menu-option>
            <x-utils.menu-option :current="'profile'">
                <a href="{{ route('profile') }}" class="w-full truncate">
                    <i class="fa-solid fa-user me-2 my-auto text-2xl"></i>
                    <span class="md:inline-block sm:hidden">Profile</span>
                </a>
            </x-utils.menu-option>
        </ul>
        <div></div>
        <ul class="mb-4">
            <li class="flex hover:bg-red-100 rounded rounded-lg text-red-900 text-semibold p-3 py-2">
                <a href="{{ route('logout') }}" class="w-full truncate">
                    <i class="fa-solid fa-power-off me-2 my-auto text-2xl"></i>
                    <span class="md:inline-block sm:hidden my-auto">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>