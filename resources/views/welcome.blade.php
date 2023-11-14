<x-app-layout>
    <div class="posting-area bg-white w-full rounded-lg p-4 flex flex-col overflow-hidden">
        <div class="flex flex-1 gap-x-4">
            <img src="{{ auth()->user()->image_url }}" alt="profile image" class="w-12 h-12 rounded-full">
            <div class="w-3/4">
                <textarea placeholder="{{ str(auth()->user()->name)->explode(' ')[0] }}! What's on your mind?"
                    class="w-full focus:h-[100px] bg-gray-100 rounded-lg p-4 h-12 min-h-12 text-area-post"></textarea>
            </div>
            <div class="file-uploader w-1/4">
                <input type="file" name="image" accept="image/*" />
            </div>
        </div>
        <span class="ml-16 mt-2 text-gray-400 text-sm">Press <span class="font-semibold">Enter</span> to share your
            thoughts.</span>
    </div>
</x-app-layout>
