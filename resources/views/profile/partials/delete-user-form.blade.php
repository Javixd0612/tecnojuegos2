<section class="gamer-section">
    <header>
        <h2 class="gamer-title">
            {{ __('Delete Account') }}
        </h2>

        <p class="gamer-text">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="gamer-button-danger"
    >
        {{ __('Delete Account') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="gamer-form">
            @csrf
            @method('delete')

            <h2 class="gamer-title">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="gamer-text">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="gamer-input-group">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="gamer-input"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="gamer-error" />
            </div>

            <div class="gamer-button-group">
                <x-secondary-button x-on:click="$dispatch('close')" class="gamer-button-secondary">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="gamer-button-danger ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
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

    .gamer-form {
        padding: 20px 0;
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
        justify-content: flex-end;
        margin-top: 20px;
        gap: 10px;
    }

    .gamer-button-danger,
    .gamer-button-secondary {
        background-color: #00ffea;
        border: none;
        color: #0f0f0f;
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .gamer-button-danger:hover,
    .gamer-button-secondary:hover {
        background-color: #00cfc3;
    }
</style>
