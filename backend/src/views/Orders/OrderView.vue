<template>
    <div v-if="order">

        <!--  Order Details-->
        <div>
            <h2 class="flex justify-between items-center text-xl font-semibold pb-2 border-b border-gray-300">
                Detalji Narudžbe
                <OrderStatus :order="order" />
            </h2>
            <table>
                <tbody>
                <tr>
                    <td class="font-bold py-1 px-2">Narudžba #</td>
                    <td>{{ order.id }}</td>
                </tr>
                <tr>
                    <td class="font-bold py-1 px-2">Datum Narudžbe</td>
                    <td>{{ order.created_at }}</td>
                </tr>
                <tr>
                    <td class="font-bold py-1 px-2">Stanje Narudžbe</td>
                    <td>
                        <select v-model="order.status" @change="onStatusChange">
                            <option v-for="status of orderStatuses" :value="status">{{status}}</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold py-1 px-2">Cijena</td>
                    <td>${{ order.total_price }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!--/  Order Details-->

        <!--  Customer Details-->
        <div>
            <h2 class="text-xl font-semibold mt-6 pb-2 border-b border-gray-300">Detalji Korisnika</h2>
            <table>
                <tbody>
                <tr>
                    <td class="font-bold py-1 px-2">Puno ime</td>
                    <td>{{ order.customer.first_name }} {{ order.customer.last_name }}</td>
                </tr>
                <tr>
                    <td class="font-bold py-1 px-2">Email</td>
                    <td>{{ order.customer.email }}</td>
                </tr>
                <tr>
                    <td class="font-bold py-1 px-2">Broj</td>
                    <td>{{ order.customer.phone }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!--/  Customer Details-->

        <!--  Addresses Details-->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div>
                <h2 class="text-xl font-semibold mt-6 pb-2 border-b border-gray-300">Adresa naplate</h2>
                <!--  Billing Address Details-->
                <div>
                    {{ order.customer.billingAddress?.address1 || 'Nije unešena adresa' }}, {{ order.customer.billingAddress?.address2 || '' }} <br>
                    {{ order.customer.billingAddress?.city || 'Nije unešena adresa' }}, {{ order.customer.billingAddress?.zipcode || 'Nije unešena adresa' }} <br>
                    {{ order.customer.billingAddress?.state || 'Nije unešena adresa' }}, {{ order.customer.billingAddress?.country || 'Nije unešena adresa' }} <br>
                </div>
                <!--/  Billing Address Details-->
            </div>
            <div>
                <h2 class="text-xl font-semibold mt-6 pb-2 border-b border-gray-300">Adresa dostave</h2>
                <!--  Shipping Address Details-->
                <div>
                    {{ order.customer.shippingAddress?.address1 || 'Nije unešena adresa' }}, {{ order.customer.shippingAddress?.address2 || '' }} <br>
                    {{ order.customer.shippingAddress?.city || 'Nije unešena adresa' }}, {{ order.customer.shippingAddress?.zipcode || 'Nije unešena adresa' }} <br>
                    {{ order.customer.shippingAddress?.state || 'Nije unešena adresa' }}, {{ order.customer.shippingAddress?.country || 'Nije unešena adresa' }} <br>
                </div>
                <!--/  Shipping Address Details-->
            </div>
        </div>
        <!--/  Customer Details-->

        <!--    Order Items-->
        <div>
            <h2 class="text-xl font-semibold mt-6 pb-2 border-b border-gray-300">Stavke Narudžbe</h2>
            <div v-for="item of order.items">
                <!-- Order Item -->
                <div class="flex flex-col sm:flex-row items-center  gap-4">
                    <a href="#"
                       class="w-36 h-32 flex items-center justify-center overflow-hidden">
                        <img :src="item.product.image" class="object-cover" alt=""/>
                    </a>
                    <div class="flex flex-col justify-between flex-1">
                        <div class="flex justify-between mb-3">
                            <h3>
                                {{ item.product.title }}
                            </h3>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">Kol: {{ item.quantity }}</div>
                            <span class="text-lg font-semibold"> ${{ item.unit_price }} </span>
                        </div>
                    </div>
                </div>
                <!--/ Order Item -->
                <hr class="my-3"/>
            </div>
        </div>
        <!--/    Order Items-->

    </div>
</template>

<script setup>
import {computed, onMounted, ref} from "vue";
import store from "../../store";
import {useRoute} from "vue-router";
import axiosClient from "../../axios.js";
import OrderStatus from "./OrderStatus.vue";

const route = useRoute()

const order = ref(null);
const orderStatuses = ref([]);

onMounted(() => {
    store.dispatch('getOrder', route.params.id)
        .then(({data}) => {
            order.value = data
        })

    axiosClient.get(`/orders/statuses`)
        .then(({data}) => orderStatuses.value = data)
})

function onStatusChange() {
    axiosClient.post(`/orders/change-status/${order.value.id}/${order.value.status}`)
        .then(({data}) => {
            store.commit('showToast', `Stanje Narudžbe je uspješno promijenjeno u "${order.value.status}"`)
        })

}

</script>

<style scoped>

</style>
