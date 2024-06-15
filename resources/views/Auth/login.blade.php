<x-layouts.body>

    <div class="w-screen h-screen flex justify-center items-center">
        <form action="{{ route('new-login') }}" method="post">
            @csrf
            <div class="w-96 rounded shadow-xl p-5 border bg-sky-100">
                <div class="w-full mb-5">
                    <h1 class="text-3xl text-sky-700 font-semibold">Login</h1>
                </div>
                <div>
                    <label for="" class="w-full">Email ID</label>
                    <x-utils.email-input name="email" placeholder="email id/user id"/>
                    @error('email')
                        <x-utils.error-message>
                            {{ $message }}
                        </x-utils.error-message>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="w-full">Password</label>
                    <x-utils.password-input name="password" placeholder="password"/>
                    @error('password')
                        <x-utils.error-message>
                            {{ $message }}
                        </x-utils.error-message>
                    @enderror
                </div>
                <x-utils.blue-button type="submit">Login</x-utils.blue-button>
                <p class="text-gray-500 py-2">
                    create an account 
                    <a href="{{ route('registration') }}" class="text-gray-600">registration</a>
                </p>
            </div>
        </form>
    </div>

</x-layouts.body>