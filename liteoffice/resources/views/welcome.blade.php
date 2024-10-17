<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to LiteOffice') }}
        </h2>
    </x-slot>

    <div class="text-center mt-8">
        <p class="text-5xl font-bold">
            Welcome to
            <span class="text-orange-500 inline-block">Lite</span>
            <span class="text-green-500 inline-block text-7xl">O</span>
            <span class="text-blue-500 inline-block">ffice</span>
        </p>
        <div class="mt-4 text-lg font-bold">
            <a href="{{ route('login') }}" class="text-white hover:text-orange-200 bg-green-500 p-3 rounded-lg">Login</a>
            <a href="{{ route('register') }}" class="ml-4 text-white hover:text-green-200 bg-orange-500 p-3 rounded-lg">Register</a>
        </div>
    </div>
</x-app-layout>