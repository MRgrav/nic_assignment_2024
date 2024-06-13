<x-layouts.body>

    <div class="w-screen h-screen flex justify-center items-center">
        <form action="" method="post">
            @csrf
            <div class="w-96 rounded shadow-xl p-4 border bg-sky-100">
                
                <div class="w-full mb-5">
                    <h1 class="text-3xl font-semibold">Registration</h1>
                </div>
                <div>
                    <label for="" class="w-full">Full Name</label>
                    <x-utils.text-input :name="'name'" :placeholder="'full name'"/>
                </div>
                <div>
                    <label for="" class="w-full">Phone No.</label>
                    <x-utils.phone-input :name="'phone'" :placeholder="'full name'"/>
                </div>
                <div>
                    <label for="" class="w-full">Email ID</label>
                    <x-utils.email-input :name="'email'" :placeholder="'email id/user id'"/>
                    <x-utils.error-message :message="'error'"/>
                </div>
                <div>
                    <label for="" class="w-full">Password</label>
                    <x-utils.password-input :name="'password'" :placeholder="'password'"/>
                </div>
                <div>
                    <label for="" class="w-full">Confirm password</label>
                    <x-utils.password-input :name="'confirmPassword'" :placeholder="'confirm password'"/>
                </div>
                
                
                <x-utils.blue-button>Login</x-utils.blue-button>
                <p class="text-gray-500 py-2">
                    create an account 
                    <a href="{{ route('registration') }}" class="text-gray-600">registration</a>
                </p>
            </div>
        </form>
    </div>

</x-layouts.body>