<x-app-layout>
    <div class="w-[400px] mx-auto py-32">

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Hvala što ste se prijavili! Prije nego što počnete, možete li potvrditi svoju adresu e-pošte klikom na vezu koju smo vam upravo poslali? Ako niste primili e-mail, rado ćemo vam poslati drugi.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Nova poveznica za provjeru poslana je na adresu e-pošte koju ste naveli prilikom registracije.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Ponovno pošalji email za potvrdu') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                {{ __('Odjavi se') }}
            </button>
        </form>
    </div>
    </div>
</x-app-layout>
