<x-layout title="df">
    <div class="flex items-center justify-center h-screen bg-gray-100 m-auto">
        <div class="bg-white w-[500px] rounded-lg drop-shadow-xl px-6 py-4">
            <form action="#" method="POST" class="flex flex-col gap-y-6 py-4">
                @csrf
                <div class="flex flex-col gap-y-2">
                    <label>E-mail</label>
                    <x-input placeholder="Enter your email" autocomplete="off" />
                </div>
                <div class="flex flex-col gap-y-2">
                    <label>Password</label>
                    <x-input placeholder="Enter your password" type="password" autocomplete="new-password" />
                </div>
                <div>
                    <x-button>login</x-button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
