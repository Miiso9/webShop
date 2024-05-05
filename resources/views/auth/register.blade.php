<x-app-layout>

    <form
        action="{{ route('register') }}"
        method="post"
        class="w-[400px] mx-auto p-6 my-16"

    >
        @csrf
        <h2 class="text-2xl font-semibold text-center mb-4">Napravi račun</h2>
        <p class="text-center text-gray-500 mb-3">
            ili
            <a
                href="{{ route('login') }}"
                class="text-sm text-indigo-700 hover:text-indigo-600"
            >prijavi se sa postojećim računom</a
            >
        </p>

        <div class="mb-4">
            <x-text-input
                placeholder="Vaše Ime"
                type="text"
                name="name"
                :value="old('name')"
            />
        </div>

        <div class="mb-4">
            <x-text-input
                placeholder="Vaš Email"
                type="email"
                name="email"
                :value="old('email')"
            />
        </div>
        <div class="mb-4">
            <x-text-input
                placeholder="Lozinka"
                type="password"
                name="password"

            />
        </div>

        <div class="mb-4">
            <x-text-input
                placeholder="Ponovi Lozinku"
                type="password"
                name="password_confirmation"
            />
        </div>

        <button
            class="btn-primary bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 w-full"
        >
            Registriraj se
        </button>
    </form>


</x-app-layout>
