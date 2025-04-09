<section class="gamer-section">
    <header>
        <h2 class="gamer-title">
            {{ __('Profile Information') }}
        </h2>

        <p class="gamer-text">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="gamer-form">
        @csrf
        @method('patch')

        <div class="gamer-input-group">
            <x-input-label for="name" :value="__('Name')" class="gamer-label" />
            <x-text-input id="name" name="name" type="text" class="gamer-input" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="gamer-error" :messages="$errors->get('name')" />
        </div>

        <div class="gamer-input-group">
            <x-input-label for="email" :value="__('Email')" class="gamer-label" />
            <x-text-input id="email" name="email" type="email" class="gamer-input" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="gamer-error" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="gamer-text">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="gamer-link">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="gamer-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="gamer-button-group">
            <x-primary-button class="gamer-button-primary">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
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

    .gamer-link {
        color: #00ffea;
        text-decoration: underline;
        font-size: 0.9rem;
        margin-left: 6px;
        background: none;
        border: none;
        cursor: pointer;
    }

    .gamer-success {
        color: #00ffea;
        font-size: 0.9rem;
        margin-top: 5px;
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

