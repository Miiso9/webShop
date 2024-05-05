<x-app-layout>


    <form action="{{ route('login') }}" method="post" class="w-[400px] mx-auto p-6 my-16">
        @csrf
        <h2 class="text-2xl font-semibold text-center mb-5">
            Prijavite se na svoj račun
        </h2>
        <p class="text-center text-gray-500 mb-6">
            ili
            <a
                href="{{ route('register') }}"
                class="text-sm text-indigo-700 hover:text-indigo-600"
            >napravi novi račun</a
            >

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

        </p>
        <div class="mb-4">
            <x-text-input
                id="loginEmail"
                type="email"
                name="email"
                :value="old('email')"
                :errors="$errors"
                placeholder="Vaša email adresa"
            />
        </div>

        <div class="mb-4">
            <x-text-input
                id="loginPassword"
                type="password"
                name="password"
                placeholder="Vaša lozinka"

            />
        </div>

        <div class="flex justify-between items-center mb-5">
            <div class="flex items-center">
                <input
                    id="loginRememberMe"
                    type="checkbox"
                    name="remember"
                    class="mr-3 rounded border-gray-300 text-indigo-500 focus:ring-indigo-500"
                />
                <label for="loginRememberMe">Zapamti me</label>
            </div>
            <a href="{{ route('password.request') }}" class="text-sm text-indigo-700 hover:text-indigo-600">Zaboravio si lozinku?</a>
        </div>
        <button
            class="btn-primary bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 w-full"
        >
            Prijavi se
        </button>
    </form>

</x-app-layout>
