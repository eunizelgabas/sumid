<template>

    <div class="rounded p-4 border border-gray-400 shadow flex">
        <div class="w-[150px] h-[180px] border">Photo here</div>
        <div class="ml-4 flex-1">
            <h3 class="text-2xl">
                Client Details
            </h3>
            <hr>
            <div class="font-bold">{{ client.last_name }}, {{ client.first_name }}</div>
            <div class="italic">{{ client.address }}</div>
            <div class="italic">{{ client.phone }}</div>
            <div class="mt-2">{{ client.bdate }}</div>
        </div>
    </div>

</template>

<script setup>

const props = defineProps({
    client: Object
})

</script>
