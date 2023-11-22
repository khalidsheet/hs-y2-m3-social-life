<x-app-layout>
    <div class="h-screen w-full flex flex-col gap-y-4 items-center justify-center">
        <div class="bg-white p-5 w-[500px] rounded-lg drop-shadow-lg flex flex-col gap-y-3">
            <div class="text-2xl text-green-500 flex gap-x-2 items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <span>Verification Email Sent!</span>
            </div>
            <p class="text-gray-900">{{ decrypt(request()->query('payload'))['name'] }}! Thank you for registering with
                <span class="font-bold">{{ env('APP_NAME') }}</span>!
            </p>
            <p class="text-gray-500">We've just sent an email to <span
                    class="font-semibold">{{ decrypt(request()->query('payload'))['email'] }}</span>.
                Please
                check your inbox for a
                verification email.</p>
            <p class="text-gray-500">To complete the registration process, click on the verification link in the email.
                If you don't see the
                email in your inbox, please check your spam or junk folder.</p>
            <p class="text-gray-500">If you encounter any issues or haven't received the email within a few minutes,
                please contact our
                support team at <a href="mailto:khalid@harbourspace.site"
                    class="text-green-500">khalid@harbourspace.site</a>.</p>
            <p class="text-gray-500">Thank you for joining <span class="font-bold">{{ env('APP_NAME') }}</span>! We look
                forward to having you as a
                valued
                member of our
                community.
            </p>
            <hr>
            <p class="text-gray-500">
                While waiting for the verification email, you can still login to discover our
                platform. However, please note that some features may
                be restricted until your email is verified.
            </p>
            <a href="{{ route('login') }}"
                class="bg-gray-200 active:bg-gray-300 w-full h-12 flex items-center justify-center rounded-md font-bold">
                Login
            </a>
        </div>
        <div class="text-gray-500">
            All rights reserved &copy; 2023 | Social Life
        </div>
    </div>
</x-app-layout>
