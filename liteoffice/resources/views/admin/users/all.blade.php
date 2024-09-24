<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="container py-4 d-flex justify-content-center">
        <div class="row justify-content-center">
            @foreach($users as $user)
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card user-card shadow-sm w-100"
                    style="transition: transform 0.2s; background-color: #f8f9fa;">
                    <div class="card-body d-flex flex-row">
                        <div class="flex-grow-1">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                            <p class="card-text"><strong>Roles:</strong>
                                {{ implode(', ', $user->roles->pluck('name')->toArray()) }}</p>
                        </div>
                        <div class="d-flex flex-column justify-content-between">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="btn btn-success btn-sm mb-2">Edit</a>
                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <style>
        .user-card {
            transition: transform 0.2s, background-color 0.2s;
        }

        .user-card:hover {
            transform: scale(1.05);
            background-color: #70ade9;
        }

        .user-card:active {
            transform: scale(1.02);
            background-color: #75a1c5;
        }
    </style>
</x-app-layout>