<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTML5 Boilerplate</title>
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
                        <div class="flex gap-x-4 items-center text-gray-700">
                            <i class="fa-solid fa-house"></i> <span>Home</span>
                        </div>
                        <div class="flex gap-x-4 items-center text-gray-700">
                            <i class="fa-solid fa-globe"></i> <span>Explore</span>
                        </div>
                        <div class="flex gap-x-4 items-center text-gray-700">
                            <i class="fa-solid fa-users"></i> <span>Friends</span>
                        </div>
                    </div>
                @endauth
                <div class="px-6 flex-1 {{ !!auth()->user() ? 'pt-[92px] overflow-y-scroll' : '' }}">
                    {{ $slot }}
                </div>
                @auth
                    <div class="bg-white w-[400px] h-full pt-[92px] border-l border-gray-200 px-6">
                        Additional Info
                    </div>
                @endauth
            </div>
        </main>
    </div>

    <script src="{{ asset('assets/js/icons.min.js') }}" defer></script>
</body>

</html>
