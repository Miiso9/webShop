<x-app-layout>
    <div class="relative mb-8">
        <img src="{{ asset('headline.png') }}" alt="Headline Image" class="w-full h-96 object-cover rounded-lg shadow-lg">
        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-5xl font-bold text-white bg-black bg-opacity-50 px-4 py-2 rounded">E-Commerce</h1>
        </div>
    </div>
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">Naši Proizvodi</h1>
        <p class="text-gray-600">Pogledajte naše dostupne artikle:</p>
    </div>
    <div class="flex justify-center">
        <div class="grid gap-8 grid-cols-1 md:grid-cols-3 lg:w-3/4 p-5">
            @foreach($products as $product)
                <!-- Product Item -->
                <div
                    x-data="productItem({{ json_encode([
                            'id' => $product->id,
                            'slug' => $product->slug,
                            'image' => $product->image,
                            'title' => $product->title,
                            'price' => $product->price,
                            'addToCartUrl' => route('cart.add', $product)
                        ]) }})"
                    class="border border-1 border-gray-200 rounded-md hover:border-purple-600 transition-colors bg-white"
                >
                    <a href="{{ route('product.view', $product->slug) }}" class="aspect-w-3 aspect-h-2 block overflow-hidden">
                        <img
                            src="{{ $product->image }}"
                            alt=""
                            class="object-cover rounded-lg hover:scale-105 hover:rotate-1 transition-transform"
                        />
                    </a>
                    <div class="p-4">
                        <h3 class="text-lg">
                            <a href="{{ route('product.view', $product->slug) }}">
                                {{$product->title}}
                            </a>
                        </h3>
                        <h5 class="font-bold">{{$product->price}} KM</h5>
                    </div>
                    <div class="flex justify-between py-3 px-4">
                        <button class="btn-primary" @click="addToCart()">
                            Dodaj u Korpu
                        </button>
                    </div>
                </div>
                <!--/ Product Item -->
            @endforeach
        </div>
    </div>
    {{$products->links()}}
</x-app-layout>
