<template>
<div class="flex justify-center items-center min-h-full w-full min-w-full">
    <div class="flex">
        <div class="text-indigo-600 text-5xl px-8 font-bold border-r pb-8 leading-10">404</div>
        <div class="px-8">
            <h1 class="text-5xl font-bold mb-2">Stranica nije pronađena</h1>
            <p class="text-gray-400 mb-10">Provjerite url u adresnoj traci i pokušajte ponovno</p>
            <div>
                <router-link :to="{name: 'app.dashboard'}"
                    class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Vrati na početak
                </router-link>
            </div>
        </div>
    </div>
</div>
</template>

<script setup>

</script>

<style scoped>

</style>
