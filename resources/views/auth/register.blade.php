<x-app-layout>
    <div class="flex">
        <div class="flex flex-col gap-y-5 items-center px-24 justify-center h-screen bg-gray-100 m-auto">
            <div>
                <h1 class="text-2xl font-bold text-gray-700">Welcome to <span class="text-emerald-500">Social Life</span>
                </h1>
            </div>
            <div class="bg-white w-[500px] rounded-lg drop-shadow-xl px-6 py-4">

                <form action="{{ route('post.register') }}" method="POST" class="flex flex-col gap-y-6 py-4">
                    @csrf
                    <div class="flex flex-col gap-y-2">
                        <label class="text-gray-600">Name</label>
                        <x-input name="name" placeholder="Enter your name" autocomplete="off" :value="old('name')" />
                        @if ($errors->has('name'))
                            <x-alert variant="danger">{{ $errors->get('name')[0] }}</x-alert>
                        @endif

                    </div>
                    <div class="flex flex-col gap-y-2">
                        <label class="text-gray-600">E-mail</label>
                        <x-input name="email" placeholder="Enter your email" autocomplete="off" :value="old('email')" />
                        @if ($errors->has('email'))
                            <x-alert variant="danger">{{ $errors->get('email')[0] }}</x-alert>
                        @endif

                    </div>
                    <div class="flex flex-col gap-y-2">
                        <label class="text-gray-600">Password</label>
                        <x-input name="password" placeholder="Enter your password" type="password"
                            autocomplete="new-password" />
                        @if ($errors->has('password'))
                            <x-alert variant="danger">{{ $errors->get('password')[0] }}</x-alert>
                        @endif
                    </div>
                    <div class="flex flex-col gap-y-2">
                        <label class="text-gray-600">Confirm Password</label>
                        <x-input name="password_confirmation" placeholder="Enter your password again" type="password"
                            autocomplete="new-password" />
                        @if ($errors->has('password_confirmation'))
                            <x-alert variant="danger">{{ $errors->get('password_confirmation')[0] }}</x-alert>
                        @endif
                    </div>
                    <div>
                        <x-button>Sign Up</x-button>
                    </div>
                </form>
            </div>
            <div class="flex flex-col gap-y-2 mt-3 w-full">
                <span class="text-gray-600 text-center">if you already have an account.</span>
                <a href="{{ route('login') }}"
                    class="bg-gray-200 text-center text-gray-600 py-3 rounded-lg font-bold hover:bg-gray-300 active:bg-gray-400 active:text-gray-800 transition duration-300">
                    Login
                </a>
            </div>
        </div>

    </div>
</x-app-layout>
