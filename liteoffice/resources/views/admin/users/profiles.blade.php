<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Profiles') }}
        </h2>
    </x-slot>

    <div class="container p-4 d-flex justify-content-center" style="margin-left: auto; margin-right:auto">
        <div class="row justify-content-center">
            @foreach($profiles as $profile)
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card user-card shadow-sm w-100"
                    style="transition: transform 0.2s; background-color: #eceff1;padding:20px;">
                    <div class="card-body d-flex flex-row">
                        <div class="flex-grow-1">
                            <h5 class="card-title text-center">{{ $profile->name }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $profile->email }}</p>
                            <p class="card-text"><strong>Roles:</strong>
                                {{ implode(', ', $profile->roles->pluck('name')->toArray()) }}</p>
                        </div>
                        <div class="d-flex flex-column justify-content-between">
                            <a href="{{ route('admin.profiles.edit', $profile->id) }}"
                                class="rounded p-3 h-2 text-white bg-green-500">Edit</a>
                            <form action="{{ route('admin.profiles.delete', $profile->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded text-white p-2 bg-red-500 btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-app-layout>