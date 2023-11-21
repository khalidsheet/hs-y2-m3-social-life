<x-app-layout>
    <div class="max-w-[600px] mx-auto">
        <h1 class="text-3xl  mt-3">People</h1>
        <div class="posts  mt-4 grid grid-cols-3  gap-x-2">
            @foreach ($people as $person)
                <div
                    class="bg-white w-full flex flex-col  items-center gap-y-3 mb-3 text-center rounded-lg shadow-sm p-4 justify-center">
                    <div>
                        <img src="{{ $person->image_url }}" class="w-16 h-16 rounded-full">
                    </div>
                    <div class="flex flex-col gap-y-1">
                        <span>{{ Str::limit($person->name, 15) }}</span>
                        <span class="text-xs text-gray-400">Joined {{ $person->created_at->diffForHumans() }}</span>
                    </div>
                    <div>
                        <form action="#" method="post">
                            <button
                                class="bg-{{ auth()->user()->isFollowing($person)? 'red': 'gray' }}-100 px-6 py-2 rounded-lg hover:bg-{{ auth()->user()->isFollowing($person)? 'red': 'gray' }}-200 active:bg-{{ auth()->user()->isFollowing($person)? 'red': 'gray' }}-300 text-{{ auth()->user()->isFollowing($person)? 'red': 'gray' }}-600 flex gap-x-2 items-center">
                                @if (auth()->user()->isFollowing($person))
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                    </svg>
                                    <span>Unfollow</span>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                    </svg>

                                    <span>Follow</span>
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $people->links() }}
        </div>
    </div>
</x-app-layout>
