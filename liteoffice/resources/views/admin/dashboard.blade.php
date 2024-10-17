<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
                        Welcome to your admin dashboard!
                    </div>

                    <div class="mt-6 text-gray-500">
                        Here you can manage users, view reports, and configure settings.
                    </div>
                </div>

                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7h18M3 12h18m-9 5h9"></path>
                            </svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Manage Users</div>
                        </div>
                        <div class="ml-12">
                            <a href="{{ route('admin.users') }}" class="text-indigo-600 hover:text-indigo-900">
                                Go to User Management
                            </a>
                        </div>
                    </div>

                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A7.5 7.5 0 1116.88 6.196a7.5 7.5 0 01-11.758 11.608z"></path>
                            </svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">See Profiles</div>
                            <div class="ml-12">
                                <a href="{{ route('admin.profiles') }}" class="text-indigo-600 hover:text-indigo-900">
                                    Go to Profiles
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <div class="flex items-center">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"></path>
                            </svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">View Reports</div>
                        </div>
                        {{-- <div class="ml-12">
                            <a href="{{ route('admin.reports.index') }}" class="text-indigo-600 hover:text-indigo-900">
                        Go to Reports
                        </a>
                    </div> --}}
                </div>

                <div class="p-6 bg-white rounded-lg shadow-md">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Configure Settings</div>
                    </div>
                    {{-- <div class="ml-12">
                            <a href="{{ route('admin.settings.index') }}" class="text-indigo-600
                    hover:text-indigo-900">
                    Go to Settings
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>