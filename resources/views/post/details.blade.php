<x-app-layout>
    <div class="max-w-[600px] mx-auto">
        <x-post.post :post="$post" />
        <form action="{{ route('comment') }}" method="POST" class="mt-4 bg-white rounded-lg p-3 drop-shadow flex gap-x-3">
            @csrf
            <div class="flex-1">
                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <x-input class="w-full" placeholder="Write a comment." name="content" />
            </div>
            <div class="flex-2">
                <x-button class=" px-3">Send</x-button>
            </div>
        </form>
        <div class="mt-4 rounded-lg flex flex-col">
            @if ($post->comments->count() === 0)
                <div class=" text-gray-500">
                    Be the first one to comment!
                </div>
            @else
                <div class=" text-gray-500">
                    {{ $post->comments->count() }} comments
                </div>
            @endif
        </div>
        <div class="mt-3">
            @foreach ($post->comments as $comment)
                <div class="bg-white rounded-lg p-4 mb-3">
                    <div class="flex justify-between items-start h-12  mb-3">
                        <div class="flex items-center gap-x-2">
                            <img src="{{ $comment->user->image_url }}" class="w-10 h-10 rounded-full" alt="">
                            <div class="flex flex-col">
                                <span>{{ $comment->user->name }}</span>
                                <span class="text-sm text-gray-400">Member since
                                    {{ $comment->user->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="text-sm text-gray-400">
                            {{ $comment->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div>
                        {{ $comment->content }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
