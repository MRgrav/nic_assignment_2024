<x-layouts.body>
    <div class="flex">
        <x-layouts.sidebar/>

        <div class="flex-1">
            
            <!-- Content -->
            <main class="flex-1">
                <div class="container mx-auto px-6 lg:px-14 py-8 h-screen">
                    <div class="py-4 px-2 font-bold text-2xl">
                        Profile
                    </div>

                    <form action="{{ route('profile-update') }}" method="POST" class="w-full p-2 py-4 ">
                        @csrf
                        <div class="mx-auto flex flex-col max-w-[500px] bg-white shadow-lg border rounded-md p-4">
                            {{-- user/admin's name --}}
                            <div class="flex w-full">
                                <p class="p-2 w-1/2">Name</p>
                                <x-utils.text-input name="name" placeholder="full name" :value="$user->name" autocomplete="off"/>
                                @error('name')
                                    <x-utils.error-message>
                                        {{ $message }}
                                    </x-utils.error-message>
                                @enderror
                            </div>

                            {{-- email address --}}
                            <div class="flex w-full">
                                <p class="p-2 w-1/2">Email address</p>
                                <x-utils.email-input name="email" placeholder="email address" :value="$user->email" autocomplete="off"/>
                                @error('email')
                                    <x-utils.error-message>
                                        {{ $message }}
                                    </x-utils.error-message>
                                @enderror
                            </div>

                            {{-- phone number --}}
                            <div class="flex w-full">
                                <p class="p-2 w-1/2">Phone Number</p>
                                <x-utils.phone-input name="phone" :value="$user->phone" placeholder="full name" autocomplete="off"/>
                                @error('phone')
                                    <x-utils.error-message>
                                        {{ $message }}
                                    </x-utils.error-message>
                                @enderror
                            </div>
                            <hr>
                            <div class="mt-3 flex w-full justify-end">
                                <x-utils.green-button type="submit">Save changes</x-utils.green-button>
                            </div>
                        </div>
                    </form>
                </div>

                <x-layouts.footer/>
            </main>
        </div>
    </div>

</x-layouts.body>