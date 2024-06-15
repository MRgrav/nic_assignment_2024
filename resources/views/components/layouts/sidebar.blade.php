<!-- Sidebar -->
<aside class="bg-sky-200 text-blue-800 ls:w-64 md:w-60 sm:w-24 max-h-screen sticky top-0 shadow-md ">
    <div class="py-4 px-4 sticky flex flex-col justify-between h-full">
        <!-- Sidebar content -->
        
        {{-- <hr class="mb-3 border-emerald-500"> --}}

        <div class="flex flex-col items-center mt-4">
            <img src="https://cdn.pixabay.com/photo/2023/01/28/20/23/ai-generated-7751688_640.jpg" alt="" class="border border-blue-500 rounded-full mb-3 w-[100px] w-[100px] md:w-[100px] md:h-[100px] sm:w-[44px] sm:w-[44px]">
            <p class="text-center text-md mb-1 font-semibold sm:hidden md:block">name</p>
            <p class="text-center text-sm mb-1 font-light sm:hidden md:block">email@email.com</p>
        </div>
        
        <div>
            <div class="flex mb-3 p-2 hover:bg-sky-100 hover:text-blue-700 rounded">
                <i class="fa-solid fa-gauge me-2 my-auto"></i>
                <a href="{{ url('/') }}">Dashboard</a>
            </div>
            <div class="flex mb-3 p-2 hover:bg-sky-100 hover:text-blue-700 rounded">
                <i class="fa-solid fa-file-lines me-2 my-auto"></i>
                <a href="{{ route('all-schemes') }}">Schemes</a>
            </div>
            <div class="flex mb-3 p-2 hover:bg-sky-100 hover:text-blue-700 rounded">
                <i class="fa-solid fa-user me-2 my-auto"></i>
                <a href="">Profile</a>
            </div>
        </div>
        <div></div>
        <div class="mb-4">
            <div class="flex bg-red-200 hover:bg-red-300 shadow-md rounded rounded-lg text-red-900 text-semibold p-3 py-2">
                {{-- <img src="{{ asset('assets/icons/log-out.svg') }}" alt="" width="24" class="me-2 text-green-400"> --}}
                <i class="fa-solid fa-power-off me-2 my-auto"></i>
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</aside>