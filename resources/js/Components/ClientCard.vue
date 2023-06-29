<template>

    <div class="rounded-lg p-4 border-2 border-gray-400 bg-white shadow flex hover:bg-blue-100">
        <div class="cursor-pointer flex flex-1" @click="open(client)">
            <div class="w-[150px] h-[180px] border flex justify-center items-center bg-gray-300 text-center">Photo<br>here</div>
            <div class="ml-4 flex-1">
                <h3 class="font-bold">
                    Client Details
                </h3>
                <hr>
                <div class="text-2xl">{{ client.last_name }}, {{ client.first_name }}</div>
                <div class="italic">{{ client.address }}</div>
                <div class="italic">{{ client.phone }}</div>
                <div class="mt-2">{{ client.formattedBDate }}</div>
            </div>
        </div>
    </div>

</template>

<script setup>
import { router } from '@inertiajs/vue3';


const props = defineProps({
    client: Object
})

function open(client) {
    router.visit('/clients/' + client.id)
}

</script>
