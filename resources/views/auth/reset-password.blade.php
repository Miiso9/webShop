<x-app-layout>
    <div class="w-[400px] mx-auto my-16">

        <h2 class="text-2xl font-semibold text-center mb-5">
           Unesite novu lozinku
        </h2>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Lozinka" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">


            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"
                          placeholder="Ponovi Lozinku"
                          required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Resetiraj Lozinku') }}
            </x-primary-button>
        </div>
    </form>
    </div>
</x-app-layout>
