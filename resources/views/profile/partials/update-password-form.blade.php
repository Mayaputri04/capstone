<section>
    <header>

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">

            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-auth.input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-auth.text-input id="update_password_current_password" name="current_password" type="password" class="block w-full mt-1" autocomplete="current-password" />
            <x-auth.input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-auth.input-label for="update_password_password" :value="__('New Password')" />
            <x-auth.text-input id="update_password_password" name="password" type="password" class="block w-full mt-1" autocomplete="new-password" />
            <x-auth.input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-auth.input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-auth.text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="block w-full mt-1" autocomplete="new-password" />
            <x-auth.input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-auth.primary-button>{{ __('Save') }}</x-auth.primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"

                    class="text-sm text-gray-600"

                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
