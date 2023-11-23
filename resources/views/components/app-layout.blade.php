<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Social Life</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css?v=') }}{{ now()->timestamp }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/icons.min.css') }}">
</head>

<body class="h-full">
    <div class="min-h-full">
        <main>
            @auth
                <x-header class="fixed w-full z-[9999]" />
            @endauth
            <div class="h-screen flex">
                @auth
                    <div class="side-menu flex flex-col gap-y-6 bg-white w-[256px] pt-[92px] px-6 border-r border-gray-200">
                        <a href="{{ route('home') }}"
                            class="flex gap-x-4 items-center text-gray-700  rounded-lg p-2 hover:cursor-pointer hover:bg-green-100 hover:text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <span>Home</span>
                        </a>
                        <a
                            class="flex gap-x-4 items-center text-gray-700  rounded-lg p-2 hover:cursor-pointer hover:bg-green-100 hover:text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                            </svg>
                            <span>Explore</span>
                        </a>
                        <a href="{{ route('get.people') }}"
                            class="flex gap-x-4 items-center text-gray-700 rounded-lg p-2 hover:cursor-pointer hover:bg-green-100 hover:text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                            <span>People</span>
                        </a>
                    </div>
                @endauth
                <div class="px-6 flex-1 {{ !!auth()->user() ? 'pt-[92px] overflow-y-scroll' : '' }}">
                    {{ $slot }}
                </div>
                @auth
                    <div class="bg-white w-[400px] h-full pt-[92px] border-l border-gray-200 px-6">
                        @if ($sentFollowRequests->count() > 0)
                            <div class="mb-6">
                                <h2 class="font-bold mb-4">Sent Requests ({{ $sentFollowRequests->count() }})</h2>
                                @foreach ($sentFollowRequests as $request)
                                    <div class="w-full bg-gray-50 p-4 rounded-lg flex items-center justify-between">

                                        <div class="flex items-center gap-x-3">
                                            <div>
                                                <img src="{{ $request->following->image_url }}"
                                                    class="w-12 h-12 rounded-full" alt="">
                                            </div>
                                            <div class="flex flex-col">
                                                <span>{{ $request->following->name }}</span>
                                                <span
                                                    class="text-sm text-gray-400">{{ $request->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="w-10 h-10 p-2 bg-gray-200 text-gray-700 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>

                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if ($followRequests->count() > 0)
                            <div class="mb-4">
                                <h2 class="font-bold mb-4">Follow Requests ({{ $followRequests->count() }})</h2>
                                @foreach ($followRequests as $request)
                                    <div class="w-full bg-gray-50 p-4 rounded-lg flex items-center justify-between">

                                        <div class="flex items-center gap-x-3">
                                            <div>
                                                <img src="{{ $request->follower->image_url }}"
                                                    class="w-12 h-12 rounded-full" alt="">
                                            </div>
                                            <div class="flex flex-col">
                                                <span
                                                    title="{{ $request->follower->name }}">{{ Str::limit($request->follower->name, 13, '...') }}</span>
                                                <span
                                                    class="text-sm text-gray-400">{{ $request->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <div class="flex gap-x-3">
                                            <button class="w-10 h-10 p-2 bg-green-100 text-green-500 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4.5 12.75l6 6 9-13.5" />
                                                </svg>

                                            </button>
                                            <button class="w-10 h-10 p-2 bg-red-100 text-red-500 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>

                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div>
                            <h2 class="font-bold mb-4">Followers ({{ $followers->count() }})</h2>
                            @foreach ($followers as $follower)
                                <div class="flex items-center gap-x-3">
                                    <div>
                                        <img src="{{ $follower->following->image_url }}" class="w-12 h-12 rounded-full"
                                            alt="">
                                    </div>
                                    <div class="flex flex-col">
                                        <span>{{ $follower->following->name }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endauth
            </div>
        </main>
    </div>

    <script src="{{ asset('assets/js/icons.min.js') }}" defer></script>
</body>

</html>
