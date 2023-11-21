<x-app-layout>
    <div class="posting-area bg-white w-full rounded-lg p-4 flex flex-col overflow-hidden max-w-[600px] mx-auto">
        <form class="flex flex-1 gap-x-4" method="POST" action="{{ route('post.publish') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-1 gap-x-4">
                <img src="{{ auth()->user()->image_url }}" alt="profile image" class="w-12 h-12 rounded-full">
                <div class="w-3/4">
                    <textarea name="content" id="post-input"
                        placeholder="{{ str(auth()->user()->name)->explode(' ')[0] }}! What's on your mind?"
                        class="w-full focus:h-[100px] bg-gray-100 rounded-lg p-4 h-12 min-h-12 text-area-post"></textarea>
                </div>
                <div class="file-uploader w-1/4">
                    <input type="file" name="image" accept="image/*" />
                </div>
            </div>
            <input type="submit" hidden />
        </form>
        <span class="ml-16 mt-2 text-gray-400 text-sm">Press <span class="font-semibold">Enter</span> to share your
            thoughts.</span>
    </div>
    <script>
        document.getElementById('post-input').addEventListener('keydown', (e) => {
            if (e.keyCode == 13 && !e.shiftKey) {
                e.preventDefault();
            }

            if (e.keyCode == 13) {
                document.querySelector('input[type=submit]').click();
            }
        });
    </script>
    @if ($errors->count() > 0)
        @if ($errors->has('content'))
            <x-alert class="mt-4" variant="danger" hasBackground>
                {{ $errors->get('content')[0] }}
            </x-alert>
        @endif

        @if ($errors->has('image'))
            <x-alert class="mt-4" variant="danger" hasBackground>
                {{ $errors->get('image')[0] }}
            </x-alert>
        @endif
    @endif

    <div class="posts max-w-[600px] mx-auto mt-3">
        @foreach ($posts as $post)
            <div class="bg-white w-full mb-3 rounded-lg shadow-sm">
                <div class="user p-4 flex items-center gap-x-2">
                    <img src="{{ $post->user->image_url }}" class="w-12 h-12 rounded-full">
                    <div class="flex flex-col">
                        <span class="text-lg">{{ $post->user->name }}</span>
                        <div class="text-sm text-gray-400 flex items-center gap-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <span>{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-2">
                    {{ $post->content }}
                </div>
                @if ($post->getFirstMedia())
                    <div class="bg-gray-50">
                        <img src="{{ $post->getFirstMedia()->getUrl() }}"
                            class="rounded-b-lg max-h-[600px]  bg-cover mx-auto text-center">
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>
