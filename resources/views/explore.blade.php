<x-app-layout>
    <div class="max-w-[600px] mx-auto">
        <div class="mb-3">
            <h1 class="text-3xl  mt-3">Explore</h1>
            <span class="text-sm text-gray-500">Random Posts from all of our community!</span>
        </div>
        <div class="posts max-w-[600px] mx-auto mt-3">
            @foreach ($posts as $post)
                <x-post.post :post="$post" />
            @endforeach
        </div>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
