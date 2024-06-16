<x-layouts.body>

    <div class="w-screen h-screen flex justify-center items-center">
        <form action="{{ route('new-registration') }}" method="post">
            @csrf
            <div class="w-96 rounded shadow-xl p-5 border bg-sky-100">
                <div class="w-full mb-5">
                    <h1 class="text-3xl text-sky-700 font-semibold">Registration</h1>
                </div>

                {{-- admin/user's name --}}
                <div>
                    <label for="" class="w-full text-sm">Full Name</label>
                    <x-utils.text-input name="name" placeholder="full name" autocomplete="off"/>
                    @error('name')
                        <x-utils.error-message>
                            {{ $message }}
                        </x-utils.error-message>
                    @enderror
                </div>

                {{-- phone number --}}
                <div>
                    <label for="" class="w-full text-sm">Phone No.</label>
                    <x-utils.phone-input name="phone" placeholder="full name" autocomplete="off"/>
                    @error('phone')
                        <x-utils.error-message>
                            {{ $message }}
                        </x-utils.error-message>
                    @enderror
                </div>

                {{-- email address --}}
                <div>
                    <label for="" class="w-full text-sm">Email ID</label>
                    <x-utils.email-input name="email" placeholder="email id/user id" autocomplete="off"/>
                    @error('email')
                        <x-utils.error-message>
                            {{ $message }}
                        </x-utils.error-message>
                    @enderror
                </div>

                {{-- password --}}
                <div>
                    <label for="" class="w-full text-sm">Password</label>
                    <x-utils.password-input name="password" placeholder="password"/>
                    @error('password')
                        <x-utils.error-message>
                            {{ $message }}
                        </x-utils.error-message>
                    @enderror
                </div>

                {{-- confirm password --}}
                <div class="mb-3">
                    <label for="" class="w-full text-sm">Confirm password</label>
                    <x-utils.password-input name="confirmPassword" placeholder="confirm password"/>
                    @error('confirmPassword')
                        <x-utils.error-message>
                            {{ $message }}
                        </x-utils.error-message>
                    @enderror
                </div>
                <x-utils.blue-button type="submit">Login</x-utils.blue-button>
                <p class="text-gray-500 py-3">
                    already have an account! 
                    <a href="{{ route('login') }}" class="text-gray-600">login</a>
                </p>
            </div>
        </form>
    </div>

</x-layouts.body>