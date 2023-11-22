<x-app-layout>
    <h1 class="text-2xl font-semibold mb-4">Account Verification</h1>
    <p class="text-gray-700 mb-4">Dear {{ $user->name }},</p>
    <p class="text-gray-700 mb-4">Thank you for registering with {{ env('APP_NAME') }}! To complete your registration,
        please click the link below to verify your account:</p>
    <p class="mb-4"><a href="{{ $token }}" class="text-blue-500">Verify Your Account</a></p>
    <hr>
    <p class="text-gray-700 mb-4">If you didn't register on {{ env('APP_NAME') }}, please ignore this email.</p>
    <p class="text-gray-700 mb-4">Best Regards,<br>{{ env('APP_NAME') }} Team</p>
</x-app-layout>
