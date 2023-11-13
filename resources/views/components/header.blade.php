<div
    {{ $attributes->merge(['class' => 'flex items-center justify-between bg-white px-6 h-[80px] border-b border-gray-200']) }}>
    <div class="logo w-[256px]">
        <h1 class="text-2xl font-bold text-gray-700">Social<span class="text-emerald-500">Life</span>
    </div>
    <div class="actions flex items-center gap-x-12 justify-between flex-1">
        <div class="search">
            <x-input placeholder="Search for anything..."
                class="tansition-all duration-300 ease-in-out w-[400px] hover:drop-shadow-md focus:drop-shadow border border-white hover:border-gray-300 focus:border-gray-300" />
        </div>
        <div class="profile flex items-center gap-x-4">
            <span class="text-gray-600">{{ auth()->user()->name }}</span>
            <img src="{{ auth()->user()->image_url }}" class="rounded-full w-12"
                alt="{{ auth()->user()->name }}'s profile image">
        </div>
    </div>
</div>
