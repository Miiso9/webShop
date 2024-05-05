<x-app-layout>
    <form action="{{ route('password.email') }}" method="post" class="w-[400px] mx-auto p-6 my-16">
        @csrf
        <h2 class="text-2xl font-semibold text-center mb-5">
            Unesite Email za resetiranje lozinke
        </h2>
        <p class="text-center text-gray-500 mb-6">
            ili
            <a
                href="{{ route('login') }}"
                class="text-indigo-600 hover:text-indigo-500"
            >prijavi se sa postojećim računom</a
            >
        </p>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="mb-3">
            <x-text-input
                id="loginEmail"
                type="email"
                name="email"
                :value="old('email')"
                placeholder="Your email address"
                required
                autofocus
            />
        </div>
        <button
            class="btn-primary bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 w-full"
        >
            Podnesi
        </button>
    </form>


</x-app-layout>
