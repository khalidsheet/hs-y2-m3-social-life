<x-app-layout>
    <div class="max-w-[600px] mx-auto">
        <x-post.post :post="$post" />
        <div class="mt-4 bg-white rounded-lg p-3 drop-shadow flex gap-x-3">
            <div class="flex-1">
                <x-input class="w-full" placeholder="Write a comment." />
            </div>
            <div class="flex-2">
                <x-button class=" px-3">Send</x-button>
            </div>
        </div>
        <div class="mt-4 rounded-lg flex flex-col">
            @if ($post->comments->count() === 0)
                <div class=" text-gray-500">
                    Be the first one to comment!
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
