<section class="gamer-section">
    <header>
        <h2 class="gamer-title">
            {{ __('Update Password') }}
        </h2>

        <p class="gamer-text">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="gamer-form">
        @csrf
        @method('put')

        <div class="gamer-input-group">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="gamer-label"/>
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="gamer-input" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="gamer-error" />
        </div>

        <div class="gamer-input-group">
            <x-input-label for="update_password_password" :value="__('New Password')" class="gamer-label" />
            <x-text-input id="update_password_password" name="password" type="password" class="gamer-input" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="gamer-error" />
        </div>

        <div class="gamer-input-group">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="gamer-label"/>
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="gamer-input" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="gamer-error" />
        </div>

        <div class="gamer-button-group">
            <x-primary-button class="gamer-button-primary">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="gamer-text"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<style>
    .gamer-section {
        font-family: 'Orbitron', sans-serif;
        background-color: #1a1a1a;
        border: 2px solid #00ffea;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 0 25px #00ffea;
        color: #00ffea;
        max-width: 600px;
        margin: auto;
    }

    .gamer-title {
        color: #fff;
        text-shadow: 0 0 10px #00ffea;
        font-size: 1.5rem;
    }

    .gamer-text {
        color: #b2f5f0;
        font-size: 0.9rem;
        margin-top: 10px;
    }

    .gamer-label {
        color: #ffffff;
        margin-bottom: 4px;
        display: block;
    }

    .gamer-input-group {
        margin-top: 20px;
    }

    .gamer-input {
        width: 100%;
        padding: 10px;
        background-color: #0f0f0f;
        border: 1px solid #00ffea;
        border-radius: 10px;
        color: white;
    }

    .gamer-error {
        color: #ff7b7b;
        font-size: 0.8rem;
    }

    .gamer-button-group {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-top: 20px;
    }

    .gamer-button-primary {
        background-color: #00ffea;
        color: #0f0f0f;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }

    .gamer-button-primary:hover {
        background-color: #00cfc3;
    }
</style>
