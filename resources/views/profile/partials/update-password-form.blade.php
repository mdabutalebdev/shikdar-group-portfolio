<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div x-data="{ show: false }">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <div class="mt-1" style="position: relative;">
                <x-text-input id="update_password_current_password" name="current_password" x-bind:type="show ? 'text' : 'password'" class="block w-full pr-10" autocomplete="current-password" />
                <button type="button" @click="show = !show" class="absolute flex items-center text-gray-500 hover:text-gray-700 focus:outline-none" style="top: 50%; right: 15px; transform: translateY(-50%);">
                    <i class="fa-solid fa-eye" x-show="!show"></i>
                    <i class="fa-solid fa-eye-slash" x-show="show" style="display: none;"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div x-data="{ show: false }">
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <div class="mt-1" style="position: relative;">
                <x-text-input id="update_password_password" name="password" x-bind:type="show ? 'text' : 'password'" class="block w-full pr-10" autocomplete="new-password" />
                <button type="button" @click="show = !show" class="absolute flex items-center text-gray-500 hover:text-gray-700 focus:outline-none" style="top: 50%; right: 15px; transform: translateY(-50%);">
                    <i class="fa-solid fa-eye" x-show="!show"></i>
                    <i class="fa-solid fa-eye-slash" x-show="show" style="display: none;"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div x-data="{ show: false }">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <div class="mt-1" style="position: relative;">
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" x-bind:type="show ? 'text' : 'password'" class="block w-full pr-10" autocomplete="new-password" />
                <button type="button" @click="show = !show" class="absolute flex items-center text-gray-500 hover:text-gray-700 focus:outline-none" style="top: 50%; right: 15px; transform: translateY(-50%);">
                    <i class="fa-solid fa-eye" x-show="!show"></i>
                    <i class="fa-solid fa-eye-slash" x-show="show" style="display: none;"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
