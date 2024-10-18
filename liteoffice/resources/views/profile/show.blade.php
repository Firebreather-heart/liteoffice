<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')

            <x-section-border />
            @endif

            <div>
                <div>
                    <x-label for="user_id" value="{{ __('User ID') }}" />
                    <x-input id="user_id" class="block mt-1 w-full" type="text" name="user_id" value="{{ auth()->user()->id }}"
                        readonly />
                </div>
                
                <div>
                    <x-label for="business_id" value="{{ __('Business ID') }}" />
                    <x-input id="business_id" class="block mt-1 w-full" type="text" name="business_id"
                        value="{{ auth()->user()->profile->business_id ?? '' }}" readonly />
                </div>
                
                <div>
                    <x-label for="employer_id" value="{{ __('Employer ID') }}" />
                    <x-input id="employer_id" class="block mt-1 w-full" type="text" name="employer_id"
                        value="{{ auth()->user()->profile->employer_id ?? '' }}" readonly />
                </div>
            </div>

            <div class="mt-10 sm:mt-0">
                <form method="POST" action="{{ route('profile.save') }}">
                    @csrf
                    @method('POST')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-label for="avatar" value="{{ __('Profile Picture') }}"/>
                            <x-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" :value="old('avatar', 
                                auth()->user()->profile->avatar ?? ''
                            )" required autofocus autocomplete="avatar"/>
                        </div>

                        <div>
                            <x-label for="about" value="{{ __('About') }}"/>
                            <x-input id="about" class="block mt-1 w-full" type="text" name="about" :value="old('about', 
                                auth()->user()->profile->about ?? ''
                            )" required autofocus autocomplete="about"/>
                        </div>

                        <div>
                            <x-label for="phone" value="{{ __('Phone') }}"/>
                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', 
                                auth()->user()->profile->phone ?? ''
                            )" required autofocus autocomplete="phone"/>
                        </div>

                        <div>
                            <x-label for="address" value="{{ __('Address') }}"/>
                            <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', 
                            auth()->user()->profile->address ?? ''
                            )" required autofocus autocomplete="address"/>
                        </div>

                        <div>
                            <x-label for="date_of_birth" value="{{ __('Date of Birth') }}"/>
                            <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth', auth()->user()->profile->date_of_birth ?? '')" required autofocus autocomplete="date_of_birth"/>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Save Profile') }}
                        </x-button>
                    </div>
                </form>
            </div>

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
                @livewire('profile.update-password-form')
            </div>

            <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <div class="mt-10 sm:mt-0">
                @livewire('profile.two-factor-authentication-form')
            </div>

            <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <x-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>
            @endif
        </div>
    </div>
</x-app-layout>