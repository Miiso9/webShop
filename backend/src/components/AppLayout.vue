<template>
    <div v-if="currentUser.id" class="min-h-full bg-gray-200 flex">

    <Sidebar :class="{'-ml-[200px]' : !sidebarOpened}" />

        <div class="flex-1">

            <Navbar @toggle-sidebar="toggleSidebar"></Navbar>

            <main class="p-6">
                    <router-view> </router-view>
            </main>
        </div>
    </div>
    <div v-else class=" min-h-full bg-gray-200 flex items-center justify-center">
        <Spinner />
    </div>
    <Toast/>
</template>

<script setup>
import {ref, onMounted, onUnmounted, computed} from 'vue'
    import Sidebar from "./Sidebar.vue";
    import Navbar from "./Navbar.vue";
    import store from "../store";
    import Spinner from "./core/Spinner.vue";
    import Toast from "./core/Toast.vue";

const {title}  = defineProps({
        title: String
    })

    const sidebarOpened = ref(true);
    const currentUser = computed(() => store.state.user.data);



function toggleSidebar(){
        sidebarOpened.value = !sidebarOpened.value
    }

    onMounted(()=> {
        store.dispatch('getCurrentUser')
        store.dispatch('getCountries')
        handleSidebarOpened();
        window.addEventListener('resize', handleSidebarOpened)
    })

    onUnmounted(()=> {
        window.removeEventListener('resize', handleSidebarOpened)
    })

    function handleSidebarOpened() {
        sidebarOpened.value = window.outerWidth > 768;
    }



</script>

<style scoped>

</style>
