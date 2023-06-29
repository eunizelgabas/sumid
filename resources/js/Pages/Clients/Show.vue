<template>
    <Head title="View Client" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex">
                <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">View Client</h2>
                <Link class="button1 mb-2" as="button" :href="'/clients/'">Back</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex">
                        <div class="w-[300px] h-[400px] border flex justify-center items-center">photo</div>
                        <div class="flex-1 ml-4">
                            <div class="flex">
                                <h3 class="text-2xl flex-1">{{ client.last_name }}, {{ client.first_name }}</h3>
                                <div>
                                    <Link class="button2 mr-2" :href="'/clients/' + client.id" method="delete" as="button">Delete</Link>
                                    <Link class="button1 mb-2" :href="'/clients/edit/' + client.id" as="button">Edit</Link>
                                </div>
                            </div>
                            <hr>
                            <div class="mt-4">{{ client.address }}</div>
                            <div>{{ client.phone }}</div>
                            <div class="py-4">{{ client.formattedBDate }}</div>
                            <div class="p-4 border rounded">
                                {{ client.bio }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    client: Object
})
</script>
