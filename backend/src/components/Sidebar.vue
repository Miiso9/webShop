<template>
    <div class="w-[200px] transition-all bg-indigo-700 text-white py-4 px-2">
        <router-link :to="{name: 'app.dashboard'}"
                     class="flex items-center py-1 px-2 rounded transition-colors hover:bg-black/30 mb-2">
            <span class="mr-4 text-gray-300">
                <HomeIcon class="w-5" />
            </span>
            <span class="text-sm ">
                Nadzorna ploča
            </span>
        </router-link>
        <router-link :to="{name: 'app.products'}"
                     class="flex items-center py-1 px-2 rounded transition-colors hover:bg-black/30 mb-2">
            <span class="mr-4 text-gray-300">
                <ShoppingCartIcon class="w-5" />
            </span>
            <span class="text-sm ">
                Proizvodi
            </span>
        </router-link>
        <router-link :to="{name: 'app.dashboard'}"
                     class="flex items-center py-1 px-2 rounded transition-colors hover:bg-black/30 mb-2">
            <span class="mr-4 text-gray-300">
                <UsersIcon class="w-5" />
            </span>
            <span class="text-sm ">
                Korisnici
            </span>
        </router-link>
        <router-link :to="{name: 'app.dashboard'}"
                     class="flex items-center py-1 px-2 rounded transition-colors hover:bg-black/30 mb-2">
            <span class="mr-4 text-gray-300">
                <ChartBarIcon class="w-5" />
            </span>
            <span class="text-sm ">
                Izvještaji
            </span>
        </router-link>

    </div>

</template>

<script setup>

import {HomeIcon, UsersIcon, ShoppingCartIcon,ChartBarIcon} from '@heroicons/vue/24/outline'
</script>

<style scoped>

</style>
